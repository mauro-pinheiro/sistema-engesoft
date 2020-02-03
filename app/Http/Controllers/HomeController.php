<?php

namespace App\Http\Controllers;

use App\Edition;
use App\Evaluation;
use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $active_editions = Edition::all()->filter(function ($value, $key) {
            return $value->publicada() === false;
        });
        $my_submissions = Submission::where('author_id', Auth::id())->get();
        $my_evaluations = Evaluation::where('evaluator_id', Auth::id())->get();
        return view('home.index', compact(['active_editions', 'my_submissions', 'my_evaluations']));
    }
}
