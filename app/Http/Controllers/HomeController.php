<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos; //referenciamos el modelo de productos
use App\Models\User;
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
        $usuarios = User::paginate(5);

         //Traemos los registros de la base de datos
        $Producto = productos::all(); 
        $datos = [];
        foreach($Producto as $producto){
            $datos[] = ['name'=>$producto['Nombre'], 'y'=>intval($producto['Cantidad'])];
        }
        return view("home",["data" => json_encode($datos)],compact('usuarios')); // le paso a la vista los datos traidos
    }
}
