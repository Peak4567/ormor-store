<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Booking;
use App\Models\Backend\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
            $date = \Carbon\Carbon::parse($item->booking_date);
            $item->thai_date = $date->copy()->addYears(543)->locale('th')->translatedFormat('j M Y');
            $item->day_name = $date->copy()->locale('th')->translatedFormat('(วันl)');
            $item->display_time = $item->booking_time ? $item->booking_time . ' น.' : 'ไม่ได้ระบุเวลา';
            return $item;
        });

        $months = \Illuminate\Support\Facades\DB::table('bookings')
            ->where('status', 'สำเร็จ')
            ->selectRaw("DATE_FORMAT(booking_date, '%Y-%m') as month_key, DATE_FORMAT(booking_date, '%M %Y') as month_name")
            ->distinct()
            ->orderBy('month_key', 'desc')
            ->pluck('month_name', 'month_key')
            ->toArray();

        $selectedMonth = $request->input('selected_month', now()->format('Y-m'));

        $summaryData = \Illuminate\Support\Facades\DB::table('bookings')
            ->where('status', 'สำเร็จ')
            ->whereRaw("DATE_FORMAT(booking_date, '%Y-%m') = ?", [$selectedMonth])
            ->get()
            ->groupBy('username')
            ->map(function ($group) {
                return [
                    'username' => $group->first()->username ?? '-',
                    'count' => $group->count(),
                    'total_price' => $group->sum('price'),
                ];
            })
            ->values();

        return view('backend.booking', compact('bookings', 'months', 'selectedMonth', 'summaryData'));
    }
    public function bulkUpdate(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'status' => 'required|string'
        ]);

        try {
            DB::transaction(function () use ($request) {
                if ($request->status === 'สำเร็จ') {
                    $bookingsToProcess = Booking::whereIn('id', $request->ids)
                        ->where('status', '!=', 'สำเร็จ')
                        ->get();

                    foreach ($bookingsToProcess as $booking) {
                        Account::create([
                            'date' => now()->toDateString(),
                            'description' => "รายรับจากรายการจองรหัส: " . $booking->booking_code . " สินค้า: " . $booking->product_name . " (" . $booking->username . ")",
                            'category' => 'รายรับ',
                            'income' => $booking->price,
                            'expense' => 0.00
                        ]);
                    }
                } else {
                    $bookingsToRevert = Booking::whereIn('id', $request->ids)
                        ->where('status', 'สำเร็จ')
                        ->get();

                    foreach ($bookingsToRevert as $booking) {
                        $descriptionMatch = "รายรับจากรายการจองรหัส: " . $booking->booking_code . " สินค้า: " . $booking->product_name . " (" . $booking->username . ")";
                        Account::where('description', $descriptionMatch)->delete();
                    }
                }

                Booking::whereIn('id', $request->ids)->update(['status' => $request->status]);
            });

            return response()->json([
                'success' => true,
                'message' => 'อัปเดตสถานะและปรับปรุงบัญชีเรียบร้อยแล้ว'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $booking = Booking::findOrFail($id);

                if ($request->status === 'สำเร็จ' && $booking->status !== 'สำเร็จ') {
                    Account::create([
                        'date' => now()->toDateString(),
                        'description' => "รายรับจากรายการจองรหัส: " . $booking->booking_code . " สินค้า: " . $booking->product_name . " (" . $booking->username . ")",
                        'category' => 'รายรับ',
                        'income' => $booking->price,
                        'expense' => 0.00
                    ]);
                } elseif ($request->status !== 'สำเร็จ' && $booking->status === 'สำเร็จ') {
                    $descriptionMatch = "รายรับจากรายการจองรหัส: " . $booking->booking_code . " สินค้า: " . $booking->product_name . " (" . $booking->username . ")";
                    Account::where('description', $descriptionMatch)->delete();
                }

                $booking->status = $request->status;
                $booking->save();
            });

            return redirect()->back()->with('success', 'อัปเดตสถานะและปรับปรุงบัญชีเรียบร้อยแล้ว');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด ไม่สามารถอัปเดตสถานะได้: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status === 'สำเร็จ') {
            $descriptionMatch = "รายรับจากรายการจองรหัส: " . $booking->booking_code . " สินค้า: " . $booking->product_name . " (" . $booking->username . ")";
            Account::where('description', $descriptionMatch)->delete();
        }

        $booking->delete();

        return back()->with('success', 'ลบรายการจองเรียบร้อยแล้ว');
    }
}
