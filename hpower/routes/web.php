<?php

use App\Http\Controllers\ApproController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\semencesController;
use App\Http\Controllers\SemenceController;
use App\Http\Controllers\DownloadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdentifyController;
use App\Http\Controllers\fournicontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServicetransController;

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




Route::get('fourni/', function () {
    return view('fourni/tableaudebord');
});

Route::get('servicetrans/', function () {
    return view('servicetrans/tableaudebord');
});

Route::get('enregistcamion/', function () {
    return view('fourni/enregistcamion');
});

Route::get('consultation/', function () {
    return view('fourni/enregistcamion');
});



Route::get('consultation/', 'App\Http\Controllers\ConsultcamController@show')->name('Consultcam.show');
Route::get('enregistcamion/', 'App\Http\Controllers\fourniController@create')->name('fourni.create');
Route::post('enregistcamion/','App\Http\Controllers\fourniController@store')->name('fourni.store');
Route::get('fourni/','App\Http\Controllers\fournicontroller@statistiqueCamions');

//Admin
Route::get('enregistrercamion/', 'App\Http\Controllers\CamionController@create')->name('camion.create');
Route::post('enregistrercamion/','App\Http\Controllers\CamionController@store')->name('camion.store');
Route::get('listecamionsave/', 'App\Http\Controllers\CamionController@view')->name('camion.view');
Route::get('listecamionfin/', 'App\Http\Controllers\CamionController@viewfin')->name('camion.viewfin');
Route::get('enregistrerfin/{cam_id}/', 'App\Http\Controllers\CamionController@savefin')->name('camion.savefin');
Route::post('enregistrerfin/{cam_id}/','App\Http\Controllers\CamionController@storefin')->name('camion.storefin');

Route::get('servconsultation/', 'App\Http\Controllers\ServicetransController@show')->name('Servicetrans.show');
Route::get('servicetrans/','App\Http\Controllers\ServicetransController@statistiquesCamions')->name('statistiquesCamions');;
Route::get('servpaiement/{transport_id}/', 'App\Http\Controllers\ServicetransController@paiement')->name('Servicetrans.servpaiement');
Route::get('servpaiement/{transport_id}/store/', 'App\Http\Controllers\ServicetransController@storepaie')->name('Servicetrans.storepaie');

Route::get('/connexion','App\Http\Controllers\IdentifyController@connexion')->name('connexion');
Route::get('/inscription','App\Http\Controllers\IdentifyController@inscription')->name('inscription');
Route::post('/inscription','App\Http\Controllers\IdentifyController@registerUser')->name('inscription');
Route::post('/connexion','App\Http\Controllers\IdentifyController@loginUser')->name('connexion');

//SEMENCE

Route::get('/semences',[semencesController::class,'index'])->name('dashboard');

Route::get('/semences/vente',[SemenceController::class,'traitement'])->name('vente');

Route::get('/semences/reception',[semencesController::class,'reception'])->name('reception');

Route::post('/semences',[semencesController::class,'paie'])->name('paie');

Route::get('semences/download',[DownloadController::class,'telecharger'])->name('telechargement');

Route::get('/search',[ResearchController::class,'search']);

Route::get('/get-result',[ResearchController::class,'result'])->name('get-result');

Route::get('/approdashboard',[ApproController::class,'affichage']);

//APPROVISIONNEMENT
Route::get('/approvisionnement',[ApproController::class,'affichage'])->name('index');

Route::get('/approvisionnement/hpg',[ApproController::class,'hpg'])->name('hpg');

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


Route::get('enregistrerproduit/', function () {
    return view('Admin/enregistrerproduit');
});

Route::get('createproduit','App\Http\Controllers\AdminController@produit')->name('createproduit');
Route::post('produit','App\Http\Controllers\AdminController@createproduit')->name('produit');
Route::get('userlist','App\Http\Controllers\AdminController@userlist')->name('userlist');

Route::put('/activate-produit/{id}', 'App\Http\Controllers\ProduitController@activate')->name('produit.activate');
Route::put('/deactivate-produit/{id}', 'App\Http\Controllers\ProduitController@deactivate')->name('produit.deactivate');
Route::get('allcamion/', 'App\Http\Controllers\AdminController@camions')->name('allcamion');

Route::get('fournilist','App\Http\Controllers\AdminController@fournilist')->name('fournilist');
Route::get('fournisave/', 'App\Http\Controllers\CamionController@fournisave')->name('fournisave');


Route::put('/activate-user/{id}', 'App\Http\Controllers\AdminController@activate')->name('user.activate');
Route::put('/deactivate-user/{id}', 'App\Http\Controllers\AdminController@deactivate')->name('user.deactivate');
Route::post('/logout', 'App\Http\Controllers\IdentifyController@logout')->name('logout');

Route::get('servconsultationfin/', 'App\Http\Controllers\ServicetransController@viewfin')->name('Servicetrans.viewfin');
Route::post ('servpaiement/{transport_id}/', 'App\Http\Controllers\ServicetransController@paiement')->name('Servicetrans.storepaie');
Route::post ('servpaiement/{transport_id}/store/', 'App\Http\Controllers\ServicetransController@storepaie')->name('Servicetrans.storepaie');



Route::get('enregistrerappro/', 'App\Http\Controllers\RapporteurController@createappro')->name('create.appro');
Route::post('enregistrerappro/','App\Http\Controllers\RapporteurController@storeappro')->name('store.appro');
Route::get('listeapprosave/', 'App\Http\Controllers\RapporteurController@viewappro')->name('view.appro');
Route::get('listeapprofin/', 'App\Http\Controllers\RapporteurController@viewfinappro')->name('appro.viewfin');
Route::get('approfin/{appro_id}/', 'App\Http\Controllers\RapporteurController@savefinappro')->name('savefin.appro');
Route::post('approfin/{appro_id}/','App\Http\Controllers\RapporteurController@storefinappro')->name('storefin.appro');


Route::get('enregistrersemence/', 'App\Http\Controllers\RapporteurController@createsemence')->name('create.semence');
Route::post('enregistrersemence/','App\Http\Controllers\RapporteurController@storesemence')->name('store.semence');
Route::get('listesemencesave/', 'App\Http\Controllers\RapporteurController@viewsemence')->name('view.semence');
Route::get('listesemencefin/', 'App\Http\Controllers\RapporteurController@viewfinsemence')->name('semence.viewfin');
Route::get('semencefin/{semence_id}/', 'App\Http\Controllers\RapporteurController@savefinsemence')->name('savefin.semence');
Route::post('semencefin/{semence_id}/','App\Http\Controllers\RapporteurController@storefinsemence')->name('storefin.semence');


Route::get('enregistrertransport/', 'App\Http\Controllers\RapporteurController@createtransport')->name('create.transport');
Route::post('enregistrertransport/','App\Http\Controllers\RapporteurController@storetransport')->name('store.transport');
Route::get('listetransportsave/', 'App\Http\Controllers\RapporteurController@viewtransport')->name('view.transport');
Route::get('listetransportfin/', 'App\Http\Controllers\RapporteurController@viewfintransport')->name('transport.viewfin');
Route::get('transportfin/{transport_id}/', 'App\Http\Controllers\RapporteurController@savefintransport')->name('savefin.transport');
Route::post('transportfin/{transport_id}/','App\Http\Controllers\RapporteurController@storefintransport')->name('storefin.transport');


Route::get('enregistrerhpg/', 'App\Http\Controllers\RapporteurController@createhpg')->name('create.hpg');
Route::get('listehpgsave/', 'App\Http\Controllers\RapporteurController@viewappro')->name('view.hpg');
Route::get('listehpgfin/', 'App\Http\Controllers\RapporteurController@viewfinhpg')->name('viewfin.hpg');


//E  X  P  O  R  T

Route::get('creeatebook/', 'App\Http\Controllers\ExportController@createexport')->name('create.export');
Route::post('creeatebook/','App\Http\Controllers\ExportController@storeexport')->name('store.export');
//Route::get('listeexportsave/', 'App\Http\Controllers\ExportController@viewexport')->name('view.export');
//Route::get('listeexportfin/', 'App\Http\Controllers\ExportController@viewfinexport')->name('export.viewfin');
//Route::get('exportfin/{export_id}/', 'App\Http\Controllers\ExportController@savefinexport')->name('savefin.export');
//Route::post('exportfin/{export_id}/','App\Http\Controllers\ExportController@storefinexport')->name('storefin.export');



Route::get('GeneratePDF', [ServicetransController::class, 'GeneratePDF'])->name('GeneratePDF');

Route::get('/recherche', 'SearchController@search')->name('search');
