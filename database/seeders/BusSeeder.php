<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('buses')->insert([
           'bus_number'=>'1',
           'number_of_seats'=>12
        ]);

        DB::table('buses')->insert([
            'bus_number'=>'2',
            'number_of_seats'=>12
         ]);
    }
}
