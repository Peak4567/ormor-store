<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('username', Auth::user()->username ?? Auth::user()->name)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.history', compact('bookings'));
    }

    public function cancel($id)
    {
        $booking = Booking::where('id', $id)
            ->where('username', Auth::user()->username ?? Auth::user()->name)
            ->first();

        if ($booking && $booking->status === 'รอตรวจสอบ') {
            $booking->status = 'ยกเลิก';
            $booking->save();

            return back()->with('success', 'ยกเลิกการจองเรียบร้อยแล้ว');
        }

        return back()->with('error', 'ไม่สามารถยกเลิกรายการนี้ได้');
    }
}
