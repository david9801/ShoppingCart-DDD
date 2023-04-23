<?php

namespace Database\Seeders;

use App\Product;
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
        $products = [
            [
                'name' => 'bicicleta',
                'description' => 'producto description',
                'price' => '10'
            ],
            [
                'name' => 'casco',
                'description' => 'producto description',
                'price' => '9.99'
            ]
        ];

        foreach ($products as $productData) {
            Product::updateOrcreate([
                'name' => $productData['name'],
                'description' => $productData['description'],
                'price' => $productData['price'],
            ]);
        }
    }
}
