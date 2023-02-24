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

class VehicleInSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $times = ['day', 'morning', 'afternoon'];

        foreach (range(1, 10) as $value) {
            $id = Vehicle::inRandomOrder()->first()->id;
            $found = VehicleIn::where('vehicle_id', $id)->get();
            if (count($found)) {
                continue;
            }
            DB::table('vehicle_ins')->insert([
                "vehicle_id" => $id,
                "location_id" => Location::inRandomOrder()->first()->id,
                'schedule' => $times[rand(0, 2)],
                'schedule_day' => Carbon::today(),
                "status" => rand(0, 2),
                "created_by" => User::inRandomOrder()->first()->id,
                "created_at" => Carbon::today(),
                "updated_at" => Carbon::today()
            ]);
        }
    }
}
