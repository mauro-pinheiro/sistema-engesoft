<?php

namespace App\Http\Controllers;

use App\Edition;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditionController extends Controller
{
    protected $rules = [
        'number' => 'required',
        'volume' => 'required',
        'theme' => 'required',
        'month' => 'required',
        'year' => 'required',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $editions = Edition::all();
        $titulo = "edição";
        return view('editions.index', compact(['editions', 'titulo']));
    }

    public function create()
    {
        $users = User::all();
        return view('editions.create', compact('users'));
    }

    public function store()
    {
        $data = request()->all();
        $lead = User::find($data['lead_editor_id']);
        $validator =
            Validator::make($data, $this->rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = $validator->validate();
        // dd($data);

        $edition = Edition::create($data);
        $edition->leadEditor()->associate($lead);
        $edition->save();
        return redirect()->route('editions.index');
    }

    public function show(Edition $edition)
    {
        return view('editions.show', compact('edition'));
    }

    public function edit(Edition $edition)
    {
        $users = User::all();
        return view('editions.edit', compact(['edition', 'users']));
    }

    public function update(Edition $edition)
    {
        $data = request()->all();
        $validator =
            Validator::make($data, $this->rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = $validator->validate();
        $edition->number = $data['number'];
        $edition->volume = $data['volume'];
        $edition->month = $data['month'];
        $edition->year = $data['year'];
        $edition->theme = $data['theme'];
        if ($edition->leadEditor->id !== data['lead_edition_id']) {
            $edition->associate(Edition::find($data['lead_edition_id']));
        }
        $edition->save();
        return redirect()->route('editions.index');
    }

    public function destroy(Edition $edition)
    {
        $edition->delete();
        return redirect()->route('editions.index');
    }
}
