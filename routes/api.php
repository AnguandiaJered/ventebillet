<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ MatchController };

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

Route::controller(MatchController::class)->group(function () {
    Route::get('/match', 'index')->name('match.index');
    Route::post('/match', 'store')->name('match.store');
    Route::get('/match/{id}', 'edit')->name('match.edit');
    Route::post('/match/update', 'update')->name('match.update');
    Route::get('/match/{id}', 'destroy')->name('match.destroy');
});