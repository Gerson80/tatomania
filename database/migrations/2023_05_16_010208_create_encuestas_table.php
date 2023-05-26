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
        Schema::create('encuestas', function (Blueprint $table) {
            $table->id();
            $table->string('pregunta1',1000);
            $table->string('pregunta2',1000);
            $table->string('pregunta3',1000);
            $table->string('pregunta4',1000);
            
            $table->foreignId('user_id')
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
        Schema::dropIfExists('encuestas');
    }
};
