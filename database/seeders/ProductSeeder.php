<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            Product::factory()
                ->create([
                    'name' => 'Producto de '.$category->name,
                    'category_id' => $category->id,
                ]);
        }
    }
}
