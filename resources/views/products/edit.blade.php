@extends('layouts.base')

@section('main')
<div class="d-flex justify-content-center">
    <a class="position-absolute start-0 mt-2 ms-2" href="{{ route('web.products.index') }}">🡨 Back</a>
    <h1 class="text-center mb-4">Edit Product</h1>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="h3 text-center">Edit product: {{ $product->name }}</h2>
        </div>

        <div class="card-body">
            <form id="products-edit-form" action="{{ route('web.products.update', ['id' => $product->id]) }}" method="POST">
                @csrf @method('PUT')

                <div class="row">
                    <div class="col-12 col-md-5 d-flex">
                        <img
                            class="img-fluid rounded"
                            src="{{ $product->images->first()->url ?? 'https://placehold.co/400x400' }}"
                            alt="{{ $product->name ?? 'Place holder' }}" />
                    </div>

                    <div class="col-12 col-md-7">
                        <div class="my-3">
                            <label for="name" class="form-label">Name:</label>
                            <input class="form-control" name="name" id="name" type="text" value="{{ $product->name }}" />

                            @error('name')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category:</label>
                            <select class="form-select" name="category_id" id="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category_id')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="active" class="form-label">State:</label>
                            <select class="form-select" name="active" id="active">
                                <option value="1" {{ $product->active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$product->active ? 'selected' : '' }}>Disabled</option>
                            </select>
                            @error('active')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price:</label>
                            <input class="form-control" name="price" id="price" step=".01" type="number" value="{{ $product->price }}" />
                            @error('price')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock:</label>
                            <input class="form-control" name="stock" id="stock" type="number" value="{{ $product->stock }}" />
                            @error('stock')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer">
            <button form="products-edit-form" class="btn btn-primary float-end" type="submit">Update</button>
        </div>
    </div>
</div>
@endsection
