@extends('layouts.table')

@section('title', "Submissões")

@section('thead')
    <tr>
        <th scope="col">#</th>
        <th scope="col">Título</th>
        <th scope="col">Contato</th>
        <th scope="col">Autor</th>
        {{--  <th scope="col">Situação</th>  --}}
        <th scope="col">Ações</th>
    </tr>
@endsection

@section('tbody')
@foreach ($submissions as $submission)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$submission->article}}</td>
        <td>
            @if($submission->contact)
                {{$submission->contact->email}}
            @else
                Sem Contato
            @endif
        </td>
        <td>
            @if($submission->author)
                {{$submission->contact->email}}
            @else
                Sem Autor
            @endif
        </td>
        {{--  <td>{{$submission->status}}</td>  --}}
        <td class="row">
            <div class="col">
                <a href="{{route('submissions.show',['submission' => $submission->id])}}"class="btn btn-info btn-sm">Visualizar</a>
            </div>
            <div class="col">
                <form action="{{route('submissions.destroy',['submission'=>$submission->id])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Apagar</button>
                </form>
            </div>
        </td>
    </tr>
@endforeach
@endsection


@section('buttons')
    <a class="btn btn-primary" href="{{route('submissions.create')}}">Novo<a>
@endsection
