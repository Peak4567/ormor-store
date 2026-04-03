<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%")
                ->orWhere('email', 'like', "%{$request->search}%")
                ->orWhere('users_code', 'like', "%{$request->search}%");
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        $users = $query->latest()->paginate(10);
        $users->getCollection()->transform(function ($user) {
            $user->thai_date = Carbon::parse($user->created_at)->addYears(543)->locale('th')->translatedFormat('j M Y');
            return $user;
        });

        return view('backend.users', compact('users'));
    }
    public function changeLevel(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->level = $request->level;
        $user->save();

        return redirect()->back()->with('success', 'อัปเดตตำแหน่งสำเร็จแล้ว');
    }
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'ลบสมาชิกเรียบร้อยแล้ว');
    }
}
