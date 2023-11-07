<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdentifyController;
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
Route::get('/', function () {
    return view("welcome");
});

Route::get('/connexion',[IdentifyController::class,'connexion']);

Route::get('/inscription',[IdentifyController::class,'inscription']);

Route::post('/inscription','App\Http\Controllers\IdentifyController@registerUser')->name('insUser');

// Route::post('/connexion','App\Http\Controllers\IdentifyController@connectUser')->name('conUser');

Route::post('/connexion',[IdentifyController::class,'conUser'])->name('conUser');


Route::get('allcamion/', function () {
    return view('Admin/allcamion');
});
Route::get('paiement/', function () {
    return view('Admin/paiement');
});
Route::get('user/','App\Http\Controllers\CamionController@statistiquesCamions');
Route::get('admin/','App\Http\Controllers\CamionController@statistiquesCamions');



Route::get('enregistrercamion/', 'App\Http\Controllers\CamionController@create')->name('camion.create');
Route::post('enregistrercamion/','App\Http\Controllers\CamionController@store')->name('camion.store');
Route::get('listecamionsave/', 'App\Http\Controllers\CamionController@view')->name('camion.view');
Route::get('listecamionfin/', 'App\Http\Controllers\CamionController@viewfin')->name('camion.viewfin');
Route::get('enregistrerfin/{cam_id}/', 'App\Http\Controllers\CamionController@savefin')->name('camion.savefin');
Route::post('enregistrerfin/{cam_id}/','App\Http\Controllers\CamionController@storefin')->name('camion.storefin');
