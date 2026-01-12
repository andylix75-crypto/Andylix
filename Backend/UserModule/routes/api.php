<?php

use App\Http\Controllers\Auth\Usercontroller;
use App\Http\Controllers\OtherController\CompetenceController;
use App\Http\Controllers\OtherController\HoraireController;
use App\Http\Controllers\OtherController\LangueController;
use App\Http\Controllers\OtherController\MetierController;
use App\Http\Controllers\OtherController\ZoneServiceController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\Api\V1\Annonce\public\SotreRequest;
use Illuminate\Support\Facades\Route;

Route::post('login', [Usercontroller::class, 'login']);
Route::prefix('register')->group(
    function () {
        Route::post('client', [Usercontroller::class, 'ClientRegister']);
        Route::post('artisan', [Usercontroller::class, 'ArtisanRegister']); //no
    }
);
Route::prefix('user')->middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [Usercontroller::class, 'logout']);
    Route::get('/me', [Usercontroller::class, 'profil']);
    Route::get('/me/update', [Usercontroller::class, 'profil']); //no
});
// Route::group(['prefix' => 'user/', 'middleware' => ['auth:sanctum']], function () {
Route::group(['prefix' => 'user/'], function () {
    Route::get('{user_id}/public/annonces', function ($user_id) {
       return $response = Http::get('http://127.0.0.1:8001/api/user/'.$user_id.'/public/annonces')->json();
    });
    Route::get('{user_id}/public/annonces/{annonce_public}', function ($user_id,$annonce_public) {
      return  $response = Http::get('http://127.0.0.1:8001/api/user/'.$user_id.'/public/annonces/'.$annonce_public)->json();
    });
    Route::post('{user_id}/public/annonces', function (SotreRequest $request,$user_id) {
       return $response = Http::post('http://127.0.0.1:8001/api/user/'.$user_id.'/public/annonces/',$request->validated())->json();
    });
    Route::put('{user_id}/public/annonces/{annonce_public}', function (SotreRequest $request, $user_id,$annonce_public) {
        return $response = Http::put('http://127.0.0.1:8001/api/user/'.$user_id.'/public/annonces/'.$annonce_public,$request->validated())->json();
    });
    Route::delete('{user_id}/public/annonces/{annonce_public}', function ($user_id,$annonce_public) {
        return $response = Http::delete('http://127.0.0.1:8001/api/user/'.$user_id.'/public/annonces/'.$annonce_public)->json();
    });
    Route::get('{user_id}/public/annonces/{annonce_public}/ispublier', function ($user_id,$annonce_public) {
       return $response = Http::get('http://127.0.0.1:8001/api/user/'.$user_id.'/public/annonces/'.$annonce_public)->json();
    });
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


    // Route::post('/', function (Request $request) {
    //     $response = Http::withToken($request->bearerToken())->post('http://service-a:80/api/entities', $request->all());   
    //     return $response->json();
    // }); 
