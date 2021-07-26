<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        DB::table('employees')->insert([
            'name' => 'Eudogio Anco Hidalgo',
            'type' => '1' ,
        ]);
        DB::table('employees')->insert([
            'name' => 'Elias Cordova',
            'type' => '1' ,
        ]);
        DB::table('employees')->insert([
            'name' => 'Jhon Cabello Inche',
            'type' => '1' ,
        ]);
        DB::table('employees')->insert([
            'name' => 'Jhoseline Palacin',
            'type' => '1' ,
        ]);
        DB::table('employees')->insert([
            'name' => 'Lourdes Palacin',
            'type' => '1' ,
        ]);
    }
}
