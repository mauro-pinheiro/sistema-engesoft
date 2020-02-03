@extends('layouts.miniTable')

@section('title')
Minhas Avaliações
@overwrite

@section('thead')
    <tr>
        <th scope="col">Título</th>
        <th scope="col">Média</th>
        <th scope="col">Ações</th>
    </tr>
@overwrite

@section('tbody')
@foreach ($my_evaluations as $evaluation)
    <tr>
        <td>{{$evaluation->submission->article}}</td>
        <td>{{$evaluation->avg()}}</td>
    </tr>
@endforeach
@overwrite
