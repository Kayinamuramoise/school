@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Welcome to Sainte Anne Kitchen Stock Management</h1>
                <p class="card-text">
                    This system helps you manage your kitchen stock efficiently. You can:
                </p>
                <ul>
                    <li>Manage products inventory</li>
                    <li>Record stock purchases (Stock In)</li>
                    <li>Record stock usage (Stock Out)</li>
                    <li>Generate reports for specific periods</li>
                </ul>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <a href="{{ route('products.index') }}" class="btn btn-primary w-100">
                            Manage Products
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('stock-in.index') }}" class="btn btn-success w-100">
                            Stock In Records
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('stock-out.index') }}" class="btn btn-warning w-100">
                            Stock Out Records
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('stock-in.report') }}" class="btn btn-info w-100">
                            View Reports
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 