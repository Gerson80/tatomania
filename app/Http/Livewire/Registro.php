<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Actions\Fortify\CreateNewUser;


use App\Models\User;
use App\Models\Encuesta;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use Livewire\WithFileUploads;

class Registro extends Component
{   
    use WithFileUploads;
   
    
    public $mostrarFormulario = false;

    public $name;
    public $last_name;
    public $edad;
    public $foto;
    public $estado;
    public $email;
    public $admision;
    public $password;
    public $passwordConf;

    public $pregunta1;
    public $pregunta2;
    public $pregunta3;
    public $pregunta4;
    public $user;
 
    public function validar()
    {
        $messages = [
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
            'foto.dimensions' => 'La foto debe tener un tamaño máximo de 1500 x 1500',
            'foto.required' => 'Por favor, selecciona una foto.',
            // Agrega más mensajes personalizados para otras reglas de validación...
        ];
        $validator = Validator::make([
            'edad' => $this->edad,
            'foto' => $this->foto,
            'pregunta1' => $this->pregunta1,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'estado' => $this->estado,
            'password' => $this->password,
            'password_confirmation' => $this->passwordConf,
       // Agrega las demás variables...
    ], [
        'foto' => 'required|dimensions:max_width=1500,max_height=1500',
        'edad' => 'required|integer|min:18|max:99',
        'pregunta1' => ['required','min:1'],
        'name' => ['required', 'string', 'max:255'],
        'last_name' => ['required'],
        'estado' => ['required'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', 'same:password_confirmation'], // El campo debe contener al menos una letra minúscula, una letra mayúscula y un número
        'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        // Agrega las reglas para las demás variables...
    ], $messages);

    $validator->validate();

    // Si la validación es exitosa, continuar con la lógica de guardar los datos
    $this->emit('mensajeAceptacion');
    }
    

   
    

    
    public function mostrarOcultarFormulario()
    {
        $messages = [
           
            'pregunta1.required' => 'Por favor, responde esta pregunta. Es importante para comprender tu experiencia después de la mastectomía.',
            'pregunta1.min' => 'La respuesta a esta pregunta debe tener al menos 50 caracteres. Te invitamos a compartir más detalles sobre tu experiencia.',
            'pregunta2.required' => 'Por favor, responde esta pregunta. Queremos conocer más acerca de cómo te sientes después de la mastectomía.',
            'pregunta2.min' => 'La respuesta a esta pregunta debe tener al menos 50 caracteres. Siéntete libre de expresar tus emociones y pensamientos en detalle.',
            'pregunta3.required' => 'Por favor, responde esta pregunta. Tu respuesta nos ayuda a entender los desafíos que enfrentas después de la mastectomía.',
            'pregunta3.min' => 'La respuesta a esta pregunta debe tener al menos 50 caracteres. No dudes en compartir cualquier dificultad o preocupación que hayas experimentado.',
            'pregunta4.required' => 'Por favor, responde esta pregunta. Nos interesa conocer cómo ha sido tu proceso de recuperación después de la mastectomía.',
            'pregunta4.min' => 'La respuesta a esta pregunta debe tener al menos 50 caracteres. Siéntete libre de compartir detalles sobre tu recuperación física y emocional.',
            // Agrega más mensajes personalizados para otras reglas de validación...
        ];
        $validator = Validator::make([
           
            'pregunta1' => $this->pregunta1,
            'pregunta2' => $this->pregunta2,
            'pregunta3' => $this->pregunta3,
            'pregunta4' => $this->pregunta4,
           
       // Agrega las demás variables...
    ], [
       
        'pregunta1' => ['required','min:50'],
        'pregunta2' => ['required','min:50'],
        'pregunta3' => ['required','min:50'],
        'pregunta4' => ['required','min:50'],
        'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        // Agrega las reglas para las demás variables...
    ], $messages);

    $validator->validate();

    // Si la validación es exitosa, continuar con la lógica de guardar los datos
    
    $this->mostrarFormulario = !$this->mostrarFormulario; 
    $this->emit('contenidoActualizado'); 
        
    }

    public function registrar()
    
    {
        $this->emit('mensajeAceptacion'); 
    }



    public function render()
    {
        return view('livewire.registro');
    }
}
