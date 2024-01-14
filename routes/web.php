<?php

use Illuminate\Support\Facades\Route;

//agregamos los siguientes controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\SolicitudCreditosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//creamos un grupo de rutas protegidas para los controladores
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('productos', ProductosController::class);
    Route::resource('solicitud_creditos', SolicitudCreditosController::class);
    Route::put('solicitud_creditos/{solicitud}/cancelar', [SolicitudCreditosController::class, 'cancelar_solicitud'])->name('solicitud_creditos.cancelar');

    Route::get('solicitudes', [SolicitudCreditosController::class, 'solicitudes_all'])->name('solicitudes_all');
    Route::put('solicitudes/{solicitud}/rechazar', [SolicitudCreditosController::class, 'rechazar_solicitud'])->name('solicitud.rechazar');

    Route::put('solicitudes/{solicitud}/rechazar_asesor', [SolicitudCreditosController::class, 'rechazar_solicitud_asesor'])->name('solicitud.rechazar.asesor');

    Route::put('solicitudes/{solicitud}/change', [SolicitudCreditosController::class, 'change_solicitud_to_pending'])->name('solicitud.change');
    Route::put('/solicitud/{solicitud}/edit-observaciones', [SolicitudCreditosController::class, 'editObservaciones'])->name('solicitud.editObservaciones');

    Route::get('solicitudes_to_approved', [SolicitudCreditosController::class, 'solicitudes_to_approved'])->name('solicitudes_to_approved');
    Route::put('solicitudes/{solicitud}/aprobar', [SolicitudCreditosController::class, 'aprobar_solicitud'])->name('solicitud.aprobar');

    Route::get('creditos', [SolicitudCreditosController::class, 'creditos'])->name('creditos');

});
