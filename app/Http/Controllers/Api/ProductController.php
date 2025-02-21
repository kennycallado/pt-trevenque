<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category', 'images']);
        $page = $request->has('page') ? $request->page : 1;

        if ($request->has('category_id')) {
            $products->where(
                'category_id',
                $request->category_id
            );
        }

        if ($request->has('active')) {
            $products->where(
                'active',
                filter_var(
                    $request->active,
                    FILTER_VALIDATE_BOOLEAN
                )
            );
        }

        return response()->json($products->paginate(10, ['*'], 'page', $page), 200);
    }

    public function show(string $id)
    {
        $product = Product::with(['category', 'images'])->findOrFail($id);

        return response()->json($product, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0.01',
            'active' => 'boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::create($request->all());

        ProductImage::factory()->create([
            'product_id' => $product->id,
        ]);

        $product->load(['category', 'images']);
        return response()->json($product, 201);
    }

    public function delete(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null, 204);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'stock' => 'integer|min:0',
            'price' => 'numeric|min:0.01',
            'active' => 'boolean',
            'category_id' => 'exists:categories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        $product->load(['category', 'images']);
        return response()->json($product, 200);
    }

    public function toggleActive(string $id)
    {
        $product = Product::findOrFail($id);

        $product->active = ! $product->active;
        $product->save();

        return response()->json($product, 200);
    }
}
