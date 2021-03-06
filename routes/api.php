<?php

use App\Http\Controllers\AthleteController;
use App\Http\Controllers\FootballPlayerController;
use App\Http\Controllers\FootballPositionController;
use App\Http\Controllers\KarateBeltController;
use App\Http\Controllers\KarateTypeController;
use App\Http\Controllers\KaratecaController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TennisPlayerController;

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

Route::apiResources([
    'athletes' => AthleteController::class,
    'karatecas' => KaratecaController::class,
    'notes' => NoteController::class,
    'sports' => SportController::class,
    'tennis-players' => TennisPlayerController::class
]);

Route::prefix('football')->group(function () {
    Route::resources([
        'players' => FootballPlayerController::class,
        'positions' => FootballPositionController::class
    ]);
});

Route::prefix('karate')->group(function () {
    Route::resources([
        'belts' => KarateBeltController::class,
        'types' => KarateTypeController::class
    ]);
});
