<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCreditosTableChangeCliente extends Migration
{
    public function up()
    {
        Schema::table('creditos', function (Blueprint $table) {
            // Eliminar el campo existente 'cliente'
            $table->dropColumn('cliente');

            // Agregar la nueva clave foránea 'cliente_id'
            $table->foreignId('cliente_id')->constrained('users');
        });
    }

    public function down()
    {
        Schema::table('creditos', function (Blueprint $table) {
            // Revertir los cambios en caso de hacer un rollback
            $table->dropForeign(['cliente_id']);
            $table->string('cliente');
        });
    }
}

