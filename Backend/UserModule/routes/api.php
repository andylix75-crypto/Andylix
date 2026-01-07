<?php

use App\Http\Controllers\Auth\Usercontroller;
use App\Http\Controllers\OtherController\CompetenceController;
use App\Http\Controllers\OtherController\HoraireController;
use App\Http\Controllers\OtherController\LangueController;
use App\Http\Controllers\OtherController\MetierController;
use App\Http\Controllers\OtherController\ZoneServiceController;
use Illuminate\Support\Facades\Route;

Route::post('login', [Usercontroller::class, 'login']);
Route::prefix('register')->group(
    function () {
        Route::post('client', [Usercontroller::class, 'ClientRegister']);
        Route::post('artisan', [Usercontroller::class, 'ArtisanRegister']);//no
    }
);
Route::prefix('user')->middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [Usercontroller::class, 'logout']);
    Route::get('/profil', [Usercontroller::class, 'profil']);
    Route::get('/profil/update', [Usercontroller::class, 'profil']); //no
});


Route::prefix('dashboard')->middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('competences', CompetenceController::class);
    Route::apiResource('metiers', MetierController::class);
    Route::apiResource('langues', LangueController::class);
    Route::apiResource('zoneServices', ZoneServiceController::class);
});

// horaires imbriqués pour un artisan — protégés par Sanctum si besoin
Route::apiResource('{artisan}/horaires', HoraireController::class);

// public routes
Route::prefix('public')->group(function () {
    Route::get('artisans', [Usercontroller::class, 'ArtisanList']);
    Route::apiResource('competences', CompetenceController::class)->only('index');
    Route::apiResource('metiers', MetierController::class)->only('index');
    Route::apiResource('langues', LangueController::class)->only('index');
    Route::apiResource('zoneServices', ZoneServiceController::class)->only('index');
});
