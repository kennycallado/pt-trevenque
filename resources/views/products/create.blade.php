@extends('layouts.base')

@section('main')
<div class="d-flex justify-content-center">
    <a class="position-absolute start-0 mt-2 ms-2" href="{{ route('web.products.index') }}">🡨 Back</a>

    <h1 class="text-center mb-4">Product create</h1>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="h3 text-center">New product:</h2>
        </div>

        <div class="card-body">
            <form
                id="products-create-form"
                action="{{ route('web.products.store') }}"
                method="POST">
                @csrf

                <div class="row">
                    <div class="col-12 col-md-6 d-flex">
                        <img
                            class="img-fluid rounded"
                            src="https://placehold.co/400x400"
                            alt="Place holder" />
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="my-3">
                            <label for="name" class="form-label">Name:</label>

                            @error('name')
                            <span class="form-text text-danger float-end">{{ $message }}</span>
                            @enderror

                            <input
                                class="form-control"
                                name="name"
                                id="name"
                                type="text" />
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category:</label>

                            @error('category_id')
                            <span class="form-text text-danger float-end">{{ $message }}</span>
                            @enderror

                            <select
                                class="form-select"
                                name="category_id"
                                id="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="active" class="form-label">State:</label>

                            @error('state')
                            <span class="form-text text-danger float-end">{{ $message }}</span>
                            @enderror

                            <select
                                class="form-select"
                                name="active"
                                id="active">
                                <option value="1">Active</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price:</label>

                            @error('price')
                            <span class="form-text text-danger float-end">{{ $message }}</span>
                            @enderror

                            <input
                                class="form-control"
                                name="price"
                                id="price"
                                step=".01"
                                type="number" />
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock:</label>

                            @error('stock')
                            <span class="form-text text-danger float-end">{{ $message }}</span>
                            @enderror

                            <input
                                class="form-control"
                                name="stock"
                                id="stock"
                                type="number" />
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>

                            @error('image')
                            <span class="form-text text-danger float-end">{{ $message }}</span>
                            @enderror

                            <input
                                type="text"
                                class="form-control"
                                id="image"
                                name="image"
                                list="list-images" />

                            <datalist id="list-images">
                                @foreach ($images as $image)
                                <option value="{{ $image->url }}">{{ $image->url }}</option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer">
            <button
                form="products-create-form"
                class="btn btn-primary float-end"
                type="submit">Submit</button>
        </div>
    </div>
</div>
@endsection
