@extends('layouts.base')

@section('main')
<div class="d-flex justify-content-center">
    <a class="position-absolute start-0 ms-2 mt-2" href="{{ route('web.index') }}">🡨 Back</a>

    <h1 class="text-center mb-4">Products</h1>
</div>

<div class="container mt-5">
    <div>
        <h2 class="d-inline h-3">List</h2>

        <a class="btn btn-secondary float-end" href="{{ route('web.products.create') }}">Create</a>
    </div>

    <hr />

    <div class="px-3">
        <table class="table table-striped table-hover">
            <caption>List of products</caption>

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>State</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->active ? 'active' : 'disabled' }}</td>

                        <td class="d-flex justify-content-evenly border-start">
                            <form
                                action="{{ route('web.products.toggle', $product->id) }}"
                                method="POST">
                                @csrf @method('PUT')

                                <button class="btn btn-sm btn-primary" type="submit">Toggle</button>
                            </form>

                            <a href="{{ route('web.products.show', $product->id) }}" class="btn btn-sm btn-warning ms-2">Edit</a>

                            <form
                                action="{{ route('web.products.delete', $product->id) }}"
                                method="POST">
                                @csrf @method('DELETE')

                                <button class="btn btn-sm btn-danger ms-2" type="submit">Del</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
