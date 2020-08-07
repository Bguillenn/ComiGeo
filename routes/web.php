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
});



Route::post('import-list-excel-ubigeo', 'UbigeoController@importExcel')->name('ubigeo.import.excel');

Route::post('import-list-excel-comisaria', 'ComisariaController@importExcel')->name('comisarias.import.excel');
