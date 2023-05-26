<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PublicacionesTat>
 */
class PublicacionestatuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      
        $nombre=fake()->firstName();
        $apellidos=fake()->lastName(); 
        $user=User::all()->random();

        return [
            //
            'foto' => $this->faker->imageUrl(150,150),
            'categoria'=>fake()->randomElement(['Flores','Animales']),
            'historia'=>fake()->sentence(),
            'name' => $nombre,
            'last_name' => $apellidos,
            'experiencia'=>fake()->sentence(),
            'numero'=>fake()->bothify('##########'),
            'email' => $nombre.'.'.$apellidos.'@gmail.com',
             'email_verified_at' => now(),
            'pais' =>fake()->randomElement(['México','Estados Unidos']),
            'user_id'=>$user

           
        ];
    }
}
