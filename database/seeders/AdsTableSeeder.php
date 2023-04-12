<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("ads")->insert([
            ["title"=>"Toyota Yaris ",
            "state"=>"active",
            "available_from"=>'2023-04-03',
            "min_rent_period"=>'2',
            "availability"=> 'limited',
            "createdAt"=> '2023-04-03',
            "item_id"=>'4',
            ],
            ["title"=>"flat Casa ",
            "state"=>"active",
            "available_from"=>'2023-04-04',
            "min_rent_period"=>'2',
            "availability"=> 'limited',
            "createdAt"=> '2023-04-04',
            "item_id"=>'5',
            ],
            ["title"=>"Caften Satin grey ",
            "state"=>"active",
            "available_from"=>'2023-04-05',
            "min_rent_period"=>'1',
            "availability"=> 'limited',
            "createdAt"=> '2023-04-05',
            "item_id"=>'6',
            ],
            ["title"=>"Toyota Yaris ",
            "state"=>"active",
            "available_from"=>'2023-04-03',
            "min_rent_period"=>'2',
            "availability"=> 'limited',
            "createdAt"=> '2023-04-03',
            "item_id"=>'4',
            ],
            ["title"=>"Toyota Yaris ",
            "state"=>"active",
            "available_from"=>'2023-04-03',
            "min_rent_period"=>'2',
            "availability"=> 'limited',
            "createdAt"=> '2023-04-03',
            "item_id"=>'4',
            ],
           
       
       
        ]);
}
}