<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Comentariostatu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Liketat>
 */
class LiketatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $comentariostatu=Comentariostatu::all()->random();
        $user=User::all()->random();
        return [
            //
            'comentariostatu_id'=>$comentariostatu,
            'user_id'=>$user,
            

            
        ];
    }
}
