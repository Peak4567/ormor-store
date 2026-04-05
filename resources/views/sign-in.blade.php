@extends('layouts')

@section('title', 'Ormor Topup Coins | Sign In')

@section('content')

<section class="min-h-screen bg-gradient-to-t from-white to-[#B7E65A]/90 flex items-center justify-center p-4 sm:p-8 py-30 sm:py-0">
    <div class="max-w-6xl w-full grid md:grid-cols-2 bg-white rounded-3xl overflow-hidden shadow-2xl shadow-slate-200/50 border border-slate-100">

        <div class="flex flex-col items-center justify-center p-8 md:p-16 lg:p-20 order-2 md:order-1">
            <div class="w-full max-w-sm">
                <div class="mb-6 text-center md:text-left">
                    <h2 class="text-3xl font-semibold text-[#1E2A1E] mb-0.5">สมัครสมาชิก</h2>
                    <p class="text-[#4B5B4B]/60 font-medium">เริ่มการสมัครสมาชิกของคุณได้เลยที่นี้!</p>
                </div>

                <form class="space-y-3">
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 px-4.5 flex items-center pointer-events-none">
                            <i class="fa-duotone fa-solid fa-user text-[#57C84D]/50 group-focus-within:text-[#57C84D] transition-colors"></i>
                        </div>
                        <input type="text"
                            class="w-full pl-11 pr-4 py-4 bg-slate-50 border-2 border-transparent rounded-2xl text-sm focus:bg-white focus:border-[#57C84D]/30 focus:ring-0 transition-all outline-none placeholder:text-slate-400"
                            placeholder="ชื่อผู้ใช้งาน" required />
                    </div>

                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 px-4.5 flex items-center pointer-events-none">
                            <i class="fa-duotone fa-solid fa-envelope text-[#57C84D]/50 group-focus-within:text-[#57C84D] transition-colors"></i>
                        </div>
                        <input type="email"
                            class="w-full pl-11 pr-4 py-4 bg-slate-50 border-2 border-transparent rounded-2xl text-sm focus:bg-white focus:border-[#57C84D]/30 focus:ring-0 transition-all outline-none placeholder:text-slate-400"
                            placeholder="อีเมลของคุณ" required />
                    </div>

                    <div class="relative group" x-data="{ showTip: false }">
                        <div class="absolute inset-y-0 left-0 px-4.5 flex items-center pointer-events-none">
                            <i class="fa-duotone fa-solid fa-lock text-[#57C84D]/50 group-focus-within:text-[#57C84D] transition-colors"></i>
                        </div>

                        <input type="password"
                            @focus="showTip = true"
                            @blur="showTip = false"
                            class="w-full pl-11 pr-4 py-4 bg-slate-50 border-2 border-transparent rounded-2xl text-sm focus:bg-white focus:border-[#57C84D]/30 focus:ring-0 transition-all outline-none placeholder:text-slate-400"
                            placeholder="รหัสผ่าน" required />

                        <div x-show="showTip"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            class="absolute z-20 left-0 top-full mt-2 w-full p-4 bg-white border-2 border-[#57C84D]/30 rounded-2xl shadow-xl shadow-[#57C84D]/5 pointer-events-none">

                            <div class="flex items-start gap-3">
                                <i class="fa-duotone fa-solid fa-shield-check text-[#57C84D] text-xl mt-0.5"></i>
                                <div>
                                    <p class="text-sm font-semibold text-[#1E2A1E] mb-1">คำแนะนำรหัสผ่านที่ปลอดภัย</p>
                                    <ul class="text-sm text-slate-500 text-pretty space-y-2">
                                        <li class="flex items-start gap-2.5">
                                            <div class="shrink-0 w-1 h-1 bg-[#57C84D] rounded-full mt-2"></div>
                                            <span class="leading-tight">ต้องมีความยาวอย่างน้อย 8 ตัวอักษร (หากข้อความยาวจนเว้นบรรทัด จุดจะยังอยู่ด้านบนเสมอ)</span>
                                        </li>

                                        <li class="flex items-start gap-2.5">
                                            <div class="shrink-0 w-1 h-1 bg-[#57C84D] rounded-full mt-2"></div>
                                            <span class="leading-tight">ควรประกอบด้วย ตัวพิมพ์เล็ก (a-z) ตัวพิมพ์ใหญ่ (A-Z) และ ตัวเลข (0-9) เพื่อความปลอดภัยสูงสุด</span>
                                        </li>

                                        <li class="flex items-start gap-2.5">
                                            <div class="shrink-0 w-1 h-1 bg-[#57C84D] rounded-full mt-2"></div>
                                            <span class="leading-tight">ห้ามใช้รหัสที่เดาง่าย เช่น 123456, password หรือวันเดือนปีเกิดที่คาดเดาได้จากข้อมูลทั่วไป</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="absolute -top-1.5 left-6 w-3 h-3 bg-white border-t border-l border-slate-100 rotate-45"></div>
                        </div>
                    </div>

                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 px-4.5 flex items-center pointer-events-none">
                            <i class="fa-duotone fa-solid fa-lock text-[#57C84D]/50 group-focus-within:text-[#57C84D] transition-colors"></i>
                        </div>
                        <input type="password"
                            class="w-full pl-11 pr-4 py-4 bg-slate-50 border-2 border-transparent rounded-2xl text-sm focus:bg-white focus:border-[#57C84D]/30 focus:ring-0 transition-all outline-none placeholder:text-slate-400"
                            placeholder="ยืนยันรหัสผ่าน" required />
                    </div>

                    <div class="flex items-center justify-between py-4">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" class="rounded text-[#57C84D] focus:ring-[#57C84D] border-slate-300" />
                            <span class="ml-2 text-sm text-slate-500 font-medium">จดจำฉันไว้</span>
                        </label>
                        <a href="#" class="text-sm font-medium text-[#3E6553] hover:underline">ลืมรหัสผ่าน?</a>
                    </div>

                    <button type="submit"
                        class="w-full py-4 bg-[#3E6553] hover:bg-[#2F4D3F] text-white text-lg font-semibold rounded-2xl transition-all duration-300 shadow-lg shadow-[#3E6553]/20 flex items-center justify-center gap-3 active:scale-[0.98]">
                        <span>สมัครสมาชิกเลย</span>
                        <i class="fa-solid fa-arrow-right-long text-sm"></i>
                    </button>
                </form>

                <p class="mt-8 text-center text-sm text-slate-400">
                    มีบัญชีแล้วใช่ไหม? <a href="{{ route('login.page') }}" class="font-bold text-[#57C84D] hover:underline">เข้าสู่ระบบ</a>
                </p>
            </div>
        </div>

        <div class="relative flex flex-col items-start justify-center p-8 md:p-16 lg:p-20 bg-[#f8fafc] order-1 md:order-2 overflow-hidden">

            <div class="absolute -top-20 -right-20 w-64 h-64 bg-[#57C84D]/10 rounded-full blur-2xl"></div>
            <div class="absolute top-100 -left-10 w-64 h-64 bg-[#F4B400]/10 rounded-full blur-2xl"></div>

            <div class="absolute inset-0 flex items-center justify-center pointer-events-none opacity-10 transform scale-125">
                <img src="{{ asset('assets/image/logo.png') }}" alt="Logo Sign In"
                    class="max-w-[60%] max-h-[60%] relative z-10 scale-125 -translate-y-4 rotate-[6deg] drop-shadow-[0_30px_50px_rgba(0,0,0,0.3)] object-contain">
            </div>

            <div class="relative z-10">
                <div class="mb-6 flex h-14 w-14 items-center justify-center bg-white rounded-2xl border border-slate-100">
                    <i class="fa-solid fa-quote-left text-2xl text-[#57C84D]"></i>
                </div>

                <h3 class="bg-gradient-to-tr from-[#2F8F3A] via-[#57C84D] to-[#7ED957] bg-clip-text text-transparent text-2xl md:text-3xl font-bold leading-tight italic mb-6">
                    "ระบบจัดการที่ช่วยให้การจองเหรียญของคุณเป็นเรื่องง่าย และรวดเร็วที่สุด"
                </h3>

                <div>
                    <p class="font-semibold text-[#1E2A1E] text-lg">จิราวุฒิ - Ormor Topup Coins</p>
                    <p class="text-sm text-[#57C84D] font-bold uppercase">Founder</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection