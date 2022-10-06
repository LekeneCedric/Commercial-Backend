<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\auth;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\FacturedetailController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\RetourController;
use App\Http\Controllers\SuggestionController;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Authentication
Route::post('/register',[auth::class,'register']);
Route::post('/login',[auth::class,'login']);
Route::post('/logout',[auth::class,'logout']);

// UTILISATEURS 
Route::get('/utilisateurs',[utilisateur::class,'index']);

// COMMERCIAUX
Route::get('/commercialProfil/{id_commercial}',[CommercialController::class,'commercialProfil']);
Route::get('/commerciaux',[CommercialController::class,'index']);
Route::get('/commerciaux/{id}',[CommercialController::class,'find']);
Route::get('/facturesCommercial/{id}',[CommercialController::class,'facturesCommercial']);
Route::get('/nombres_clientsCommercial/{id}',[CommercialController::class,'nombre_clientsCommercial']);
Route::get('/clientsCommercial/{id}',[CommercialController::class,'clientsCommercial']);
Route::get('/nombre_facturesCommercial/{id}',[CommercialController::class,'nombre_facturesCommercial']);
Route::get('/articlesVendusCommercial/{id}',[CommercialController::class,'articlesVendusCommercial']);
Route::post('/commerciaux',[CommercialController::class,'store']);
Route::put('/commerciaux/{id}',[CommercialController::class,'put']);
Route::delete('/commerciaux/{id}',[CommercialController::class,'delete']);

// FACTURE
Route::get('/factures',[FactureController::class,'index']);
Route::get('/factures/{id}',[FactureController::class,'find']);
Route::post('/factures',[FactureController::class,'store']);
Route::put('/factures/{id}',[FactureController::class,'update']);
Route::delete('/factures/{id}',[FactureController::class,'delete']);

//CLIENT
Route::get('/clients',[ClientController::class,'index']);
Route::get('/clients/{id}',[ClientController::class,'find']);
Route::get('/facturesClient/{id_client}',[ClientController::class,'facturesClient']);
Route::post('/clients',[ClientController::class,'store']);
Route::put('/clients/{id}',[ClientController::class,'update']);
Route::delete('/clients/{id}',[ClientController::class,'delete']);

//ARTICLE
Route::get('/articles',[ArticleController::class,'index']);
Route::get('/articles/{id}',[ArticleController::class,'find']);
Route::post('/articles',[ArticleController::class,'store']);
Route::put('/articles/{id}',[ArticleController::class,'update']);
Route::delete('/articles/{id}',[ArticleController::class,'delete']);

//RETOUR_CLIENT
Route::get('/retours',[RetourController::class,'index']);
Route::get('/retours/{id}',[RetourController::class,'find']);
Route::post('/retours',[RetourController::class,'store']);
Route::put('/retours/{id}',[RetourController::class,'update']);
Route::delete('/retours/{id}',[RetourController::class,'delete']);

//SUGGESTION_CLIENT
Route::get('/suggestions',[SuggestionController::class,'index']);
Route::get('/suggestions/{id}',[SuggestionController::class,'find']);
Route::get('/suggestionsClient/{id_client}',[SuggestionController::class,'suggestionsClient']);
Route::get('/retourClient/{id_client}',[SuggestionController::class,'retourClient']); 
Route::post('/suggestions',[SuggestionController::class,'store']);
Route::put('/suggestions/{id}',[SuggestionController::class,'update']);
Route::delete('/suggestions/{id}',[SuggestionController::class,'delete']);

//CATEGORIE
Route::get('/categories',[CategorieController::class,'index']);
Route::get('/categories/{id}',[CategorieController::class,'find']);
Route::post('/categories',[CategorieController::class,'store']);
Route::put('/categories/{id}',[CategorieController::class,'update']);
Route::delete('/categories/{id}',[CategorieController::class,'delete']);

//FOURNISSEUR
Route::get('/fournisseurs',[FournisseurController::class,'index']);
Route::get('/fournisseurs/{id}',[FournisseurController::class,'find']);
Route::post('/fournisseurs',[FournisseurController::class,'store']);
Route::put('/fournisseurs/{id}',[FournisseurController::class,'update']);
Route::delete('/fournisseurs/{id}',[FournisseurController::class,'delete']);

//MARQUE
Route::get('/marques',[MarqueController::class,'index']);
Route::get('/marques/{id}',[MarqueController::class,'find']);
Route::post('/marques',[MarqueController::class,'store']);
Route::put('/marques/{id}',[MarqueController::class,'update']);
Route::delete('/marques/{id}',[MarqueController::class,'delete']);

//MEDIA
Route::get('/medias',[MediaController::class,'index']);
Route::get('/medias/{id}',[MediaController::class,'find']);
Route::post('/medias',[MediaController::class,'store']);
Route::delete('/medias/{id}',[MediaController::class,'delete']);

//FACTURE_DETAIL
Route::get('/facture_details',[FacturedetailController::class,'index']);
Route::get('/facture_details/{id}',[FacturedetailController::class,'find']);
Route::post('/facture_details',[FacturedetailController::class,'store']);
Route::put('/facture_details/{id}',[FacturedetailController::class,'update']);
Route::delete('/facture_details/{id}',[FacturedetailController::class,'delete']);


