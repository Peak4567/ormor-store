@extends('layouts')
@section('title', 'ประวัติการสั่งซื้อ | Ormor Topup Coins')
@section('content')

    <section class="min-h-screen mt-16 sm:mt-32 py-12 px-4" 
             x-data="historyWidget(@js($bookings))" 
             x-cloak>
             
        <div class="max-w-screen-lg mx-auto">

            <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-10 gap-6">
                <div class="text-center sm:text-left max-w-md">
                    <h2 class="text-4xl font-bold text-[#1E2A1E] tracking-tight mb-1">
                        ประวัติการ<span class="text-[#57C84D]">สั่งซื้อ</span>
                    </h2>
                    <p class="text-[#4B5B4B]/70 text-xs sm:text-base font-medium leading-relaxed">
                        สามารถติดตามและตรวจสอบสถานะการจองของคุณได้แบบ Real-time
                    </p>
                </div>

                <div class="flex flex-col items-center lg:items-end gap-3 w-full lg:max-w-sm">
                    <div class="relative w-full group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-duotone fa-solid fa-magnifying-glass text-[#57C84D]"></i>
                        </div>
                        <input type="text" x-model="search" @input="resetPage()" placeholder="ค้นหาแพ็กเกจ..."
                            class="w-full pl-11 pr-10 py-2.5 bg-slate-50/50 border border-slate-100 rounded-2xl text-sm text-slate-500 font-medium focus:border-[#57C84D]/50 focus:ring-0 transition-all duration-300">
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-2 w-full lg:justify-end">
                        <div class="w-full sm:w-auto">
                            <div class="relative flex items-center bg-slate-50/50 p-1 border border-slate-100 rounded-2xl">
                                <select x-model="sort" @change="resetPage()"
                                    class="w-full sm:w-auto bg-white text-[#57C84D] px-4 py-2 text-sm font-medium rounded-xl border-none focus:ring-0 cursor-pointer pl-3 pr-10 appearance-none">
                                    <option value="desc">ล่าสุด</option>
                                    <option value="asc">เก่าสุด</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400 text-[10px]">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        <div class="w-full sm:w-auto">
                            <div class="flex text-xs sm:text-sm bg-slate-50/50 p-1 rounded-2xl border border-slate-100 whitespace-nowrap">
                                <button @click="tab = 'all'; resetPage()"
                                    :class="tab === 'all' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                                    class="px-4 py-2 text-sm font-medium rounded-xl transition-all">ทั้งหมด</button>
                                <button @click="tab = 'pending'; resetPage()"
                                    :class="tab === 'pending' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                                    class="px-4 py-2 text-sm font-medium rounded-xl transition-all">รอดำเนินการ</button>
                                <button @click="tab = 'success'; resetPage()"
                                    :class="tab === 'success' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                                    class="px-4 py-2 text-sm font-medium rounded-xl transition-all">สำเร็จแล้ว</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6">
                <template x-for="item in paginatedBookings" :key="item.id">
                    <div class="bg-white rounded-[2rem] border border-slate-200 transition-all duration-300 overflow-hidden">
                        <div class="flex flex-wrap items-center justify-between gap-4 px-6 py-4 bg-slate-50/50 border-b border-slate-100">
                            <div class="flex items-center gap-3">
                                <span class="font-semibold text-[#1E2A1E]" x-text="'#' + item.booking_code"></span>
                                <span class="hidden sm:inline-block w-1.5 h-1.5 bg-slate-300 rounded-full"></span>
                                <span class="text-sm text-slate-500 flex items-center gap-1.5">
                                    <i class="fa-regular fa-calendar"></i>
                                    <span x-text="new Date(item.created_at).toLocaleString('th-TH')"></span>
                                </span>
                            </div>

                            <span :class="{
                                    'text-[#57C84D] bg-[#57C84D]/10': item.status === 'สำเร็จ',
                                    'text-orange-600 bg-orange-100': item.status === 'รอตรวจสอบ',
                                    'text-red-600 bg-red-100': item.status === 'ยกเลิก'
                                }"
                                class="text-xs sm:text-sm font-medium px-3 py-1 rounded-md">
                                <i :class="item.status === 'สำเร็จ' ? 'fa-solid fa-circle-check' : 'fa-solid fa-clock-rotate-left'"
                                    class="fa-duotone"></i>
                                <span x-text="item.status === 'สำเร็จ' ? 'สำเร็จแล้ว!' : item.status"></span>
                            </span>
                        </div>

                        <div class="p-6">
                            <div class="flex flex-col md:flex-row md:items-start justify-between gap-6">
                                <div class="flex items-start gap-5">
                                    <div class="h-16 w-16 shrink-0 flex items-center justify-center bg-[#57C84D]/10 rounded-2xl text-[#57C84D]">
                                        <i class="fa-duotone fa-solid fa-coins text-3xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-[#1E2A1E] text-lg sm:text-xl mb-1" x-text="item.product_name"></h4>
                                        <p class="text-sm font-medium flex items-center gap-1" :class="item.status === 'สำเร็จ' ? 'text-green-500' : 'text-orange-500'">
                                            <i class="fa-duotone fa-solid fa-stopwatch"></i>
                                            <span x-text="item.status === 'สำเร็จ' ? 'ดำเนินการเสร็จสิ้นแล้ว' : 'กำลังดำเนินการ/รอตรวจสอบ'"></span>
                                        </p>
                                    </div>
                                </div>

                                <div class="text-left md:text-right shrink-0">
                                    <p class="text-sm text-slate-500 font-medium mb-0.5">ยอดชำระสุทธิ</p>
                                    <div class="flex items-baseline gap-1 md:justify-end">
                                        <span class="text-3xl font-semibold text-[#57C84D]" x-text="new Intl.NumberFormat().format(item.price)"></span>
                                        <span class="text-sm text-[#4B5B4B]">บาท</span>
                                    </div>
                                </div>
                            </div>

                            <hr class="border-dashed border-slate-200 my-5">

                            <div class="flex flex-wrap items-center justify-between gap-4 text-sm">
                                <div>
                                    <p class="text-slate-400 text-xs mb-1">ข้อมูลเพิ่มเติม/เวลาที่จอง</p>
                                    <p class="font-semibold text-slate-700" x-text="item.booking_time ? item.booking_time + ' น.' : 'ไม่ได้ระบุเวลา'"></p>
                                    <p class="text-xs text-slate-400 mt-1" x-text="item.content ? 'หมายเหตุ: ' + item.content : ''"></p>
                                </div>
                                <div class="w-full sm:w-auto">
                                    <template x-if="item.status === 'รอตรวจสอบ'">
                                        <button @click="confirmCancelBooking(item.id, item.product_name, '/history/cancel/' + item.id)"
                                            class="w-full sm:w-auto sm:px-8 py-2.5 rounded-xl bg-red-50 text-red-500 text-sm font-semibold hover:bg-red-500 hover:text-white transition-all duration-300">
                                            <i class="fa-solid fa-xmark mr-1"></i> ยกเลิกการจอง
                                        </button>
                                    </template>
                                    <template x-if="item.status !== 'รอตรวจสอบ'">
                                        <span class="text-slate-400 text-xs italic">ไม่สามารถทำรายการได้</span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                <div x-show="filteredBookings.length === 0"
                    class="text-center py-20 bg-slate-50 rounded-[2rem] border-2 border-dashed border-slate-200">
                    <i class="fa-duotone fa-solid fa-folder-open text-5xl text-slate-300 mb-4"></i>
                    <p class="text-slate-500 font-medium">ไม่พบประวัติการจองของคุณ</p>
                </div>
            </div>

            <div class="mt-10 flex justify-center" x-show="totalPages > 1">
                <nav class="flex items-center gap-2">
                    <button @click="currentPage--" :disabled="currentPage === 1"
                        class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 text-slate-400 hover:text-[#57C84D] hover:border-[#57C84D] transition-colors disabled:opacity-30 disabled:cursor-not-allowed">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>

                    <template x-for="page in totalPages" :key="page">
                        <button @click="setPage(page)"
                            :class="currentPage === page ? 'bg-[#57C84D] text-white shadow-md border-[#57C84D]' : 'border-slate-200 text-slate-600 hover:border-[#57C84D]'"
                            class="w-10 h-10 flex items-center justify-center rounded-xl border font-bold transition-all"
                            x-text="page">
                        </button>
                    </template>

                    <button @click="currentPage++" :disabled="currentPage === totalPages"
                        class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 text-slate-400 hover:text-[#57C84D] hover:border-[#57C84D] transition-colors disabled:opacity-30 disabled:cursor-not-allowed">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </nav>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('assets/js/frontend/sweetalert.js') }}"></script>
<script src="{{ asset('assets/js/frontend/history.js') }}"></script>

@endsection