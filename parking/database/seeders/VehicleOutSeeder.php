<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\VehicleIn;
use App\Models\VehicleOut;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleOutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 10) as $value) {
            $id = VehicleIn::inRandomOrder()->first()->id;
            $found = VehicleOut::where('vehicleIn_id',$id)->get();
            if(count($found)){
                continue;
            }
            VehicleIn::where('id',$id)->update(['status'=>1]);
            DB::table('vehicle_outs')->insert([
                "vehicleIn_id" => $id,
                "created_by" => User::inRandomOrder()->first()->id,
                "created_at" => Carbon::today(),
                "updated_at" => Carbon::today()
            ]);
        }
    }
}
