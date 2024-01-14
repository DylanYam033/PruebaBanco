@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Mis Creditos</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Valor Credito</th>
                                <th style="color:#fff;">Numero Cuotas</th>
                                <th style="color:#fff;">Valor Cuota</th>
                                <th style="color:#fff;">Fecha Aprobacion</th>
                                <th style="color:#fff;">Aprobado Por</th>
                            </thead>
                            <tbody>
                                @foreach ($creditos as $credito)
                                <tr>
                                    <td style="display: none;">{{ $credito->id }}</td>
                                    <td>{{ $credito->valor_credito }}</td>
                                    <td>{{ $credito->numero_cuotas }}</td>
                                    <td>{{ $credito->valor_cuota }}</td>
                                    <td>{{ $credito->fecha_aprobacion }}</td>
                                    <td>{{ $credito->aproboUsuario->name }}</td>
                                
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $creditos->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection