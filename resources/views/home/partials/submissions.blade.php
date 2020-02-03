@extends('layouts.miniTable')

@section('title')
Minhas Submissões
@overwrite

@section('thead')
    <tr>
        <th scope="col">Título</th>
        <th scope="col">Contato</th>
        <th scope="col">Autor</th>
        <th scope="col">Situação</th>
        <th scope="col">Ações</th>
    </tr>
@overwrite

@section('tbody')
@foreach ($my_submissions as $submission)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$submission->article}}</td>
        <td>{{$submission->contact->name}}</td>
        <td>{{$submission->author->name}}</td>
        <td>{{$submission->status}}</td>
    </tr>
@endforeach
@overwrite
