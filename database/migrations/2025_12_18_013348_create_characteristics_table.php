<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('characteristics', function (Blueprint $table) {
            $table->id('id_caracteristica');

            $table->enum('sexo', ['hombre', 'mujer'])->nullable();
            $table->integer('edad')->nullable();
            $table->integer('edad_actual')->nullable();
            $table->string('estatura')->nullable();
            $table->string('complexion')->nullable();

            $table->string('color_piel')->nullable();
            $table->string('color_ojos')->nullable();
            $table->string('color_cabello')->nullable();
            $table->string('tipo_cabello')->nullable();

            $table->text('senas_particulares')->nullable();
            $table->string('implantes')->nullable();
            $table->string('protesis')->nullable();

            //  antes: people → ahora: users
            //  se conserva persona_id
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('characteristics');
    }
};
