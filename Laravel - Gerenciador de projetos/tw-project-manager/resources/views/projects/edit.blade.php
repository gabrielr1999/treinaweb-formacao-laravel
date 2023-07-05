@extends('app')

@section('titulo', 'Editar Projeto')

@section('conteudo')
    <h1>Editar Projeto</h1>

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @method('PUT')
        @include('projects._form') 
    </form>
@endsection    