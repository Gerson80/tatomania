<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainInicio extends Component
{
    public $dato;

    public function enviarEvento($dato)
    
    {
        $this->dato = 'Nuevo Valor';

        event(new eventoEnviado($dato));
    }

    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main-inicio');
    }
}
