<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('trip_cost')->insert([
            'start_station_id'=>1,
            'end_station_id'=>2,
            'cost'=>'20'
         ]);

         DB::table('trip_cost')->insert([
            'start_station_id'=>1,
            'end_station_id'=>3,
            'cost'=>'40'
         ]);

         DB::table('trip_cost')->insert([
            'start_station_id'=>2,
            'end_station_id'=>3,
            'cost'=>'20'
         ]);
    }
}
