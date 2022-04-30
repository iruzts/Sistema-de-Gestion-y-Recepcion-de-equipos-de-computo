<?php

use Illuminate\Support\Facades\Route;
use App\Models\Ordene;
use Spatie\Permission\Models\Role;

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
    return view('auth.login');
});

Route::get('/contando', function () {
    //$equipos = App\Models\Recepcion::withCount(['estado_id '])->get();
    //return view('equipos',compact('equipos'));
    $equipos = App\Models\Recepcion::where('estado_id', 1)->count();
    return $equipos;
});

Route::middleware(['auth:sanctum', 'verified','canAccess'])->group(function (){
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
    Route::resource('dash', 'App\Http\Controllers\DashController')->middleware('can:dash')->names('dash');
    Route::resource('salida', 'App\Http\Controllers\SalidaController')->middleware('can:salida')->names('salida');
    Route::resource('ordenes', 'App\Http\Controllers\OrdenesServicioController')->middleware('can:ordenes')->names('ordenes');
    Route::resource('reportes', 'App\Http\Controllers\ReporteController')->middleware('can:reportes')->names('reportes');
    Route::get('terminados', [App\Http\Controllers\ReporteController::class, 'terminados'])->middleware('can:terminados')->name('terminados');
    Route::get('pendientes', [App\Http\Controllers\ReporteController::class, 'pendientes'])->middleware('can:pendientes')->name('pendientes');
    Route::get('ingresos', [App\Http\Controllers\ReporteController::class, 'ingresos'])->middleware('can:ingresos')->name('ingresos');
    Route::get('cancelados', [App\Http\Controllers\ReporteController::class, 'cancelados'])->middleware('can:cancelados')->name('cancelados');
    Route::resource('cliente', 'App\Http\Controllers\ClienteController')->middleware('can:clientes')->names('cliente');
    Route::resource('marca', 'App\Http\Controllers\MarcaController')->middleware('can:marca')->names('marca');
    Route::resource('color', 'App\Http\Controllers\ColorController')->middleware('can:color')->names('color');
    Route::resource('tipoequipo', 'App\Http\Controllers\TipoequipoController')->middleware('can:tipoequipo')->names('tipoequipo');
    Route::resource('empleado', 'App\Http\Controllers\EmpleadoController')->middleware('can:empleado')->names('empleado');

    //pdf
    Route::get('/reporte_fecha', [App\Http\Controllers\ReporteController::class, 'reporte_fecha'])->name('reporte');
    Route::get('/ordenes/pdf/{id}', [App\Http\Controllers\OrdenesServicioController::class, 'pdf'])->name('pdf');
    Route::get('/ordenes/printpdf/{id}', [App\Http\Controllers\OrdenesServicioController::class, 'print'])->name('printpdf');
    Route::get('terminados-pdf', [App\Http\Controllers\ReporteController::class, 'terminadospdf'])->name('terminadospdf');
    Route::get('pendientes-pdf', [App\Http\Controllers\ReporteController::class, 'pendientespdf'])->name('pendientespdf');
    Route::get('ingresos-pdf', [App\Http\Controllers\ReporteController::class, 'ingresospdf'])->name('ingresospdf');
    Route::get('cancelados-pdf', [App\Http\Controllers\ReporteController::class, 'canceladospdf'])->name('canceladospdf');

});