@isset ($mes)
    @switch ($mes)
        @case(1)
            <p>Janeiro</p>
            @break
        @case(2)
            <p>Fevereiro</p>
            @break
        @case(3)
            <p>Março</p>
            @break
        @case(4)
            <p>Abril</p>
            @break
        @case(5)
            <p>Maio</p>
            @break
        @case(6)
            <p>Junho</p>
            @break
        @case(7)
            <p>Julho</p>
            @break
        @case(8)
            <p>Agosto</p>
            @break
        @case(9)
            <p>Stembro</p>
            @break    
        @case(10)
            <p>Outubro</p>
            @break   
        @case(11)
            <p>Novembro</p>
            @break   
        @case(12)
            <p>dezembro</p>
            @break  

        @default
            <p>mês invalido</p>
    @endswitch
@endisset

@empty ($mes)
    <p>Mês não informado</p>
@endempty