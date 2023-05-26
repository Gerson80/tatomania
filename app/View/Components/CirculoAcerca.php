<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CirculoAcerca extends Component
{
   
    public $nombre;

    public function __construct( $nombre)
    {
        
        $this->nombre = $nombre;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.circulo-acerca');
    }
}
