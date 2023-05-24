<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use App\Services\VehicleService;
use Illuminate\Http\Response;

class VehicleController extends Controller
{
    private $vehiclesService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VehicleService $vehiclesService)
    {
        $this->vehiclesService = $vehiclesService;
    }

    /**
     *
     * @param  \Illuminate\Http\Request $requestpublicaciones
     * @return \Illuminate\Http\Response
     */
    public function showByPlatNumber($plat)
    {
        try {
            $vehicle = $this->vehiclesService->getAll()->where('plat_number', $plat)->first();
            if ($vehicle) {
                return response($vehicle);
            } else {
                throw New \Exception('No existe la placa');
            }
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => [ 'No existe la placa' ]]);
        }
    }

    /**
     * @return Response
     */
    public function getAll() : Response
    {
        try {
            $vehicles = $this->vehiclesService->getAll();

            return response($vehicles);
        } catch (\Exception $e) {
            return \response([
               'message' => $e->getMessage(),
               'code' => $e->getCode(),
               'line' => $e->getLine()
            ]);
        }
    }

}
