@extends('app')

@section('titulo', 'Detalhes do projeto')

@section('conteudo')
    <div class="card">
        <h5 class="card-header">Detalhes do Cliente {{ $project->nome }}</h5>
        <div class="card-body">
            <p><strong>ID: </strong> {{ $project->id }}</p>
            <p><strong>nome: </strong> {{ $project->nome }}</p>
            <p><strong>Cliente: </strong> {{ $project->client->nome }}</p>
            <br>
            <a class="btn btn-success" href="{{ route('projects.index') }}">Voltar para lista</a>
        </div>
    </div>   

    <div class="card">
        <h5 class="card-header">Funcionários que trabalham no projeto</h5>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project->employees as $employee)
                        <tr>
                            <th scope="row">{{ $employee->id }}</th>
                            <td>{{ $employee->nome }}</td>
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>   

    <a class="btn btn-success" href="{{ route('projects.index') }}">Voltar para lista</a>
@endsection    
