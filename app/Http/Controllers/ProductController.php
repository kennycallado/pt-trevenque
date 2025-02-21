<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $images = ProductImage::all();

        return view('products.create', compact(['categories', 'images']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0.01',
            'category_id' => 'required|exists:categories,id',
            'active' => 'boolean',
        ]);

        $product = Product::create($request->all());

        ProductImage::factory()->create([
            'product_id' => $product->id,
        ]);

        return redirect()->route('web.products.show', ['id' => $product->id]);
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0.01',
            'category_id' => 'required|exists:categories,id',
            'active' => 'boolean',
        ]);

        $product->update($request->all());

        return redirect()->route('web.products.show', ['id' => $product->id]);
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        $categories = Category::all();
        $images = ProductImage::all();

        $product->load('category', 'images');
        return view('products.edit', compact(['product', 'categories', 'images']));
    }

    public function delete(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('web.products.index');
    }

    public function toggleActive(string $id)
    {
        $product = Product::findOrFail($id);

        $product->active = ! $product->active;
        $product->save();

        return redirect()->route('web.products.index');
    }
}
