<?php

namespace App\Http\Controllers\OtherController;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtherRequest\StoreCompetenceRequest;
use App\Http\Requests\OtherRequest\UpdateCompetenceRequest;
use App\Models\Competences;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return response()->json(
                [
                    'competences' => Competences::paginate(10),
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
    public function store(StoreCompetenceRequest $request)
    {
        try {
            Competences::create($request->validated());
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
    public function show(Competences $competence)
    {
        try {
            return response()->json([
                'competenses' => $competence,
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
    public function update(UpdateCompetenceRequest $request, Competences $competence)
    {
        try {
            $competence->updateOrFail($request->validated());
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
    public function destroy(Competences $competence)
    {
        try {
            $competence->delete();
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
