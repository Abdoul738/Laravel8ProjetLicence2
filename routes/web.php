<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SallesController;
use App\Http\Controllers\FilieresController;
use App\Http\Controllers\EnseignantsController;
use App\Http\Controllers\MatieresController;
use App\Models\Enseignant;
use App\Models\Salle;


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

Route::get('enseignants', [EnseignantsController::class, 'index'])->name("enseignants");
Route::post('enseignants', [EnseignantsController::class, 'store'])->name("enseignantsSave");
Route::post('enseignants/delete', [EnseignantsController::class, 'destroy'])->name("enseignantsDelete");
Route::post('enseignants/{id}', [EnseignantsController::class, 'update'])->name("updateEnseignants");


Route::get('salles', [SallesController::class, 'index'])->name("salles");
Route::post('salles', [SallesController::class, 'store'])->name("sallesSave");
Route::post('salles/delete', [SallesController::class, 'destroy'])->name("sallesDelete");
Route::post('salles/{id}', [SallesController::class, 'update'])->name("updateSalles");


Route::get('filieres', [FilieresController::class, 'index'])->name("filieres");
Route::post('filieres', [FilieresController::class, 'store'])->name("filieresSave");
Route::post('filieres/delete', [FilieresController::class, 'destroy'])->name("filieresDelete");
Route::post('filieres/{id}', [FilieresController::class, 'update'])->name("updateFilieres");


Route::get('matieres', [MatieresController::class, 'index'])->name("matieres");
Route::post('matieres', [MatieresController::class, 'store'])->name("matieresSave");
Route::post('matieres/delete', [MatieresController::class, 'destroy'])->name("matieresDelete");
Route::post('matieres/{id}', [MatieresController::class, 'update'])->name("updateMatieres");
/*
Route::resource('filieres',FilieresController::class);
*/