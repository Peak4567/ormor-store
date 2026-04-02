<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\Backend\Product\ProductDate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('timeSlots', 'saleDates')->get();

        foreach ($products as $product) {
            if ($product->date) {
                $product->day_name = Carbon::parse($product->date)->locale('th')->translatedFormat('l');
            } else {
                $product->day_name = 'ไม่ระบุ';
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

        return view('backend.product', compact('products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'main_price' => 'required|numeric',
        ]);

        $product = Product::create([
            'product_name' => $request->product_name,
            'main_price' => $request->main_price,
            'agent_price'  => $request->agent_price ?: null,
            'stock' => $request->stock ?: null,
            'status' => $request->status ?? 'เปิดจอง', 
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

        return redirect()->back()->with('success', 'เพิ่มสินค้าสำเร็จ!');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'product_name' => $request->product_name,
            'main_price' => $request->main_price,
            'agent_price'  => $request->agent_price ?: null,
            'stock' => $request->stock ?: null,
            'status' => $request->has('status') ? 'เปิดจอง' : 'ปิดจอง',
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
