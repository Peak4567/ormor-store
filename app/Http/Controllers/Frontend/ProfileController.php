<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\User; 

class ProfileController extends Controller
{
    public function edit()
    {
        $user = User::find(Auth::id()); 
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['required', 'string', 'max:20'],
            'shop_name' => ['nullable', 'string', 'max:255'],
            'line_id' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ], [
            'email.unique' => 'อีเมลนี้ถูกใช้งานโดยสมาชิกท่านอื่นแล้ว',
            'password.confirmed' => 'รหัสผ่านยืนยันไม่ตรงกัน',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->shop_name = $request->shop_name;
        $user->line_id = $request->line_id;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'อัปเดตข้อมูลส่วนตัวเรียบร้อยแล้วครับ');
    }
}