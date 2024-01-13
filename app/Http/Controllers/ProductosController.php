<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos; //referenciamos el modelo de productos
use Ramsey\Uuid\Type\Integer;

class ProductosController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-producto|crear-producto|editar-producto|borrar-producto')->only('index');
         $this->middleware('permission:crear-producto', ['only' => ['create','store']]);
         $this->middleware('permission:editar-producto', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-producto', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $productos = productos::paginate(5); //modelo productos 
        return view('productos.index',compact('productos'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //metodos que seran llamadas en el index.blade.php 
    {
        return view('productos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([ //validamos los campos que definimos en el modelo 
            'Nombre' => 'required',
            'Marca' => 'required',
            'Cantidad' => 'required',
            'Estado' => 'required',
        ]);
    
        productos::create($request->all());
    
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(productos $producto)
    {
        return view('productos.editar',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productos $producto)
    {
        request()->validate([
            'Nombre' => 'required',
            'Marca' => 'required',
            'Cantidad' => 'required',
            'Estado' => 'required',
        ]);
    
        $producto->update($request->all());
    
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(productos $producto)
    {
        $producto->delete();
    
        return redirect()->route('productos.index');
    }
}
