<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function store(Request $request, string $id)
    {
        $request->validate([
            'image' => 'required|url',
        ]);

        $product = Product::findOrFail($id);

        $product->images()->create([
            'url' => $request->image,
        ]);

        $product->load('images');

        return response()->json($product, 201);
    }

    public function delete(string $id, string $imageId)
    {
        $product = Product::findOrFail($id);
        $product->images()->findOrFail($imageId)->delete();

        return response()->json(null, 204);
    }
}
