<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::withCount(['bookings as success_bookings_count' => function ($query) {
            $query->where('status', 'สำเร็จ');
        }])
            ->get();
        return view('frontend.home', compact('products'));
    }
}
