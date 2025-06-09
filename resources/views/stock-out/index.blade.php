@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Stock Out Records</h5>
        <div>
            <a href="{{ route('stock-out.report') }}" class="btn btn-info me-2">View Report</a>
            <a href="{{ route('stock-out.create') }}" class="btn btn-primary">Add Stock Out</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stockOuts as $stockOut)
                    <tr>
                        <td>{{ $stockOut->Date->format('Y-m-d') }}</td>
                        <td>{{ $stockOut->product->Product_Name }}</td>
                        <td>{{ number_format($stockOut->Quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 