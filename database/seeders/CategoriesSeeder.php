<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = DB::table('categories');
        $users->insert([ ['name' => 'immobilier'],
            ['name' => 'Maison, Cuisine & Jardin'],
            ['name' => 'sport'],
            ['name' => 'Vehicules'],
            ['name' => 'Loisir Et Divertissement ']
        ]);
    }
}
