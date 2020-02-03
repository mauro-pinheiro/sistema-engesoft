@extends('layouts.create')

@section('title', 'Nova Edição')

@section('form')
<div class="container">
    <form action="{{route('submissions.update',['submission' => $submission->id])}}" method="POST">
        @csrf
        <div class="form-group row justify-content-center">
            <label class="col-2" for="article">Artigo</label>
            <input type="text" class="form-control col" name="article" value="{{ $submission->article }}">
        </div>
        <div class="form-group row justify-content-center">
            <label class="col-2" for="edition_id">Editor-Chefe</label>
            <select class="form-control col" name="edition_id">
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

        <label>Selecione um contato</label>
            @forelse ($submission->authors as $a)
            <div class="form-check row justify-content-center">
                <input class="form-check-input" type="radio" value="{{ $a->id }}" name="contact_id"
                $@if ($loop->first)
                    checked
                @endif
                >
                <label class="form-check-label" for="contact">{{ $a->name }}</label>
            </div>
            @empty
                <p>Nenhum autor</p>
            @endforelse
        <button type="submit" class="btn btn-primary">Concluir</button>
    </form>
    <br>
    <form action="{{ route('submissions.add.author',['submission'=>$submission->id]) }}">
        @csrf
        <div class="form-group row justify-content-center">
            <label class="col-2" for="author">Autor</label>
            <input type="email" class="form-control col-8" name="author" placeholder="Digite o email do autor" required>
            <small id="emailHelp" class="form-text text-muted col-2">{{ session('error') }}</small>
        </div>

        <button class="btn btn-primary">Adicionar</button>
    </form>
</div>
@endsection
