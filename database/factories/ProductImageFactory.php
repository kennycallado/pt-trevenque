<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    public function configure()
    {
        return $this->afterMaking(function (ProductImage $productImage) {
            if (is_null($productImage->product_id)) {
                $productImage
                    ->product()
                    ->associate(
                        Product::factory()->create()
                    );
            }
        });
    }

    public function definition(): array
    {
        $randSeed = rand(1, 100);

        return [
            'url' => 'https://picsum.photos/400/400?t='.$randSeed,
        ];
    }
}
