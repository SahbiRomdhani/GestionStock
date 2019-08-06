<?php

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

Auth::routes();
/** Notification */
Route::get('/maskasread', function () {
    $user = Auth::user();
    $user->unreadNotifications->markAsRead();
    return redirect()->back();
    
})->name('maskasread');
Route::get('/Readnotification', 'HomeController@readnot')->name('ajaxread');

Route::get('/notification','HomeController@notification');

/** */
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/produit','ProduitController');
Route::resource('/magasin','MagasinController');
Route::resource('/fournisseur','FournisseurController');
Route::resource('/produitstock','ProduitStockController');
Route::resource('/bentree','BentreController');
Route::resource('/produitachat','ProduitDemandeAchatController');
Route::resource('/bsortie','BsortieController');
Route::resource('/produitsortie','ProduitSortieController');
Route::resource('/demandereap','DemandereapController');
Route::resource('/produitreap', 'ProduitReapController');

/**
 * 
 */
Route::get('/createstock/{id}/{type}', 'ProduitStockController@createstock')->name('stockprod');
Route::post('/getproduit', 'ProduitStockController@fillproduit');
Route::post('/stock/store/', 'ProduitStockController@storestock')->name('stockprod.store');

/**----------------------- */
/**
 * Livrainon Facture
 */
Route::resource('/facture', 'LivraisonFactureController');
Route::post('/facture/produitstock', 'LivraisonFactureController@storelivraisonproduit')->name('livraion.stockproduit');


/**.----------------------------- */

/**
 * Demande Achat 
 */
Route::resource('/achat', 'AchatController');
Route::post('/achat/storedemande', 'AchatController@storeachat')->name('store.demande.achat');
Route::post('/achat/produit', 'AchatController@getproducts')->name('produitachat');
Route::post('/achat/fournnisseur', 'AchatController@getfournisseurs')->name('fournnisseurachat');


/** ---------- */


/*Ajax CRUD */
Route::get('/ajax','AjaxProdController@index');
Route::get('/ajax/read/','AjaxProdController@readData');
Route::post('/ajax/store', 'AjaxProdController@store');
Route::post('/ajax/destroy', 'AjaxProdController@destroy');

