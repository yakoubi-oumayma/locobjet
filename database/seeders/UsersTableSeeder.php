<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    DB::table("users")->insert([
        ["username"=>"kaoutarblk",
        "email"=>"kaoutarbelkadi6@gmail.com",
        "f_name"=>'kaoutar',
        "l_name"=>'BELKADI',
        "password"=> bcrypt('qwerty'),
        ],
        ["username"=>"Ikhlassblk",
        "email"=>"ikhlassbelkadi6@gmail.com",
        "f_name"=>'ikhlass',
        "l_name"=>'BELKADI',
        "password"=> bcrypt('12345'),
       ],
        ["username"=>"amalblk",
        "email"=>"amalbelkadi6@gmail.com",
        "f_name"=>'Amal',
        "l_name"=>'BELKADI',
        "password"=> bcrypt('67890'),
    ],
    ["username"=>"issamblk",
    "email"=>"issambelkadi6@gmail.com",
    "f_name"=>'Issam',
    "l_name"=>'BELKADI',
    "password"=> bcrypt('649245'),
    ],
   
    ]);
}
     
}
