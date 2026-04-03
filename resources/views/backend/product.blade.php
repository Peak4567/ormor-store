@extends('backend.layouts')
@section('title', 'รายการสินค้า')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <div class="sm:pt-25 pb-10">
        <div class="container mx-auto px-4 w-full space-y-6 ">

            <form action="{{ route('backend.product') }}" method="GET">
                <div class="bg-white rounded-md border border-gray-100 p-6">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="relative flex-1">
                            <i
                                class="fa-solid fa-magnifying-glass absolute left-5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="ค้นหาชื่อสินค้าหรือรหัสสินค้า (ID)...."
                                class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">
                        </div>
                        <button type="submit"
                            class="px-8 py-2.5 bg-green-500 text-white hover:bg-green-600 rounded-full text-sm font-bold transition-colors">
                            ค้นหา
                        </button>
                        @if (request()->anyFilled(['search', 'price_sort', 'day_filter']))
                            <a href="{{ route('backend.product') }}"
                                class="text-xs text-gray-400 hover:text-red-500 font-bold">ล้างตัวกรอง</a>
                        @endif
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="font-extrabold text-gray-800 text-sm">ตัวกรอง</span>

                        <div class="relative">
                            <select name="price_sort" onchange="this.form.submit()"
                                class="appearance-none bg-white border border-gray-100 rounded-2xl px-5 py-2.5 pr-12 text-sm text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-gray-200 cursor-pointer min-w-[160px]">
                                <option value="">ราคาสินค้า</option>
                                <option value="high" {{ request('price_sort') == 'high' ? 'selected' : '' }}>ราคามาก -
                                    น้อย</option>
                                <option value="low" {{ request('price_sort') == 'low' ? 'selected' : '' }}>ราคาน้อย - มาก
                                </option>
                            </select>
                            <i
                                class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 text-[10px] pointer-events-none"></i>
                        </div>

                        <div class="relative">
                            <select name="day_filter" onchange="this.form.submit()"
                                class="appearance-none bg-white border border-gray-100 rounded-2xl px-5 py-2.5 pr-12 text-sm text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-gray-200 cursor-pointer min-w-[160px]">
                                <option value="">ทุกวัน</option>
                                @foreach (['Monday' => 'จันทร์', 'Tuesday' => 'อังคาร', 'Wednesday' => 'พุธ', 'Thursday' => 'พฤหัสบดี', 'Friday' => 'ศุกร์', 'Saturday' => 'เสาร์', 'Sunday' => 'อาทิตย์'] as $key => $label)
                                    <option value="{{ $key }}"
                                        {{ request('day_filter') == $key ? 'selected' : '' }}>วัน{{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            <i
                                class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 text-[10px] pointer-events-none"></i>
                        </div>
                    </div>
                </div>
            </form>

            <div class="bg-white rounded-md border border-gray-100 p-6 flex flex-col min-h-[500px]">

                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-xl font-extrabold text-gray-800">รายการสินค้าทั้งหมด</h2>
                        <p class="text-[13px] text-gray-400 mt-1 font-medium">จัดการรายการสินค้าทั้งหมดพร้อมเพิ่มสต็อคลงระบบ
                        </p>
                    </div>
                    <button onclick="toggleModal()"
                        class="bg-[#5B73FA] hover:bg-[#4860e8] text-white px-6 py-2.5 rounded-2xl text-sm font-bold transition-all">
                        เพิ่มสินค้า
                    </button>
                </div>

                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-sm text-center whitespace-nowrap">
                        <thead class="text-gray-800 font-extrabold">
                            <tr class="bg-[#F8F9FA]">
                                <th class="py-4 px-4 rounded-l-2xl w-16">#</th>
                                <th class="py-4 px-4 text-left">ชื่อสินค้า</th>
                                <th class="py-4 px-4">ราคาสินค้า</th>
                                <th class="py-4 px-4">ราคาตัวแทน</th>
                                <th class="py-4 px-4">สถานะ</th>
                                <th class="py-4 px-4">วันที่สร้าง</th>
                                <th class="py-4 px-4 rounded-r-2xl w-32">จัดการ</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 font-medium">
                            @forelse ($products as $product)
                                <tr class="border-b border-gray-50/50 hover:bg-gray-50/30 transition-colors">

                                    <td class="py-5 px-4 text-gray-800 font-bold">{{ $product->id }}</td>

                                    <td class="py-5 px-4 text-left">
                                        <div class="text-gray-800 font-bold">{{ $product->product_name }}</div>
                                        <div class="text-[11px] text-gray-400 mt-0.5">(สต็อค {{ $product->stock }} ชิ้น)
                                            <div
                                                class="text-[10px] font-black text-blue-500 mb-1 uppercase bg-blue-50 px-2 py-0.5 rounded-md inline-block">
                                                #{{ $product->product_code }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-5 px-4">{{ number_format($product->main_price, 2) }} บาท</td>
                                    <td class="py-5 px-4">{{ number_format($product->agent_price, 2) }} บาท</td>
                                    <td class="py-5 px-4 text-gray-800 font-bold">
                                        @if ($product->status == 'เปิดจอง')
                                            <div class="text-green-500">{{ $product->status }}</div>
                                        @else
                                            <div class="text-red-500">{{ $product->status }}</div>
                                        @endif
                                        <div class="text-[11px] text-gray-400 mt-0.5 font-medium">
                                            ({{ $product->day_name }})
                                        </div>

                                    </td>

                                    <td class="py-5 px-4 text-gray-800 font-bold">
                                        {{ $product->created_date_thai }}
                                    </td>

                                    <td class="py-5 px-4">
                                        <div class="flex items-center justify-center gap-2.5">
                                            <button onclick="openEditModal({{ $product->toJson() }})"
                                                class="w-9 h-9 flex items-center justify-center bg-[#C3E8CB] text-[#4FA960] rounded-xl hover:bg-green-300 transition-colors">
                                                <i class="fa-solid fa-gear"></i>
                                            </button>
                                            <button type="button"
                                                onclick="confirmDelete({{ $product->id }}, '{{ $product->product_name }}', '{{ route('backend.product.destroy', $product->id) }}')"
                                                class="w-9 h-9 flex items-center justify-center bg-[#FFB5B5] text-[#FF5B5B] rounded-xl hover:bg-red-300 transition-colors">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-20 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div
                                                class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                                <i class="fa-solid fa-box-open text-4xl text-gray-200"></i>
                                            </div>
                                            <h3 class="text-lg font-extrabold text-gray-800">ไม่พบรายการสินค้า</h3>
                                            <p class="text-sm text-gray-400 mt-1">ยังไม่มีการเพิ่มข้อมูลสินค้าลงในระบบ</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-12 flex justify-between items-center bg-white p-5 rounded-md border border-gray-100">
                    <div class="text-[14px] text-[#2CB05C] font-extrabold">
                        แสดง {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} จาก
                        {{ $products->total() }} รายการ
                    </div>
                    <div class="custom-pagination">
                        {{ $products->links('pagination::tailwind') }}
                    </div>
                </div>

            </div>

        </div>
    </div>
    @include('backend.components.add-product-modal')
    @include('backend.components.edit-product-modal')
    @include('backend.components.sweetalert-messages')
    <script src="{{ asset('assets/js/backend/add-product-modal.js') }}"></script>
    <script src="{{ asset('assets/js/backend/edit-product-modal.js') }}"></script>
    <script src="{{ asset('assets/js/backend/sweetalert.js') }}"></script>
@endsection
