@extends('layouts.table')

@section('title', "Edições")

@section('thead')
    <tr>
        <th scope="col">#</th>
        <th scope="col">Tema</th>
        <th scope="col">Editor-Chefe</th>
        <th scope="col">Data Publicação</th>
        <th scope="col">Situação</th>
        <th scope="col">Ações</th>
    </tr>
@endsection

@section('tbody')
@foreach ($editions as $edition)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$edition->theme}}</td>
        <td>{{$edition->leadEditor->name}}</td>
        <td>{{$edition->month . '/' . $edition->year}}</td>
        <td>{{$edition->situacao()}}</td>
        <td class="row">
            <div class="col-3">
                <a href="{{route('selections.index')}}"class="btn btn-warning btn-sm">Iniciar</a>
            </div>
            <div class="col-3">
                <a href="{{route('submissions.create',['edition' => $edition->id])}}"class="btn btn-primary btn-sm">Submeter</a>
            </div>
            <div class="col-3">
                <a href="{{route('editions.show',['edition' => $edition->id])}}"class="btn btn-info btn-sm">Visualizar</a>
            </div>
            <div class="col-3">
                <form action="{{route('editions.destroy',['edition'=>$edition->id])}}" method="POST">
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
    <a class="btn btn-primary" href="{{route('editions.create')}}">Novo<a>
@endsection
