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

            $item->thai_date = $date->addYears(543)->locale('th')->translatedFormat('j M Y');
            $item->day_name = $date->parse($item->booking_date)->locale('th')->translatedFormat('(วันl)');
            $item->booking_time = $date->format('H:i') . ' น.';

            return $item;
        });

        return view('backend.booking', compact('bookings'));
    }
    public function updateStatus(Request $request, $id)
    {
        try {
            $booking = Booking::findOrFail($id);

            // 2. อัปเดตสถานะ
            $booking->status = $request->status;
            $booking->save();

            // 3. ส่งคำตอบกลับไปให้ Javascript
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // ถ้าพลาด ให้ส่ง error กลับไปดูใน Console
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->delete();

        return back()->with('success', 'ลบรายการจองเรียบร้อยแล้ว');
    }
}
