<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Encuesta;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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

        

        $user = User::create([
            'name' => $input['name'],
            'last_name' => $input['last_name'],
            'edad' => $input['edad'],
            'foto' => $input['foto'],
            'status' => 'false',
            'estado' => $input['estado'],
            'email' => $input['email'],
            'admision' => $input['admision'],
            'password' => Hash::make($input['password']),
        ])->assignRole('Normal');;

        $user->encuestas()->create([
            'pregunta1' => $input['pregunta1'],
            'pregunta2' => $input['pregunta2'],
            'pregunta3' => $input['pregunta3'],
            'pregunta4' => $input['pregunta4'],
        ]);

        return $user;
    }
}
