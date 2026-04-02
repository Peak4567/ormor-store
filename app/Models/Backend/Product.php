<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
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
        return $this->hasMany(TimeSlot::class);
    }
    public function saleDates()
    {
        return $this->hasMany(ProductDate::class, 'product_id');
    }
}
