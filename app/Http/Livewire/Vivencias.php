<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Publicacionestatu;
use App\Models\Comentariostatu;
use App\Models\Liketat;
use App\Models\Comentariovivencia;
use App\Models\Vivencia;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\TemporaryUploadedFile;


use Livewire\Component;

class Vivencias extends Component
{
    public $cualVentanaEntro = false;
    public $comentarios;
    public $vivencias;
    public $user;


    public $vivencia;
    public $modalOpciones = false;
    public $selectedCardId;

    public function mount()
{   
    $this->vivencias = Vivencia::all();
    $this->comentarios = Comentariovivencia::all();
    
    $this->user = Auth::user();
    
}


    public function render()
    {
        return view('livewire.vivencias');
    }

    public function cometar()
{
    Vivencia::create([
                
        'vivencia' => $this->vivencia,
        'user_id' => $this->user->id
        
    ]);
    $this->reset([ 'vivencia' ]);
    $this->emit('vivenciaAgregado');  
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
public function editarVivencia()
    {  
        $this->modalOpciones = !$this->modalOpciones;
        $this->cualVentanaEntro = !$this->cualVentanaEntro;
        $elemento = Vivencia::find($this->selectedCardId);
        $this->vivencia =  $elemento->vivencia;
       
    }
    public function actualizarVivencia()
    {   
        
        $elemento = Vivencia::find($this->selectedCardId);

        
        $elemento->vivencia = $this->vivencia;
        $elemento->save();
        $this->emit('vivenciaActualizada');
        $this->reset([ 'vivencia' ]);
    }

    public function deleteVive()
    {   $this->modalOpciones = !$this->modalOpciones;
        $this->emit('mensajeEliminar',$this->selectedCardId); 
    }

    public function eliminarArchivo($id)
    {
        $card = Vivencia::find($id);
        if ($card) {
            $card->delete();
            $this->selectedCardId = null;
            $this->emit('refreshComponent');
        }
    }
}
