@extends('layouts.create')

@section('title', 'Seleção')

@section('form')
<div class="container">
    <form action="{{route('editions.store')}}" method="POST">
        @csrf
        @foreach ($submissions as $submission)
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="articles[]" value='{{ $submission->id }}'>
            <label class="form-check-label" for="articles[]">{{ $submission->article }}</label>
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary btn-sm">Adicionar</button>
    </form>
</div>
@endsection
