<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Publicacionestatu;

class InicioLogin extends Component
{
    public $usuarios;
    public $publicaciones;
    public $modalVisible = true;

    public function mount()
{
    $this->publicaciones = Publicacionestatu::all();
   

}
public function toggleModal()
{
    $this->modalVisible = !$this->modalVisible;
}





    public function render()
    {
       

        return view('livewire.inicio-login');
    }
}
