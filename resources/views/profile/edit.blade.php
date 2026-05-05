@extends('layouts')
@section('title', 'โปรไฟล์ส่วนตัว | KrachabMitr')

@section('content')
<section class="min-h-screen bg-slate-50 pt-32 pb-12 px-4">
    <div class="max-w-4xl mx-auto">
        
        <div class="mb-8 flex flex-col sm:flex-row items-center justify-between gap-4 bg-white p-6 rounded-xl border border-slate-200">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-[#57C84D]/10 rounded-xl flex items-center justify-center text-[#57C84D]">
                    <i class="fa-duotone fa-solid fa-user-gear text-3xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-slate-800">ตั้งค่าโปรไฟล์</h2>
                    <p class="text-slate-500 text-sm">จัดการข้อมูลส่วนตัวและรหัสผ่านของคุณ</p>
                </div>
            </div>
            <div class="px-4 py-2 bg-slate-800 text-white rounded-xl text-xs font-bold uppercase tracking-widest">
                ID: {{ $user->users_code ?? 'U00000' }}
            </div>
        </div>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="bg-white rounded-xl p-8 border border-slate-200 space-y-5">
                    <h3 class="text-lg font-bold text-[#57C84D] flex items-center gap-2 mb-4">
                        <i class="fa-solid fa-address-card"></i> ข้อมูลทั่วไป
                    </h3>

                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold text-slate-600">ชื่อผู้ใช้งาน</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-solid fa-user text-sm"></i>
                            </div>
                            <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" 
                                class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-[#57C84D] transition-all outline-none" required>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold text-slate-600">เบอร์โทรศัพท์</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-solid fa-phone text-sm"></i>
                            </div>
                            <input type="tel" name="phone" value="{{ old('phone', $user->phone ?? '') }}" 
                                class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-[#57C84D] transition-all outline-none" required>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold text-slate-600">ชื่อร้านปัจจุบัน</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-solid fa-store text-sm"></i>
                            </div>
                            <input type="text" name="shop_name" value="{{ old('shop_name', $user->shop_name ?? '') }}" 
                                class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-[#57C84D] transition-all outline-none" placeholder="ไม่ได้ระบุชื่อร้าน">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-sm font-semibold text-slate-600">ไอดีไลน์ส่วนตัว</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-brands fa-line text-sm"></i>
                            </div>
                            <input type="text" name="line_id" value="{{ old('line_id', $user->line_id ?? '') }}" 
                                class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-[#57C84D] transition-all outline-none" placeholder="Line ID">
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white rounded-xl p-8 border border-slate-200 space-y-5">
                        <h3 class="text-lg font-bold text-[#57C84D] flex items-center gap-2 mb-4">
                            <i class="fa-solid fa-shield-check"></i> ความปลอดภัย
                        </h3>

                        <div class="space-y-1.5">
                            <label class="text-sm font-semibold text-slate-600">อีเมล (ใช้ล็อกอิน)</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i class="fa-solid fa-envelope text-sm"></i>
                                </div>
                                <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" 
                                    class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-[#57C84D] transition-all outline-none" required>
                            </div>
                        </div>

                        <hr class="border-slate-100 my-4">
                        <div class="text-xs text-orange-600 font-medium bg-orange-50 border border-orange-100 p-3 rounded-xl flex gap-2 items-start">
                            <i class="fa-solid fa-circle-info mt-0.5"></i> 
                            <span>หากไม่ต้องการเปลี่ยนรหัสผ่าน ให้เว้นช่องรหัสผ่านด้านล่างนี้ไว้ว่างๆ ครับ</span>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-sm font-semibold text-slate-600">รหัสผ่านใหม่</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i class="fa-solid fa-lock text-sm"></i>
                                </div>
                                <input type="password" name="password" 
                                    class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-[#57C84D] transition-all outline-none" placeholder="********">
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-sm font-semibold text-slate-600">ยืนยันรหัสผ่านใหม่</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i class="fa-solid fa-lock text-sm"></i>
                                </div>
                                <input type="password" name="password_confirmation" 
                                    class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-[#57C84D] transition-all outline-none" placeholder="********">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-4 bg-[#57C84D] hover:bg-[#46a83d] text-white text-lg font-bold rounded-xl transition-all duration-300 flex items-center justify-center gap-3 active:scale-95">
                        <i class="fa-solid fa-floppy-disk"></i>
                        บันทึกการเปลี่ยนแปลง
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<div id="profile-alert-data" 
    data-success="{{ session('success') }}" 
    data-error="{{ $errors->any() ? implode('\n', $errors->all()) : '' }}" 
    class="hidden">
</div>

<script src="{{ asset('assets/js/frontend/sweetalert.js') }}"></script>
<script src="{{ asset('assets/js/frontend/profile.js') }}"></script>
@endsection