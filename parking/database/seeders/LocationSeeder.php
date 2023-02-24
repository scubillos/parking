<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\ParkingArea;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleIn;
use Carbon\Carbon;
use Carbon\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = ['Bloque A', 'Bloque B', 'Bloque C'];
        $type = ['motorcycle', 'car'];
        foreach ($locations as $location) {
            foreach (range(1, 10) as $value) {

                DB::table('locations')->insert([
                    "name" => $location. ' '.$value,
                    "parking_area_id" => ParkingArea::where('name',$location)->first()->id,
                    "parking_number" => $value,
                    "status" => rand(0, 2),
                    "type" => $type[rand(0, 1)],
                    "created_by" => User::inRandomOrder()->first()->id,
                    "created_at" => Carbon::today(),
                    "updated_at" => Carbon::today()
                ]);
            }
        }
    }
}
