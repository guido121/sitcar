<?php

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
        DB::table('customers')->insert([
            'name' => 'Transportes 77' ,
        ]);

        DB::table('customers')->insert([
            'name' => 'UNACEM' ,
        ]);
    }
}
