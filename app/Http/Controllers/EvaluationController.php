<?php

namespace App\Http\Controllers;

use App\Evaluation;
use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EvaluationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $evaluations = Evaluation::all();
        $submissions = Submission::all();
        $titulo = "avaliação";
        return view('evaluations.index', compact(['submissions', 'titulo']));
    }

    public function create(Submission $submission = null)
    {
        $submissions = Submission::all();
        if ($submission !== null) {
            return view('evaluations\create', compact(['submissions', 'submission']));
        }
        return view('evaluations\create', compact('submissions'));
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'originality' => 'required|min:0|max:10',
            'presentation' => 'required|min:0|max:10',
            'content' => 'required|min:0|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = $validator->validate();

        $evaluation = Evaluation::create($data);
        $evaluation->evaluator()->associate(Auth::user());
        $evaluation->submission()->associate(Submission::find(request('article_id')));
        $evaluation->save();
        return redirect()->route('evaluations.index');
    }
}
