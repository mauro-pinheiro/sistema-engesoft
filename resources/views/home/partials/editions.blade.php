@extends('layouts.miniTable')

@section('title')
Edições Ativas
@overwrite

@section('thead')
    <tr>
        <th scope="col">Tema</th>
        <th scope="col">Situação</th>
        <th scope="col">Ações</th>
    </tr>
@overwrite

@section('tbody')
@foreach ($active_editions as $edition)
    <tr>
        <td>{{$edition->theme}}</td>
        <td>{{$edition->situacao()}}</td>
    </tr>
@endforeach
@overwrite
