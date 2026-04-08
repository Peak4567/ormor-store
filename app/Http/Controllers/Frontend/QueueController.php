<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\Backend\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QueueController extends Controller
{
    public function index()
    {
        $products = Product::with(['saleDates' => function ($query) {
            $query->orderBy('date', 'asc');
        }, 'timeSlots' => function ($query) {
            $query->where('is_available', 1)->orderBy('start_time', 'asc');
        }])
            ->withCount(['bookings as success_bookings_count' => function ($query) {
                $query->where('status', 'สำเร็จ');
            }])
            ->get();

        $now = now();
        $todayDate = $now->format('Y-m-d');
        $currentTime = $now->format('H:i:s');
        $thaiMonths = ['', 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];

        $products->transform(function ($product) use ($todayDate, $currentTime, $thaiMonths) {

            $product->availableDatesArray = $product->saleDates ? $product->saleDates->pluck('date')->toArray() : [];

            $product->isOpenToday = $product->saleDates ? $product->saleDates->contains('date', $todayDate) : false;
            $product->isOpenTime = false;
            $product->isWaitingForTime = false;
            $targetSlot = null;

            if ($product->isOpenToday) {
                $activeSlots = $product->timeSlots ? $product->timeSlots->where('is_available', 1)->sortBy('start_time') : collect();

                if ($activeSlots->isEmpty()) {
                    $product->isOpenTime = true;
                } else {
                    foreach ($activeSlots as $slot) {
                        if ($currentTime >= $slot->start_time && $currentTime <= $slot->end_time) {
                            $product->isOpenTime = true;
                            $targetSlot = $slot;
                            break;
                        } elseif ($currentTime < $slot->start_time) {
                            $product->isWaitingForTime = true;
                            if (!$targetSlot) {
                                $targetSlot = $slot;
                            }
                        }
                    }
                    if (!$targetSlot) {
                        $targetSlot = $activeSlots->last();
                    }
                }
            } else {
                $targetSlot = $product->timeSlots ? $product->timeSlots->where('is_available', 1)->sortBy('start_time')->first() : null;
            }

            $product->canBook = $product->isOpenToday && $product->isOpenTime && $product->stock > 0 && $product->status == 'เปิดจอง';
            $product->isOutOfStock = !$product->canBook && !$product->isWaitingForTime;

            $tabCondition = "tab === 'all'";
            if ($product->success_bookings_count > 0) {
                $tabCondition .= " || tab === 'recommended'";
            }
            if ($product->canBook || $product->isWaitingForTime) {
                $tabCondition .= " || tab === 'soon'";
            }
            $product->tabCondition = $tabCondition;

            $product->displayPrice = (Auth::check() && Auth::user()->level === 'agent') ? $product->agent_price : $product->main_price;

            $firstDate = $product->saleDates ? $product->saleDates->first() : null;
            if ($firstDate) {
                $parsedDate = Carbon::parse($firstDate->date);
                $product->displayDate = $parsedDate->day . ' ' . $thaiMonths[$parsedDate->month] . ' ' . (($parsedDate->year + 543) % 100);
            } else {
                $product->displayDate = 'ยังไม่กำหนด';
            }

            if ($targetSlot) {
                $startTime = Carbon::parse($targetSlot->start_time)->format('H.i');
                $endTime = Carbon::parse($targetSlot->end_time)->format('H.i');
                $product->displayTime = $startTime . ' - ' . $endTime;
            } else {
                $product->displayTime = '-';
            }

            return $product;
        });

        $defaultProduct = $products->sortByDesc('success_bookings_count')->first();

        return view('frontend.queue', compact('products', 'defaultProduct'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required',
            'product_name' => 'required',
            'booking_date' => 'required|date',
        ]);

        try {
            $product = Product::where('product_code', $request->product_code)->first();

            if (!$product) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'ไม่พบข้อมูลสินค้า'
                ], 404);
            }

            if ($product->stock <= 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'ขออภัยครับ สินค้าชิ้นนี้หมดแล้ว'
                ], 400);
            }

            return DB::transaction(function () use ($request, $product) {

                $booking = new Booking();
                
                $prefix = 'M-';
                if (Auth::check()) {
                    if (Auth::user()->level === 'agent') {
                        $prefix = 'A-';
                    } elseif (Auth::user()->level === 'admin') {
                        $prefix = 'ADM-';
                    }
                }

                $booking->booking_code = $prefix . date('Ymd') . '-' . rand(1000, 9999);
                
                $booking->product_code = $request->product_code;
                $booking->product_name = $request->product_name;

                if (Auth::check()) {
                    $booking->username = Auth::user()->username ?? Auth::user()->name ?? 'Unknown';
                } else {
                    $booking->username = 'Guest';
                }

                $booking->price = $request->price ?? 0;
                $booking->status = 'รอตรวจสอบ';
                $booking->booking_date = $request->booking_date;
                $booking->booking_time = $request->booking_time;
                $booking->content = $request->note;
                $booking->save();

                $product->decrement('stock');

                return response()->json([
                    'status' => 'success',
                    'message' => 'จองคิวสำเร็จ และตัดสต็อกเรียบร้อยแล้ว',
                    'booking_code' => $booking->booking_code,
                    'remaining_stock' => $product->stock
                ], 200);
            });
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()
            ], 500);
        }
    }
}