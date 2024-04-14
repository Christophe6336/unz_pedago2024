<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\unz\ProgrammeController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\Auth\Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\PropertyController;
use App\Models\Property;
use App\Http\Requests\PropertyFormRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\ExcellController;
Use App\Imports\PropertyImport;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ChefController;
use App\Models\Role;
use App\Http\Controllers\AfficheController;

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

        Route::get('/etudiant',[EtudiantController::class, 'index'])->name('etud');
        Route::get('/etudiant',[EtudiantController::class, 'recherche'])->name('rechercher');



        Route::get('/chef',[ChefController::class, 'index'])->name('chef');
        Route::get('/chefre',[ChefController::class, 'recherche'])->name('recherche');
        Route::delete('/chefdes',[ChefController::class, 'destroy'])->name('destroy');




    Route::prefix('admin')->name('admin.')->group( function(){

        Route::resource('property', PropertyController::class);

    });

    Route::get('/recherche', [PropertyController::class, 'recherche'])->name('admin.property.recherche');

    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


    Route::post('/importer-excel',[ ExcellController::class,'importExcel'])->name('import.excel');

    //Route::get('/liste' , [ ChefAdController::class,'index'])->name('utilisateur');
    //Route::get('/list' , [ ChefAdController::class,'assignRole'])->name('utilisateure');
    Route::get('/liste_utilisateur', [ AfficheController::class,'affiche'])->name('afficheuser');
   Route::delete('/chefsup/{user}',[AfficheController::class, 'destro'])->name('supprimer');
   Route::get('/users/create', [AfficheController::class, 'create'])->name('creer');
   Route::post('/users', [AfficheController::class, 'store'])->name('creat');



 Route::match(['get', 'post'],'/users/{user}/edit', [AfficheController::class, 'update'])->name('modifier');
 Route::get('/edit/{user}',[AfficheController::class, 'edit'])->name('editer');









