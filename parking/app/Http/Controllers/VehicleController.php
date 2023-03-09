<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use Illuminate\Http\Response;

class VehicleController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     *
     * @param  \Illuminate\Http\Request $requestpublicaciones
     * @return \Illuminate\Http\Response
     */
    public function showByPlatNumber($plat)
    {
        try {
            $vehicle = new VehicleResource(Vehicle::where('plat_number',$plat)->first());
            return response($vehicle);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => [ 'No existe la placa' ]]);
        }
    }

    /**
     * @return Response
     */
    public function getAll() : Response
    {
        $vehicles = VehicleResource::collection(Vehicle::all());

        return response($vehicles);
    }

}
