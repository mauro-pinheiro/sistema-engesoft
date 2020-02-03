@extends('layouts.table')

@section('title', "Avaliações")

@section('thead')
    <tr>
        <th scope="col">#</th>
        <th scope="col">Título</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
    </tr>
@endsection

@section('tbody')
@foreach ($submissions as $submission)
    <tr>
        <th scope="row">{{$loop->iteration}}</td>
        <td>{{$submission->article}}</td>
        <td>@if(count($submission->evaluations) >= 3) Pronto
            @else Avaliando
            @endif
        </td>
        <td class="row">
            <div class="col">
                <a href="{{route('evaluations.create',['submission' => $submission->id])}}"class="btn btn-info btn-sm">Avaliar</a>
            </div>
        </td>
    </tr>
@endforeach
@endsection
