<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDate extends Model
{
    use HasFactory;

    protected $table = 'product_dates';

    protected $fillable = [
        'product_id',
        'date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}