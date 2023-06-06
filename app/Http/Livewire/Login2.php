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

    $user = User::where('email', $this->email)->first();

if ($user) {
    // Verificar si la casilla "admision" es "si"
    if ($user->admision === 'si') {
        if (auth()->attempt($credentials)) {
            if ($user->hasRole('Normal')) {
                // El usuario tiene el rol especificado
                return redirect()->intended('/iniciologin'); // Redirigir a la ventana 1
            } else {
                // El usuario no tiene el rol especificado
                return redirect()->intended('/admin'); // Redirigi r a la ventana 2
            }
        } else {
            // Las credenciales de inicio de sesión no son válidas
            // Realizar alguna acción adicional si es necesario
            return;
        }
    } else {
        // Casilla "admision" es "no"
        $this->emit('mensaje1');
        $this->reset(['email', 'password']);
        return;
    }
} else {
    // Usuario no encontrado
    // Realizar alguna acción adicional si es necesario
    $this->emit('mensaje2');
    return;
}

    // Las credenciales no son válidas, mostrar un mensaje de error
 
    
}
    public function render()
    {
        return view('livewire.login2');
    }
    
}
