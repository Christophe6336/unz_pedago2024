<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\unz\ProgrammeControlle;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\Auth\Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\PropertyController;
use App\Models\Property;
use App\Http\Requests\PropertyFormRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\ExcellController;
Use App\Imports\PropertyImport;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ChefController;
use App\Models\Role;
use App\Http\Controllers\AfficheController;
use App\Http\Controllers\CahierController;
use App\Http\Controllers\Ressources\BatimentController;
use App\Http\Controllers\Ressources\SalleController;
use App\Http\Controllers\Ressources\FiliereController;
use App\Services\TelegramService;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Http\Controllers\Ressources\UesController;
use App\Http\Controllers\Ressources\UfrController;
use App\Http\Controllers\Ressources\SemestreController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\MaterielEnreController;
use App\Http\Controllers\ProgrammeController;
use App\Imports\ProgrammeImport;
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





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|   dashboard.homepage
    welcome
*/

Route::get('/', function () { return view('public.home'); })->name('home');
Route::get('/register', [RegisterController::class, 'showRegister'])->name('inscription');
Route::post('/register', [RegisterController::class, 'register'])->name('inscripte');

Route::post('/connexion', [LoginController::class, 'redirige'])->name('connexion.store');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/connexion', function () {
        return view('auth.connexion');})->name('connexion');

        Route::get('/homeetudiant',[EtudiantController::class, 'home'])->name('homeetudiant');
        Route::get('/etudiant',[EtudiantController::class, 'index'])->name('etud');
        Route::get('/etudiantre',[EtudiantController::class, 'recherche'])->name('rechercher');
        Route::get('/cahiertexte',[EtudiantController::class, 'cahier'])->name('cahier');
        Route::get('/cahiercreat',[EtudiantController::class, 'cahiercreat'])->name('cahiercreat');
        Route::post('/creer-fiche-seance', [EtudiantController::class, 'creerFicheSeance'])->name('creer_fiche_seance');


        Route::get('/cahier/{id}/edit', [CahierController::class, 'edit'])->name('cahier.edit');
Route::put('/cahier/{cahier}', [CahierController::class, 'update'])->name('cahier.update');
Route::delete('/cahier/{id}', [CahierController::class, 'destroy'])->name('cahier.destroy');
Route::get('/cahierenseignant',[CahierController::class, 'index'])->name('cahierenseignant');
Route::put('/cahiers/{cahier}/valider', [CahierController::class, 'validerCahier'])->name('valider_cahier');
Route::delete('/cahiers/{cahier}', [CahierController::class, 'rejeterCahier'])->name('rejeter_cahier');
Route::get('/cahiermod/{id}/edit', [CahierController::class, 'editer'])->name('editer_cahier');
Route::put('/cahiermodifier/{id}',[CahierController::class, 'updat'] )->name('cahier_update');




        Route::get('/chef',[ChefController::class, 'index'])->name('chef');
        Route::get('/chefre',[ChefController::class, 'recherche'])->name('recherche');
        Route::delete('/chefdes/property/{property}',[ChefController::class, 'supp'])->name('destroy');
        Route::post('/properties/{id}/action', [ChefController::class, 'action'])->name('action');
        Route::get('/setting', [ChefController::class, 'setting'])->name('setting');
        Route::match(['post', 'put'], '/set/{property}/edit', [ChefController::class, 'settingave'])->name('settingave');


        Route::get('/homemodu',[ChefController::class, 'modul'])->name('rehome');
        Route::delete('/suppmod/{module}',[AfficheController::class, 'supmod'])->name('supmod');








    Route::prefix('admin')->name('admin.')->group( function(){

        Route::resource('property', PropertyController::class);

    });

    Route::get('/recherche', [PropertyController::class, 'recherche'])->name('admin.property.recherche');
    Route::post('/valider/{id}',[PropertyController::class, 'statut'])->name('valider');
Route::post('/admin/modules', [PropertyController::class, 'module'])->name('chef.module');
Route::get('/modulo', [PropertyController::class, 'modulo'])->name('mod');
Route::get('/homemod', [PropertyController::class, 'homemod'])->name('homemod');



    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


    Route::post('/importer-excel',[ ExcellController::class,'importExcel'])->name('import.excel');
    Route::get('/liste_utilisateur', [ AfficheController::class,'affiche'])->name('afficheuser');
   Route::delete('/chefsup/{user}',[AfficheController::class, 'destro'])->name('supprimer');
   Route::get('/users/create', [AfficheController::class, 'create'])->name('creer');
   Route::post('/users', [AfficheController::class, 'store'])->name('creat');
   Route::get('/students/create', [AfficheController::class, 'createStudent'])->name('creer_etudiant');
Route::post('/enseignant/store', [AfficheController::class, 'storeEnseignant'])->name('storeEnseignant');
Route::match(['get', 'post'],'/users/{user}/edit', [AfficheController::class, 'update'])->name('modifier');
 Route::get('/edit/{user}',[AfficheController::class, 'edit'])->name('editer');
 Route::put('/users/{user}', [AfficheController::class, 'update'])->name('users.update');
 Route::get('/modmodifie/{module}', [AfficheController::class, 'modumofie'])->name('modmofie');
 Route::put('/modules/{module}',[AfficheController::class, 'maj'])->name('maj');


 Route::get('/homebatiment',[BatimentController::class, 'home'])->name('homebat');

 // Route pour afficher le formulaire de création
 Route::get('/batiments/create', [BatimentController::class, 'create'])->name('batiment.create');

 // Route pour enregistrer un nouveau bâtiment
 Route::post('/batiments', [BatimentController::class, 'store'])->name('batiment.store');

 // Route pour afficher le formulaire de modification
 Route::get('/batiments/{batiment}/edit', [BatimentController::class, 'edit'])->name('batiment.edit');

 // Route pour mettre à jour les informations du bâtiment
 Route::put('/batiments/{batiment}', [BatimentController::class, 'update'])->name('batiment.update');

 // Route pour supprimer un bâtiment
Route::delete('/batiments/{batiment}', [BatimentController::class, 'destroy'])->name('batiment.destroy');





// Routes pour les salles
Route::get('/salles', [SalleController::class, 'index'])->name('salle.index');
Route::get('/salles/create', [SalleController::class, 'create'])->name('salle.create');
Route::post('/salles', [SalleController::class, 'store'])->name('salle.store');
Route::get('/salles/{salle}/edit', [SalleController::class, 'edit'])->name('salle.edit');
Route::put('/salles/{salle}', [SalleController::class, 'update'])->name('salle.update');
Route::delete('/salles/{salle}', [SalleController::class, 'destroy'])->name('salle.destroy');




// Routes pour la création, l'affichage, la modification et la suppression des filières
Route::get('/filieres', [FiliereController::class, 'index'])->name('filieres.index');
Route::get('/filieres/create', [FiliereController::class, 'create'])->name('filieres.create');
Route::post('/filiere', [FiliereController::class, 'store'])->name('filieres.store');
Route::get('/filieres/{filiere}/edit', [FiliereController::class, 'edit'])->name('filieres.edit');
Route::put('/filieres/{filiere}', [FiliereController::class, 'update'])->name('filieres.update');
Route::delete('/filieres/{filiere}', [FiliereController::class, 'destroy'])->name('filieres.destroy');

//Route::get('/api/batiments/{batiment}/salles', [App\Http\Controllers\SalleController::class, 'getSallesByBatiment']);

Route::get('/bot/telegram',  [PropertyController::class, 'teleupdate'])->name('telegram');

// routes/web.php


Route::get('/ues', [UesController::class, 'index'])->name('ues.index');
Route::get('/ues/create', [UesController::class, 'create'])->name('ues.create');
Route::post('/ues', [UesController::class, 'store'])->name('ues.store');
Route::get('/ues/{ues}', [UesController::class, 'show'])->name('ues.show');
Route::get('/ues/{ues}/edit', [UesController::class, 'edit'])->name('ues.edit');
Route::put('/ues/{ues}', [UesController::class, 'update'])->name('ues.update');
Route::delete('/ues/{ues}', [UesController::class, 'destroy'])->name('ues.destroy');


Route::get('/ufrs', [UfrController::class, 'index'])->name('ufrs.index');
Route::get('/ufrs/create', [UfrController::class, 'create'])->name('ufrs.create');
Route::post('/ufrs', [UfrController::class, 'store'])->name('ufrs.store');
Route::get('/ufrs/{ufr}', [UfrController::class, 'show'])->name('ufrs.show');
Route::get('/ufrs/{ufr}/edit', [UfrController::class, 'edit'])->name('ufrs.edit');
Route::put('/ufrs/{ufr}', [UfrController::class, 'update'])->name('ufrs.update');
Route::delete('/ufrs/{ufr}', [UfrController::class, 'destroy'])->name('ufrs.destroy');

Route::get('/semestres', [SemestreController::class, 'index'])->name('semestres.index');
Route::get('/semestres/create', [SemestreController::class, 'create'])->name('semestres.create');
Route::post('/semestres', [SemestreController::class, 'store'])->name('semestres.store');
Route::get('/semestres/{semestre}', [SemestreController::class, 'show'])->name('semestres.show');
Route::get('/semestres/{semestre}/edit', [SemestreController::class, 'edit'])->name('semestres.edit');
Route::put('/semestres/{semestre}', [SemestreController::class, 'update'])->name('semestres.update');
Route::delete('/semestres/{semestre}', [SemestreController::class, 'destroy'])->name('semestres.destroy');


Route::post('/property/{property}/publish', [PropertyController::class, 'publish'] )->name('property.publish');





Route::get('/materials', [MaterielController::class, 'index'])->name('materials.index');
Route::get('/materials/create', [MaterielController::class, 'create'])->name('materiels.create');
Route::post('/materials', [MaterielController::class, 'store'])->name('materials.store');
Route::get('/materials/{material}', [MaterielController::class, 'show'])->name('materials.show');
Route::get('/materialsedit/{material}/edit', [MaterielController::class, 'edit'])->name('materials.edit');
Route::put('/materialsupdate/{material}', [MaterielController::class, 'update'])->name('materials.update');
Route::delete('/materials/{material}', [MaterielController::class, 'destroy'])->name('materials.destroy');


Route::get('/suivi-materiels', [MaterielEnreController::class, 'index'])->name('materiel_enre.index');
Route::post('/suivi-materiels', [MaterielEnreController::class, 'store'])->name('materiel_enre.store');
Route::delete('/suivi-materiels/{materiel_enre}', [MaterielEnreController::class, 'destroy'])->name('materiel-enre.destroy');
Route::get('/materiel-enre/create', [MaterielEnreController::class, 'create'])->name('materiel-enre.create');
Route::get('/materiel-enre/{materiel_enre}/edit', [MaterielEnreController::class, 'edit'])->name('materiel-enre.edit');
Route::post('/materiel-enre/{id}/finish',[MaterielEnreController::class, 'finish'] )->name('materiel-enre.finish');


Route::post('/programmes/import', [ProgrammeController::class, 'import'])->name('programme.import');


Route::post('/export-property/{property}', [ProgrammeController::class, 'exportCsv'])->name('programme.export');



Route::get('admin/properties/calendar', [PropertyController::class, 'calendar'])->name('admin.properties.calendar');
Route::get('admin/properties/events', [PropertyController::class, 'events'])->name('admin.properties.events');
Route::post('admin/properties/store', [PropertyController::class, 'storeEvent'])->name('admin.properties.storeEvent');
Route::post('admin/properties/update', [PropertyController::class, 'updateEvent'])->name('admin.properties.updateEvent');
Route::post('admin/properties/delete', [PropertyController::class, 'deleteEvent'])->name('admin.properties.deleteEvent');


Route::post('/programme/{propertyId}/export', [PropertyController::class, 'generatePDF'])->name('pdf.export');
