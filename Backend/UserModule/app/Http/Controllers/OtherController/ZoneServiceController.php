<?php

namespace App\Http\Controllers\OtherController;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtherRequest\ZoneServiceRequest;
use App\Models\ZoneService;
use Illuminate\Http\Request;

class ZoneServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return response()->json(
                [
                    'Zone_Service' => ZoneService::paginate(10),
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
    public function store(ZoneServiceRequest $request)
    {
         try {
            ZoneService::create($request->validated());
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
    public function show(ZoneService $zoneService)
    {
         try {
            return response()->json([
                'zone_services' => $zoneService,
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
    public function update(ZoneServiceRequest $request, ZoneService $zoneService)
    {
          try {
            $zoneService->updateOrFail($request->validated());
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
    public function destroy(ZoneService $zoneService)
    {
         try {
            $zoneService->delete();
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
