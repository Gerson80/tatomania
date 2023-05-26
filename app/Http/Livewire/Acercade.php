<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Acercade extends Component
{
    public $contenido = 0;

    public function actualizarContenido()
    {
        $this->emit('contenidoActualizado');

        $this->contenido = 1;
    }
    public function actualizarContenido2()
    {
        $this->emit('contenidoActualizado');

        $this->contenido = 2;
    }
    public function actualizarContenido3()
    {
        $this->emit('contenidoActualizado');

        $this->contenido = 3;
    }
    public function actualizarContenido4()
    {
        $this->emit('contenidoActualizado');

        $this->contenido = 4;
    }
    public function render()
    {
        return view('livewire.acercade');
    }
}
