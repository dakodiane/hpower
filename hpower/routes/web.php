<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fournicontroller;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('connexion/', function () {
    return view('connexion');
});
Route::get('inscription/', function () {
    return view('inscription');
});
Route::get('admin/', function () {
    return view('Admin/tableaudebord');
});


Route::get('allcamion/', function () {
    return view('Admin/allcamion');
});
Route::get('paiement/', function () {
    return view('Admin/paiement');
});
Route::get('user/', function () {
    return view('Users/tableaudebord');
});

Route::get('enregistrerfin/', function () {
    return view('Users/enregistrerfin');
});
Route::get('listecamionsave/', function () {
    return view('Users/listecamionsave');
});
Route::get('listecamionfin/', function () {
    return view('Users/listecamionfin');
});

Route::get('fourni/', function () {
    return view('fourni/tableaudebord');
});
Route::get('enregistcamion/', function () {
    return view('fourni/enregistcamion');
});




Route::get('consultation/', function () {
    return view('fourni/consultation');
});


Route::get('enregistrercamion/', 'App\Http\Controllers\CamionController@create')->name('camion.create');
Route::post('enregistrercamion/','App\Http\Controllers\CamionController@store')->name('camion.store');


Route::get('enregistcamion/', 'App\Http\Controllers\fourniController@create')->name('fourni.create');
Route::post('enregistcamion/','App\Http\Controllers\fourniController@store')->name('fourni.store');

Route::post('consulation/', 'App\Http\Controllers\ConsultcamController@show')->name('Consultcam.show');
