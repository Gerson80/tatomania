<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comentariostatus', function (Blueprint $table) {
            $table->id();
            $table->string('comentario',1000);

            $table->foreignId('user_id')

            ->constrained()
           ->onUpdate('cascade')
           ->onDelete('cascade');
            

           $table->foreignId('publicacionestatu_id')

           ->constrained()
          ->onUpdate('cascade')
          ->onDelete('cascade');

        

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentariostatus');
    }
};
