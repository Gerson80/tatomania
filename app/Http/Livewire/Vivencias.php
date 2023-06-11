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
    public $cualVentanaEntro2 = false;
    public $comentarios;
    public $vivencias;
    public $user;
    public $vivenciaComentario;
    public $vivenciaComentarioId;


    public $vivencia;
    public $modalOpciones = false;
    public $modalComentario = false;
    public $modalOpcionesComentario = false;
    public $selectedCardId;
    public $selectedCardId2;
    public $comentario;
    public $img;

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
        $this->emit('contenidoActualizado');
       
    }
    public function actualizarVivencia()
    {   
        
        $elemento = Vivencia::find($this->selectedCardId);

        
        $elemento->vivencia =strtolower( $this->vivencia);
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

    public function abrirComentario($id)
    {
        $this->vivenciaComentarioId=$id;
        $this->vivenciaComentario = Vivencia::find($id);
        $this->modalComentario = !$this->modalComentario;

        $imagenBinaria = $this->vivenciaComentario->user->foto; // Aquí debes colocar tu cadena de imagen binaria

        // Guardar la imagen en el sistema de archivos
        $nombreArchivo = 'imagen.jpg'; // Especifica el nombre que deseas para el archivo
        Storage::put($nombreArchivo, base64_decode($imagenBinaria));

        // Obtener la URL pública de la imagen guardada
        $this->img = Storage::url($nombreArchivo);


    }

    public function cometarPublicacion()
{
    
    $elemento = Vivencia::find($this->vivenciaComentarioId);
    Comentariovivencia::create([
            
            
        'comentario' => $this->comentario,
        'user_id' => $this->user->id,
        'vivencia_id' => $elemento->id
        
        
        
    ]);
    $this->reset([ 'comentario' ]);
    $this->emit('comentarioAgregado');
}
public function opcionesComentario($cardId)
{
    $this->selectedCardId2 = $cardId;
    $this->modalOpcionesComentario = !$this->modalOpcionesComentario;
}
public function opcionesComentario2()
{
    $this->modalOpcionesComentario = !$this->modalOpcionesComentario;
}

public function editarComentario()
    {  
        $this->modalOpcionesComentario = !$this->modalOpcionesComentario;
        $this->cualVentanaEntro2 = !$this->cualVentanaEntro2;
        
        $elemento = Comentariovivencia::find($this->selectedCardId2);
        $this->comentario =  $elemento->comentario;
        $this->emit('contenidoActualizado');
       
       
    }
    public function actualizarComentario()
    {   
        
        $elemento = Comentariovivencia::find($this->selectedCardId2);

        
        $elemento->comentario = $this->comentario;
        $elemento->save();
        $this->emit('actualComentario');
        $this->reset([ 'comentario' ]);
       
    }

    public function deleteCard2()
    {   
        
        $this->modalOpcionesComentario = !$this->modalOpcionesComentario;
        $this->emit('mensajeEliminar2',$this->selectedCardId2); 
        $card = Comentariovivencia::find($this->selectedCardId2);
        
        
    }

    public function eliminarArchivoo($id)
    {
        $valor = $this->selectedCardId2;
        $card = Comentariovivencia::find($id);
        if ($card) {
            $card->delete();
            $this->selectedCardId2 = null;
            $this->emit('refreshComponent');
        }
    }
    public function getListeners()
    {
        return [
            'eliminarArchivoo' => 'eliminarArchivoo',
            'eliminarArchivo' => 'eliminarArchivo',
        ];
    }
}
