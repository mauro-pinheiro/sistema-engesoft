@extends('layouts.create')

@section('title', 'Visualizar Edição')

@section('form')
<div class="container">
    <form>
        @csrf
        <div class="form-group row justify-content-center">
            <label class="col-2" for="theme">Tema</label>
            <input type="text" class="form-control col" name="theme" value="{{ $edition->theme }}" readonly>
        </div>
        <div class="form-group row justify-content-center">
            <label class="col-2" for="volume">Volume</label>
            <input type="text" class="form-control col" name="volume" value="{{ $edition->volume }}" readonly>
        </div>

        <div class="form-group row justify-content-center">
            <label class="col-2" for="number">Número</label>
            <input type="text" class="form-control col" name="number" value="{{ $edition->number }}" readonly>
        </div>

        <div class="form-group row justify-content-center">
            <label class="col-2" for="month">Mês</label>
            <input type="text" class="form-control col" name="month" value="{{ $edition->month }}" readonly>
        </div>

        <div class="form-group row justify-content-center">
            <label class="col-2" for="year">Ano</label>
            <input type="text" class="form-control col" name="year" value="{{ $edition->year }}" readonly>
        </div>

        <div class="form-group row justify-content-center">
            <label class="col-2" for="leadEditor_id">Editor-Chefe</label>
            <input type="text" class="form-control col" name="leadEditor_id" value="{{ $edition->leadEditor->name }}" readonly>
        </div>
        <a href="{{route('editions.edit',['edition' => $edition->id])}} "class="btn btn-primary">Editar</a>
    </form>
</div>
@endsection
