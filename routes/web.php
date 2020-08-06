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

Route::get('/import', function () {
    return view('import');
})->name('importar.vista');

Route::post('import-list-excel-ubigeo', 'UbigeoController@importExcel')->name('ubigeo.import.excel');

Route::post('import-list-excel-comisaria', 'ComisariaController@importExcel')->name('comisarias.import.excel');

Route::post('import-list-excel-denuncia', 'DenunciaController@importExcel')->name('denuncias.import.excel');

Route::resource('departamentos','DepartamentoController');
Route::resource('departamentos.provincias','ProvinciaController');
Route::resource('provincias','ProvinciaController');
Route::resource('provincias.distritos','DistritoController');
Route::resource('distritos','DistritoController');
Route::resource('comisarias','ComisariaController');
Route::get('/comisarias/{lat}/{lon}','ComisariaController@cercano')->name('comisarias.cercano');
Route::get('/comisarias/{id}/{lat}/{lon}','ComisariaController@distancia')->name('comisarias.distancia');
Route::get('/comisarias/{query}/search','ComisariaController@buscar')->name('comisarias.buscar');