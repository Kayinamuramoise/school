<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockIn;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    public function index()
    {
        $stockIns = StockIn::with('product')->orderBy('Date', 'desc')->get();
        return view('stock-in.index', compact('stockIns'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stock-in.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Product_Id' => 'required|exists:products,ProductId',
            'Date' => 'required|date',
            'Quantity' => 'required|numeric|min:0',
            'Unit_Price' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['Total_Price'] = $data['Quantity'] * $data['Unit_Price'];

        StockIn::create($data);
        return redirect()->route('stock-in.index')->with('success', 'Stock in record created successfully.');
    }

    public function report(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = StockIn::with('product');

        if ($startDate && $endDate) {
            $query->whereBetween('Date', [$startDate, $endDate]);
        }

        $stockIns = $query->orderBy('Date', 'desc')->get();
        $totalAmount = $stockIns->sum('Total_Price');

        return view('stock-in.report', compact('stockIns', 'totalAmount', 'startDate', 'endDate'));
    }
} 