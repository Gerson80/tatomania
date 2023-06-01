<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Publicacionestatu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class InicioLogin extends Component
{
    use WithFileUploads;
    public $selectedCard;
    public $usuarios;
    public $user;
    public $publicaciones;
    public $modalVisible = false;
    public $modalOpciones = false;
    public $modalAgregar = false;
    public $imagen;

    public $selectedCardId ;
    public $card;

    public function agregarNuevo()
    {   $this->modalAgregar = !$this->modalAgregar;
       
    }

    public function deleteCard()
    {   $this->modalOpciones = !$this->modalOpciones;
        $this->emit('mensajeEliminar',$this->selectedCardId); 
    }

    public function eliminarArchivo($id)
    {
        $card = Publicacionestatu::find($id);
        if ($card) {
            $card->delete();
            $this->selectedCardId = null;
            $this->emit('refreshComponent');
        }
    }


    public function mount()
{
    $this->publicaciones = Publicacionestatu::all();
    $this->user = Auth::user();
    if (!Session::has('modalVisible')) {
        $this->modalVisible = true;
        Session::put('modalVisible', true);
    }
}


public function toggleModal()
{
  
}

public function opciones($cardId)
{
    $this->selectedCardId = $cardId;
    $this->modalOpciones = !$this->modalOpciones;
}
public function opciones2()
{
  
    $this->modalOpciones = !$this->modalOpciones;
}



    public function render()
    {
       

        return view('livewire.inicio-login');
    }
    
    protected $listeners = ['eliminarArchivo'];
}
