@extends('layouts.create')

@section('title', 'Nova Edição')

@section('form')
<div class="container">
    <form action="{{route('submissions.store')}}" method="POST">
        @csrf
        <div class="form-group row justify-content-center">
            <label class="col-2" for="article">Artigo</label>
            <input type="text" class="form-control col" name="article">
        </div>
        <div class="form-group row justify-content-center">
            <label class="col-2" for="contact_id">Editor-Chefe</label>
            <select class="form-control col" name="contact_id">
                @foreach ($editions as $e)
                    <option value={{$e->id}}
                        @isset($edition)
                        @if($edition->id === $e->id)
                            selected
                        @endif
                        @endisset>
                        {{$e->theme}}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</div>
@endsection
