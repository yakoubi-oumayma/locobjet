<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
        
    {
        DB::table("items")->insert([
            ["name"=>"Toyota Yaris ",
            "price"=>"1000",
            "city"=>'Rabat',
            "description"=>'Avec son petit gabarit et son intérieur spacieux, elle se faufile partout et devient la compagne idéale des trajets urbains.',
            "user_id"=> '3',
            "category_id"=>'1',
            ],
            ["name"=>"flat in casa",
            "price"=>"1500",
            "city"=>'Casablanca',
            "description"=>'Situé à 500 mètres du centre de Casablanca, le StayHere Casablanca Ghautier Apartments possède un jardin et une terrasse.',
            "user_id"=> '6',
            "category_id"=>'2' ,
           ],
           ["name"=>" Caftan satin",
           "price"=>"600",
           "city"=>'Rabat',
           "description"=>'caftan bien apprecie pour les evenements traditionnelles',
           "user_id"=> '4',
           "category_id"=>'3'
        ],
        ["name"=>"Toyota Yaris ",
        "price"=>"1000",
        "city"=>'Rabat',
        "description"=>'Avec son petit gabarit et son intérieur spacieux, elle se faufile partout et devient la compagne idéale des trajets urbains.',
        "user_id"=> '3',
        "category_id"=>'1',
        ],
        ["name"=>"Toyota Yaris ",
        "price"=>"1000",
        "city"=>'Rabat',
        "description"=>'Avec son petit gabarit et son intérieur spacieux, elle se faufile partout et devient la compagne idéale des trajets urbains.',
        "user_id"=> '3',
        "category_id"=>'1',
        ],
        ["name"=>"Toyota Yaris ",
        "price"=>"1000",
        "city"=>'Rabat',
        "description"=>'Avec son petit gabarit et son intérieur spacieux, elle se faufile partout et devient la compagne idéale des trajets urbains.',
        "user_id"=> '3',
        "category_id"=>'1',
        ],
        ["name"=>"Toyota Yaris ",
        "price"=>"1000",
        "city"=>'Rabat',
        "description"=>'Avec son petit gabarit et son intérieur spacieux, elle se faufile partout et devient la compagne idéale des trajets urbains.',
        "user_id"=> '6',
        "category_id"=>'1',
        ],
       
       
        ]);
    }
}
