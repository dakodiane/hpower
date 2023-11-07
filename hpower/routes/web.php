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
Route::get('enregistrercamion/', function () {
    return view('Users/enregistrercamion');
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