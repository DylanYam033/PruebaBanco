<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudCredito; 
use App\Models\Credito;
use App\Models\User;
use Spatie\Permission\Models\Role;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $usuarios = User::paginate(5);
        $cant_usuarios = User::count();
        $cant_roles = Role::count();
        $solicitudes = SolicitudCredito::where('cliente', $userId)->count();
        $solicitudes_all = SolicitudCredito::count();
        $creditos = Credito::where('cliente_id', $userId)->count();
        return view("home",compact('usuarios', 'cant_roles', 'solicitudes', 'cant_usuarios', 'creditos', 'solicitudes_all')); // le paso a la vista los datos traidos
    }
}
