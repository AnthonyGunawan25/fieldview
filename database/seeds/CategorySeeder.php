<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Illuminate\Support\Facades\DB::table('categories')->insert([
            [
                'category_name' => 'Futsal',
            ],
            [
                'category_name' => 'Basket',
            ],
            [
                'category_name' => 'Badminton',
            ],
            [
                'category_name' => 'Tennis',
            ]
        ]);
    }
    
}
