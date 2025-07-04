<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUsuariosTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('usuarios');
    }

    public function down()
    {
        // No recrear la tabla aquí, se hará en la siguiente migración
    }
}
