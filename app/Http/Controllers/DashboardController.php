<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income; // เรียกใช้ Model Income

class DashboardController extends Controller
{
    public function index()
    {
        // คำนวณผลรวมของคอลัมน์ amount ทั้งหมดในตาราง incomes
        $totalIncome = Income::sum('amount');
        
        // ส่งตัวแปร $totalIncome ไปยัง view ที่ชื่อ dashboard
        return view('dashboard', compact('totalIncome'));
    }
}