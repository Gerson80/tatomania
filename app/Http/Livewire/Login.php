<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
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
        // El usuario ha iniciado sesión correctamente
        return redirect()->intended('/dashboard'); // Redirigir a la página deseada después del inicio de sesión
    }

    // Las credenciales no son válidas, mostrar un mensaje de error
    $this->addError('email', 'Las credenciales ingresadas no son válidas.');
}
    public function render()
    {
        return view('livewire.login');
    }
}
