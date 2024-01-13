<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_creditos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente')->constrained('users');
            $table->decimal('valor_credito');
            $table->enum('numero_cuotas', [6, 12, 24, 36]);
            $table->text('descripcion');
            $table->string('estado_solicitud')->default('Pendiente');
            $table->date('fecha_solicitud');
            $table->unsignedBigInteger('tipo_credito_id');
            // Definir la clave foránea
            $table->foreign('tipo_credito_id')->references('id')->on('tipo_creditos');
            $table->text('observaciones_asesor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_creditos');
    }
}
