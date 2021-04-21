<?php

use Illuminate\Support\Facades\Route;

//$prefijo = config('global.router_prefix');


//Route::get('/{any}', [App\Http\Controllers\AppController::class, 'index'])->where('any', '.*');
//Route::get('/', [App\Http\Controllers\AppController::class, 'index'])->where('any', '.*');  

/* Route::get($prefijo . '/{any}', [App\Http\Controllers\AppController::class, 'index'])->where('any', '.*');  
Route::get($prefijo, [App\Http\Controllers\AppController::class, 'index'])->where('any', '.*');   */


/* Route::group(['middleware'=>['guest']],function(){
  Route::get('/', function () {  return view('auth.login');});
}); */




Route::get('/', function () {
  return view('auth.login');
});
 


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
  Route::get('/platino', [App\Http\Controllers\AppController::class, 'index'])->name('platino');    
  Route::get('/reporte-horas', [App\Http\Controllers\ReporteHorasController::class, 'index']);
  Route::post('/registrar-asistencia', [App\Http\Controllers\ReporteHorasController::class, 'UpdateOrCreateRegistro']);
  Route::get('/get-estados-user', [App\Http\Controllers\ReporteHorasController::class, 'getEstadosUser']);
});


/* 
Route::get('{any}', function () {
  return view('layouts.app');
})->where('any','.*'); */