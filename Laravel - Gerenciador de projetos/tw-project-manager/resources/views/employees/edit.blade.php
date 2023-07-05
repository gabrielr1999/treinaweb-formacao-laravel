@extends('app')

@section('titulo', 'Editar Funcionário')

@section('conteudo')
    <h1>Editar Funcionário</h1>

    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @method('PUT')
        @include('employees._form') 
    </form>
@endsection    