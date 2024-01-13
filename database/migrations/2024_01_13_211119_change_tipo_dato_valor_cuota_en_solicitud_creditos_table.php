<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTipoDatoValorCuotaEnSolicitudCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitud_creditos', function (Blueprint $table) {
            $table->dropColumn('valor_cuota');
            // Luego, añadimos la columna con el nuevo tipo de dato entero
            $table->integer('valor_cuota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitud_creditos', function (Blueprint $table) {
            $table->dropColumn('valor_cuota');
            $table->decimal('valor_cuota');
        });
    }
}
