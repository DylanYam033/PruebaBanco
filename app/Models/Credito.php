<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_cuenta',
        'valor_credito',
        'numero_cuotas',
        'valor_cuota',
        'cliente_id',
        'fecha_aprobacion',
        'quien_aprobo',
        'tipo_credito',
        'interes',
        'solicitud_credito_id',
    ];

    public function aproboUsuario()
    {
        return $this->belongsTo(User::class, 'quien_aprobo');
    }

    public function solicitudCredito()
    {
        return $this->belongsTo(SolicitudCredito::class, 'solicitud_credito_id');
    }

    public function Cliente()
    {
        return $this->belongsTo(User::class, 'cliente');
    }
}

