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
         // Definir mensajes de error personalizados
    $mensajes = [
        'edad.min' => 'La edad no es válida.',
        'edad.max' => 'La edad no es válida.',
        'pregunta1.required' => 'Por favor, responde la pregunta.',
        'pregunta1.min' => 'La respuesta debe tener al menos 50 caracteres.',
        'name.required' => 'Por favor, ingresa tu nombre.',
        'edad.required' => 'Por favor, ingresa tu edad.',
        'last_name.required' => 'Por favor, ingresa tu apellido.',
        'name.string' => 'El nombre debe ser una cadena de caracteres.',
        'name.max' => 'El nombre no puede exceder los 255 caracteres.',
        'password.required' => 'Por favor, ingresa una contraseña.',
        'estado.required' => 'Por favor, escriba un estado.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
        'password.same' => 'La contraseña y la confirmación no coinciden.',
        'password.regex' => 'La contraseña debe contener al menos una letra minúscula, una letra mayúscula y un número.',
        'email.required' => 'Por favor, ingresa tu correo electrónico.',
        'email.email' => 'El correo electrónico debe ser válido.',
        'email.unique' => 'El correo electrónico ya ha sido registrado.',
        'imagen.dimensions' => 'La foto debe tener un tamaño máximo de 1500 x 1500',
        'imagen.required' => 'Por favor, selecciona una foto.',
    ];

    // Validar los datos antes de guardar el perfil
    if ($this->imagen) {
        $validatedData = $this->validate([
            'imagen' => 'required|dimensions:max_width=1500,max_height=1500',
            'edad' => 'required|integer|min:18|max:99',
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required'],
            'estado' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ], $mensajes);
    } elseif ($this->foto) {
        $validatedData = $this->validate([
            'edad' => 'required|integer|min:18|max:99',
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required'],
            'estado' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ], $mensajes);
    } else {
        $validatedData = $this->validate([
            'edad' => 'required|integer|min:18|max:99',
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required'],
            'estado' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ], $mensajes);
    }
    $user = Auth::user();

    if ($this->imagen) {
        $fotoBLOB3 = base64_encode(file_get_contents($this->imagen->getRealPath()));
        $user->foto = $fotoBLOB3;
    } else {
        $fotoBLOB2 = $this->foto;
        $user->foto = $fotoBLOB2;
    }

    $user->name = strtolower($validatedData['name']);
    $user->last_name = strtolower($validatedData['last_name']);
    $user->edad = strtolower($validatedData['edad']);
    $user->estado = strtolower($validatedData['estado']);
    $user->email = strtolower($validatedData['email']);
    $user->password =  $this->password;
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

    if ($this->imagen) {
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
    } elseif ($this->imagen2) {
        $validatedData = $this->validate([
            'categoria' => 'required',
            'historia' =>  ['required','min:50'],
            'nombre' => 'required',
            'apellidos' => 'required',
            'cuentame' =>  ['required','min:50'],
            'numero' =>  ['required', 'regex:/^[0-9]{10}$/'],
            'correo' => ['required', 'string', 'email', 'max:255'],
        ], $mensajes);
    } else {
        $validatedData = $this->validate([
            'categoria' => 'required',
            'historia' =>  ['required','min:50'],
            'nombre' => 'required',
            'apellidos' => 'required',
            'cuentame' =>  ['required','min:50'],
            'numero' =>  ['required', 'regex:/^[0-9]{10}$/'],
            'correo' => ['required', 'string', 'email', 'max:255'],
        ], $mensajes);
    }


    $elemento = Publicacionestatu::find($this->selectedCardIdPublicacion);

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
        
        $mensajes = [
            'vivencia.required' => 'Por favor, comparte tus sentimientos y vivencias.',
            'vivencia.min' => 'Tu vivencia es importante. Por favor, cuéntanos más acerca de tus sentimientos en al menos 50 caracteres.',
        ];
    
        // Validar los datos antes de actualizar la vivencia
        $validatedData = $this->validate([
            'vivencia' => ['required', 'min:50'],
        ], $mensajes);
    
        $elemento = Vivencia::find($this->selectedCardIdVivencia);
        $elemento->vivencia = strtolower($validatedData['vivencia']);
        $elemento->save();
    
        $this->emit('vivenciaActualizada');
        $this->reset(['vivencia']);
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
