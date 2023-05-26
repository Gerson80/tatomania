<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vivencia>
 */
class VivenciaFactory extends Factory
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
            'vivencia'=>fake()->sentence(),
            'user_id'=>$user
        ];
    }
}
