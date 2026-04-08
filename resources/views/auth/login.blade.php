@extends('layouts')

@section('title', 'Ormor Topup Coins | Login')

@section('content')

    <section
        class="min-h-screen bg-gradient-to-t from-white to-[#B7E65A]/90 flex items-center justify-center p-4 sm:p-8 py-30 sm:py-0">
        <div
            class="max-w-6xl w-full grid md:grid-cols-2 bg-white rounded-3xl overflow-hidden shadow-2xl shadow-slate-200/50 border border-slate-100">

            <div class="flex flex-col items-center justify-center p-8 md:p-16 lg:p-20 order-2 md:order-1">
                <div class="w-full max-w-sm">
                    <div class="mb-10 text-center md:text-left">
                        <h2 class="text-3xl font-bold text-[#1E2A1E] mb-2">เข้าสู่ระบบ</h2>
                        <p class="text-[#4B5B4B]/60 font-medium">ยินดีต้อนรับกลับมา! กรุณาเข้าสู่ระบบเพื่อดำเนินการต่อ</p>
                    </div>

                    <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
                        @csrf

                        @if ($errors->any())
                            <div class="bg-red-50 text-red-500 p-3 rounded-xl text-xs font-bold border border-red-100">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 px-4.5 flex items-center pointer-events-none">
                                <i
                                    class="fa-duotone fa-solid fa-user text-[#57C84D]/50 group-focus-within:text-[#57C84D] transition-colors"></i>
                            </div>
                            <input type="text" name="login" value="{{ old('login') }}"
                                class="w-full pl-11 pr-4 py-4 bg-slate-50 border-2 border-transparent rounded-2xl text-sm focus:bg-white focus:border-[#57C84D]/30 focus:ring-0 transition-all outline-none placeholder:text-slate-400"
                                placeholder="ชื่อผู้ใช้งาน หรือ อีเมล" required />
                        </div>

                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 px-4.5 flex items-center pointer-events-none">
                                <i
                                    class="fa-duotone fa-solid fa-lock text-[#57C84D]/50 group-focus-within:text-[#57C84D] transition-colors"></i>
                            </div>
                            <input type="password" name="password"
                                class="w-full pl-11 pr-4 py-4 bg-slate-50 border-2 border-transparent rounded-2xl text-sm focus:bg-white focus:border-[#57C84D]/30 focus:ring-0 transition-all outline-none placeholder:text-slate-400"
                                placeholder="รหัสผ่าน" required />
                        </div>

                        <div class="flex items-center justify-between py-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="remember"
                                    class="rounded text-[#57C84D] focus:ring-[#57C84D] border-slate-300" />
                                <span class="ml-2 text-sm text-slate-500 font-medium">จดจำฉันไว้</span>
                            </label>
                            <a href="#" class="text-sm font-medium text-[#3E6553] hover:underline">ลืมรหัสผ่าน?</a>
                        </div>

                        <button type="submit"
                            class="w-full py-4 bg-[#3E6553] hover:bg-[#2F4D3F] text-white text-lg font-semibold rounded-2xl transition-all duration-300 shadow-lg shadow-[#3E6553]/20 flex items-center justify-center gap-3 active:scale-[0.98] mt-2">
                            <span>เข้าสู่ระบบ</span>
                            <i class="fa-solid fa-right-to-bracket text-sm"></i>
                        </button>
                    </form>

                    <p class="mt-8 text-center text-sm text-slate-400">
                        ยังไม่มีบัญชีใช่ไหม? <a href="{{ route('register.page') }}"
                            class="font-bold text-[#57C84D] hover:underline">สมัครสมาชิกที่นี่</a>
                    </p>
                </div>
            </div>

            <div
                class="relative flex flex-col items-start justify-center p-8 md:p-16 lg:p-20 bg-[#f8fafc] order-1 md:order-2 overflow-hidden">
                <div class="absolute -top-20 -right-20 w-64 h-64 bg-[#57C84D]/10 rounded-full blur-2xl"></div>
                <div class="absolute top-100 -left-10 w-64 h-64 bg-[#F4B400]/10 rounded-full blur-2xl"></div>

                <div
                    class="absolute inset-0 flex items-center justify-center pointer-events-none opacity-10 transform scale-125">
                    <img src="{{ asset('assets/image/logo.png') }}" alt="Logo Log-in"
                        class="max-w-[60%] max-h-[60%] relative z-10 scale-125 -translate-y-4 rotate-[6deg] drop-shadow-[0_30px_50px_rgba(0,0,0,0.3)] object-contain">
                </div>

                <div class="relative z-10">
                    <div
                        class="mb-6 flex h-14 w-14 items-center justify-center bg-white rounded-2xl border border-slate-100 shadow-sm">
                        <i class="fa-solid fa-quote-left text-2xl text-[#57C84D]"></i>
                    </div>

                    <h3
                        class="bg-gradient-to-tr from-[#2F8F3A] via-[#57C84D] to-[#7ED957] bg-clip-text text-transparent text-2xl md:text-3xl font-bold leading-tight italic mb-6">
                        "ระบบจัดการที่ช่วยให้การจองเหรียญไลน์ของคุณเป็นเรื่องง่าย และรวดเร็วที่สุด"
                    </h3>

                    <div>
                        <p class="font-semibold text-[#2a1e24] text-lg"><span class="text-[#b12576]">ตัวแทน</span><span>-
                                สมัครสมาชิกโดยใช้ (ชื่อผู้ใช้งาน )ในกลุ่มโอเพนแชทที่คุณตั้งไว้ได้เลย</span> <br><br>
                            <span class="text-[#25b14f]">ลูกค้าทั่วไป</span> - สมัครสมาชิกได้ตามปกติ และถ้าสนใจเป็นตัวแทน
                            กรุณากดเข้ากลุ่มไลน์(เมนู)เพื่อรับรหัสตัวแทน และใช้ราคาพิเศษที่ถูกลงกว่าเดิม
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
