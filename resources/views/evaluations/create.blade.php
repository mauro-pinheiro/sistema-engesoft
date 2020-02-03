@extends('layouts.create')

@section('title', 'Nova Edição')

@section('form')
<div class="container">
    <form action="{{route('evaluations.store')}}" method="POST">
        @csrf
        <div class="form-group row justify-content-center">
            <label class="col-3" for="article_id">Artigo</label>
            <select class="form-control col" name="article_id">
                @foreach ($submissions as $sub)
                    <option value={{$sub->id}}
                        @isset($submission)
                        @if($submission->id === $sub->id)
                            selected
                        @endif
                        @endisset>
                        {{$sub->article}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group row justify-content-center">
            <label class="col-3" for="originality">Originalidade</label>
            <input type="number" class="form-control col" name="originality">
        </div>
        <div class="form-group row justify-content-center">
            <label class="col-3" for="presentation">Apresentação</label>
            <input type="number" class="form-control col" name="presentation">
        </div>
        <div class="form-group row justify-content-center">
            <label class="col-3" for="content">Conteúdo</label>
            <input type="number" class="form-control col" name="content">
        </div>
        <button type="submit" class="btn btn-primary">Avaliar</button>
    </form>
</div>
@endsection
