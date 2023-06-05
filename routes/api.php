<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ EquipeController };

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

Route::controller(EquipeController::class)->group(function () {
    Route::get('/equipe', 'index')->name('equipe.index');
    Route::post('/equipe', 'store')->name('equipe.store');
    Route::get('/equipe/{id}', 'edit')->name('equipe.edit');
    Route::post('/equipe/{id}', 'update')->name('equipe.update');
    Route::delete('/equipe/{id}', 'destroy')->name('equipe.destroy');
});