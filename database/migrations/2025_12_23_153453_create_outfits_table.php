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

            $table->string('parte_superior',80)->nullable();
            $table->string('color_superior',80)->nullable();
            $table->string('parte_inferior',80)->nullable();
            $table->string('color_infeiror',80)->nullable();
            $table->string('calzado',80)->nullable();
            $table->string('color_calzado',80)->nullable();
            $table->string('accesorios',80)->nullable();

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
