<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            
            $table->decimal('main_price', 10, 2)->default(0.00);
            $table->decimal('agent_price', 10, 2)->default(0.00);
            
            $table->integer('stock')->default(0);
            
            $table->enum('status', ['เปิดจอง', 'ปิดจอง'])->default('เปิดจอง');
            
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};