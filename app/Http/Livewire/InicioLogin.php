<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Publicacionestatu;
use App\Models\Comentariostatu;
use App\Models\Liketat;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\TemporaryUploadedFile;


class InicioLogin extends Component
{
    use WithFileUploads;
    
    public $selectedCard;
    public $usuarios;
    public $user;
    public $publicaciones;
    public $comentarios;
    public $meGusta;
    public $modalVisible = false;
    public $modalOpciones = false;
    public $modalOpcionesComentario = false;
    public $modalAgregar = false;
    public $modalDatosPublicacion = false;
    public $mostrarComentario = true;
    public $queFotoGuardar = 1;
    public $selectedCategory;
    public $comentario;


    public $imagen;
    public $imagen2;
    public $categoria;
    public $historia;
    public $nombre;
    public $apellidos;
    public $cuentame;
    public $numero;
    public $correo;
    public $pais="mexico";
    public $autorizado="no";

    public $nombrePublico;


    public $selectedCardId ;
    public $selectedCardId2 ;
    public $card;
    public $cualVentanaEntro= false;
    public $cualVentanaEntro2= false;




    
    public function enviarDatos()
    {   
        
        $fotoBLOB = base64_encode(file_get_contents($this->imagen->getRealPath()));
        Publicacionestatu::create([
            
            
            'foto' => $fotoBLOB,
            'categoria' => $this->categoria,
            'historia' => strtolower($this->historia),
            'name' => strtolower( $this->nombre),
            'last_name' => strtolower(  $this->apellidos),
            'experiencia' => strtolower( $this->cuentame) ,
            'numero' => $this->numero,
            'email' => strtolower( $this->correo) ,
            'pais' => strtolower( $this->pais),
            'user_id' => $this-> user->id,
            'autorizado' => $this->autorizado,
            
            
        ]);
        $this->reset([ 'imagen','categoria','historia','nombre', 'apellidos','cuentame','numero','correo' ]);
        $this->emit('mensajeEnviado');
       
    }

    public function editarPublicacion()
    {  
        $this->modalAgregar = !$this->modalAgregar;
        $this->cualVentanaEntro = !$this->cualVentanaEntro;
        
        $elemento = Publicacionestatu::find($this->selectedCardId);
        $this->imagen2 =  $elemento->foto;
        
        $this->categoria = $elemento->categoria;
        $this->historia = $elemento->historia;
        $this->nombre = $elemento->name;
        $this->apellidos = $elemento->last_name;
        $this->cuentame = $elemento->experiencia;
        $this->numero = $elemento->numero;
        $this->correo = $elemento->email;
        
       
    }

    public function actualizarDatos()
    {   
        
        $elemento = Publicacionestatu::find($this->selectedCardId);

        if ($this->imagen) {
            $fotoBLOB3 = base64_encode(file_get_contents($this->imagen->getRealPath()));
            $elemento->foto = $fotoBLOB3;
            
            
        }else{
            $fotoBLOB2 =$this->imagen2;
            $elemento->foto = $fotoBLOB2;
        }

        $elemento->categoria = $this->categoria;
        $elemento->historia = strtolower($this->historia);
        $elemento->name = strtolower($this->nombre);
        $elemento->last_name =  strtolower($this->apellidos);
        $elemento->experiencia =  strtolower($this->cuentame);
        $elemento->numero =  strtolower($this->numero);
        $elemento->email = strtolower($this->correo) ;
        $elemento->save();
        $this->emit('actializacionLista');
        
       
    }
    
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
    $this->comentarios = Comentariostatu::all();
    $this->meGusta = Liketat::all();
    $this->user = Auth::user();
    if (!Session::has('modalVisible')) {
        $this->modalVisible = true;
        Session::put('modalVisible', true);
    }
}


public function toggleModal()
{
    $this->modalVisible = !$this->modalVisible;
}

public function opciones($cardId)
{
    $this->selectedCardId = $cardId;
    $this->modalOpciones = !$this->modalOpciones;
}


public function mostrarCPublicacion($cardId)
{
    $this->selectedCardId = $cardId;
    $elemento = Publicacionestatu::find($cardId);

    $this->nombrePublico = $elemento->user->name;
    $this->imagen2 =  $elemento->foto;
    $this->historia = $elemento->historia;
    $this->nombre = $elemento->name;
    $this->apellidos = $elemento->last_name;
    $this->cuentame = $elemento->experiencia;
    $this->numero = $elemento->numero;
    $this->correo = $elemento->email;

       
    $this->modalDatosPublicacion = !$this->modalDatosPublicacion;


}

public function cometarPublicacion()
{
    $this->mostrarComentario = !$this->mostrarComentario;
    $elemento = Publicacionestatu::find($this->selectedCardId);
    Comentariostatu::create([
            
            
        'comentario' => $this->comentario,
        'user_id' => $this->user->id,
        'publicacionestatu_id' => $elemento->id
        
        
        
    ]);
    $this->reset([ 'comentario' ]);
    $this->emit('comentarioAgregado');
    $this->mostrarComentario = !$this->mostrarComentario;

   
}


public function opciones2()
{
  
    $this->modalOpciones = !$this->modalOpciones;
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
        
        $elemento = Comentariostatu::find($this->selectedCardId2);
        $this->comentario =  $elemento->comentario;
        
       
       
    }
    public function actualizarComentario()
    {   
        
        $elemento = Comentariostatu::find($this->selectedCardId2);

        
        $elemento->comentario = $this->comentario;
        $elemento->save();
        $this->emit('actualComentario');
        $this->reset([ 'comentario' ]);
        
        
       
    }

    public function deleteCard2()
    {   
        $this->modalOpcionesComentario = !$this->modalOpcionesComentario;
        $this->emit('mensajeEliminar2',$this->selectedCardId2); 
        $card = Comentariostatu::find($this->selectedCardId2);
        if ($card) {
            $card->delete();
            $this->selectedCardId2 = null;
            $this->emit('refreshComponent');
        }
        
        
    }

    public function eliminarArchivoo($id)
    {
        $card = Comentariostatu::find($this->selectedCardId2);
        if ($card) {
            $card->delete();
            $this->selectedCardId2 = null;
            $this->emit('refreshComponent');
        }
    }




    public function render()
    {
       

        return view('livewire.inicio-login');
    }
    







    protected $listeners = ['eliminarArchivo'];
}
