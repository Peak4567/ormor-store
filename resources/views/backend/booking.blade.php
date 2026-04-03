@extends('backend.layouts')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <div class="sm:pt-25 pb-10 font-[Prompt]">
        <div class="container mx-auto px-4 space-y-6">

            {{-- ส่วนค้นหาและตัวกรอง (ปรับให้มนและสะอาดขึ้น) --}}
            <form action="{{ route('backend.booking') }}" method="GET">
                <div class="bg-white rounded-md border border-gray-100 p-6">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="relative flex-1">
                            <i
                                class="fa-solid fa-magnifying-glass absolute left-5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="ค้นหาชื่อผู้ใช้รายการจองและไอดีสินค้า/ไอดีการจอง...."
                                class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">
                        </div>
                        <button type="submit"
                            class="px-8 py-2.5 bg-green-500 text-white hover:bg-green-600 rounded-full text-sm font-bold transition-colors">
                            ค้นหา
                        </button>
                        @if (request()->anyFilled(['search', 'status']))
                            <a href="{{ route('backend.booking') }}"
                                class="text-xs text-gray-400 hover:text-red-500 font-bold">ล้างตัวกรอง</a>
                        @endif
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="font-extrabold text-gray-800 text-sm">ตัวกรอง</span>
                        <div class="relative">
                            <select name="status" onchange="this.form.submit()"
                                class="appearance-none bg-white border border-gray-100 rounded-2xl px-5 py-2.5 pr-12 text-sm text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-gray-200 cursor-pointer min-w-[200px]">
                                <option value="">สถานะทั้งหมด</option>
                                <option value="รอตรวจสอบ" {{ request('status') == 'รอตรวจสอบ' ? 'selected' : '' }}>รอตรวจสอบ
                                </option>
                                <option value="กำลังดำเนินการ"
                                    {{ request('status') == 'กำลังดำเนินการ' ? 'selected' : '' }}>กำลังดำเนินการ</option>
                                <option value="สำเร็จ" {{ request('status') == 'สำเร็จ' ? 'selected' : '' }}>สำเร็จ</option>
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
                        <h2 class="text-xl font-extrabold text-gray-800">รายการจองสินค้า</h2>
                        <p class="text-[13px] text-gray-400 mt-1 font-medium">จัดการรายการจองสินค้าทั้งหมดในระบบ</p>
                    </div>
                </div>

                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-sm text-center whitespace-nowrap">
                        <thead class="text-gray-800 font-extrabold">
                            <tr class="bg-[#F8F9FA]">
                                <th class="py-4 px-4 rounded-l-2xl w-16">#</th>
                                <th class="py-4 px-4 text-left">ชื่อผู้ใช้</th>
                                <th class="py-4 px-4">สินค้า</th>
                                <th class="py-4 px-4">ราคา</th>
                                <th class="py-4 px-4">สถานะ</th>
                                <th class="py-4 px-4">วันที่สั่ง</th>
                                <th class="py-4 px-4 rounded-r-2xl w-32">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 font-medium">
                            @forelse ($bookings as $booking)
                                <tr class="border-b border-gray-50/50 hover:bg-gray-50/30 transition-colors">
                                    <td class="py-5 px-4 text-gray-800 font-bold">{{ $booking->id }}</td>
                                    <td class="py-5 px-4 text-left">
                                        <div class="text-gray-800 text-[15px] mb-0.5">{{ $booking->username }}
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <span
                                                class="text-[10px] font-bold text-[#2CB05C] bg-green-50 px-2 py-0.5 rounded-lg border border-green-100/50 uppercase tracking-wider">
                                                ID: {{ $booking->booking_code }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-5 px-4 text-center">
                                        <div class="text-gray-800 font-bold text-sm">{{ $booking->product_name }}</div>
                                        <div
                                            class="text-[10px] text-blue-500 mb-1 uppercase bg-blue-50 px-2 py-0.5 rounded-md inline-block">
                                            #{{ $booking->product_code }}
                                        </div>
                                    </td>
                                    <td class="py-5 px-4 font-bold">{{ number_format($booking->price, 2) }} บาท</td>
                                    <td class="py-5 px-4">
                                        <div class="relative inline-block text-left w-36">
                                            <select onchange="updateBookingStatus({{ $booking->id }}, this.value)"
                                                class="appearance-none w-full px-3 py-1.5 rounded-xl text-xs font-bold border transition-all cursor-pointer focus:outline-none text-center
            @if ($booking->status == 'สำเร็จ') bg-green-50 text-green-600 border-green-200 
            @elseif ($booking->status == 'รอตรวจสอบ') bg-yellow-50 text-yellow-600 border-yellow-200 
            @elseif ($booking->status == 'กำลังดำเนินการ') bg-blue-50 text-blue-600 border-blue-200 
            @elseif ($booking->status == 'ยกเลิก') bg-red-50 text-red-600 border-red-200 @endif">

                                                <option value="รอตรวจสอบ" class="bg-white text-yellow-600"
                                                    {{ $booking->status == 'รอตรวจสอบ' ? 'selected' : '' }}>รอตรวจสอบ
                                                </option>
                                                <option value="กำลังดำเนินการ" class="bg-white text-blue-600"
                                                    {{ $booking->status == 'กำลังดำเนินการ' ? 'selected' : '' }}>
                                                    กำลังดำเนินการ</option>
                                                <option value="สำเร็จ" class="bg-white text-green-600"
                                                    {{ $booking->status == 'สำเร็จ' ? 'selected' : '' }}>สำเร็จ</option>
                                                <option value="ยกเลิก" class="bg-white text-red-600"
                                                    {{ $booking->status == 'ยกเลิก' ? 'selected' : '' }}>ยกเลิก</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-current opacity-60">
                                                <i class="fa-solid fa-chevron-down text-[10px]"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-5 px-4 text-gray-800 font-bold">
                                        {{ $booking->thai_date }}
                                        <div class="flex items-center justify-center gap-1.5">
                                            <span class="text-[#2CB05C] text-[12px] tracking-tighter italic">
                                                {{ $booking->booking_time }}
                                            </span>
                                        </div>
                                        <div class="text-[11px] text-gray-400 mt-0.5 font-medium">{{ $booking->day_name }}
                                        </div>
                                    </td>

                                    <td class="py-5 px-4">
                                        <div class="flex items-center justify-center gap-2.5">
                                            <button type="button"
                                                onclick="confirmDelete({{ $booking->id }}, '{{ $booking->username }}', '{{ route('backend.booking.destroy', $booking->id) }}')"
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
                                                <i class="fa-solid fa-calendar-xmark text-4xl text-gray-200"></i>
                                            </div>
                                            <h3 class="text-lg font-extrabold text-gray-800">ไม่พบรายการจอง</h3>
                                            <p class="text-sm text-gray-400 mt-1">ยังไม่มีการเพิ่มข้อมูลการจองลงในระบบ</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-12 flex justify-between items-center bg-white p-5 rounded-md border border-gray-100">
                    <div class="text-[14px] text-[#2CB05C] font-extrabold">
                        แสดง {{ $bookings->firstItem() ?? 0 }}-{{ $bookings->lastItem() ?? 0 }} จาก
                        {{ $bookings->total() }} รายการ
                    </div>
                    <div class="custom-pagination">
                        {{ $bookings->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backend.components.sweetalert-messages')
    <script src="{{ asset('assets/js/backend/sweetalert.js') }}"></script>
    <script src="{{ asset('assets/js/backend/update-booking-status.js') }}"></script>
@endsection
