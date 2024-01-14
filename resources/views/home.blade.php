@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Bienvenido {{\Illuminate\Support\Facades\Auth::user()->name}}</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">

                        <div class="col-md-4 col-xl-4">
                            @withoutRole
                                <div class="card bg-c-pink order-card">
                                    <div class="card-block">
                                        <h5>Mis Solicitudes</h5>
                                        <h2 class="text-right"><i class="fas fa-paper-plane f-left"></i><span>{{$solicitudes}}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/solicitud_creditos" class="text-white">Detalles</a></p>
                                    </div>
                                </div>
                            @endwithoutRole
                            </div>

                            <div class="col-md-4 col-xl-4">
                            @withoutRole
                                <div class="card bg-c-blue order-card">
                                    <div class="card-block">
                                        <h5>Pendientes de Aprobacion</h5>
                                        <h2 class="text-right"><i class="fas fa-paper-plane f-left"></i><span>{{$solicitudesAP}}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/solicitud_creditos" class="text-white">Detalles</a></p>
                                    </div>
                                </div>
                            @endwithoutRole
                            </div>

                            <div class="col-md-4 col-xl-4">
                            @withoutRole
                                <div class="card bg-c-green order-card">
                                    <div class="card-block">
                                        <h5>Mis Creditos</h5>
                                        <h2 class="text-right"><i class="fas fa-hand-holding-usd f-left"></i><span>{{$creditos}}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/creditos" class="text-white">Detalles</a></p>
                                    </div>
                                </div>
                            @endwithoutRole
                            </div>
                            <div class="col-md-4 col-xl-4">
                            @can('ver-user')
                                <div class="card bg-c-blue order-card">
                                    <div class="card-block">
                                        <h5>Usuarios</h5>
                                        <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                        @can('ver-user')
                                        <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Detalles</a></p>
                                        @endcan
                                    </div>
                                </div>
                                @endcan
                            </div>

                            <div class="col-md-4 col-xl-4">
                                @can('ver-rol')
                                <div class="card bg-c-green order-card">
                                    <div class="card-block">
                                        <h5>Roles</h5>
                                        <h2 class="text-right"><i class="fa fa-user-lock f-left"></i><span>{{ $cant_roles }}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/roles" class="text-white">Detalles</a></p>
                                    </div>
                                </div>
                                @endcan
                            </div>

                            <div class="col-md-4 col-xl-4">
                            @can('ver-solicitudes')
                                <div class="card bg-c-sol order-card">
                                    <div class="card-block">
                                        <h5>Solicitudes</h5>
                                        <h2 class="text-right"><i class="fas fa-paper-plane f-left"></i><span>{{ $solicitudes_all }}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/solicitudes" class="text-white">Detalles</a></p>
                                    </div>
                                </div>
                                @endcan
                            </div>

                            <div class="col-md-4 col-xl-4">
                            @can('ver-solicitudes')
                                <div class="card bg-c-sky order-card">
                                    <div class="card-block">
                                        <h5>Pendientes Aprobacion</h5>
                                        <h2 class="text-right"><i class="fas fa-check-circle f-left"></i><span>{{ $pendientes }}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/solicitudes" class="text-white">Detalles</a></p>
                                    </div>
                                </div>
                                @endcan
                            </div>

                            <div class="col-md-4 col-xl-4">
                            @can('aprobar-solicitud')
                                <div class="card bg-c-sky order-card">
                                    <div class="card-block">
                                        <h5>Pendientes Aprobacion</h5>
                                        <h2 class="text-right"><i class="fas fa-check-circle f-left"></i><span>{{ $pendientes }}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/solicitudes_to_approved" class="text-white">Detalles</a></p>
                                    </div>
                                </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection