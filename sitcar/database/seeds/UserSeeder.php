<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Guido Palacin',
            'email' =>'luis.palacinr@gmail.com',
            'password' => Hash::make('123456'),
            'active' => 1,
            'employee_id' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Lourdes Palacin',
            'email' =>'lourdespl@tsvsac.com.pe',
            'password' => Hash::make('123456'),
            'active' => 1,
            'employee_id' => 5
        ]);
        DB::table('users')->insert([
            'name' => 'Luis Palacin',
            'email' =>'luispl@tsvsac.com.pe',
            'password' => Hash::make('123456'),
            'active' => 1,
            'employee_id' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Jhoseline Palacin',
            'email' =>'jhoselinep@tsvsac.com.pe',
            'password' => Hash::make('123456'),
            'active' => 1,
            'employee_id' => 4
        ]);
    }
}
