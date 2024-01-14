@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Solicitudes</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Cliente</th>
                                <th style="color:#fff;">Valor Credito</th>
                                <th style="color:#fff;">Numero Cuotas</th>
                                <th style="color:#fff;">Descripcion Credito</th>
                                <th style="color:#fff;">Estado</th>
                                <th style="color:#fff;">Fecha Solicitud</th>
                                <th style="color:#fff;">Tipo Credito</th>
                                <th style="color:#fff;">Observaciones Asesor</th>
                                <th style="color:#fff;">Pendiente AP</th>
                                <th style="color:#fff;">Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($solicitudes as $solicitud)
                                <tr>
                                    <td style="display: none;">{{ $solicitud->id }}</td>
                                    <td>{{ $solicitud->solicitud_cliente->name }}</td>
                                    <td><span style="color: black; margin-left: 5px; font:bold;">$</span> {{ $solicitud->valor_credito }}</td>
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
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#observacionesModal{{$solicitud->id}}">
                                            Observaciones
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="observacionesModal{{$solicitud->id}}" tabindex="-1" role="dialog" aria-labelledby="observacionesModalLabel{{$solicitud->id}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="observacionesModalLabel{{$solicitud->id}}">Observaciones</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Formulario para editar observaciones -->
                                                        <form action="{{ route('solicitud.editObservaciones', $solicitud) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="observaciones{{$solicitud->id}}">Observaciones:</label>
                                                                <textarea name="observaciones" id="observaciones{{$solicitud->id}}" class="form-control">{{ $solicitud->observaciones_asesor }}</textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Guardar Observaciones</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>


                                    <td>
                                        @if($solicitud->estado_solicitud === 'Pendiente')
                                        <form action="{{ route('solicitud.change', $solicitud) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-info">Pendiente Aprobacion</button>
                                        </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if($solicitud->estado_solicitud === 'Pendiente')
                                        <form action="{{ route('solicitud.rechazar.asesor', $solicitud) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger">Rechazar</button>

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