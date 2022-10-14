<?php

use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\auth;
use App\Http\Controllers\BonCommandeController;
use App\Http\Controllers\BonLivraisonController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\CommerciauxController;
use App\Http\Controllers\ConditionReglementController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\FacturedetailController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ModeReglementController;
use App\Http\Controllers\MonnaieController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\ProformatController;
use App\Http\Controllers\ProspectController;
use App\Http\Controllers\ProspecteurController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RetourController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\TvaController;
use App\Http\Controllers\UtilisateurController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware'=>['auth:sanctum']],function(){


});
// Authentication
Route::post('/auth/login',[auth::class,'login']);

// PUBLICS
Route::post('/agences',[AgenceController::class,'store']);
Route::put('/agences/{id}',[AgenceController::class,'update']);
Route::delete('/agences/{id}',[AgenceController::class,'delete']);
Route::get('/agences/{id}',[AgenceController::class,'find']);
Route::get('/agences',[AgenceController::class,'index']);

Route::post('/articles',[ArticleController::class,'store']);
Route::put('/articles/{id}',[ArticleController::class,'update']);
Route::delete('/articles/{id}',[ArticleController::class,'delete']);
Route::get('/articles/{id}',[ArticleController::class,'find']);
Route::get('/articles',[ArticleController::class,'index']);

Route::post('/bon_commandes',[BonCommandeController::class,'store']);
Route::put('/bon_commandes/{id}',[BonCommandeController::class,'update']);
Route::delete('/bon_commandes/{id}',[BonCommandeController::class,'delete']);
Route::get('/bon_commandes/{id}',[BonCommandeController::class,'find']);
Route::get('/bon_commandes',[BonCommandeController::class,'index']);

Route::post('/bon_livraisons',[BonLivraisonController::class,'store']);
Route::put('/bon_livraisons/{id}',[BonLivraisonController::class,'update']);
Route::delete('/bon_livraisons/{id}',[BonLivraisonController::class,'delete']);
Route::get('/bon_livraisons/{id}',[BonLivraisonController::class,'find']);
Route::get('/bon_livraisons',[BonLivraisonController::class,'index']);

Route::group(['prefix'=>'categories'],function(){
    Route::post('/',[CategorieController::class,'store']);
    Route::put('/{id}',[CategorieController::class,'update']);
    Route::delete('/{id}',[CategorieController::class,'delete']);
    Route::get('/{id}',[CategorieController::class,'find']);
    Route::get('/',[CategorieController::class,'index']);
    Route::get('/parents/list',[CategorieController::class,'parents_categories']);
    Route::get('/childs/{idparent}',[CategorieController::class,'child_categories']);
});




Route::post('/clients',[ClientController::class,'store']);
Route::put('/clients/{id}',[ClientController::class,'update']);
Route::delete('/clients/{id}',[ClientController::class,'delete']);
Route::get('/clients/{id}',[ClientController::class,'find']);
Route::get('/clients',[ClientController::class,'index']);

Route::post('/commerciaux',[CommerciauxController::class,'store']);
Route::put('/commerciaux/{id}',[CommerciauxController::class,'update']);
Route::delete('/commerciaux/{id}',[CommerciauxController::class,'delete']);
Route::get('/commerciaux/{id}',[CommerciauxController::class,'find']);
Route::get('/commerciaux',[CommerciauxController::class,'index']);

Route::post('/condition_reglements',[ConditionReglementController::class,'store']);
Route::put('/condition_reglements/{id}',[ConditionReglementController::class,'update']);
Route::delete('/condition_reglements/{id}',[ConditionReglementController::class,'delete']);
Route::get('/condition_reglements/{id}',[ConditionReglementController::class,'find']);
Route::get('/condition_reglements',[ConditionReglementController::class,'index']);

Route::post('/factures',[FactureController::class,'store']);
Route::put('/factures/{id}',[FactureController::class,'update']);
Route::delete('/factures/{id}',[FactureController::class,'delete']);
Route::get('/factures/{id}',[FactureController::class,'find']);
Route::get('/factures',[FactureController::class,'index']);

Route::post('/fournisseurs',[FournisseurController::class,'store']);
Route::put('/fournisseurs/{id}',[FournisseurController::class,'update']);
Route::delete('/fournisseurs/{id}',[FournisseurController::class,'delete']);
Route::get('/fournisseurs/{id}',[FournisseurController::class,'find']);
Route::get('/fournisseurs',[FournisseurController::class,'index']);

Route::post('/marques',[MarqueController::class,'store']);
Route::put('/marques/{id}',[MarqueController::class,'update']);
Route::delete('/marques/{id}',[MarqueController::class,'delete']);
Route::get('/marques/{id}',[MarqueController::class,'find']);
Route::get('/marques',[MarqueController::class,'index']);

Route::post('/menus',[MenuController::class,'store']);
Route::put('/menus/{id}',[MenuController::class,'update']);
Route::delete('/menus/{id}',[MenuController::class,'delete']);
Route::get('/menus/{id}',[MenuController::class,'find']);
Route::get('/menus',[MenuController::class,'index']);

Route::post('/mode_reglements',[ModeReglementController::class,'store']);
Route::put('/mode_reglements/{id}',[ModeReglementController::class,'update']);
Route::delete('/mode_reglements/{id}',[ModeReglementController::class,'delete']);
Route::get('/mode_reglements/{id}',[ModeReglementController::class,'find']);
Route::get('/mode_reglements',[ModeReglementController::class,'index']);

Route::post('/monnaies',[MonnaieController::class,'store']);
Route::put('/monnaies/{id}',[MonnaieController::class,'update']);
Route::delete('/monnaies/{id}',[MonnaieController::class,'delete']);
Route::get('/monnaies/{id}',[MonnaieController::class,'find']);
Route::get('/monnaies',[MonnaieController::class,'index']);

Route::post('/pays',[PaysController::class,'store']);
Route::put('/pays/{id}',[PaysController::class,'update']);
Route::delete('/pays/{id}',[PaysController::class,'delete']);
Route::get('/pays/{id}',[PaysController::class,'find']);
Route::get('/pays',[PaysController::class,'index']);

Route::post('/proformats',[ProformatController::class,'store']);
Route::put('/proformats/{id}',[ProformatController::class,'update']);
Route::delete('/proformats/{id}',[ProformatController::class,'delete']);
Route::get('/proformats/{id}',[ProformatController::class,'find']);
Route::get('/proformats',[ProformatController::class,'index']);

Route::post('/prospects',[ProspectController::class,'store']);
Route::put('/prospects/{id}',[ProspectController::class,'update']);
Route::delete('/prospects/{id}',[ProspectController::class,'delete']);
Route::get('/prospects/{id}',[ProspectController::class,'find']);
Route::get('/prospects',[ProspectController::class,'index']);

Route::post('/prospecteurs',[ProspecteurController::class,'store']);
Route::put('/prospecteurs/{id}',[ProspecteurController::class,'update']);
Route::delete('/prospecteurs/{id}',[ProspecteurController::class,'delete']);
Route::get('/prospecteurs/{id}',[ProspecteurController::class,'find']);
Route::get('/prospecteurs',[ProspecteurController::class,'index']);

Route::post('/rayons',[RayonController::class,'store']);
Route::put('/rayons/{id}',[RayonController::class,'update']);
Route::delete('/rayons/{id}',[RayonController::class,'delete']);
Route::get('/rayons/{id}',[RayonController::class,'find']);
Route::get('/rayons',[RayonController::class,'index']);

Route::post('/retours',[RetourController::class,'store']);
Route::put('/retours/{id}',[RetourController::class,'update']);
Route::delete('/retours/{id}',[RetourController::class,'delete']);
Route::get('/retours/{id}',[RetourController::class,'find']);
Route::get('/retours',[RetourController::class,'index']);

Route::post('/suggestions',[SuggestionController::class,'store']);
Route::put('/suggestions/{id}',[SuggestionController::class,'update']);
Route::delete('/suggestions/{id}',[SuggestionController::class,'delete']);
Route::get('/suggestions/{id}',[SuggestionController::class,'find']);
Route::get('/suggestions',[SuggestionController::class,'index']);

Route::post('/tva',[TvaController::class,'store']);
Route::put('/tva/{id}',[TvaController::class,'update']);
Route::delete('/tva/{id}',[TvaController::class,'delete']);
Route::get('/tva/{id}',[TvaController::class,'find']);
Route::get('/tva',[TvaController::class,'index']);

Route::post('/utilisateurs',[UtilisateurController::class,'store']);
Route::put('/utilisateurs/{id}',[UtilisateurController::class,'update']);
Route::delete('/utilisateurs/{id}',[UtilisateurController::class,'delete']);
Route::get('/utilisateurs/{id}',[UtilisateurController::class,'find']);
Route::get('/utilisateurs',[UtilisateurController::class,'index']);

Route::post('/roles',[RoleController::class,'store']);
Route::put('/roles/{id}',[RoleController::class,'update']);
Route::delete('/roles/{id}',[RoleController::class,'delete']);
Route::get('/roles/{id}',[RoleController::class,'find']);
Route::get('/roles',[RoleController::class,'index']);
