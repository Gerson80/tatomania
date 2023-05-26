<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Comentariovivencia;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Likevivencia>
 */
class LikevivenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $comentariovivencia=Comentariovivencia::all()->random();
        $user=User::all()->random();
        return [
            //
            'comentariovivencia_id'=>$comentariovivencia,
            'user_id'=>$user

            
        ];
    }
}
