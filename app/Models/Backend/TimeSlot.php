<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $fillable = [
        'product_id',
        'start_time',
        'end_time',
        'is_available',
    ];

    // สร้าง Relationship กลับไปยัง Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}