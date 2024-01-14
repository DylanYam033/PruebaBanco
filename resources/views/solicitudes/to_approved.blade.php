@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Solicitudes para Aprobar</h3>
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
                                <th style="color:#fff;">Aprobar</th>
                                <th style="color:#fff;">Rechazar</th>
                            </thead>
                            <tbody>
                                @foreach ($solicitudes as $solicitud)
                                <tr>
                                    <td style="display: none;">{{ $solicitud->id }}</td>
                                    <td>{{ $solicitud->solicitud_cliente->name }}</td>
                                    <td><span style="color: black; margin-left: 5px; font:bold;">$</span> {{ $solicitud->valor_credito }}</td>
                                    <td>{{ $solicitud->numero_cuotas }}</td>
                                    <td>{{ $solicitud->descripcion }}</td>
                                    <td>{{ $solicitud->estado_solicitud }}</td>
                                    <td>{{ $solicitud->fecha_solicitud }}</td>
                                    <td>{{ $solicitud->tipoCredito->nombre }}</td>
                                    
                                    <td>
                                        @if($solicitud->estado_solicitud === 'Pendiente de Aprobacion')
                                        <form action="{{ route('solicitud.aprobar', $solicitud) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success">Aprobar</button>
                                        </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if($solicitud->estado_solicitud === 'Pendiente de Aprobacion')
                                        <form action="{{ route('solicitud.rechazar', $solicitud) }}" method="POST">
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