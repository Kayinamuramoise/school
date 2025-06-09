@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Product</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="Product_Name" class="form-label">Product Name</label>
                <input type="text" class="form-control @error('Product_Name') is-invalid @enderror" 
                    id="Product_Name" name="Product_Name" value="{{ old('Product_Name', $product->Product_Name) }}" required>
                @error('Product_Name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
</div>
@endsection 