@extends('layouts')

@section('content')

<section class="bg-[#7ACB53] text-white min-h-screen flex items-center justify-center overflow-x-hidden w-full py-12 lg:py-0">

    <div class="grid w-full max-w-screen-xl px-6 lg:px-32 mx-auto gap-12 lg:py-12 grid-cols-1 lg:grid-cols-12 items-center">

        <div class="col-span-1 lg:col-span-8 order-2 lg:order-1 text-white flex flex-col gap-8 lg:gap-12 text-center lg:text-left items-center lg:items-start">

            <div class="space-y-2">
                <div class="inline-block px-3.5 py-1 rounded-full bg-green-200/15 border border-green-200/30 backdrop-blur-sm">
                    <p class="text-[12px] md:text-[14px] font-normal text-green-100">
                        ระบบจองคิวสำหรับตัวแทน
                    </p>
                </div>

                <h1 class="max-w-3xl text-5xl font-bold md:text-6xl lg:text-7xl text-white">
                    ORMORX <br>TOPUP COINS
                </h1>

                <p class="max-w-xl font-normal md:text-lg lg:text-md leading-relaxed mx-auto lg:mx-0 text-white">
                    ร้านเติมเงินออนไลน์ที่ให้บริการจองคิวสำหรับตัวแทนจำหน่ายของเราอย่างสะดวกและรวดเร็ว เพียงแค่สแกน QR Code เพื่อจองคิวของคุณ และรอการยืนยันจากเจ้าหน้าที่ของเรา
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-4 sm:justify-center">

                <div class="bg-white px-2 py-2 rounded-2xl shadow-sm w-full max-w-sm sm:w-fit flex-shrink-0 self-stretch flex items-center mx-auto text-left lg:mx-0">
                    <div class="p-2 bg-slate-100/50 flex flex-col items-center justify-center text-slate-400 rounded-2xl border-2 border-dashed border-slate-200 w-full">
                        <img src="{{ asset('assets/image/IMG_7753.jpg') }}" alt="QR Code" class="w-36 h-36 sm:w-36 sm:h-36 object-cover rounded-lg">
                    </div>
                    <div class="sm:hidden flex p-6 text-slate-800 text-sm flex flex-col justify-between relative min-h-[144px] w-full">
                        <p class="font-medium opacity-90">
                            โปรดแสกน QR Code เพื่อจองคิวของคุณ และรอการยืนยันจากเจ้าหน้าที่ของเรา
                        </p>

                        <a href="#" class="text-[#F4B400] font-bold flex items-center gap-2 hover:translate-x-1 transition-transform mt-2">
                            <span class="text-lg">➔</span> ตรวจสอบเพิ่มเติม
                        </a>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row lg:items-start gap-6 justify-center lg:justify-start w-full max-w-sm">

                    <div class="flex flex-col gap-2 w-full">

                        <div class="hidden sm:flex items-center gap-2">
                            <button class="px-4 py-1.5 rounded-full bg-white text-[#58A83D] text-xs shadow-sm font-bold border border-white">ทั่วไป</button>
                        </div>

                        <div class="hidden sm:flex bg-white p-6 text-left rounded-2xl shadow-sm text-slate-800 text-sm flex flex-col justify-between relative min-h-[144px] w-full">
                            <p class="font-medium opacity-90">
                                โปรดแสกน QR Code เพื่อจองคิวของคุณ และรอการยืนยันจากเจ้าหน้าที่ของเรา
                            </p>

                            <a href="#" class="text-[#F4B400] font-bold flex items-center gap-2 hover:translate-x-1 transition-transform mt-2">
                                <span class="text-lg">➔</span> ตรวจสอบเพิ่มเติม
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="lg:col-span-4 order-1 lg:order-2 flex flex-col items-center justify-center gap-10 lg:gap-20 w-full">
            <div class="relative w-full max-w-[240px] lg:max-w-[300px] aspect-square flex items-center justify-center group mt-30 lg:mt-0">
                <div class="absolute inset-0 bg-white/20 opacity-0 group-hover:opacity-100 blur-[60px] transition-all duration-700 rounded-full scale-50 group-hover:scale-100"></div>

                <img src="{{ asset('assets/image/logo.png') }}" alt="Hero Logo"
                    class="w-full h-auto relative z-10 scale-110 lg:scale-125 -translate-y-4 rotate-[2deg] drop-shadow-[0_30px_50px_rgba(0,0,0,0.3)] transition-transform duration-500 group-hover:rotate-0 object-contain">

                <div class="absolute -bottom-4 w-1/2 h-4 bg-black/10 blur-xl rounded-[100%]"></div>
            </div>

            <div class="hidden lg:flex items-center gap-3 w-full max-w-[320px] py-3.5 px-4 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-lg shadow-sm overflow-hidden flex-shrink-0">
                <div class="flex items-center -space-x-3 flex-shrink-0">
                    <img src="https://i.pravatar.cc/100?u=4" class="w-10 h-10 rounded-full border-2 border-white/30 object-cover" alt="User 1">
                    <img src="https://i.pravatar.cc/100?u=5" class="w-10 h-10 rounded-full border-2 border-white/30 object-cover" alt="User 2">
                    <img src="https://i.pravatar.cc/100?u=6" class="w-10 h-10 rounded-full border-2 border-white/30 object-cover" alt="User 3">
                    <div class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-[10px] text-white font-bold border-2 border-white/30">
                        +10M
                    </div>
                </div>

                <div class="flex flex-col items-start leading-tight min-w-0">
                    <p class="text-[15px] font-semibold text-white truncate w-full">รีวิวจากผู้ใช้จริง</p>
                    <p class="text-[13px] text-white/70 font-normal line-clamp-1 w-full opacity-80">"บริการเร็ว มั่นใจได้ 100%"</p>
                </div>
            </div>
        </div>

    </div>

</section>

@endsection