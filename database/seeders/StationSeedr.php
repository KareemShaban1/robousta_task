<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationSeedr extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('stations')->insert([
            'name'=>'القاهرة',
            'rank'=>1
         ]);
         DB::table('stations')->insert([
            'name'=>'الجيزة',
            'rank'=>2
         ]);
         DB::table('stations')->insert([
            'name'=>'الفيوم',
            'rank'=>3
         ]);
    }
}
