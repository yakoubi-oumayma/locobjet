<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Item_ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::table("item_images")->insert([
                ["image-name"=>"cars",
                "item_id"=>"4"
                
                ],
                ["image-name"=>"apartment",
                "item_id"=>"4"
               
               ],
                ["image-name"=>"Dresses",
                "item_id"=>"4"
                
            ],
        
           
            ]);
        }
    }
}
