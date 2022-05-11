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
        \App\Category::create([
            'name' => 'Cars',
            'description' => 'Racing Cars',
        ]);

        \App\Category::create([
            'name' => 'Smartphones',
            'description' => 'New Generations Mobiles',
        ]);

        \App\Category::create([
            'name' => 'Ladies Bag',
            'description' => 'New Arrivals',
        ]);

        \App\Category::create([
            'name' => 'Vegetables',
            'description' => 'Fresh & Hygenic Foods',
        ]);
    }
}
