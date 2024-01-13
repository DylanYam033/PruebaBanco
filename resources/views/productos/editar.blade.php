@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Producto</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                            
                   
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif


                    <form action="{{ route('productos.update',$producto->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo">Nombre</label>
                                   <input type="text" name="Nombre" class="form-control" value="{{ $producto->Nombre }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo">Marca</label>
                                   <input type="text" name="Marca" class="form-control" value="{{ $producto->Marca }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo">Cantidad</label>
                                   <input type="text" name="Cantidad" class="form-control" value="{{ $producto->Cantidad }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="titulo">Estado</label>
                                        <select name="Estado" class="form-control" value="{{ $producto->Estado}}" >
                                            <option value="Buen Estado">Buen Estado</option>
                                            <option value="Averiado">Averiado</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Editar</button>   
                                </div>
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection