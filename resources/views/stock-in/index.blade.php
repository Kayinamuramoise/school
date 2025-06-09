@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Stock In Records</h5>
        <div>
            <a href="{{ route('stock-in.report') }}" class="btn btn-info me-2">View Report</a>
            <a href="{{ route('stock-in.create') }}" class="btn btn-primary">Add Stock In</a>
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
                        <th>Unit Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stockIns as $stockIn)
                    <tr>
                        <td>{{ $stockIn->Date->format('Y-m-d') }}</td>
                        <td>{{ $stockIn->product->Product_Name }}</td>
                        <td>{{ number_format($stockIn->Quantity, 2) }}</td>
                        <td>{{ number_format($stockIn->Unit_Price, 2) }}</td>
                        <td>{{ number_format($stockIn->Total_Price, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 