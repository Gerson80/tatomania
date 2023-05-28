<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Login2 extends Component
{
    public $email;
    public $password;
    public function login()
{
    $credentials = [
        'email' => $this->email,
        'password' => $this->password,
    ];

    if (auth()->attempt($credentials)) {
        $user = User::where('email', $this->email)->first();
        if ($user->admision === 'si') {
            if ($user->hasRole('Normal')) {
                // El usuario tiene el rol especificado
                return redirect()->intended('/registro'); // Redirigir a la ventana 1
            } else {
                // El usuario no tiene el rol especificado
                return redirect()->intended('/admin'); // Redirigir a la ventana 2
            }
        }else{
            $this->addError('email', 'Las credenciales ingresadas nhjhggo son válidas.');
            return redirect()->intended('/login2');


        }

            
        // El usuario ha iniciado sesión correctamente
        //return redirect()->intended('/registro'); // Redirigir a la página deseada después del inicio de sesión
    }

    // Las credenciales no son válidas, mostrar un mensaje de error
    $this->addError('email', 'Las credenciales ingresadas no son válidas.');
}
    public function render()
    {
        return view('livewire.login2');
    }
}
