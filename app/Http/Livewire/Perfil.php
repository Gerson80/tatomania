<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Vivencia;
use App\Models\Publicacionestatu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\TemporaryUploadedFile;
class Perfil extends Component
{
    use WithFileUploads;
    public $modalOpciones = false;
    public $modalOpcionesVive = false;
    public $ventanaEditarPerfil = false;
    public $ventanaPublicaciones = false;
    public $ventanaVivencias = false;
    public $editarVivencia = false;
    public $modalEditarPublicacion = false;
    public $user;

    public $selectedCardIdPublicacion;
    public $selectedCardIdVivencia;


    public $imagen;

    public $name;
    public $last_name;
    public $edad;
    public $foto;
    public $estado;
    public $email;
    public $admision;
    public $password;

    public $vivencia;
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

    public function opciones($cardId)
    {
        $this->selectedCardIdPublicacion = $cardId;
        $this->modalOpciones = !$this->modalOpciones;
    }
    public function opciones2()
    {
        $this->modalOpciones = !$this->modalOpciones;
    }


    public function deleteCard()
    {   $this->modalOpciones = !$this->modalOpciones;
        $this->emit('mensajeEliminar',$this->selectedCardIdPublicacion); 
    }

    public function eliminarArchivo($id)
    {
        $card = Publicacionestatu::find($this->selectedCardIdPublicacion);
        if ($card) {
            $card->delete();
            $this->selectedCardId = null;
            $this->emit('refreshComponent');
        }
        
    }

    public function editarPublicacion()
    {  
        $this->modalEditarPublicacion = !$this->modalEditarPublicacion;
        
        $this->modalOpciones = !$this->modalOpciones;
        $elemento = Publicacionestatu::find($this->selectedCardIdPublicacion);
        $this->imagen2 =  $elemento->foto;
        
        $this->categoria = $elemento->categoria;
        $this->historia = $elemento->historia;
        $this->nombre = $elemento->name;
        $this->apellidos = $elemento->last_name;
        $this->cuentame = $elemento->experiencia;
        $this->numero = $elemento->numero;
        $this->correo = $elemento->email;
        
       
    }

    public function actualizarDatosPublicacion()
    {   
        
        $elemento = Publicacionestatu::find($this->selectedCardIdPublicacion);

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
        $this->emit('actializacionListaPublicacion');
        
       
    }

    public function opcionesVive($cardId)
    {
        $this->selectedCardIdVivencia = $cardId;
        $this->modalOpcionesVive = !$this->modalOpcionesVive;
    }
    public function opcionesVive2()
    {
        $this->modalOpcionesVive = !$this->modalOpcionesVive;
    }
    public function editarVivencia()
    {  
        $this->modalOpcionesVive = !$this->modalOpcionesVive;
        $this->editarVivencia = !$this->editarVivencia;
        $elemento = Vivencia::find($this->selectedCardIdVivencia);
        $this->vivencia =  $elemento->vivencia;
       
    }
    public function actualizarVivencia()
    {   
        
        $elemento = Vivencia::find($this->selectedCardIdVivencia);

        
        $elemento->vivencia = strtolower( $this->vivencia);
        $elemento->save();
        $this->emit('vivenciaActualizada');
        $this->reset([ 'vivencia' ]);
    }

    public function deleteVive()
    {   $this->modalOpcionesVive = !$this->modalOpcionesVive;
        $this->emit('mensajeEliminarVive',$this->selectedCardIdVivencia); 
 
    }

    public function eliminarArchivoVive($id)
    {
        $card = Vivencia::find($id);
        if ($card) {
            $card->delete();
            $this->selectedCardId = null;
            $this->emit('refreshComponent');
        }
    }





    public function getListeners()
    {
        return [
            'eliminarArchivo' => 'eliminarArchivo',
            'eliminarArchivoVive' => 'eliminarArchivoVive',
        ];
    }

    public function mount()
{   
    $this->vivencias = Vivencia::all();
    $this->publicaciones = Publicacionestatu::all();
    $this->user = Auth::user();

}

    public function render()
    {
        return view('livewire.perfil');
    }
}
