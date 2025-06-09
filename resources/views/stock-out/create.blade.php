@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Add Stock Out Record</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('stock-out.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="Product_Id" class="form-label">Product</label>
                <select class="form-select @error('Product_Id') is-invalid @enderror" 
                    id="Product_Id" name="Product_Id" required>
                    <option value="">Select Product</option>
                    @foreach($products as $product)
                    <option value="{{ $product->ProductId }}" {{ old('Product_Id') == $product->ProductId ? 'selected' : '' }}>
                        {{ $product->Product_Name }}
                    </option>
                    @endforeach
                </select>
                @error('Product_Id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Date" class="form-label">Date</label>
                <input type="date" class="form-control @error('Date') is-invalid @enderror" 
                    id="Date" name="Date" value="{{ old('Date', date('Y-m-d')) }}" required>
                @error('Date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Quantity" class="form-label">Quantity</label>
                <input type="number" step="0.01" class="form-control @error('Quantity') is-invalid @enderror" 
                    id="Quantity" name="Quantity" value="{{ old('Quantity') }}" required>
                @error('Quantity')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('stock-out.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Add Stock Out</button>
            </div>
        </form>
    </div>
</div>
@endsection 