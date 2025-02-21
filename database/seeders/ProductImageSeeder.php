<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::all()->each(function (Product $product) {
            ProductImage::factory()
                ->count(rand(1, 5))
                ->create([
                    'product_id' => $product->id,
                ]);
        });
    }
}
