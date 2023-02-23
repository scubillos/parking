<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(["name" => "admin",
            "name" => "admin",
            "password" => bcrypt("password"),
            "email" => "admin@test.com",
            "avatar" => "120911650724827_avatar.png",
            "created_at"=> Carbon::today(),
            "updated_at"=> Carbon::today()
        ]);
    }
}
