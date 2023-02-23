<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1, 10) as $customer) {
            Customer::create([
                "name" => $faker->name,
                "email" => $faker->email,
                "phone" => $faker->tollFreePhoneNumber,
                "company" => $faker->company,
                "address" => $faker->address,
            ]);
        }
    }
}
