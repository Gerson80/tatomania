<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PreguntasInicio extends Component
{
    public $datoRecibido;

    protected $listeners = ['eventoEnviado' => 'escucharEvento'];

    public function escucharEvento($dato)
    {
        $this->datoRecibido = $dato;
        dd($dato);
    }
    
    public function render()
    {
        return view('livewire.preguntas-inicio');
    }
}
