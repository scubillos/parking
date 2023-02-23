<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleIn;
use Carbon\Carbon;
use Carbon\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleInSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bloks = ['Blok A', 'Blok B', 'Blok C', 'Blok D'];

        foreach (range(1, 10) as $value) {
            $id = Vehicle::inRandomOrder()->first()->id;
            $found = VehicleIn::where('vehicle_id', $id)->get();
            if (count($found)) {
                continue;
            }
            DB::table('vehicle_ins')->insert([
                "vehicle_id" => $id,
                "parking_area" => $bloks[rand(0, 3)],
                "parking_number" => rand(12, 34353),
                "created_by" => User::inRandomOrder()->first()->id,
                "created_at" => Carbon::today(),
                "updated_at" => Carbon::today()
            ]);
        }
    }
}
