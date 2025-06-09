<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'ProductId';
    protected $fillable = [
        'Product_Name',
    ];

    public function stockIn()
    {
        return $this->hasMany(StockIn::class, 'Product_Id');
    }

    public function stockOut()
    {
        return $this->hasMany(StockOut::class, 'Product_Id');
    }
} 