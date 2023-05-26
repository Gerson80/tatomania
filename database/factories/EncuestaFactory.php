<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Encuesta>
 */
class EncuestaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user=User::all()->random();
        return [
            //
            'pregunta1'=>fake()->sentence(),
            'pregunta2'=>fake()->sentence(),
            'pregunta3'=>fake()->sentence(),
            'pregunta4'=>fake()->sentence(),
            'user_id'=>$user
        ];
    }
}
