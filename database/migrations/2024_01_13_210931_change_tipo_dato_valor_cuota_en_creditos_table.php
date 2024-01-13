<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTipoDatoValorCuotaEnCreditosTable extends Migration
{
    public function up()
    {
        Schema::table('creditos', function (Blueprint $table) {
            // Primero, eliminamos la columna existente
            $table->dropColumn('valor_cuota');
            
            // Luego, añadimos la columna con el nuevo tipo de dato entero
            $table->integer('valor_cuota');
        });
    }

    public function down()
    {
        Schema::table('creditos', function (Blueprint $table) {
            // Si necesitas deshacer el cambio, puedes revertir la migración
            $table->dropColumn('valor_cuota');
            $table->decimal('valor_cuota');
        });
    }
}

