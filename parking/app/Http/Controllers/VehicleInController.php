<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VehicleInService;
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

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
            return response(['status' => 'error', 'message' => "Reservation: " . $e->getMessage()], 400);
        }
    }

    public function update(Request $request)
    {
        $data = $request->toArray();
        $validator = Validator::make($data, $this->service::reservationUpdateRules());

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->errors()], 400);
        }

        try {
            return response($this->service->reservationUpdate($data));
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => "Reservation: " . $e->getMessage()], 400);
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
            return response(['status' => 'error', 'message' => "Reservation: " . $e->getMessage()], 400);
        }
    }
}
