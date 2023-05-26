<?php

namespace Database\Factories;
use App\Models\Publicacionestatu;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComentariosTat>
 */
class ComentariostatuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $publicacionestatu=Publicacionestatu::all()->random();
        $user=User::all()->random();
        return [
            //
            'comentario'=>fake()->sentence(),
            'publicacionestatu_id'=>$publicacionestatu,
            'user_id'=>$user
        ];
    }
}
