@extends('layouts')

@section('title', 'ประวัติการสั่งซื้อ | Ormor Topup Coins')

@section('content')

<section class="min-h-screen mt-16 sm:mt-32 py-12 px-4 "
    x-data="{ 
            tab: 'all', 
            search: '',
            sort: 'desc', // 'desc' = ล่าสุด, 'asc' = เก่าสุด
            //
            shouldShow(status, title) {
                const matchTab = (this.tab === 'all' || this.tab === status);
                const matchSearch = title.toLowerCase().includes(this.search.toLowerCase());
                return matchTab && matchSearch;
            }
         }">
    <div class="max-w-screen-lg mx-auto">

        <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-10 gap-6">
            <div class="text-center sm:text-left max-w-md">
                <h2 class="text-4xl font-bold text-[#1E2A1E] tracking-tight mb-1">
                    ประวัติการ<span class="text-[#57C84D]">สั่งซื้อ</span>
                </h2>
                <p class="text-[#4B5B4B]/70 text-xs sm:text-base font-medium leading-relaxed">
                    สามารถดูประวัติการสั่งซื้อของคุณได้ที่นี่ เพื่อความสะดวกในการติดตามและตรวจสอบสถานะการสั่งซื้อของคุณ
                </p>
            </div>

            <div class="flex flex-col items-center lg:items-end gap-3 w-full lg:max-w-sm">
                <div class="relative w-full group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-duotone fa-solid fa-magnifying-glass text-[#57C84D]"></i>
                    </div>
                    <input
                        type="text"
                        x-model="search"
                        placeholder="ค้นหาแพ็กเกจ..."
                        class="w-full pl-11 pr-10 py-2.5 bg-slate-50/50 border border-slate-100 rounded-2xl text-sm text-slate-500 font-medium focus:border-[#57C84D]/50 focus:ring-0 transition-all duration-300">
                    <button x-show="search.length > 0" @click="search = ''" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-rose-500">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </button>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-2 w-full lg:justify-end">
                    <div class="w-full sm:w-auto">
                        <div class="relative flex items-center bg-slate-50/50 p-1 border border-slate-100 rounded-2xl transition-all duration-300">
                            <select
                                x-model="sort"
                                class="w-full sm:w-auto bg-white text-[#57C84D] px-4 py-2 text-sm font-medium rounded-xl shadow-sm border-none focus:ring-0 cursor-pointer pl-3 pr-10 appearance-none min-w-[100px]">
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
                            <button @click="tab = 'all'"
                                :class="tab === 'all' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                                class="flex-1 sm:flex-none px-4 py-2 text-sm font-medium rounded-xl transition-all">
                                ทั้งหมด
                            </button>
                            <button @click="tab = 'pending'"
                                :class="tab === 'pending' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                                class="flex-1 sm:flex-none px-4 py-2 text-sm font-medium transition-all rounded-xl">
                                รอดำเนินการ
                            </button>
                            <button @click="tab = 'success'"
                                :class="tab === 'success' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                                class="flex-1 sm:flex-none px-4 py-2 text-sm font-medium transition-all rounded-xl">
                                สำเร็จแล้ว
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6">

            <div class="bg-white rounded-[2rem] border border-slate-200 transition-all duration-300 overflow-hidden"
                x-show="shouldShow('success', 'แพ็กเกจเติมเหรียญ 30,000 Line Coins')"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                :style="sort === 'desc' ? 'order: 2' : 'order: 1'">

                <div class="flex flex-wrap items-center justify-between gap-4 px-6 py-4 bg-slate-50/50 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <span class="font-semibold text-[#1E2A1E]">#ORD-20240315-001</span>
                        <span class="hidden sm:inline-block w-1.5 h-1.5 bg-slate-300 rounded-full"></span>
                        <span class="text-sm text-slate-500 flex items-center gap-1.5">
                            <i class="fa-regular fa-calendar"></i>15 มี.ค. 2024, 14:30 น.
                        </span>
                    </div>
                    <span class="text-xs sm:text-sm font-medium text-[#57C84D] bg-[#57C84D]/10 px-3 py-1 rounded-md">
                        <i class="fa-duotone fa-solid fa-circle-check"></i> สำเร็จแล้ว!
                    </span>
                </div>

                <div class="p-6">
                    <div class="flex flex-col md:flex-row md:items-start justify-between gap-6">
                        <div class="flex items-start gap-5">
                            <div class="h-16 w-16 shrink-0 flex items-center justify-center bg-[#57C84D]/10 rounded-2xl text-[#57C84D]">
                                <i class="fa-duotone fa-solid fa-coins text-3xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-[#1E2A1E] text-lg sm:text-xl mb-1">แพ็กเกจเติมเหรียญ 30,000 Line Coins</h4>
                                <p class="text-sm text-green-500 font-medium flex items-center gap-1">
                                    <i class="fa-duotone fa-solid fa-stopwatch"></i> ชำระเงินเสร็จสิ้นแล้ว!
                                </p>
                            </div>
                        </div>

                        <div class="text-left md:text-right shrink-0">
                            <p class="text-sm text-slate-500 font-medium mb-0.5">ยอดชำระสุทธิ</p>
                            <div class="flex items-baseline gap-1 md:justify-end">
                                <span class="text-3xl font-semibold text-[#57C84D]">1,500.00</span>
                                <span class="text-sm text-[#4B5B4B]">บาท</span>
                            </div>
                        </div>
                    </div>

                    <hr class="border-dashed border-slate-200 my-5">

                    <div class="flex flex-wrap items-center justify-between gap-4 text-sm">
                        <div>
                            <p class="text-slate-400 text-xs mb-1">บัญชีที่รับเหรียญ</p>
                            <p class="font-semibold text-slate-700">UID: 87654321</p>
                        </div>
                        <div class="w-full sm:w-auto">
                            <button class="w-full sm:w-auto sm:px-8 py-2.5 rounded-xl bg-[#57C84D]/10 text-[#57C84D] text-sm font-semibold hover:bg-[#57C84D] hover:text-white transition-all duration-300">
                                ซื้ออีกครั้ง
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] border border-orange-200 transition-all duration-300 overflow-hidden relative"
                x-show="shouldShow('pending', 'แพ็กเกจเติมเหรียญ 15,000 Line Coins')"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                :style="sort === 'desc' ? 'order: 1' : 'order: 2'">
                <div class="absolute top-0 left-0 w-1 h-full bg-orange-400"></div>
                <div class="flex flex-wrap items-center justify-between gap-4 px-6 py-4 bg-slate-50/50 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <span class="font-semibold text-[#1E2A1E]">#ORD-20240316-042</span>
                        <span class="hidden sm:inline-block w-1.5 h-1.5 bg-slate-300 rounded-full"></span>
                        <span class="text-sm text-slate-500 flex items-center gap-1.5">
                            <i class="fa-regular fa-calendar"></i>16 มี.ค. 2024, 09:15 น.
                        </span>
                    </div>
                    <span class="text-xs sm:text-sm font-medium text-orange-600 bg-orange-100 px-3 py-1 rounded-md animate-pulse">
                        <i class="fa-duotone fa-solid fa-clock-rotate-left"></i> รอการชำระเงิน
                    </span>
                </div>

                <div class="p-6">
                    <div class="flex flex-col md:flex-row md:items-start justify-between gap-6">
                        <div class="flex items-start gap-5">
                            <div class="h-16 w-16 shrink-0 flex items-center justify-center bg-orange-100 rounded-2xl text-orange-500">
                                <i class="fa-duotone fa-solid fa-gem text-3xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-[#1E2A1E] text-lg sm:text-xl mb-1">แพ็กเกจเติมเหรียญ 15,000 Line Coins</h4>
                                <p class="text-sm text-orange-500 font-medium flex items-center gap-1">
                                    <i class="fa-solid fa-stopwatch"></i> กรุณาชำระเงินภายใน 14:59 นาที
                                </p>
                            </div>
                        </div>

                        <div class="text-left md:text-right shrink-0">
                            <p class="text-sm text-slate-500 font-medium mb-0.5">ยอดชำระสุทธิ</p>
                            <div class="flex items-baseline gap-1 md:justify-end">
                                <span class="text-3xl font-semibold text-orange-500">450.00</span>
                                <span class="text-sm text-orange-600/80">บาท</span>
                            </div>
                        </div>
                    </div>

                    <hr class="border-dashed border-slate-200 my-5">

                    <div class="flex flex-wrap items-center justify-between gap-4 text-sm">
                        <div>
                            <p class="text-slate-400 text-xs mb-1">บัญชีที่รับเหรียญ</p>
                            <p class="font-semibold text-slate-700">UID: 11223344</p>
                        </div>
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <button class="flex-1 sm:flex-none text-slate-400 hover:text-red-500 font-medium text-sm transition-colors px-3 py-2">
                                ยกเลิก
                            </button>
                            <button class="flex-[2] sm:flex-none sm:px-8 py-2.5 rounded-xl bg-orange-100 text-orange-600 text-sm font-bold hover:bg-orange-500 hover:text-white transition-all duration-300 flex items-center gap-2 justify-center">
                                ชำระเงิน <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 flex justify-center" x-show="search === ''">
            <nav class="flex items-center gap-2">
                <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 text-slate-400 hover:text-[#3E6553] hover:border-[#3E6553] transition-colors disabled:opacity-50" disabled>
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#3E6553] text-white font-bold shadow-md">1</button>
                <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 text-slate-600 hover:text-[#3E6553] hover:border-[#3E6553] transition-colors font-semibold">2</button>
                <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 text-slate-600 hover:text-[#3E6553] hover:border-[#3E6553] transition-colors font-semibold">3</button>
                <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 text-slate-400 hover:text-[#3E6553] hover:border-[#3E6553] transition-colors">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </nav>
        </div>

    </div>
</section>

<section class="max-w-screen-xl mx-auto w-full px-4 mb-24">
    <div class="relative overflow-hidden bg-gradient-to-br from-[#F6C63B] to-[#FFD95A] rounded-2xl p-10 md:p-16 flex flex-col md:flex-row items-center justify-between gap-6 sm:gap-12 shadow-[0_8px_30px_rgb(0,0,0,0.05)] border border-white/50">

        <div class="absolute -top-16 -left-16 w-56 h-56 bg-[#F4B400] blur-md rounded-full rotate-[25deg] opacity-50 z-0"></div>
        <div class="absolute top-1/2 -right-20 -translate-y-1/2 w-80 h-80 bg-[#F4B400] blur-md rounded-full opacity-50 z-0"></div>
        <div class="absolute -bottom-24 right-1/4 w-72 h-40 bg-[#F4B400] blur-md rounded-3xl -rotate-[15deg] opacity-50 z-0"></div>

        <div class="w-full md:w-3/5 text-left relative z-10">
            <div class="inline-block bg-white/80 backdrop-blur-sm px-5 py-1.5 rounded-2xl mb-5 shadow-sm border border-white/50">
                <h3 class="text-[#1E2A1E]/80 font-medium text-xs sm:text-sm">
                    ติดปัญหาเหรอ? เราพร้อมช่วยคุณ!
                </h3>
            </div>

            <h2 class="text-[#1E2A1E] text-2xl md:text-3xl font-semibold mb-3 leading-tight tracking-tight">
                ติดขัดพร้อมช่วย 24/7!
            </h2>
            <p class="text-[#1E2A1E]/60 text-sm md:text-base font-medium leading-relaxed max-w-sm">
                ทีมงานคุณภาพสามารถแก้ปัญหาของคุณได้อย่างรวดเร็วทั้งการเติม หรือการใช้งานเว็บไซต์!
            </p>
        </div>

        <div class="w-full md:w-auto flex flex-col gap-4 min-w-[320px] relative z-10">
            <a href="#"
                class="group relative flex items-center justify-between bg-white/70 backdrop-blur-sm hover:bg-white transition-all duration-500 px-7 py-4 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_30px_rgba(120,182,143,0.2)] hover:-translate-y-1.5 hover:scale-[1.02] border border-white/50 overflow-hidden">

                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-[#57C84D]/10 flex items-center justify-center group-hover:bg-[#57C84D] transition-all duration-500">
                        <svg class="w-5 h-5 text-[#57C84D] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <span class="text-[#1E2A1E] text-md font-medium">ติดต่อผ่านทางไลน์</span>
                </div>

                <svg class="w-5 h-5 text-[#57C84D] opacity-0 -translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>

            <a href="#"
                class="group relative flex items-center justify-between bg-white/70 backdrop-blur-sm hover:bg-white transition-all duration-500 px-7 py-4 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_30px_rgba(120,182,143,0.2)] hover:-translate-y-1.5 hover:scale-[1.02] border border-white/50 overflow-hidden">

                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-[#57C84D]/10 flex items-center justify-center group-hover:bg-[#57C84D] transition-all duration-500">
                        <svg class="w-5 h-5 text-[#57C84D] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                    </div>
                    <span class="text-[#1E2A1E] text-md font-medium">ติดต่อผ่านทางเว็บไซต์</span>
                </div>

                <svg class="w-5 h-5 text-[#57C84D] opacity-0 -translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>

    </div>
</section>

@endsection