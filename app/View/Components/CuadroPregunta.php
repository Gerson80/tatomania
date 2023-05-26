<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CuadroPregunta extends Component
{
    public $titulo;
    public $texto;

    public function __construct($titulo, $texto)
    {
        $this->titulo = $titulo;
        $this->texto = $texto;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cuadro-pregunta');
    }
}
