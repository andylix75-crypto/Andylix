<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreArtisanRequest;
use App\Http\Requests\StoreClientRequest;
use App\Http\Resources\Api\V1\UserResource;
use App\Models\Adresse;
use App\Models\Artisan;
use App\Models\Client;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class Usercontroller extends Controller
{
    function ClientRegister(StoreClientRequest $request)
    {
        $user = User::create($request->validated());
        // $adrresse = Adresse::create(array_merge($request->validated(), ['user_id' => $user->id]));
        // $client = Client::create(['user_id' => $user->id]);
        // $token = $user->createToken('Andylix');

        return response()->json(
            [
                'succes' => 'Client authentifié avec succès !',
                'user' => $user,
                // 'token' => $token->plainTextToken
            ],
            201
        );
    }


    function ArtisanRegister(StoreArtisanRequest $request)
    {
        try {
            $path = null;
            $path_diplome = null;
            $path_identification = null;

            if ($request->hasFile('profil')) {
                $path = $request->file('profil')->store('avatars', 'public');
            }
            if ($request->hasFile('diplome')) {
                $path_diplome = $request->file('diplome')->store('Document/diplome', 'public');
            }
            if ($request->hasFile('identification')) {
                $path_identification = $request->file('identification')->store('Document/identification', 'public');
            }

            $userData = array_merge($request->validated(), ['role' => 'artisan']);
            if ($path) {
                $userData['profil'] = $path;
            }
            $user = User::create($userData);
            $adrresse = Adresse::create(array_merge($request->validated(), ['user_id' => $user->id]));
            $artisan = Artisan::create(array_merge($request->validated(), ['user_id' => $user->id]));
            // Create document record only if at least one file was uploaded
            if ($path_diplome || $path_identification) {
                Document::create([
                    'identification' => $path_identification,
                    'diplome' => $path_diplome,
                    'artisan_id' => $artisan->id,
                ]);
            }
            Auth::login($user, $remember = true);
            $token = $user->createToken('Andylix1');

            return response()->json(
                [
                    'succes' => 'Artisan créée avec succès !',
                    'user' => $user,
                    'token' => $token->plainTextToken,
                    'documents' => [
                        'profil' => $path,
                        'diplome' => $path_diplome,
                        'identification' => $path_identification,
                    ]
                ],
                201
            );
        } catch (\Throwable $th) {
            // Log the exception for debugging
            Log::error($th);

            $message = config('app.debug') ? $th->getMessage() : 'pas d\'access au server!';

            return response()->json(
                [
                    'error' => $message,
                    'status' => 500,
                ],
                500
            );
        }
    }


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Déconnexion réussie. Le cercle est temporairement fermé.']);
    }


    function Login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $user = Auth::user();
            $token = $user->createToken('Andylix');
            return response()->json([
                'message' => 'Vous êtes authentifié.',
                'token' => $token->plainTextToken,
                'user' => $user,
            ], 200);
        }

        return response()->json(['message' => 'Identifiants invalides.'], 401);
    }





    function profil()
    {
        return response()->json(['profil' => new UserResource(Auth::user())], 200);
    }

    function updateProfilClient() {}

    function ArtisanList()
    {
        return response()->json(Artisan::with('user')->get(),200);      
    }
}
