@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Mis Solicitudes</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <!--verificamos que el perfil en sesion tenga permisos con la directiva @-->
                        <a class="btn btn-primary" href="{{ route('solicitud_creditos.create') }}">Nueva Solicitud</a>


                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Valor Credito</th>
                                <th style="color:#fff;">Numero Cuotas</th>
                                <th style="color:#fff;">Descripcion Credito</th>
                                <th style="color:#fff;">Estado</th>
                                <th style="color:#fff;">Fecha Solicitud</th>
                                <th style="color:#fff;">Tipo Credito</th>
                                <th style="color:#fff;">Observaciones Asesor</th>
                                <th style="color:#fff;">Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($solicitudes as $solicitud)
                                <tr>
                                    <td style="display: none;">{{ $solicitud->id }}</td>
                                    <td>{{ $solicitud->valor_credito }}</td>
                                    <td>{{ $solicitud->numero_cuotas }}</td>
                                    <td>{{ $solicitud->descripcion }}</td>
                                    <td>
                                        {{ $solicitud->estado_solicitud }}
                                        @if($solicitud->estado_solicitud == 'Aprobada')
                                        <span style="color: green; margin-left: 5px;">✓</span>
                                        @elseif($solicitud->estado_solicitud == 'Rechazada')
                                        <span style="color: red; margin-left: 5px;">✗</span>
                                        @endif
                                    </td>
                                    <td>{{ $solicitud->fecha_solicitud }}</td>
                                    <td>{{ $solicitud->tipoCredito->nombre }}</td>
                                    <td>{{ $solicitud->observaciones_asesor }}</td>
                                    <td>
                                        @if($solicitud->estado_solicitud === 'Pendiente')
                                        <form action="{{ route('solicitud_creditos.cancelar', $solicitud) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger">Cancelar</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $solicitudes->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection