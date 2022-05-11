<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Product::create([
            'name' => 'Honda Civic',
            'description' => 'Model 2021',
            'price' => 4000000,
            'discountprice' => 3700000,
            'discountpercentage' => 12,
            'image' => 'image',
            'category_id' => 1,
        ]);

        \App\Product::create([
            'name' => 'Carrot',
            'price' => 30,
            'image' => 'image',
            'category_id' => 4,
        ]);

        \App\Product::create([
            'name' => 'Honda Reborn',
            'description' => 'Model 2022',
            'price' => 6000000,
            'image' => 'image',
            'category_id' => 1,
        ]);

        \App\Product::create([
            'name' => 'Apple Iphone 13 pro max',
            'description' => '128GB',
            'price' => 220000,
            'image' => 'image',
            'category_id' => 2,
        ]);
    }
}
