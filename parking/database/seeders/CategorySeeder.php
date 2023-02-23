<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Van', 'Taxi', "Bus", "Hatchback", 'Sedan', "SUV", "MPV", 'Micro'];
        foreach ($arr as $item) {
            DB::table("categories")->insert([
                'name' => $item,
                'created_by' => User::inRandomOrder()->first()->id,
                "created_at" => Carbon::today(),
                "updated_at" => Carbon::today()
            ]);
        }
    }
}
