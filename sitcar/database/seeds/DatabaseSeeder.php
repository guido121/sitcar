<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(TruckSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(FuelEfficiencySeeder::class);
        $this->call(CustomerSeeder::class);
    }
}
