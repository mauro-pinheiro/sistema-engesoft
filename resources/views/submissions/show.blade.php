@extends('layouts.create')

@section('title', 'Nova Edição')

@section('form')
<div class="container">
    <form action="{{route('submissions.update',['submission' => $submission->id])}}" method="POST">
        @csrf
        <div class="form-group row justify-content-center">
            <label class="col-2" for="article">Artigo</label>
            <input type="text" class="form-control col" name="article" value="{{ $submission->article }} readonly">
        </div>
        <div class="form-group row justify-content-center">
            <label class="col-2" for="edition_id">Editor-Chefe</label>
            <input type="text" class="form-control col" name="article" value="{{ $submission->edition->theme }}" readonly>
        </div>

            @forelse ($submission->authors as $a)
            <div class="form-check row justify-content-center">
                <label class="form-check-label" for="autors"></label>
                <input type="text" class="form-control col" name="autors" value="{{ $a->name }}" readonly>
            </div>
            @empty
                <p>Nenhum autor</p>
            @endforelse
            <div class="form-check row justify-content-center">
                <label class="form-check-label" for="contact">Contato</label>
                <input type="text" class="form-control col" name="contact" value="{{ $submission->contact->name }}" readonly>
            </div>
            <div class="form-check row justify-content-center">
                <label class="form-check-label" for="originality">Originalidade</label>
                <input type="text" class="form-control col" name="originality" value="{{ $submission->avg('originality') }}" readonly>
            </div>
            <div class="form-check row justify-content-center">
                <label class="form-check-label" for="presentation">Apresentação</label>
                <input type="text" class="form-control col" name="presentation" value="{{ $submission->avg('presentation') }}" readonly>
            </div>
            <div class="form-check row justify-content-center">
                <label class="form-check-label" for="content">Conteúdo</label>
                <input type="text" class="form-control col" name="content" value="{{ $submission->avg('content') }}" readonly>
            </div>
    </form>
</div>
@endsection
