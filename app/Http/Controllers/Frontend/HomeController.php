<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\Backend\Booking;
use App\Models\Backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with(['saleDates' => function ($query) {
            $query->orderBy('date', 'asc');
        }, 'timeSlots'])
            ->withCount(['bookings as success_bookings_count' => function ($query) {
                $query->where('status', 'สำเร็จ');
            }])
            ->get();

        $now = now();
        $todayDate = $now->format('Y-m-d');
        $currentTime = $now->format('H:i:s');
        $thaiMonths = ['', 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];

        $products->transform(function ($product) use ($todayDate, $currentTime, $thaiMonths) {

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
                        }
                        elseif ($currentTime < $slot->start_time) {
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

        $stats = [
            'totalSuccessBookings' => Booking::where('status', 'สำเร็จ')->count(),
            'currentQueue'         => Booking::whereIn('status', ['รอตรวจสอบ', 'กำลังดำเนินการ'])->count(),
            'totalStock'           => Product::sum('stock'),
            'totalUsers'           => User::count(),
        ];

        return view('frontend.home', array_merge(['products' => $products], $stats));
    }
}