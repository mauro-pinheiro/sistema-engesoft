@extends('layouts.create')

@section('title', 'Editar Edição')

@section('form')
<div class="container">
    <form action="{{route('editions.update',['edition' => $edition->id])}}" method="POST">
        @csrf
        <div class="form-group row justify-content-center">
            <label class="col-2" for="theme">Tema</label>
            <input type="text" class="form-control col" name="theme" value="{{ $edition->theme }}" >
        </div>
        <div class="form-group row justify-content-center">
            <label class="col-2" for="volume">Volume</label>
            <input type="text" class="form-control col" name="volume" value="{{ $edition->volume }}" >
        </div>

        <div class="form-group row justify-content-center">
            <label class="col-2" for="number">Número</label>
            <input type="text" class="form-control col" name="number" value="{{ $edition->number }}" >
        </div>

        <div class="form-group row justify-content-center">
            <label class="col-2" for="month">Mês</label>
            <input type="text" class="form-control col" name="month" value="{{ $edition->month }}" >
        </div>

        <div class="form-group row justify-content-center">
            <label class="col-2" for="year">Ano</label>
            <input type="text" class="form-control col" name="year" value="{{ $edition->year }}" >
        </div>

        <div class="form-group row justify-content-center">
            <label class="col-2" for="leadEditor_id">Editor-Chefe</label>
            <select class="form-control col" name="lead_editor_id">
                @foreach ($users as $user)
                    <option value={{$user->id}}
                        @if($user->id == $edition->leadEditor->id) selected @endif>
                        {{$user->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <a class="btn btn-primary">Editar</a>
    </form>
</div>
@endsection
