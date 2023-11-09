<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdentifyController;
use App\Http\Controllers\AdminController;

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

Route::get('/connexion','App\Http\Controllers\IdentifyController@connexion')->name('connexion');
Route::get('/inscription','App\Http\Controllers\IdentifyController@inscription')->name('inscription');
Route::post('/inscription','App\Http\Controllers\IdentifyController@registerUser')->name('inscription');
Route::post('/connexion','App\Http\Controllers\IdentifyController@loginUser')->name('connexion');


Route::get('allcamion/', function () {
    return view('Admin/allcamion');
});
Route::get('paiement/', function () {
    return view('Admin/paiement');
});
//Route::get('connexion/', function () {
 //   return view('connexion');
//});

Route::get('user/','App\Http\Controllers\CamionController@tableaudebord')->name('tableaudebord');
Route::get('admin/','App\Http\Controllers\CamionController@statistiqueCamions');

Route::get('enregistrercamion/', 'App\Http\Controllers\CamionController@create')->name('camion.create');
Route::post('enregistrercamion/','App\Http\Controllers\CamionController@store')->name('camion.store');
Route::get('listecamionsave/', 'App\Http\Controllers\CamionController@view')->name('camion.view');
Route::get('listecamionfin/', 'App\Http\Controllers\CamionController@viewfin')->name('camion.viewfin');
Route::get('enregistrerfin/{cam_id}/', 'App\Http\Controllers\CamionController@savefin')->name('camion.savefin');
Route::post('enregistrerfin/{cam_id}/','App\Http\Controllers\CamionController@storefin')->name('camion.storefin');

Route::get('enregistrerproduit/', function () {
    return view('Admin/enregistrerproduit');
});

Route::get('createproduit','App\Http\Controllers\AdminController@produit')->name('createproduit');
Route::post('produit','App\Http\Controllers\AdminController@createproduit')->name('produit');
Route::get('userlist','App\Http\Controllers\AdminController@userlist')->name('userlist');

Route::put('/activate-produit/{id}', 'App\Http\Controllers\ProduitController@activate')->name('produit.activate');
Route::put('/deactivate-produit/{id}', 'App\Http\Controllers\ProduitController@deactivate')->name('produit.deactivate');
Route::get('allcamion/', 'App\Http\Controllers\AdminController@camions')->name('allcamion');

