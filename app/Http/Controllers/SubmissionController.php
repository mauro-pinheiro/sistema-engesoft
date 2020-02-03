<?php

namespace App\Http\Controllers;

use App\Edition;
use App\Submission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $submissions = Submission::all();
        $titulo = "submissão";
        return view('submissions.index', compact(['submissions', 'titulo']));
    }

    public function create(Edition $edition = null)
    {
        $editions = Edition::all()->filter(function ($value, $key) {
            return $value->publicada() === false;
        });
        if ($edition !== null) {
            return view("submissions.create", compact(['editions', '$edition']));
        } else {
            return view("submissions.create", compact('editions'));
        }
    }

    public function store()
    {
        $data = request()->all();
        $edition = Edition::find(request('edition_id'));
        $rules = [
            "article" => "required",
        ];
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = $validator->validate();
        $submission = Submission::create($data);
        $submission->edition()->associate($edition);
        $submission->save();
        return redirect()->route('submissions.edit', ['submission' => $submission->id]);
    }
    public function show(Submission $submission)
    {
        $editions = Edition::all()->filter(function ($value, $key) {
            return $value->publicada() === false;
        });
        return view('submissions.show', compact(['submission', 'editions']));
    }

    public function edit(Submission $submission)
    {
        $editions = Edition::all()->filter(function ($value, $key) {
            return $value->publicada() === false;
        });
        return view('submissions.edit', compact(['submission', 'editions']));
    }

    public function addAuthor(Submission $submission)
    {
        $validator = Validator::make(request()->all(), [
            'author' => 'required|email'
        ]);
        $data = $validator->validate();
        $user = User::where('email', $data['author'])->first();
        if ($user === null) {
            return redirect()->back()->with('error', "Autor não encontrado");
        }

        if (!$submission->authors->contains($user)) {
            $submission->authors()->save($user);
            $submission->save();
        } else {
            return redirect()->back()->with('error', "Autor já adicionado");
        }

        return redirect()->back();
    }

    public function update(Submission $submission)
    {
        $validator = Validator::make(request()->all(), [
            'article' => 'required',
        ]);

        $data = $validator->validate();

        $submission->article = $data['article'];
        $contact = User::find(request('contact_id'));
        $edition = Edition::find(request('edition_id'));
        $submission->contact()->associate($contact);
        $submission->edition()->associate($edition);
        $submission->author()->associate(Auth::user());
        $submission->save();
        return redirect()->route('submissions.index');
    }

    public function destroy(Submission $submission)
    {
        $submission->delete();
        return redirect()->route('submissions.index');
    }
}
