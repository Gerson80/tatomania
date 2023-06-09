<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Actions\Fortify\CreateNewUser;


use App\Models\User;
use App\Models\Encuesta;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use Livewire\WithFileUploads;

class Registro extends Component
{   
   
    
    public $mostrarFormulario = false;

    public $name;
    public $last_name;
    public $edad;
    public $foto;
    public $estado;
    public $email;
    public $admision;
    public $password;

    public $pregunta1;
    public $pregunta2;
    public $pregunta3;
    public $pregunta4;
    public $user;
 
    

   
    

    
    public function mostrarOcultarFormulario()
    {
        // Verificar si los campos están vacíos
        if (empty($this->pregunta1) || empty($this->pregunta2) || empty($this->pregunta3) || empty($this->pregunta4)) {
            $this->emit('mensajeCamposVacios'); // Emitir evento para mostrar mensaje de campos vacíos
            return; // Detener la ejecución del método si los campos están vacíos
        }else{
             // Los campos no están vacíos, realizar la acción deseada
        $this->mostrarFormulario = !$this->mostrarFormulario; 
        }
    }

    public function registrar()
    
    {
        $this->emit('mensajeAceptacion'); 
    }

    


    public function render()
    {
        return view('livewire.registro');
    }
}
