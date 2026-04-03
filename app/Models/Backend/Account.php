<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';

    protected $fillable = [
        'date',
        'description',
        'category',
        'income',
        'expense'
    ];
}
