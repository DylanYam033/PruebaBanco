<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditosTable extends Migration
{
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_cuenta', 10)->unique()->nullable();
            $table->decimal('valor_credito');
            $table->enum('numero_cuotas', [6, 12, 24, 36]);
            $table->decimal('valor_cuota');
            $table->string('cliente');
            $table->date('fecha_aprobacion');
            $table->foreignId('quien_aprobo')->constrained('users'); 
            $table->string('tipo_credito');
            $table->foreignId('solicitud_credito_id')->constrained('solicitud_creditos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('creditos');
    }
}

