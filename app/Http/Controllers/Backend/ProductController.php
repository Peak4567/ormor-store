<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\Backend\Product\ProductDate;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('timeSlots', 'saleDates')->get();

        foreach ($products as $product) {
            $upcomingDate = $product->saleDates
                ->where('date', '>=', Carbon::today()->format('Y-m-d'))
                ->sortBy('date')
                ->first();

            if ($upcomingDate) {
                $product->day_name = Carbon::parse($upcomingDate->date)
                    ->locale('th')
                    ->translatedFormat('l');
            } else {
                if ($product->saleDates->isNotEmpty()) {
                    $product->day_name = 'หมดเวลา';
                } else {
                    $product->day_name = 'ไม่ระบุ';
                }
            }

            if ($product->created_at) {
                $product->created_date_thai = Carbon::parse($product->created_at)
                    ->addYears(543)
                    ->locale('th')
                    ->translatedFormat('j M Y');
            } else {
                $product->created_date_thai = 'ไม่ระบุ';
            }
        }

        $query = Product::with(['timeSlots', 'saleDates']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                    ->orWhere('id', $search);
            });
        }

        if ($request->filled('day_filter')) {
            $dayName = $request->day_filter;
            $query->whereHas('saleDates', function ($q) use ($dayName) {
                $q->whereRaw("DAYNAME(date) = ?", [$dayName]);
            });
        }

        if ($request->price_sort == 'high') {
            $query->orderBy('main_price', 'desc');
        } elseif ($request->price_sort == 'low') {
            $query->orderBy('main_price', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->latest()->paginate(10)->appends($request->all());

        foreach ($products as $product) {
            $upcomingDate = $product->saleDates
                ->where('date', '>=', Carbon::today()->format('Y-m-d'))
                ->sortBy('date')
                ->first();

            if ($upcomingDate) {
                $product->day_name = Carbon::parse($upcomingDate->date)->locale('th')->translatedFormat('l');
            } else {
                $product->day_name = $product->saleDates->isNotEmpty() ? 'ผ่านไปแล้ว' : 'ไม่ระบุ';
            }

            $product->created_date_thai = $product->created_at
                ? Carbon::parse($product->created_at)->addYears(543)->locale('th')->translatedFormat('j M Y')
                : 'ไม่ระบุ';
        }

        return view('backend.product', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'main_price' => 'required|numeric',
            'discount_amount' => 'nullable|numeric'
        ]);

        do {
            $prefix = 'ORMOR';
            $randomPool = \Illuminate\Support\Str::random(8);
            $productCode = $prefix . $randomPool;
            $exists = Product::where('product_code', $productCode)->exists();
        } while ($exists);

        $discountUsers = null;
        if ($request->has('discount_users')) {
            $users = array_filter(array_map('trim', explode(',', $request->discount_users)));
            $users = array_slice($users, 0, 8);
            $discountUsers = implode(',', $users);
        }

        $product = Product::create([
            'product_code' => $productCode,
            'product_name' => $request->product_name,
            'main_price' => $request->main_price,
            'agent_price'  => $request->agent_price ?: null,
            'stock' => $request->stock ?: null,
            'status' => $request->status ?? 'เปิดจอง',
            'note' => $request->note ?? null,
            'discount_users' => $discountUsers,
            'discount_amount' => $request->discount_amount ?: 0.00,
        ]);

        if ($request->has('dates')) {
            foreach ($request->dates as $dateValue) {
                if (!empty($dateValue)) {
                    $product->saleDates()->create([
                        'date' => $dateValue
                    ]);
                }
            }
        }

        if ($request->has('start_times') && $request->has('end_times')) {
            foreach ($request->start_times as $index => $startTime) {
                $endTime = $request->end_times[$index] ?? null;
                if (!empty($startTime) && !empty($endTime)) {
                    $product->timeSlots()->create([
                        'start_time' => $startTime,
                        'end_time' => $endTime,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'เพิ่มสินค้าสำเร็จ! รหัสสินค้าคือ: ' . $productCode);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'product_name' => 'required|string|max:255',
            'main_price' => 'required|numeric',
            'discount_amount' => 'nullable|numeric'
        ]);

        $discountUsers = null;
        if ($request->has('discount_users')) {
            $users = array_filter(array_map('trim', explode(',', $request->discount_users)));
            $users = array_slice($users, 0, 8);
            $discountUsers = implode(',', $users);
        }

        $product->update([
            'product_name' => $request->product_name,
            'main_price' => $request->main_price,
            'agent_price'  => $request->agent_price ?: null,
            'stock' => $request->stock ?: null,
            'status' => $request->has('status') ? 'เปิดจอง' : 'ปิดจอง',
            'note' => $request->note ?? null,
            'discount_users' => $discountUsers,
            'discount_amount' => $request->discount_amount ?: 0.00,
        ]);

        $product->saleDates()->delete();
        $product->timeSlots()->delete();

        if ($request->has('dates')) {
            foreach ($request->dates as $dateValue) {
                if (!empty($dateValue)) {
                    $product->saleDates()->create([
                        'date' => $dateValue
                    ]);
                }
            }
        }

        if ($request->has('start_times')) {
            foreach ($request->start_times as $index => $startTime) {
                $endTime = $request->end_times[$index] ?? null;
                if (!empty($startTime) && !empty($endTime)) {
                    $product->timeSlots()->create([
                        'start_time' => $startTime,
                        'end_time' => $endTime,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'แก้ไขข้อมูลเรียบร้อยแล้ว');
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return redirect()->back()->with('success', 'ลบสินค้าเรียบร้อยแล้ว');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'ไม่สามารถลบข้อมูลได้');
        }
    }
}