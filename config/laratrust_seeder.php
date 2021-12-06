<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'address' => 'c,r,u,d',
            'carts' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'discounts' => 'c,r,u,d',
            'donations' => 'c,r,u,d',
            'flash_sales' => 'c,r,u,d',
            'galleries' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'order_transaction' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'product_size' => 'c,r,u,d',
            'ratings' => 'c,r,u,d',
            'sizes' => 'c,r,u,d',
            'transactions' => 'c,r,u,d',
            'type_sizes' => 'c,r,u,d',
        ],
        'user' => [
            'address' => 'c,r,u,d',
            'carts' => 'c,r,u,d',
            'categories' => 'r',
            'discounts' => 'r',
            'flash_sales' => 'r',
            'galleries' => 'r',
            'orders' => 'c,r,u,d',
            'order_transaction' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'products' => 'r',
            'product_size' => 'r',
            'ratings' => 'c,r,u,d',
            'sizes' => 'r',
            'transactions' => 'c,r,u,d',
            'type_sizes' => 'r',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
