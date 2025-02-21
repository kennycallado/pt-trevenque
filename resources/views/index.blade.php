@extends('layouts.base')

@section('main')
<style>
main {
    height: 100svh;
}

.card {
    min-width: 300px;
}
</style>

<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="card">
        <div class="card-header">
            <h2 class="h5 text-center">Products</h2>
        </div>

        <div class="card-body">
            <p class="mb-4">Navigate to products page</p>
        </div>

        <div class="card-footer">
            <a class="btn btn-primary float-end" href="{{ route('web.products.index') }}">Go</a>
        </div>
    </div>
</div>
@endsection
