<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/app', function(){
    return view('app');
});

Route::get('/import', function () {
    return view('import');
})->name('importar.vista');

    Route::post('import-list-excel-ubigeo', 'UbigeoController@importExcel')->name('ubigeo.import.excel');

    Route::post('import-list-excel-comisaria', 'ComisariaController@importExcel')->name('comisarias.import.excel');

    Route::post('import-list-excel-denuncia', 'DenunciaController@importExcel')->name('denuncias.import.excel');

Route::middleware(['cors'])->group(function(){
    
    Route::resource('departamentos','DepartamentoController',['only'=>['index']]);
    Route::resource('departamentos.provincias','ProvinciaController',['only'=>['index']]);
    //Route::resource('provincias','ProvinciaController');
    Route::resource('provincias.distritos','DistritoController',['only'=>['index']]);
    //Route::resource('distritos','DistritoController');
    Route::resource('comisarias','ComisariaController',['only'=>['index']]);
    Route::get('/comisarias/{lat}/{lon}','ComisariaController@cercano')->name('comisarias.cercano');
    Route::get('/comisarias/{id}/{lat}/{lon}','ComisariaController@distancia')->name('comisarias.distancia');
    Route::get('/comisarias/{id}','ComisariaController@show')->where('id','[0-9]+')->name('comisarias.show');
    Route::get('/comisarias/{query}','ComisariaController@buscar')->name('comisarias.buscar');

    Route::get('/voto/{voto}/{id}','VotoComisariaController@votar')->name('voto.comisaria.votar');
    Route::get('/voto/{id}','VotoComisariaController@voto')->name('voto.comisaria.voto');
    Route::get('/puntaje/{id}','VotoComisariaController@puntaje')->name('voto.comisarias.puntos');
    Route::get('/buscar/{depId}','ComisariaController@buscarComDep')->name('buscar.comisarias.departamentos');
    Route::get('/buscar/{depId}/{proId}','ComisariaController@buscarComPro')->name('buscar.comisarias.provincias');
    Route::get('/buscar/{depId}/{proId}/{disId}','ComisariaController@buscarComDis')->name('buscar.comisarias.distritos');
});


//Route::get('/denuncias','DenunciaController@data')->name('tabla.denuncias');
//Route::get('/', 'DenunciaController@data')->name('denuncias.datos');
Route::get('/', 'DenunciaController@googleLineChart')->name('denuncias.graficas');

