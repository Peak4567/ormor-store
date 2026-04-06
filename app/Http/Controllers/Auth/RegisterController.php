<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Backend\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.unique' => 'ชื่อผู้ใช้นี้ถูกใช้งานแล้ว',
            'email.unique' => 'อีเมลนี้ถูกใช้งานแล้ว',
            'password.confirmed' => 'รหัสผ่านยืนยันไม่ตรงกัน',
            'password.min' => 'รหัสผ่านต้องมีอย่างน้อย 8 ตัวอักษร',
        ]);

        $latestUser = User::latest('id')->first();
        $nextNumber = $latestUser ? $latestUser->id + 1 : 1;
        $usersCode = 'U' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
        
        $user = User::create([
            'users_code' => $usersCode,
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'level'      => 'member',
        ]);
        return redirect()->route('login.page')->with('success', 'สมัครสมาชิกสำเร็จ! กรุณาเข้าสู่ระบบเพื่อใช้งานครับ');
    }
}