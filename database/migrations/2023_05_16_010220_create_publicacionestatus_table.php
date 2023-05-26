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
        Schema::create('publicacionestatus', function (Blueprint $table) {
            
            $table->id();
            $table->binary('foto');
            $table->string('categoria',500);
            $table->string('historia',1000);
            $table->string('name');
            $table->string('last_name');
            $table->string('experiencia',500);
            $table->string('numero',13);
            $table->string('email')->unique();
            $table->string('pais');

            $table->foreignId('user_id')

            ->constrained()
           ->onUpdate('cascade')
           ->onDelete('cascade');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacionestatus');
    }
};
