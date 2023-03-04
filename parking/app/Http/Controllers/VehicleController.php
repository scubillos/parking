<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReservationResource;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use App\Models\VehicleIn;
use App\Services\VehicleInService;
use Illuminate\Http\Request;
use PHPUnit\Util\Exception;
use Validator;

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

}
