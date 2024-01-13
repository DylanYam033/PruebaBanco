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
                                    
                                    <div class="card bg-c-blue order-card">
                                            <div class="card-block">
                                            <h5>Usuarios</h5>                                               
                                                @php
                                                 use App\Models\User;
                                                $cant_usuarios = User::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                                 @can('ver-user')
                                                <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Detalles</a></p>
                                                @endcan
                                            </div>                                            
                                        </div>                                    
                                    </div>
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block">
                                            <h5>Roles</h5>                                               
                                                @php
                                                use Spatie\Permission\Models\Role;
                                                 $cant_roles = Role::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-user-lock f-left"></i><span>{{$cant_roles}}</span></h2>
                                                @can('ver-rol')
                                                <p class="m-b-0 text-right"><a href="/roles" class="text-white">Detalles</a></p>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>  
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Productos</h5>                                               
                                                @php
                                                 use App\Models\productos;
                                                $cant_productos = productos::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_productos}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/productos" class="text-white">Detalles</a></p>
                                            </div>
                                        </div>
                                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Incluimos el grafico -->

    <div class="container mt-10">
        <div class="row">
            <div class="col">
                <div id="container"></div>
            </div>
        </div>
    </div>

    <script>
        Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'left',
        text: 'Estadisticas de productos Actuales'
    },
    subtitle: {
        align: 'left'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Cantidades por producto'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                // format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        // pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Cantidades",
            colorByPoint: true,
            data: <?= $data ?> //mostramos los datos
        }
    ],
        });
              
    </script>

    
@endsection

