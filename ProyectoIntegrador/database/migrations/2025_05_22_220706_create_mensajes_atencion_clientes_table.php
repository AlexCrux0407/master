<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mensajes_atencion_clientes', function (Blueprint $table) {
            $table->id();
            $table->string('motivo'); // error, sugerencia, etc.
            $table->text('mensaje');
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mensajes_atencion_clientes');
    }
};