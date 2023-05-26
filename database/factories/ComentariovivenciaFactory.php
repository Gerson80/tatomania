<?php

namespace Database\Factories;
use App\Models\Vivencia;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentariovivencia>
 */
class ComentariovivenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    
            //
            $vivencia=Vivencia::all()->random();
            $user=User::all()->random();
            return [
                //
                'comentario'=>fake()->sentence(),
                'vivencia_id'=>$vivencia,
                'user_id'=>$user
        ];
    }
}
