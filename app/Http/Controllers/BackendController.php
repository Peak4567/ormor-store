<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class BackendController extends Controller
{
    public function index()
    {
        // 2. ดึงผลรวมจากคอลัมน์ amount (เปลี่ยนชื่อคอลัมน์ได้ตามที่คุณตั้งไว้ในฐานข้อมูล)
        $totalIncome = Account::sum('income'); // เปลี่ยนชื่อคอลัมน์เป็น income ตามที่คุณตั้งไว้

        // 3. ส่งตัวแปร $totalIncome ไปที่ View 'backend.home'
        return view('backend.home', compact('totalIncome'));
    }
}