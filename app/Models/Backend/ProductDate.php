<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDate extends Model
{
    use HasFactory;

    // กำหนดชื่อตารางให้ตรงกับในฐานข้อมูล
    protected $table = 'product_dates';

    // กำหนดฟิลด์ที่อนุญาตให้บันทึกข้อมูลแบบ Mass Assignment
    protected $fillable = [
        'product_id',
        'date'
    ];

    /**
     * ความสัมพันธ์กลับไปยัง Product (หนึ่งวันที่ เป็นของหนึ่งสินค้า)
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}