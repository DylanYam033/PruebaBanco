@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Productos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
            
                        @can('crear-producto') <!--verificamos que el perfil en sesion tenga permisos con la directiva @-->
                        <a class="btn btn-primary" href="{{ route('productos.create') }}">Nuevo Producto</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Marca</th>                                    
                                    <th style="color:#fff;">Cantidad</th>  
                                    <th style="color:#fff;">Estado</th>  
                                    <th style="color:#fff;">Acciones</th>                                                                
                              </thead>
                              <tbody>
                            @foreach ($productos as $producto)
                            <tr>
                                <td style="display: none;">{{ $producto->id }}</td>                                
                                <td>{{ $producto->Nombre }}</td>
                                <td>{{ $producto->Marca }}</td>
                                <td>{{ $producto->Cantidad }}</td>
                                <td>{{ $producto->Estado }}</td>
                                <td>
                                    <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">                                        
                                        @can('editar-producto')
                                        <a class="btn btn-info" href="{{ route('productos.edit',$producto->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-producto')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $productos->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection