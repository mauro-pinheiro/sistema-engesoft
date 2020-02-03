<?php

namespace App\Http\Controllers;

use App\Submission;
use Illuminate\Http\Request;

class SelectionController extends Controller
{
    public function index()
    {
        $submissions = Submission::all();
        return view('selections.index', compact('submissions'));
    }
}
