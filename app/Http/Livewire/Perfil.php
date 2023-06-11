<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\TemporaryUploadedFile;
class Perfil extends Component
{
    use WithFileUploads;
    public $ventanaEditarPerfil = false;
    public $ventanaPublicaciones = false;
    public $ventanaVivencias = false;
    public $user;

    public $imagen;

    public $name;
    public $last_name;
    public $edad;
    public $foto;
    public $estado;
    public $email;
    public $admision;
    public $password;


    public function editarPerfil()
    {
        $this->foto = $this->user->foto;
        $this->ventanaEditarPerfil = !$this->ventanaEditarPerfil;
        $this->name = $this->user->name;
        $this->last_name = $this->user->last_name;
        $this->edad = $this->user->edad;
        $this->estado = $this->user->estado;
        $this->email = $this->user->email;
        $this->password = $this->user->password;
    }
    public function guardarPerfil()
    {
        $user = Auth::user();

        if ($this->imagen) {
            $fotoBLOB3 = base64_encode(file_get_contents($this->imagen->getRealPath()));
            $user->foto = $fotoBLOB3;
            
            
        }else{
            $fotoBLOB2 =$this->foto;
            $user->foto = $fotoBLOB2;
        }

        $user->name = strtolower($this->name);
        $user->last_name = strtolower($this->last_name);
        $user->edad = strtolower($this->edad);
        $user->estado =strtolower($this->estado);
        $user->email =strtolower($this->email);
        $user->password =$this->password;
        $user->save();
        $this->emit('actializacionPerfil');
    }

    public function ventanaPublicaciones()
    {
        $this->foto = $this->user->foto;
        $this->ventanaPublicaciones = !$this->ventanaPublicaciones;
        $this->name = $this->user->name;
        $this->last_name = $this->user->last_name;
        $this->edad = $this->user->edad;
        $this->estado = $this->user->estado;
        $this->email = $this->user->email;
        $this->password = $this->user->password;
    }

    public function ventanaVivencias()
    {
        $this->foto = $this->user->foto;
        $this->ventanaVivencias = !$this->ventanaVivencias;
        $this->name = $this->user->name;
        $this->last_name = $this->user->last_name;
        $this->edad = $this->user->edad;
        $this->estado = $this->user->estado;
        $this->email = $this->user->email;
        $this->password = $this->user->password;
    }


    public function mount()
{   
    $this->user = Auth::user();

}

    public function render()
    {
        return view('livewire.perfil');
    }
}
