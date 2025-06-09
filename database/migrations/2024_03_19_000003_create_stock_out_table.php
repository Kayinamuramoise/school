<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stock_out', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Product_Id');
            $table->date('Date');
            $table->decimal('Quantity', 10, 2);
            $table->timestamps();
            
            $table->foreign('Product_Id')->references('ProductId')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_out');
    }
}; 