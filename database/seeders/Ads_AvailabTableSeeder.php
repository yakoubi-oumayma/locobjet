<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Ads_AvailabTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::table("ads_availab")->insert([
                ["day"=>"Lundi",
                "month"=>"October",
                "ad_id"=>"4",
                
                ],
              
           
            ]);
        }
    }
}
