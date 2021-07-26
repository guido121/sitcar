<?php

use Illuminate\Database\Seeder;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trucks')->insert([
            'plate' => 'YI-3630'
        ]);
    }
}
