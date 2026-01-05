<?php

namespace App\Http\Controllers\OtherController;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtherRequest\StoreLangueRequest;
use App\Http\Requests\OtherRequest\UpdateLangueRequest;
use App\Models\Langue;
use Illuminate\Http\Request;

class LangueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return response()->json(
                [
                    'langues' => Langue::paginate(10),
                    'status' => 200
                ]
            );
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'erreur de serveur',
                'status' => 500
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLangueRequest $request)
    {
        try {
            Langue::create($request->validated());
            return response()->json([
                'message' => 'resource enregistrer avec succes',
                'status' => 201
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'erreur de serveur',
                'status' => 500
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Langue $langue)
    {
         try {
            return response()->json([
                'langue' => $langue,
                'status' => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'erreur de serveur',
                'status' => 500
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLangueRequest $request, Langue $langue)
    {
         try {
            $langue->updateOrFail($request->validated());
            return response()->json([
                'message' => 'Mise a jour avec succes',
                'status' => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'erreur de serveur',
                'status' => 500
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Langue $langue)
    {
          try {
            $langue->delete();
            return response()->json([
                'message' => 'resource supprimée avec succes',
                'status' => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'erreur de serveur',
                'status' => 500
            ]);
        }
    }
    
}
