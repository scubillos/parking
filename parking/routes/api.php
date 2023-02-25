<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ReservationListResource;
use App\Http\Resources\ReservationResource;
use App\Http\Resources\LocationResource;
use App\Http\Resources\VehicleResource;
use App\Models\VehicleIn;
use App\Models\Vehicle;
use App\Models\Location;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('reservation', 'App\Http\Controllers\VehicleInController@create');
Route::put('reservation/{id}', 'App\Http\Controllers\VehicleInController@update');
Route::delete('reservation', 'App\Http\Controllers\VehicleInController@destroy');
Route::get('locations/date/{date}/schedule/{schedule}', 'App\Http\Controllers\LocationController@getAvailable');

Route::get('reservations', function () {
    return ReservationListResource::collection(VehicleIn::select('*')->orderBy('id', 'desc')->get());
} );

Route::get('reservation/{id}', function ($id) {
    return new ReservationResource(VehicleIn::findOrFail($id));
} );

Route::get('reservations/vehicle/{vehicle}', function ($vehicle) {
    return ReservationResource::collection(VehicleIn::where("vehicle_id",$vehicle)->get());
} );

Route::get('locations', function () {
    return LocationResource::collection(Location::all());
} );

Route::get('vehicle/plat/{plat}', function ($plat) {
    return new VehicleResource(Vehicle::where('plat_number',$plat)->first());
} );


Route::get('customers', function () {
    return 'Bienvenido al API';
});
