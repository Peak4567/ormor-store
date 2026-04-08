<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                if (str_starts_with($search, '#')) {
                    $cleanCode = ltrim($search, '#');
                    $q->where('product_code', 'like', "%{$cleanCode}%");
                } else {
                    $q->where('username', 'like', "%{$search}%")
                        ->orWhere('product_name', 'like', "%{$search}%")
                        ->orWhere('booking_code', 'like', "%{$search}%");
                }
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $bookings = $query->latest()->paginate(10)->appends($request->all());

        $bookings->getCollection()->transform(function ($item) {
            $date = Carbon::parse($item->booking_date);

            $item->thai_date = $date->copy()->addYears(543)->locale('th')->translatedFormat('j M Y');
            $item->day_name = $date->copy()->locale('th')->translatedFormat('(วันl)');

            $item->display_time = $item->booking_time ? $item->booking_time . ' น.' : 'ไม่ได้ระบุเวลา';

            return $item;
        });

        return view('backend.booking', compact('bookings'));
    }
    public function updateStatus(Request $request, $id)
    {
        try {
            $booking = Booking::findOrFail($id);

            $booking->status = $request->status;
            $booking->save();

            return redirect()->back()->with('success', 'อัปเดตสถานะเรียบร้อยแล้ว');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด ไม่สามารถอัปเดตสถานะได้');
        }
    }
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->delete();

        return back()->with('success', 'ลบรายการจองเรียบร้อยแล้ว');
    }
}
