<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ EquipeController, ChampionsController, ClientController, LoginController };
use App\Http\Controllers\{ MatchController, PaiementController, StadeController, UserController };
use App\Http\Controllers\{ VenteController, DashboardController };

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

Route::controller(EquipeController::class)->group(function () {
    Route::get('/equipe', 'index')->name('equipe.index');
    Route::post('/equipe', 'store')->name('equipe.store');
    Route::get('/equipe/{id}', 'edit')->name('equipe.edit');
    Route::post('/equipe/update', 'update')->name('equipe.update');
    Route::get('/equipe/{id}', 'destroy')->name('equipe.destroy');
});

Route::controller(ChampionsController::class)->group(function () {
    Route::get('/champions', 'index')->name('champions.index');
    Route::post('/champions', 'store')->name('champions.store');
    Route::get('/champions/{id}', 'edit')->name('champions.edit');
    Route::post('/champions/update', 'update')->name('champions.update');
    Route::get('/champions/{id}', 'destroy')->name('champions.destroy');
});

Route::controller(ClientController::class)->group(function () {
    Route::get('/client', 'index')->name('client.index');
    Route::post('/client', 'store')->name('client.store');
    Route::get('/client/{id}', 'edit')->name('client.edit');
    Route::post('/client/update', 'update')->name('client.update');
    Route::get('/client/{id}', 'destroy')->name('client.destroy');
});

Route::controller(MatchController::class)->group(function () {
    Route::get('/match', 'index')->name('match.index');
    Route::post('/match', 'store')->name('match.store');
    Route::get('/match/{id}', 'edit')->name('match.edit');
    Route::post('/match/update', 'update')->name('match.update');
    Route::get('/match/{id}', 'destroy')->name('match.destroy');
});

Route::controller(PaiementController::class)->group(function () {
    Route::get('/paiement', 'index')->name('paiement.index');
    Route::post('/paiement', 'store')->name('paiement.store');
    Route::get('/paiement/{id}', 'edit')->name('paiement.edit');
    Route::post('/paiement/update', 'update')->name('paiement.update');
    Route::delete('/paiement/{id}', 'destroy')->name('paiement.destroy');
});

Route::controller(StadeController::class)->group(function () {
    Route::get('/stade', 'index')->name('stade.index');
    Route::post('/stade', 'store')->name('stade.store');
    Route::get('/stade/{id}', 'edit')->name('stade.edit');
    Route::post('/stade/update', 'update')->name('stade.update');
    Route::get('/stade/{id}', 'destroy')->name('stade.destroy');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users.index');
    Route::post('/users', 'store')->name('users.store');
    Route::get('/users/{id}', 'edit')->name('users.edit');
    Route::post('/users/update', 'update')->name('users.update');
    Route::get('/users/{id}', 'destroy')->name('users.destroy');
});

Route::controller(VenteController::class)->group(function () {
    Route::get('/vente', 'index')->name('vente.index');
    Route::post('/vente', 'store')->name('vente.store');
    Route::get('/vente/{id}', 'edit')->name('vente.edit');
    Route::post('/vente/update', 'update')->name('vente.update');
    Route::get('/vente/{id}', 'destroy')->name('vente.destroy');
});


Route::get('/login', [ LoginController::class,'index'])->name('login');
Route::get('/register', [ LoginController::class,'registe'])->name('register.index');
Route::post('/forgot-password', [ LoginController::class,'forgotpassword'])->name('forgot-password');
Route::post('/register', [ LoginController::class,'register'])->name('register');
Route::post('/login', [ LoginController::class,'login'])->name('auth.login');

Route::get('/', [DashboardController::class,'index'])->middleware(['auth'])->name('home');

Route::get('/report-client', [DashboardController::class,'reportclient'])->name('reportclient');
Route::get('/report-user', [DashboardController::class,'reportuser'])->name('reportuser');
Route::get('/report-stade', [DashboardController::class,'reportstade'])->name('reportstade');
Route::get('/report-equipe', [DashboardController::class,'reportequipe'])->name('reportequipe');
Route::get('/report-vente', [DashboardController::class,'reportvente'])->name('reportvente');
Route::get('/report-champions', [DashboardController::class,'reportchampions'])->name('reportchampions');
Route::get('/report-paiement', [DashboardController::class,'reportpaiement'])->name('reportpaiement');
Route::get('/report-match', [DashboardController::class,'reportmatch'])->name('reportmatch');
Route::get('/report-billet', [DashboardController::class,'billet'])->name('billet');
