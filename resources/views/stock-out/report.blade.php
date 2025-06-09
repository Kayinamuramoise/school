@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Stock Out Report</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('stock-out.report') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" 
                            value="{{ $startDate ?? '' }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" 
                            value="{{ $endDate ?? '' }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">&nbsp;</label>
                        <button type="submit" class="btn btn-primary d-block w-100">Generate Report</button>
                    </div>
                </div>
            </div>
        </form>

        @if(isset($stockOuts))
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
        @endif
    </div>
</div>
@endsection 