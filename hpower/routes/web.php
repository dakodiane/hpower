<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdentifyController;
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
Route::get('/', function () {
    return view("welcome");
});

Route::get('/connexion','App\Http\Controllers\IdentifyController@connexion')->name('connexion');

Route::get('/inscription',[IdentifyController::class,'inscription']);

Route::post('/inscription','App\Http\Controllers\IdentifyController@registerUser')->name('insUser');
Route::post('/connexion','App\Http\Controllers\IdentifyController@loginUser')->name('conUser');


Route::get('allcamion/', function () {
    return view('Admin/allcamion');
});
Route::get('paiement/', function () {
    return view('Admin/paiement');
});

Route::get('user/','App\Http\Controllers\CamionController@statistiquesCamions');
Route::get('admin/','App\Http\Controllers\CamionController@statistiqueCamions');



Route::get('fourni/', function () {
    return view('fourni/tableaudebord');
});

Route::get('servicetrans/', function () {
    return view('servicetrans/tableaudebord');
});
Route::get('enregistcamion/', function () {
    return view('fourni/enregistcamion');
});



    
Route::get('consultation/', 'App\Http\Controllers\ConsultcamController@show')->name('Consultcam.show');

Route::get('enregistcamion/', 'App\Http\Controllers\fourniController@create')->name('fourni.create');
Route::post('enregistcamion/','App\Http\Controllers\fourniController@store')->name('fourni.store');

Route::get('fourni/','App\Http\Controllers\fournicontroller@statistiqueCamions');




Route::get('enregistrercamion/', 'App\Http\Controllers\CamionController@create')->name('camion.create');
Route::post('enregistrercamion/','App\Http\Controllers\CamionController@store')->name('camion.store');
Route::get('listecamionsave/', 'App\Http\Controllers\CamionController@view')->name('camion.view');
Route::get('listecamionfin/', 'App\Http\Controllers\CamionController@viewfin')->name('camion.viewfin');
Route::get('enregistrerfin/{cam_id}/', 'App\Http\Controllers\CamionController@savefin')->name('camion.savefin');
Route::post('enregistrerfin/{cam_id}/','App\Http\Controllers\CamionController@storefin')->name('camion.storefin');

Route::get('servconsultation/', 'App\Http\Controllers\ServicetransController@show')->name('Servicetrans.show');
Route::get('servicetrans/','App\Http\Controllers\ServicetransController@statistiquesCamions');





Route::get('servpaiement/{cam_id}', 'App\Http\Controllers\ServicetransController@paiement')->name('servicetrans.servpaiement');
Route::post('servpaiement/{cam_id}/store', 'App\Http\Controllers\ServicetransController@storepaie')->name('Servicetrans.storepaie');
