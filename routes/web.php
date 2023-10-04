<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\InscrireController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\ValeurController;
use App\Http\Controllers\PersonnePhysiqueController;
use App\Http\Controllers\PersonneMoraleController;

use Illuminate\Support\Facades\Route;

// Route pour colonie
Route::get('/colonie/index', function () {
    return view('colonie/index');
  });






//Route Pour les saisies
Route::get('/saisie', [InscrireController::class, 'saisie']);


Route::get('/', [InscrireController::class, 'index'])->name('accueil');
Route::resource('personne', PersonneController::class);
Route::get('inscrire/create', [InscrireController::class, 'create'])->name('inscrire');
Route::get('inscrire/projet/create/{code_promoteur}', [InscrireController::class, 'createprojet'])->name('inscrire.projet');
Route::get('/poursuivre/inscription', [InscrireController::class, 'createpoursuivre'])->name('poursuivre.inscription');
Route::post('/store/poursuivre', [InscrireController::class, 'poursuivre'])->name('poursuivre.inscrire');
Route::get("recepisse/print/{code}",[InscrireController::class,'genererRecepise'])->name("generer.recepisse");
 
// Route pour récupérer les données du formulaire physique
Route::post('/store', [PersonnePhysiqueController::class, 'store'])->name('personne_physique.create');
//  Route pour récupérer les données du formulaire morale
Route::post('/store/morale', [PersonneMoraleController::class, 'store'])->name('personne_morale.create');
//Route pour récupérer les données du projet
Route::post('/store/projet', [InscrireController::class, 'store'])->name('projet.create');
Route::resource("parametres",ParametreController::class);
Route::resource("valeurs", ValeurController::class);
Route::get('/valeur', [ValeurController::class, 'selection'])->name("valeur.selection");
Route::get('/listeval', [ValeurController::class,"listevakeur"])->name("valeur.listeval");
Route::get('/projets', [InscrireController::class,"liste_projets"])->name("projet.liste");
Route::get('/projet/details/{projet}', [InscrireController::class,"show"])->name("projet.show");
Route::get('telechargerpiece/{piecejointe}', [InscrireController::class,'telecharger'])->name('telechargerpiecejointe');
Route::get('detail/{piecejointe}', [InscrireController::class,'detaildocument'])->name('detaildocument');
Route::post('logout', [InscrireController::class, 'logout'])->name('logout');
Route::post('logout', [InscrireController::class, 'logout'])->name('logout');
Route::get('projet/statistiques',[InscrireController::class,'statistique'])->name('statistique');
Route::get('projet/resume/{projet}',[InscrireController::class,'resume'])->name('resume');
Route::get('projet/generer/liste',[InscrireController::class,'generer_liste'])->name('projet.generer_liste');

//Update pour evaluation
Route::get('generer/liste/projet_preselectionne',[InscrireController::class,'generer_liste_preselectionne'])->name("projet.preselectionnes");
Route::get('annuler/preslection/projet',[InscrireController::class,'annuler_liste_preselectionne'])->name("projet.annulerpreselection");


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [InscrireController::class,'accueil_admin'])->name('dashboard');
});
