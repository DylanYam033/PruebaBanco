<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudCredito;
use App\Models\TipoCredito;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SolicitudCreditosController extends Controller
{
    function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;

        $solicitudes = SolicitudCredito::where('cliente', $userId)->paginate(5);
        return view('solicitud_creditos.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposCredito = TipoCredito::all();
        $cuotasDisponibles = [6, 12, 24, 36];

        return view('solicitud_creditos.crear', compact('tiposCredito', 'cuotasDisponibles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'valor_credito' => 'required|numeric',
            'numero_cuotas' => 'required|in:6,12,24,36',
            'descripcion' => 'required',
            'tipo_credito_id' => 'required',
            'observaciones_asesor' => 'nullable',
        ]);

        // Obtener el ID del usuario en sesión
        $userId = Auth::id();

        // Crear una nueva solicitud de crédito con los datos del formulario y valores predeterminados
        $solicitud = new SolicitudCredito([
            'cliente' => $userId,
            'valor_credito' => $request->input('valor_credito'),
            'numero_cuotas' => $request->input('numero_cuotas'),
            'descripcion' => $request->input('descripcion'),
            'estado_solicitud' => 'Pendiente', // Estado por defecto
            'fecha_solicitud' => Carbon::now(), // Fecha actual
            'tipo_credito_id' => $request->input('tipo_credito_id'),
        ]);

        // Guardar la solicitud de crédito
        $solicitud->save();

        // Redireccionar a la página de índice o a la ruta que prefieras
        return redirect()->route('solicitud_creditos.index')->with('success', 'Solicitud de crédito creada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancelar_solicitud(SolicitudCredito $solicitud)
    {
        // Verificar si la solicitud ya está cancelada
        if ($solicitud->estado_solicitud === 'Cancelada') {
            return redirect()->route('solicitud_creditos.index')->with('warning', 'La solicitud ya está cancelada.');
        }

        // Cambiar el estado a "Cancelada"
        $solicitud->estado_solicitud = 'Cancelada';
        $solicitud->save();

        return redirect()->route('solicitud_creditos.index')->with('success', 'La solicitud ha sido cancelada exitosamente.');
    }
}
