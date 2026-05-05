@extends('layouts')
@section('title', 'ประวัติการสั่งซื้อ | Ormor Topup Coins')
@section('content')

    <section class="min-h-screen mt-16 sm:mt-32 py-12 px-4" x-data="historyWidget(@js($bookings))" x-cloak>

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
                                <div
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400 text-[10px]">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        <div class="w-full sm:w-auto">
                            <div
                                class="flex text-xs sm:text-sm bg-slate-50/50 p-1 rounded-2xl border border-slate-100 whitespace-nowrap">
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
            <section class="max-w-screen-lg mx-auto py-10 px-4 space-y-10">

                <style>
                    @keyframes scroll-left {
                        0% {
                            transform: translateX(0);
                        }

                        100% {
                            transform: translateX(-100%);
                        }
                    }

                    .animate-marquee {
                        display: inline-block;
                        white-space: nowrap;
                        padding-left: 100%;
                        animation: scroll-left 20s linear infinite;
                    }

                    .marquee-wrapper:hover .animate-marquee {
                        animation-play-state: paused;
                    }
                </style>

                <div
                    class="group relative p-5 rounded-2xl bg-white border border-rose-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition-all duration-500 hover:shadow-[0_20px_40px_rgb(225,29,72,0.05)]">

                    <div class="absolute left-0 top-4 bottom-4 w-[3px] bg-rose-400 rounded-r-full opacity-80"></div>

                    <div class="flex items-center justify-between gap-4">

                        <div class="flex items-center gap-4 flex-1 overflow-hidden">
                            <div class="flex-shrink-0">
                                <div class="bg-red-50 text-red-500 p-2.5 rounded-xl z-10 relative">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4 13.9999L5.57465 20.2985C5.61893 20.4756 5.64107 20.5642 5.66727 20.6415C5.92317 21.397 6.60352 21.9282 7.39852 21.9933C7.4799 21.9999 7.5712 21.9999 7.75379 21.9999C7.98244 21.9999 8.09677 21.9999 8.19308 21.9906C9.145 21.8982 9.89834 21.1449 9.99066 20.193C10 20.0967 10 19.9823 10 19.7537V5.49991M18.5 13.4999C20.433 13.4999 22 11.9329 22 9.99991C22 8.06691 20.433 6.49991 18.5 6.49991M10.25 5.49991H6.5C4.01472 5.49991 2 7.51463 2 9.99991C2 12.4852 4.01472 14.4999 6.5 14.4999H10.25C12.0164 14.4999 14.1772 15.4468 15.8443 16.3556C16.8168 16.8857 17.3031 17.1508 17.6216 17.1118C17.9169 17.0756 18.1402 16.943 18.3133 16.701C18.5 16.4401 18.5 15.9179 18.5 14.8736V5.1262C18.5 4.08191 18.5 3.55976 18.3133 3.2988C18.1402 3.05681 17.9169 2.92421 17.6216 2.88804C17.3031 2.84903 16.8168 3.11411 15.8443 3.64427C14.1772 4.55302 12.0164 5.49991 10.25 5.49991Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>

                            @if (!empty($web_cfg->warning_text))
                                <div class="flex items-center flex-1 overflow-hidden marquee-wrapper">
                                    <span
                                        class="text-red-500 font-bold text-base whitespace-nowrap z-10 bg-white pr-2">คำเตือน
                                        :</span>

                                    <div class="flex-1 overflow-hidden relative">
                                        <p class="text-slate-600 font-medium text-base animate-marquee">
                                            {{ $web_cfg->warning_text }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="hidden md:block pr-2 flex-shrink-0 z-10 bg-white pl-2">
                            <svg class="w-4 h-4 text-slate-300 group-hover:text-rose-400 group-hover:translate-x-1 transition-all"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>

                    </div>
                </div>
            </section>
            <div class="grid grid-cols-1 gap-6">
                <template x-for="item in paginatedBookings" :key="item.id">
                    <div
                        class="bg-white rounded-[2rem] border border-slate-200 transition-all duration-300 overflow-hidden">
                        <div
                            class="flex flex-wrap items-center justify-between gap-4 px-6 py-4 bg-slate-50/50 border-b border-slate-100">

                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-[#1E2A1E]" x-text="'#' + item.booking_code"></span>

                                <button
                                    @click="
        let copyText = `รหัสการจอง: ${item.booking_code}\nสินค้า: ${item.product_name}\nวันที่: ${item.thai_date || item.booking_date}\nเวลา: ${item.booking_time} น.\nราคา: ${new Intl.NumberFormat().format(item.price)} บาท\nรายละเอียด: ${item.content || '-'}`;
        navigator.clipboard.writeText(copyText);
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: 'คัดลอกข้อมูลการจองแล้ว',
            showConfirmButton: false,
            timer: 1500,
            customClass: { popup: 'font-[Prompt] rounded-xl' }
        });
    "
                                    class="text-slate-400 hover:text-[#57C84D] hover:bg-[#57C84D]/10 transition-all duration-300 w-7 h-7 flex items-center justify-center rounded-lg"
                                    title="คัดลอกข้อมูลการจอง">
                                    <i class="fa-regular fa-copy"></i>
                                </button>

                                <span class="hidden sm:inline-block w-1.5 h-1.5 bg-slate-300 rounded-full ml-1"></span>
                                <span class="text-sm text-slate-500 flex items-center gap-1.5">
                                    <i class="fa-regular fa-calendar"></i>
                                    <span x-text="new Date(item.created_at).toLocaleString('th-TH')"></span>
                                </span>
                            </div>

                            <span
                                :class="{
                                    'text-[#57C84D] bg-[#57C84D]/10': item.status === 'สำเร็จ',
                                    'text-orange-600 bg-orange-100': item.status === 'รอตรวจสอบ',
                                    'text-red-600 bg-red-100': item.status === 'ยกเลิก'
                                }"
                                class="text-xs sm:text-sm font-medium px-3 py-1 rounded-md">
                                <i :class="item.status === 'สำเร็จ' ? 'fa-solid fa-circle-check' :
                                    'fa-solid fa-clock-rotate-left'"
                                    class="fa-duotone"></i>
                                <span x-text="item.status === 'สำเร็จ' ? 'สำเร็จแล้ว!' : item.status"></span>
                            </span>
                        </div>

                        <div class="p-6">
                            <div class="flex flex-col md:flex-row md:items-start justify-between gap-6">
                                <div class="flex items-start gap-5">
                                    <div
                                        class="h-16 w-16 shrink-0 flex items-center justify-center bg-[#57C84D]/10 rounded-2xl text-[#57C84D]">
                                        <i class="fa-duotone fa-solid fa-coins text-3xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-[#1E2A1E] text-lg sm:text-xl mb-1"
                                            x-text="item.product_name"></h4>
                                        <p class="text-sm font-medium flex items-center gap-1"
                                            :class="item.status === 'สำเร็จ' ? 'text-green-500' : 'text-orange-500'">
                                            <i class="fa-duotone fa-solid fa-stopwatch"></i>
                                            <span
                                                x-text="item.status === 'สำเร็จ' ? 'ดำเนินการเสร็จสิ้นแล้ว' : 'กำลังดำเนินการ/รอตรวจสอบ'"></span>
                                        </p>
                                    </div>
                                </div>

                                <div class="text-left md:text-right shrink-0">
                                    <p class="text-sm text-slate-500 font-medium mb-0.5">ยอดชำระสุทธิ</p>
                                    <div class="flex items-baseline gap-1 md:justify-end">
                                        <span class="text-3xl font-semibold text-[#57C84D]"
                                            x-text="new Intl.NumberFormat().format(item.price)"></span>
                                        <span class="text-sm text-[#4B5B4B]">บาท</span>
                                    </div>
                                </div>
                            </div>

                            <hr class="border-dashed border-slate-200 my-5">

                            <div class="flex flex-wrap items-center justify-between gap-4 text-sm">
                                <div>
                                    <p class="text-slate-400 text-xs mb-1">ข้อมูลเพิ่มเติม/เวลาที่จอง</p>
                                    <p class="font-semibold text-slate-700"
                                        x-text="item.booking_time ? item.booking_time + ' น.' : 'ไม่ได้ระบุเวลา'"></p>
                                    <p class="text-xs text-slate-400 mt-1"
                                        x-text="item.content ? 'หมายเหตุ: ' + item.content : ''"></p>
                                </div>
                                <div class="w-full sm:w-auto flex flex-col sm:flex-row items-center gap-2 mt-3 sm:mt-0">

                                    <a :href="'{{ $web_cfg->line ?? '#' }}'" target="_blank"
                                        class="w-full sm:w-auto px-6 py-2.5 rounded-xl bg-[#00B900] text-white text-sm font-semibold hover:bg-[#009900] transition-all duration-300 flex items-center justify-center shadow-sm shadow-green-500/20 active:scale-95">
                                        <i class="fa-brands fa-line text-lg mr-2"></i> ติดต่อแอดมิน
                                    </a>

                                    <template x-if="item.status === 'รอตรวจสอบ'">
                                        <button
                                            @click="confirmCancelBooking(item.id, item.product_name, '/history/cancel/' + item.id)"
                                            class="w-full sm:w-auto px-6 py-2.5 rounded-xl bg-red-50 text-red-500 text-sm font-semibold hover:bg-red-500 hover:text-white transition-all duration-300 flex items-center justify-center active:scale-95">
                                            <i class="fa-solid fa-xmark mr-1"></i> ยกเลิก
                                        </button>
                                    </template>

                                    <template x-if="item.status !== 'รอตรวจสอบ'">
                                        <span
                                            class="text-slate-400 text-xs italic px-2 hidden sm:block">ไม่สามารถยกเลิกได้</span>
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
                            :class="currentPage === page ? 'bg-[#57C84D] text-white shadow-md border-[#57C84D]' :
                                'border-slate-200 text-slate-600 hover:border-[#57C84D]'"
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
    </section>

    <script src="{{ asset('assets/js/frontend/sweetalert.js') }}"></script>
    <script src="{{ asset('assets/js/frontend/history.js') }}"></script>

@endsection
