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

            $table->enum('sexo', ['masculino', 'femenino'])->nullable();
            $table->integer('edad')->nullable();
            $table->integer('edad_actual')->nullable();
            $table->string('estatura')->nullable();
            $table->string('complexion',50)->nullable();

            $table->string('color_piel',45)->nullable();
            $table->string('color_ojos',45)->nullable();
            $table->string('color_cabello',45)->nullable();
            $table->string('tipo_cabello',45)->nullable();

            $table->text('senas_particulares',200)->nullable();
            $table->text('senas_odontologicas',200)->nullable();
            $table->string('implantes',200)->nullable();
            $table->string('protesis',200)->nullable();

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
