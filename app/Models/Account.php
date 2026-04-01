<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    // ระบุชื่อตารางที่ต้องการเชื่อมต่อ
    protected $table = 'account';

    // ระบุคอลัมน์ที่อนุญาตให้เขียนข้อมูลลงไปได้
    protected $fillable = ['income'];
}