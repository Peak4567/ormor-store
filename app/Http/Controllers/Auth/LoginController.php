<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $remember = $request->has('remember');

        if (Auth::attempt([$loginType => $request->login, 'password' => $request->password], $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'ยินดีต้อนรับกลับมาครับ!');
        }

        return back()->withErrors([
            'login' => 'ข้อมูลประจำตัวไม่ถูกต้อง หรือรหัสผ่านผิดพลาด',
        ])->onlyInput('login');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}