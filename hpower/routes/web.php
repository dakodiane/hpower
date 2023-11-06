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


Route::get('fourni/', function () {
    return view('fourni/tableaudebord');
});
Route::get('enregistcamion/', function () {
    return view('fourni/enregistcamion');
});


Route::get('/new', 'fournicontroller@create')->name('create');

Route::post('/fourni/enregistcamion', [fournicontroller::class, 'store'])->name('store');




Route::get('consultation/', function () {
    return view('fourni/consultation');
});
Route::get('data/', function () {
    return view('fourni/data');
});