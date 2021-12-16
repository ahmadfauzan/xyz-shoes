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

        $this->call(LaratrustSeeder::class);

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
            'name' => "Ultra 4D",
            'price' => 199,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        // 1
        Product::create([
            'categories_id' => 1,
            'type_sizes_id' => 1,
            'name' => "Sl 20",
            'price' => 189,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        //2
        Product::create([
            'categories_id' => 1,
            'type_sizes_id' => 1,
            'name' => "Ultra 4D W",
            'price' => 105,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "women",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        // 3
        Product::create([
            'categories_id' => 1,
            'type_sizes_id' => 1,
            'name' => "Sl 20 W",
            'price' => 125,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "women",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        // 4
        Product::create([
            'categories_id' => 2,
            'type_sizes_id' => 1,
            'name' => "Terrex Trailmaker",
            'price' => 107,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        // 5
        Product::create([
            'categories_id' => 2,
            'type_sizes_id' => 1,
            'name' => "Terrex Urban Low",
            'price' => 145,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        // 6
        Product::create([
            'categories_id' => 2,
            'type_sizes_id' => 1,
            'name' => "Terrex Trailmaker W",
            'price' => 150,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "women",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        // 7
        Product::create([
            'categories_id' => 2,
            'type_sizes_id' => 1,
            'name' => "Terrex Urban Low W",
            'price' => 121,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "women",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        // 8
        Product::create([
            'categories_id' => 3,
            'type_sizes_id' => 1,
            'name' => "Lego Leg Sport",
            'price' => 142,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        // 9
        Product::create([
            'categories_id' => 3,
            'type_sizes_id' => 1,
            'name' => "Faito Summer",
            'price' => 123,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        // 10
        Product::create([
            'categories_id' => 3,
            'type_sizes_id' => 1,
            'name' => "Lego Leg Sport W",
            'price' => 122,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "women",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        // 11
        Product::create([
            'categories_id' => 3,
            'type_sizes_id' => 1,
            'name' => "Faito Summer W",
            'price' => 131,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "women",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        // 12
        Product::create([
            'categories_id' => 4,
            'type_sizes_id' => 1,
            'name' => "Dame 7",
            'price' => 121,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        // 13
        Product::create([
            'categories_id' => 4,
            'type_sizes_id' => 1,
            'name' => "Harden Vol 4",
            'price' => 124,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "men",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        // 14
        Product::create([
            'categories_id' => 4,
            'type_sizes_id' => 1,
            'name' => "Dame 7 W",
            'price' => 151,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "women",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);

        // 14
        Product::create([
            'categories_id' => 4,
            'type_sizes_id' => 1,
            'name' => "Harden Vol 4 W",
            'price' => 151,
            'desc' => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam",
            'gender' => "women",
            'stock' => 100,
            'donation' => 0.5,
            'status' => 1,
        ]);


        Size::create([
            'size' => 6
        ]);

        Size::create([
            'size' => 7
        ]);

        Size::create([
            'size' => 8
        ]);

        Size::create([
            'size' => 9
        ]);

        Size::create([
            'size' => 10
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


        ProductSize::create([
            'size_id' => 1,
            'product_id' => 15,
        ]);
        ProductSize::create([
            'size_id' => 2,
            'product_id' => 15,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 15,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 15,
        ]);

        ProductSize::create([
            'size_id' => 1,
            'product_id' => 16,
        ]);
        ProductSize::create([
            'size_id' => 2,
            'product_id' => 16,
        ]);
        ProductSize::create([
            'size_id' => 3,
            'product_id' => 16,
        ]);
        ProductSize::create([
            'size_id' => 4,
            'product_id' => 16,
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
