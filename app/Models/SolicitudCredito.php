<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCredito extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente',
        'valor_credito',
        'cuotas',
        'descripcion',
        'estado_solicitud',
        'fecha_solicitud',
        'tipo_credito_id',
        'observaciones_asesor',
    ];

    public function credito()
    {
        return $this->hasOne(Credito::class, 'solicitud_credito_id');
    }

    public function solicitud_cliente()
    {
        return $this->belongsTo(User::class, 'cliente');
    }

    public function tipoCredito()
    {
        return $this->belongsTo(TipoCredito::class, 'tipo_credito_id');
    }
}

