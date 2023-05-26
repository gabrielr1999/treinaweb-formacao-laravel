<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ItemProjeto extends Component
{
    public string $imagem;
    public int $indice;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $imagem, int $indice)
    {
        $this->imagem = $imagem;
        $this->indice = $indice;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.item-projeto');
    }
}
