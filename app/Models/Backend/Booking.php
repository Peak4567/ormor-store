<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $fillable = [
        'booking_code',  
        'username', 
        'product_code',
        'product_name', 
        'price', 
        'status',       
        'booking_date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_code', 'product_code');
    }
}