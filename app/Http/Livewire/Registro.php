<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Registro extends Component
{
    public $mostrarFormulario = false;
    public $pregunta1;
    public $pregunta2;
    public $pregunta3;
    public $pregunta4;

    
    
   

    public function mostrarOcultarFormulario()
    {
        $this->mostrarFormulario = !$this->mostrarFormulario;
        $this->emit('contenidoActualizado');
    }


    public function render()
    {
        return view('livewire.registro');
    }
}
