@extends('layouts.create')

@section('title', 'Nova Edição')

@section('form')
<div class="container">
    <form action="{{route('editions.store')}}" method="POST">
        @csrf
        <div class="form-group row justify-content-center">
            <label class="col-2" for="theme">Tema</label>
            <input type="text" class="form-control col" name="theme">
        </div>
        <div class="form-group row justify-content-center">
            <label class="col-2" for="volume">Volume</label>
            <input type="text" class="form-control col" name="volume" aria-describedby="">
        </div>

        <div class="form-group row justify-content-center">
            <label class="col-2" for="number">Número</label>
            <input type="text" class="form-control col" name="number">
        </div>

        <div class="form-group row justify-content-center">
            <label class="col-2" for="month">Mês</label>
            <input type="text" class="form-control col" name="month">
        </div>

        <div class="form-group row justify-content-center">
            <label class="col-2" for="year">Ano</label>
            <input type="text" class="form-control col" name="year">
        </div>

        <div class="form-group row justify-content-center">
            <label class="col-2" for="lead_editor_id">Editor-Chefe</label>
            <select class="form-control col" name="lead_editor_id">
                @foreach ($users as $user)
                    <option value={{$user->id}}
                        @if($user->id == Auth::id()) selected @endif>
                        {{$user->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</div>
@endsection
