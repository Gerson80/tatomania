<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Comentariostatu;
use App\Models\Comentariovivencia;
use App\Models\Publicacionestatu;
use App\Models\Vivencia;
use App\Models\Liketat;
use App\Models\Likevivencia;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        //
      $this->call(RolSeeder::class);
       User::factory()
       
       ->count(25)
       ->hasEncuestas(1)
       ->hasPublicacionestatus(1) 
        //cuantas notas quiere que agregue
       ->hasComentariostatus(1)
       ->hasLiketats(1)
       ->hasVivencias(1)
       ->hasComentariovivencias(1) 
       ->hasLikevivencias(1) 
       
       
         ->create()
         ->each(function ($user) {
          $user->assignRole('Normal');
      });

      
   }
}
