<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockOut;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    public function index()
    {
        $stockOuts = StockOut::with('product')->orderBy('Date', 'desc')->get();
        return view('stock-out.index', compact('stockOuts'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stock-out.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Product_Id' => 'required|exists:products,ProductId',
            'Date' => 'required|date',
            'Quantity' => 'required|numeric|min:0',
        ]);

        StockOut::create($request->all());
        return redirect()->route('stock-out.index')->with('success', 'Stock out record created successfully.');
    }

    public function report(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = StockOut::with('product');

        if ($startDate && $endDate) {
            $query->whereBetween('Date', [$startDate, $endDate]);
        }

        $stockOuts = $query->orderBy('Date', 'desc')->get();

        return view('stock-out.report', compact('stockOuts', 'startDate', 'endDate'));
    }
} 