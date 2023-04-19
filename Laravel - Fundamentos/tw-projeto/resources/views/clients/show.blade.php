@extends('app')

@section('titulo', 'Detalhes do cliente')

@section('conteudo')
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Detalhes do cliente {{ $client->nome }}</h5>
        <p><strong>ID: </strong> {{ $client->id }}</p>
        <p><strong>Nome: </strong> {{ $client->nome }}</p>
        <p><strong>Endereço: </strong> {{ $client->endereco }}</p>
        <p><strong>Observação: </strong> {{ $client->observacao }}</p>
        <br>
        <a class="btn btn-success" href="{{ route('clients.index') }}">Voltar para lista</a>
    </div>
</div>
@endsection