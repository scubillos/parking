<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $cities = ["Erbil", 'Silemani', 'Duhok', 'Halabja', 'Kerkuk'];
        $carNames = [
            "Abarth",
            "Alfa Romeo",
            "Aston Martin",
            "Audi",
            "Bentley",
            "BMW",
            "Bugatti",
            "Cadillac",
            "Chevrolet",
            "Chrysler",
            "Citroën",
            "Dacia",
            "Daewoo",
            "Daihatsu",
            "Dodge",
            "Donkervoort",
            "DS",
            "Ferrari",
            "Fiat",
            "Fisker",
            "Ford",
            "Honda",
            "Hummer",
            "Hyundai",
            "Infiniti",
            "Iveco",
            "Jaguar",
            "Jeep",
            "Kia",
            "KTM",
            "Lada",
            "Lamborghini",
            "Lancia",
            "Land Rover",
            "Landwind",
            "Lexus",
            "Lotus",
            "Maserati",
            "Maybach",
            "Mazda",
            "McLaren",
            "Mercedes-Benz",
            "MG",
            "Mini",
            "Mitsubishi",
            "Morgan",
            "Nissan",
            "Opel",
            "Peugeot",
            "Porsche",
            "Renault",
            "Rolls-Royce",
            "Rover",
            "Saab",
            "Seat",
            "Skoda",
            "Smart",
            "SsangYong",
            "Subaru",
            "Suzuki",
            "Tesla",
            "Toyota",
            "Volkswagen",
            "Volvo"
        ];

        foreach (range(1, 30) as $value) {
            DB::table('vehicles')->insert([
                "name" => $carNames[rand(0, count($carNames) - 1)],
                "plat_number" => $cities[rand(0, 4)] . " - " . rand(10000, 999999),
                "duration" => rand(1, 4),
                "packing_charge" => 1000,
                "status" => rand(0, 2),
                "registration_number" => rand(12, 34353) . time(),
                "category_id" => Category::inRandomOrder()->first()->id,
                "customer_id" => Customer::inRandomOrder()->first()->id,
                "created_by" => User::inRandomOrder()->first()->id,
                "created_at" => Carbon::today(),
                "updated_at" => Carbon::today()
            ]);
        }
    }
}
