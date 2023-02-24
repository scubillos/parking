<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleIn;
use Carbon\Carbon;
use Carbon\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParkingAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = ['Bloque A', 'Bloque B', 'Bloque C'];

        foreach ($areas as $area) {
            DB::table('parking_areas')->insert([
                "name" => $area,
                "status" => 1,
                "created_by" => User::inRandomOrder()->first()->id,
                "created_at" => Carbon::today(),
                "updated_at" => Carbon::today()
            ]);
        }
    }
}
