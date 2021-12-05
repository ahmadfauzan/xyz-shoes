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
        Category::create([
            'name' => 'hiking'
        ]);
        Category::create([
            'name' => 'training'
        ]);
        Category::create([
            'name' => 'basketball'
        ]);

        TypeSize::create([
            'name' => 'UK'
        ]);

        // 1
        Product::create([
            'categories_id' => 1,
            'type_sizes_id' => 1,
            'name' => "Adidis Raning 1",
            'price' => 199,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5
        ]);

        //2
        Product::create([
            'categories_id' => 1,
            'type_sizes_id' => 1,
            'name' => "Adidis Raning 1",
            'price' => 105,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "women",
            'stock' => 100,
            'donation' => 0.5
        ]);

        // 3
        Product::create([
            'categories_id' => 1,
            'type_sizes_id' => 1,
            'name' => "Adidis Raning 1",
            'price' => 125,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "women",
            'stock' => 100,
            'donation' => 0.5
        ]);

        // 4
        Product::create([
            'categories_id' => 2,
            'type_sizes_id' => 1,
            'name' => "Adidis Haiking 1",
            'price' => 107,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5
        ]);

        // 5
        Product::create([
            'categories_id' => 2,
            'type_sizes_id' => 1,
            'name' => "Adidis Haiking 2",
            'price' => 145,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5
        ]);

        // 6
        Product::create([
            'categories_id' => 2,
            'type_sizes_id' => 1,
            'name' => "Adidis Hiking 3",
            'price' => 150,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5
        ]);

        // 7
        Product::create([
            'categories_id' => 2,
            'type_sizes_id' => 1,
            'name' => "Adidis Hiking 3",
            'price' => 121,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "women",
            'stock' => 100,
            'donation' => 0.5
        ]);

        // 8
        Product::create([
            'categories_id' => 3,
            'type_sizes_id' => 1,
            'name' => "Adidis Training 1",
            'price' => 142,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5
        ]);

        // 9
        Product::create([
            'categories_id' => 3,
            'type_sizes_id' => 1,
            'name' => "Adidis Training 2",
            'price' => 123,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5
        ]);

        // 10
        Product::create([
            'categories_id' => 3,
            'type_sizes_id' => 1,
            'name' => "Adidis Training 2",
            'price' => 122,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "women",
            'stock' => 100,
            'donation' => 0.5
        ]);

        // 11
        Product::create([
            'categories_id' => 3,
            'type_sizes_id' => 1,
            'name' => "Adidis Training 2",
            'price' => 131,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "women",
            'stock' => 100,
            'donation' => 0.5
        ]);

        // 12
        Product::create([
            'categories_id' => 4,
            'type_sizes_id' => 1,
            'name' => "Adidis Basketball 1",
            'price' => 121,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5
        ]);

        // 13
        Product::create([
            'categories_id' => 4,
            'type_sizes_id' => 1,
            'name' => "Adidis Basketball 2",
            'price' => 124,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5
        ]);

        // 14
        Product::create([
            'categories_id' => 4,
            'type_sizes_id' => 1,
            'name' => "Adidis Basketball 2",
            'price' => 151,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "women",
            'stock' => 100,
            'donation' => 0.5
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

        Size::create([
            'size' => 7
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


        ProductSize::create([
            'size_id' => 2,
            'product_id' => 2,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 2,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 2,
        ]);

        ProductSize::create([
            'size_id' => 2,
            'product_id' => 3,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 3,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 3,
        ]);


        ProductSize::create([
            'size_id' => 1,
            'product_id' => 4,
        ]);
        ProductSize::create([
            'size_id' => 2,
            'product_id' => 4,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 4,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 4,
        ]);


        ProductSize::create([
            'size_id' => 1,
            'product_id' => 5,
        ]);
        ProductSize::create([
            'size_id' => 2,
            'product_id' => 5,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 5,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 5,
        ]);


        ProductSize::create([
            'size_id' => 1,
            'product_id' => 6,
        ]);
        ProductSize::create([
            'size_id' => 2,
            'product_id' => 6,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 6,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 6,
        ]);


        ProductSize::create([
            'size_id' => 1,
            'product_id' => 7,
        ]);
        ProductSize::create([
            'size_id' => 2,
            'product_id' => 7,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 7,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 7,
        ]);

        ProductSize::create([
            'size_id' => 1,
            'product_id' => 8,
        ]);
        ProductSize::create([
            'size_id' => 2,
            'product_id' => 8,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 8,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 8,
        ]);


        ProductSize::create([
            'size_id' => 2,
            'product_id' => 9,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 9,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 9,
        ]);

        ProductSize::create([
            'size_id' => 2,
            'product_id' => 10,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 10,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 10,
        ]);

        ProductSize::create([
            'size_id' => 2,
            'product_id' => 11,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 11,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 11,
        ]);


        ProductSize::create([
            'size_id' => 1,
            'product_id' => 12,
        ]);
        ProductSize::create([
            'size_id' => 2,
            'product_id' => 12,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 12,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 12,
        ]);


        ProductSize::create([
            'size_id' => 1,
            'product_id' => 13,
        ]);
        ProductSize::create([
            'size_id' => 2,
            'product_id' => 13,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 13,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 13,
        ]);


        ProductSize::create([
            'size_id' => 1,
            'product_id' => 14,
        ]);
        ProductSize::create([
            'size_id' => 2,
            'product_id' => 14,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 14,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 14,
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
