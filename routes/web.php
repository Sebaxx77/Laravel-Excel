<?php

use App\Http\Controllers\ImportExcel;
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

Route::get('/import_excel/index', [ImportExcel::class, 'index']);
Route::post('/import_excel/import', [ImportExcel::class, 'import']);

Route::get('/import_excel/formulario', [ImportExcel::class, 'formulario']);

Route::get('/', function () {
    return view('welcome');
});
