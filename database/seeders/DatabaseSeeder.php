<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\TypeSize;
use App\Models\ProductSize;
use App\Models\Rating;
use App\Models\Size;
// use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Category::create([
            'name' => 'running'
        ]);

        TypeSize::create([
            'name' => 'UK'
        ]);


        Product::create([
            'categories_id' => 1,
            'type_sizes_id' => 1,
            'name' => "Adidis Running",
            'price' => 199,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'stock' => 100,
            'donation' => 5
        ]);

        Size::create([
            'size' => 3
        ]);

        Size::create([
            'size' => 4
        ]);

        Size::create([
            'size' => 5
        ]);

        Size::create([
            'size' => 6
        ]);


        ProductSize::create([
            'size_id' => 1,
            'product_id' => 1,
        ]);
        ProductSize::create([
            'size_id' => 2,
            'product_id' => 1,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 1,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 1,
        ]);


        Rating::create([
            'users_id' => 1,
            'product_id' => 1,
            'rate' => 4,
        ]);

        Rating::create([
            'users_id' => 2,
            'product_id' => 1,
            'rate' => 4,
        ]);
    }
}
