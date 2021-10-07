<?php

use App\Client;
use App\Http\Controllers\ClientExportController;
use App\Http\Controllers\ClientImportController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


Route::get('/tests', function () {


});


Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth']], function () {


//    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/cities', 'CityController');

    Route::resource('/clients', 'ClientController');

    Route::get('/clients-export-excel', [ClientExportController::class, 'exportToExcel'])->name('clients-export-excel');

    Route::resource('/users', 'UserController');

    Route::get('/exports', [ExportController::class, 'index'])->name('exports.index');


    Route::get('/imports', [ClientImportController::class, 'index'])->name('imports.index');
    Route::post('/imports', [ClientImportController::class, 'import'])->name('imports.store');


});


Auth::routes();


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});








