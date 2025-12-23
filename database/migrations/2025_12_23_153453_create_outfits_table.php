<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('outfits', function (Blueprint $table) {
            $table->id('id_outfit');

            $table->string('parte_superior')->nullable();
            $table->string('color_superior')->nullable();
            $table->string('parte_inferior')->nullable();
            $table->string('color_infeiror')->nullable();
            $table->string('calzado')->nullable();
            $table->string('color_calzado')->nullable();
            $table->string('accesorios')->nullable();

            //  INSERTAR ID DE PERSONAS
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outfits');
    }
};
