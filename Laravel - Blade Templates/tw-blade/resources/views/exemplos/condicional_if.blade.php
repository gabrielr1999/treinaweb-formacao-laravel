@if ($comentarios === 1)
    <h1>Existe 1 comentário</h1>
@elseif ($comentarios > 1)
    <h1>Existem {{ $comentarios }} comentários</h1>
@elseif ($comentarios < 0)
    <h1>Valor invalido de comentários</h1>
@else
    <h1>Não temos comentários</h1>    
@endif

@if ($comentarios < 0)
    <h1>Valor invalido de comentários</h1>
@endif

@unless ($comentarios > 0)
    <h1>Valor invalido de comentários</h1>
@endunless