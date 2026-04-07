<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_code',
        'product_name',
        'main_price',
        'agent_price',
        'stock',
        'status',
        'date',
        'time',
    ];
    public function timeSlots()
    {
        return $this->hasMany(TimeSlot::class, 'product_id');
    }
    public function saleDates()
    {
        return $this->hasMany(ProductDate::class, 'product_id');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'product_code', 'product_code');
    }
}
