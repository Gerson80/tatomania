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
    
    public $chat = false;
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



    public function activarChat()
    {   
        $this->chat = !$this->chat;
        
    }

    
    public function enviarDatos()
{   
    // Definir mensajes de error personalizados
    $mensajes = [
        'imagen.required' => '¡Ups! Parece que olvidaste subir una imagen.',
        'imagen.dimensions' => 'La imagen que has seleccionado es demasiado grande.',
        'categoria.required' => 'Por favor, selecciona una categoría para tu historia. ¡Tu historia es importante!',
        'historia.required' => 'Cuéntanos tu historia. Queremos conocer tu historia acerca de este tatuaje.',
        'historia.min' => 'Tu historia es muy valiosa. Por favor, asegúrate de escribir al menos 50 caracteres para compartir tu experiencia.',
        'nombre.required' => 'Por favor, ingresa el nombre.',
        'apellidos.required' => 'Ingresa el apellido.',
        'cuentame.required' => 'Este campo es crucial para nosotros. Por favor, cuéntanos más acerca de tu experiencia con el tatuador.',
        'cuentame.min' => 'Tu experiencia merece ser escuchada. Por favor, cuéntanos más acerca de tu historia. Escribe al menos 50 caracteres.',
        'numero.required' => 'Queremos saber el número del tatuador, por favor, ingrésalo.',
        'numero.regex' => 'El número de teléfono debe tener 10 dígitos numéricos. Por favor, asegúrate de ingresarlo correctamente.',
        'correo.required' => 'Por favor ingresa el correo electrónico para que nos podamos comunicar. ',
        'correo.email' => 'Por favor, ingresa un correo electrónico válido.',
       
    ];

    // Validar los datos antes de crear la publicación
    $validatedData = $this->validate([
        'imagen' => 'required|dimensions:max_width=1500,max_height=1500',
        'categoria' => 'required',
        'historia' =>  ['required','min:50'],
        'nombre' => 'required',
        'apellidos' => 'required',
        'cuentame' =>  ['required','min:50'],
        'numero' =>  ['required', 'regex:/^[0-9]{10}$/'],
        'correo' => ['required', 'string', 'email', 'max:255'],
       
        
    ], $mensajes);

    // Convertir la imagen a base64
    $fotoBLOB = base64_encode(file_get_contents($this->imagen->getRealPath()));

    // Crear la publicación utilizando los datos validados
    Publicacionestatu::create([
        'foto' => $fotoBLOB,
        'categoria' => $validatedData['categoria'],
        'historia' => strtolower($validatedData['historia']),
        'name' => strtolower($validatedData['nombre']),
        'last_name' => strtolower($validatedData['apellidos']),
        'experiencia' => strtolower($validatedData['cuentame']),
        'numero' => $validatedData['numero'],
        'email' => strtolower($validatedData['correo']),
        'pais' => $this->pais,
        'user_id' => $this->user->id,
        'autorizado' => $this->autorizado,
    ]);

    // Restablecer los campos después de enviar los datos
    $this->reset(['imagen', 'categoria', 'historia', 'nombre', 'apellidos', 'cuentame', 'numero', 'correo']);
    $this->emit('mensajeEnviado');
}
    public function editarPublicacion()
    {  
        $this->emit('contenidoActualizado2'); 
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
    // Definir mensajes de error personalizados
    $mensajes = [
        'imagen.dimensions' => 'La imagen que has seleccionado es demasiado grande.',
        'categoria.required' => 'Por favor, selecciona una categoría para tu historia. ¡Tu historia es importante!',
        'historia.required' => 'Cuéntanos tu historia. Queremos conocer tu historia acerca de este tatuaje.',
        'historia.min' => 'Tu historia es muy valiosa. Por favor, asegúrate de escribir al menos 50 caracteres para compartir tu experiencia.',
        'nombre.required' => 'Por favor, ingresa el nombre.',
        'apellidos.required' => 'Ingresa el apellido.',
        'cuentame.required' => 'Este campo es crucial para nosotros. Por favor, cuéntanos más acerca de tu experiencia con el tatuador.',
        'cuentame.min' => 'Tu experiencia merece ser escuchada. Por favor, cuéntanos más acerca de tu historia. Escribe al menos 50 caracteres.',
        'numero.required' => 'Queremos saber el número del tatuador, por favor, ingrésalo.',
        'numero.regex' => 'El número de teléfono debe tener 10 dígitos numéricos. Por favor, asegúrate de ingresarlo correctamente.',
        'correo.required' => 'Por favor ingresa el correo electrónico para que nos podamos comunicar.',
        'correo.email' => 'Por favor, ingresa un correo electrónico válido.',
    ];

    // Validar los datos antes de actualizar la publicación
    $validatedData = $this->validate([
        'imagen' => 'nullable|dimensions:max_width=1500,max_height=1500',
        'categoria' => 'required',
        'historia' => ['required', 'min:50'],
        'nombre' => 'required',
        'apellidos' => 'required',
        'cuentame' => ['required', 'min:50'],
        'numero' => ['required', 'regex:/^[0-9]{10}$/'],
        'correo' => ['required', 'string', 'email', 'max:255'],
    ], $mensajes);

    $elemento = Publicacionestatu::find($this->selectedCardId);

    if ($this->imagen) {
        $fotoBLOB3 = base64_encode(file_get_contents($this->imagen->getRealPath()));
        $elemento->foto = $fotoBLOB3;
    } else {
        $fotoBLOB2 = $this->imagen2;
        $elemento->foto = $fotoBLOB2;
    }

    $elemento->categoria = $validatedData['categoria'];
    $elemento->historia = strtolower($validatedData['historia']);
    $elemento->name = strtolower($validatedData['nombre']);
    $elemento->last_name = strtolower($validatedData['apellidos']);
    $elemento->experiencia = strtolower($validatedData['cuentame']);
    $elemento->numero = strtolower($validatedData['numero']);
    $elemento->email = strtolower($validatedData['correo']);
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
    $this->emit('contenidoActualizado2');
       
    $this->modalDatosPublicacion = !$this->modalDatosPublicacion;


}

public function cometarPublicacion()
{
    // Definir mensajes de error personalizados
    $mensajes = [
        'comentario.required' => 'Por favor, ingresa un comentario.',
        'comentario.min' => 'El comentario debe tener al menos 50 caracteres.',
    ];

    // Validar los datos antes de crear el comentario
    $validatedData = $this->validate([
        'comentario' => ['required', 'min:50'],
    ], $mensajes);

    $this->mostrarComentario = !$this->mostrarComentario;
    $elemento = Publicacionestatu::find($this->selectedCardId);
    Comentariostatu::create([
        'comentario' => strtolower($validatedData['comentario']),
        'user_id' => $this->user->id,
        'publicacionestatu_id' => $elemento->id
    ]);
    $this->reset(['comentario']);
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
        $this->emit('contenidoActualizado');
       
       
    }
    public function actualizarComentario()
    {   
        
        // Definir mensajes de error personalizados
    $mensajes = [
        'comentario.required' => 'Por favor, ingresa un comentario.',
        'comentario.min' => 'El comentario debe tener al menos 50 caracteres.',
    ];

    // Validar los datos antes de actualizar el comentario
    $validatedData = $this->validate([
        'comentario' => ['required', 'min:50'],
    ], $mensajes);

    $elemento = Comentariostatu::find($this->selectedCardId2);
    $elemento->comentario = strtolower($validatedData['comentario']);
    $elemento->save();
    $this->emit('actualComentario');
    $this->reset(['comentario']);
        
        
       
    }

    public function deleteCard2()
    {   
        $this->modalOpcionesComentario = !$this->modalOpcionesComentario;
        $this->emit('mensajeEliminar2',$this->selectedCardId2); 
        $card = Comentariostatu::find($this->selectedCardId2);
        
        
    }

    public function eliminarArchivoo($id)
    {
        $card = Comentariostatu::find($id);
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




    public function render()
    {
       

        return view('livewire.inicio-login');
    }
    







    protected $listeners = ['eliminarArchivo'];
}
