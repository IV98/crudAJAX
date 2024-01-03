<?php

use App\Http\Controllers\DatosController;
use Illuminate\Support\Facades\Route;

Route::controller(DatosController::class)->group(function () {
    Route::get('/', 'index')->name('datos.index');
    Route::post('/datos/store', 'store')->name('datos.store');
    Route::delete('/datos/destroy/{idRegistro}', 'destroy')->name('datos.destroy');
    Route::get('/datos/getData/{idRegistro}', 'getData')->name('datos.getData');
    Route::put('/datos/update', 'update')->name('datos.update');
});
