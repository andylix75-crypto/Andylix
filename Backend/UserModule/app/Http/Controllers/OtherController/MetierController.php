<?php

namespace App\Http\Controllers\OtherController;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtherRequest\StoreMetierRequest;
use App\Http\Requests\OtherRequest\UpdateMetierRequest;
use App\Models\Metier;
use Illuminate\Http\Request;

class MetierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         try {
            return response()->json(
                [
                    'competences' => Metier::paginate(10),
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
    public function store(StoreMetierRequest $request)
    {
         try {
            Metier::create($request->validated());
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
    public function show(Metier $metier)
    {
         try {
            return response()->json([
                'metier' => $metier,
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
    public function update(UpdateMetierRequest $request, Metier $metier)
    {
         try {
            $metier->updateOrFail($request->validated());
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
    public function destroy(Metier $metier)
    {
         try {
            $metier->delete();
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
