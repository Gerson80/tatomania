<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Publicacionestatu;
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
    public $modalVisible = false;
    public $modalOpciones = false;
    public $modalAgregar = false;
    public $queFotoGuardar = 1;


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


    public $selectedCardId ;
    public $card;
    public $cualVentanaEntro= false;

    
    public function enviarDatos()
    {   
        
        $fotoBLOB = base64_encode(file_get_contents($this->imagen->getRealPath()));
        Publicacionestatu::create([
            
            
            'foto' => $fotoBLOB,
            'categoria' => $this->categoria,
            'historia' => $this->historia,
            'name' => $this->nombre,
            'last_name' => $this->apellidos,
            'experiencia' => $this->cuentame,
            'numero' => $this->numero,
            'email' => $this->correo,
            'pais' => $this->pais,
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
        $elemento->historia = $this->historia;
        $elemento->name = $this->nombre;
        $elemento->last_name = $this->apellidos;
        $elemento->experiencia = $this->cuentame;
        $elemento->numero = $this->numero;
        $elemento->email = $this->correo;
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
