<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function configure(): static
    {
        return $this->afterMaking(function (Product $product) {
            if ($product->category()->doesntExist()) {
                $product
                    ->category()
                    ->associate(
                        Category::factory()->create()
                    );
            }
        })->afterCreating(function (Product $product) {
            ProductImage::factory()->create([
                'product_id' => $product->id,
            ]);
        });
    }

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'stock' => $this->faker->numberBetween(1, 100),
            'active' => $this->faker->boolean(90),
        ];
    }
}
