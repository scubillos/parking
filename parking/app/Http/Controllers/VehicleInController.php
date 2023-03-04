<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReservationResource;
use App\Models\VehicleIn;
use Illuminate\Http\Request;
use App\Services\VehicleInService;
use PHPUnit\Util\Exception;
use Validator;

class VehicleInController extends Controller
{

    /**
     * ShipmentService $service
     * @var service
     */
    protected $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VehicleInService $service)
    {
        $this->service = $service;
    }
    /**
     *      *
     * @param  \Illuminate\Http\Request $requestpublicaciones
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        try {
            $vehicle = VehicleIn::findOrFail($id);
            return response($vehicle);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => [ 'No existe la reserva' ]]);
        }
    }

    public function getVehicle($vehicle)
    {
        try {
            $vehicle_obj = VehicleIn::where("vehicle_id",$vehicle)->get();
            if (count($vehicle_obj) != 0) {
                return ReservationResource::collection($vehicle_obj);
            } else {
                throw new Exception('No se ha encontrado el vehículo');
            }
        } catch (\Exception $e ) {
            return response(['status' => 'error', 'message' => [ $e->getMessage() ] ], 404);
        }
    }

    public function create(Request $request)
    {
        $data = $request->toArray();
        $validator = Validator::make($data, $this->service::reservationRules());

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()], 400);
        }

        try {
            return response($this->service->reservation($data));
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => [ "Reservation: " . $e->getMessage() ] ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->toArray();
        $validator = Validator::make($data, $this->service::reservationUpdateRules());

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()], 400);
        }

        try {
            return response($this->service->reservationUpdate($data,$id));
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => [ "Reservation: " . $e->getMessage() ] ], 400);
        }
    }

    public function destroy(Request $request)
    {
        $data = $request->toArray();

        $validator = Validator::make($data, $this->service::reservationUpdateRules());

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()], 400);
        }

        try {
            return response($this->service->reservationUpdate($data));
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => [ "Reservation: " . $e->getMessage()] ], 400);
        }
    }
}
