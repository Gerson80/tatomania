<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Encuesta;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Livewire\WithFileUploads;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public $user;

    public function create(array $input): User
    {
        

        
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'last_name'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $file = request()->file('foto');
        $fotoBLOB = base64_encode(file_get_contents($file->getRealPath()));
        
        $user = User::create([
            'name' => strtolower($input['name']),
            'last_name' => strtolower($input['last_name']),
            'edad' => $input['edad'],
            'foto' => $fotoBLOB,
            'status' => 'false',
            'estado' => strtolower($input['estado']),
            'email' => strtolower($input['email']),
            'admision' => $input['admision'],
            'password' => Hash::make($input['password']),
        ])->assignRole('Normal');;

        $user->encuestas()->create([
            'pregunta1' => strtolower($input['pregunta1']),
            'pregunta2' => strtolower($input['pregunta2']),
            'pregunta3' => strtolower($input['pregunta3']),
            'pregunta4' => strtolower($input['pregunta4']),
        ]);

        return $user;
    }
}
