@extends('backend.layouts')
@section('title', 'รายการสินค้า')

@section('content')
    <div class="sm:pt-25 pb-10">
        <div class="container mx-auto px-4 w-full space-y-6 ">

            {{-- 1. Search & Filter Section --}}
            <div class="bg-white rounded-xl border border-gray-100 p-6">

                {{-- Search Bar --}}
                <div class="flex items-center gap-4 mb-6">
                    <div class="relative flex-1">
                        <i class="fa-solid fa-magnifying-glass absolute left-5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="text" placeholder="ค้นหาสินค้าและรหัสสินค้า...."
                            class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">
                    </div>
                    <button type="button"
                        class="px-8 py-2.5 bg-white border border-green-500 text-green-500 hover:bg-green-50 rounded-full text-sm font-bold transition-colors">
                        ค้นหา
                    </button>
                </div>

                {{-- Filters --}}
                <div class="flex items-center gap-4">
                    <span class="font-extrabold text-gray-800 text-sm">ตัวกรอง</span>

                    <div class="relative">
                        <select
                            class="appearance-none bg-white border border-gray-100 rounded-2xl px-5 py-2.5 pr-12 text-sm text-gray-400 font-medium focus:outline-none focus:ring-2 focus:ring-gray-200 cursor-pointer min-w-[160px]">
                            <option>ราคาสินค้า</option>
                        </select>
                        <i
                            class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 text-[10px] pointer-events-none"></i>
                    </div>

                    <div class="relative">
                        <select
                            class="appearance-none bg-white border border-gray-100 rounded-2xl px-5 py-2.5 pr-12 text-sm text-gray-400 font-medium focus:outline-none focus:ring-2 focus:ring-gray-200 cursor-pointer min-w-[160px]">
                            <option>ทุกวัน</option>
                        </select>
                        <i
                            class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 text-[10px] pointer-events-none"></i>
                    </div>
                </div>
            </div>

            {{-- 2. Table Section --}}
            <div class="bg-white rounded-xl border border-gray-100 p-6 flex flex-col min-h-[500px]">

                {{-- Table Header & Action --}}
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

                {{-- Main Table --}}
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-sm text-center whitespace-nowrap">
                        {{-- Table Head (สีเทาอ่อน ขอบมน) --}}
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

                                    {{-- ลำดับ / ID --}}
                                    <td class="py-5 px-4 text-gray-800 font-bold">{{ $product->id }}</td>

                                    {{-- ชื่อสินค้า --}}
                                    <td class="py-5 px-4 text-left">
                                        <div class="text-gray-800 font-bold">{{ $product->product_name }}</div>
                                        <div class="text-[11px] text-gray-400 mt-0.5">(สต็อค {{ $product->stock }} ชิ้น)
                                        </div>
                                    </td>

                                    {{-- ราคาสินค้า --}}
                                    <td class="py-5 px-4">{{ number_format($product->main_price, 2) }} บาท</td>

                                    {{-- ราคาตัวแทน --}}
                                    <td class="py-5 px-4">{{ number_format($product->agent_price, 2) }} บาท</td>

                                    {{-- สถานะ --}}
                                    <td class="py-5 px-4 text-gray-800 font-bold">
                                        @if ($product->status == 'เปิดจอง')
                                            <div class="text-green-500">{{ $product->status }}</div>
                                        @else
                                            <div class="text-red-500">{{ $product->status }}</div>
                                        @endif
                                        <div class="text-[11px] text-gray-400 mt-0.5 font-medium">
                                            (วัน{{ $product->day_name }})
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

                <div class="mt-8 flex justify-between items-center">
                    <div class="text-[13px] text-[#2CB05C] font-bold">
                        แสดง 1-10 จาก 15
                    </div>

                    <div class="flex items-center gap-2 font-bold text-sm">
                        <button
                            class="w-8 h-8 flex items-center justify-center text-gray-800 hover:text-green-500 transition-colors"><i
                                class="fa-solid fa-chevron-left text-xs"></i></button>

                        <button
                            class="w-8 h-8 flex items-center justify-center bg-[#51CA74] text-white rounded-[10px]">1</button>

                        <button
                            class="w-8 h-8 flex items-center justify-center bg-white border-2 border-[#51CA74] text-[#51CA74] rounded-[10px] hover:bg-green-50 transition-colors">2</button>

                        <button
                            class="w-8 h-8 flex items-center justify-center text-gray-800 hover:text-green-500 transition-colors"><i
                                class="fa-solid fa-chevron-right text-xs"></i></button>
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
