@extends('layouts')

@section('content')

<section class="bg-[#7ACB53] text-white min-h-screen flex items-center justify-center overflow-x-hidden w-full py-12 lg:py-12">

    <div class="grid w-full max-w-screen-xl px-6 lg:px-32 mx-auto gap-12 lg:py-12 grid-cols-1 lg:grid-cols-12 items-center">

        <div class="col-span-1 lg:col-span-8 order-2 lg:order-1 text-white flex flex-col gap-8 lg:gap-12 text-center lg:text-left items-center lg:items-start">

            <div class="space-y-2">
                <div class="inline-block px-3.5 py-1 rounded-full bg-green-200/10 border border-green-200/30 hover:bg-green-200/15 hover:border-green-200/50 transition-colorsbackdrop-blur-sm">
                    <p class="text-[12px] md:text-[14px] font-normal text-green-100">
                        ระบบจองคิวสำหรับตัวแทน
                    </p>
                </div>

                <h1 class="max-w-3xl text-5xl font-bold md:text-7xl lg:text-7xl text-white">
                    ORMOR <br>TOPUP COINS
                </h1>

                <p class="max-w-xl font-normal md:text-lg lg:text-md leading-relaxed mx-auto lg:mx-0 text-white/90">
                    ร้านเติมเงินออนไลน์ที่ให้บริการจองคิวสำหรับตัวแทนจำหน่ายของเราอย่างสะดวกและรวดเร็ว เพียงแค่สแกน QR Code เพื่อจองคิวของคุณ และรอการยืนยันจากเจ้าหน้าที่ของเรา
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-4 sm:justify-center">

                <!-- QR Code Panel -->
                <div class="bg-white px-2 py-2 rounded-2xl shadow-sm w-full max-w-sm sm:w-fit flex-shrink-0 self-stretch flex items-center mx-auto text-left lg:mx-0">
                    <div class="p-2 bg-slate-100/50 flex flex-col items-center justify-center text-slate-400 rounded-2xl border-2 border-dashed border-slate-200 w-full">
                        <img src="{{ asset('assets/image/IMG_7753.jpg') }}" alt="QR Code" class="w-36 h-36 sm:w-36 sm:h-36 object-cover rounded-lg">
                    </div>
                    <div class="sm:hidden flex p-6 text-slate-800 text-sm flex flex-col justify-between relative min-h-[144px] w-full">
                        <p class="text-[#1E2A1E] font-medium">
                            โปรดแสกน QR Code เพื่อจองคิวของคุณ และรอการยืนยันจากเจ้าหน้าที่ของเรา
                        </p>

                        <a href="#" class="flex gap-2 text-[#F4B400] font-bold flex items-center gap-2 hover:translate-x-1 transition-transform mt-2">
                            ตรวจสอบเพิ่มเติม <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Information Panel -->
                <div class="flex flex-col lg:flex-row lg:items-start gap-6 justify-center lg:justify-start w-full max-w-sm">

                    <div class="flex flex-col gap-2 w-full">

                        <div class="hidden sm:flex items-center gap-2">
                            <button class="px-4 py-1.5 rounded-full bg-white text-[#58A83D] text-xs shadow-sm font-bold border border-white">ทั่วไป</button>
                        </div>

                        <div class="hidden sm:flex bg-white p-6 text-left rounded-2xl shadow-sm text-slate-800 text-sm flex flex-col justify-between relative min-h-[144px] w-full">
                            <p class="text-[#1E2A1E] font-medium">
                                โปรดแสกน QR Code เพื่อจองคิวของคุณ และรอการยืนยันจากเจ้าหน้าที่ของเรา
                            </p>

                            <a href="#" class="text-[#F4B400] font-bold flex items-center gap-2 hover:translate-x-1 transition-transform mt-2">
                                ตรวจสอบเพิ่มเติม <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
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

<!-- Warning Section -->
<section class="max-w-screen-lg mx-auto py-12 px-4 space-y-10">

    <div class="group relative flex items-center justify-between p-5 rounded-2xl bg-white border border-rose-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition-all duration-500 hover:shadow-[0_20px_40px_rgb(225,29,72,0.05)]">
        <div class="absolute left-0 top-4 bottom-4 w-[3px] bg-rose-400 rounded-r-full opacity-80"></div>

        <div class="flex items-center gap-4">
            <div class="flex-shrink-0">
                <div class="bg-red-50 text-red-500 p-2.5 rounded-xl">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 13.9999L5.57465 20.2985C5.61893 20.4756 5.64107 20.5642 5.66727 20.6415C5.92317 21.397 6.60352 21.9282 7.39852 21.9933C7.4799 21.9999 7.5712 21.9999 7.75379 21.9999C7.98244 21.9999 8.09677 21.9999 8.19308 21.9906C9.145 21.8982 9.89834 21.1449 9.99066 20.193C10 20.0967 10 19.9823 10 19.7537V5.49991M18.5 13.4999C20.433 13.4999 22 11.9329 22 9.99991C22 8.06691 20.433 6.49991 18.5 6.49991M10.25 5.49991H6.5C4.01472 5.49991 2 7.51463 2 9.99991C2 12.4852 4.01472 14.4999 6.5 14.4999H10.25C12.0164 14.4999 14.1772 15.4468 15.8443 16.3556C16.8168 16.8857 17.3031 17.1508 17.6216 17.1118C17.9169 17.0756 18.1402 16.943 18.3133 16.701C18.5 16.4401 18.5 15.9179 18.5 14.8736V5.1262C18.5 4.08191 18.5 3.55976 18.3133 3.2988C18.1402 3.05681 17.9169 2.92421 17.6216 2.88804C17.3031 2.84903 16.8168 3.11411 15.8443 3.64427C14.1772 4.55302 12.0164 5.49991 10.25 5.49991Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                <span class="text-red-500 font-medium text-base">คำเตือน</span>
                <p class="text-slate-600 font-medium text-base sm:text-base">
                    หากกดจองแล้วไม่รับสินค้า <span class="decoration-2 underline decoration-red-400">มีค่าปรับ 10 เท่า</span>
                </p>
            </div>
        </div>

        <div class="hidden md:block pr-2">
            <svg class="w-4 h-4 text-slate-300 group-hover:text-rose-400 group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </div>
    </div>
</section>

<section class="max-w-screen-xl mx-auto w-full px-6 py-6">
    <div class="flex flex-col lg:flex-row gap-6">

        <div class="w-full lg:w-1/4">
            <h2 class="text-3xl font-bold text-[#1E2A1E] leading-tight mb-4">
                ขั้นตอนการใช้งาน <br>
                <span class="text-[#57C84D]">ORMOR</span>
            </h2>
            <p class="text-[#4B5B4B]/70 text-sm font-normal leading-relaxed">
                เริ่มต้นง่ายๆ เพียงไม่กี่ขั้นตอน เพื่อประสบการณ์การใช้งานที่รวดเร็วและปลอดภัยที่สุดสำหรับคุณ
            </p>
        </div>

        <div class="w-full lg:w-3/4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="group p-6 rounded-[1.5rem] bg-white border border-slate-200 hover:border-[#2FAE44]/50 hover:shadow-[0_20px_50px_rgba(0,0,0,0.04)] hover:-translate-y-2 transition-all duration-400">
                    <div class="flex items-start gap-5">
                        <div class="flex-shrink-0 w-12 h-12 bg-slate-100/50 text-slate-400 group-hover:bg-[#EAF9E3] group-hover:text-[#57C84D] rounded-xl flex items-center justify-center transition-colors duration-500">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 15.5H7.5C6.10444 15.5 5.40665 15.5 4.83886 15.6722C3.56045 16.06 2.56004 17.0605 2.17224 18.3389C2 18.9067 2 19.6044 2 21M19 21V15M16 18H22M14.5 7.5C14.5 9.98528 12.4853 12 10 12C7.51472 12 5.5 9.98528 5.5 7.5C5.5 5.01472 7.51472 3 10 3C12.4853 3 14.5 5.01472 14.5 7.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h3 class="text-[#1E2A1E] text-lg font-semibold mb-1 tracking-tight group-hover:text-[#57C84D] transition-colors">1. สมัครสมาชิก</h3>
                            <p class="text-[#4B5B4B]/70 font-medium text-sm leading-relaxed">
                                ระบบจัดการคิวรูปแบบใหม่ แม่นยำ และรวดเร็วกว่าเดิม
                            </p>
                        </div>
                    </div>
                </div>

                <div class="group p-6 rounded-[1.5rem] bg-white border border-slate-200 hover:border-[#2FAE44]/50 hover:shadow-[0_20px_50px_rgba(0,0,0,0.04)] hover:-translate-y-2 transition-all duration-400">
                    <div class="flex items-start gap-5">
                        <div class="flex-shrink-0 w-12 h-12 bg-slate-100/50 text-slate-400 group-hover:bg-[#EAF9E3] group-hover:text-[#57C84D] rounded-xl flex items-center justify-center transition-colors duration-500">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 10.5L11 12.5L15.5 8M20 21V7.8C20 6.11984 20 5.27976 19.673 4.63803C19.3854 4.07354 18.9265 3.6146 18.362 3.32698C17.7202 3 16.8802 3 15.2 3H8.8C7.11984 3 6.27976 3 5.63803 3.32698C5.07354 3.6146 4.6146 4.07354 4.32698 4.63803C4 5.27976 4 6.11984 4 7.8V21L6.75 19L9.25 21L12 19L14.75 21L17.25 19L20 21Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h3 class="text-[#1E2A1E] text-lg font-semibold mb-1 tracking-tight group-hover:text-[#57C84D] transition-colors">2. จองคิว</h3>
                            <p class="text-[#4B5B4B]/70 font-medium text-sm leading-relaxed">
                                เชื่อมต่อระบบเติมเงินและตัวแทนจำหน่ายเข้าด้วยกันแบบไร้รอยต่อ
                            </p>
                        </div>
                    </div>
                </div>

                <div class="group p-6 rounded-[1.5rem] bg-white border border-slate-200 hover:border-[#2FAE44]/50 hover:shadow-[0_20px_50px_rgba(0,0,0,0.04)] hover:-translate-y-2 transition-all duration-400">
                    <div class="flex items-start gap-5">
                        <div class="flex-shrink-0 w-12 h-12 bg-slate-100/50 text-slate-400 group-hover:bg-[#EAF9E3] group-hover:text-[#57C84D] rounded-xl flex items-center justify-center transition-colors duration-500">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5295 8.35186C12.9571 8.75995 12.2566 9 11.5 9C9.567 9 8 7.433 8 5.5C8 3.567 9.567 2 11.5 2C12.753 2 13.8522 2.65842 14.4705 3.64814M6 20.0872H8.61029C8.95063 20.0872 9.28888 20.1277 9.61881 20.2086L12.3769 20.8789C12.9753 21.0247 13.5988 21.0388 14.2035 20.9214L17.253 20.3281C18.0585 20.1712 18.7996 19.7854 19.3803 19.2205L21.5379 17.1217C22.154 16.5234 22.154 15.5524 21.5379 14.9531C20.9832 14.4134 20.1047 14.3527 19.4771 14.8103L16.9626 16.6449C16.6025 16.9081 16.1643 17.0498 15.7137 17.0498H13.2855L14.8311 17.0498C15.7022 17.0498 16.4079 16.3633 16.4079 15.5159V15.2091C16.4079 14.5055 15.9156 13.892 15.2141 13.7219L12.8286 13.1417C12.4404 13.0476 12.0428 13 11.6431 13C10.6783 13 8.93189 13.7988 8.93189 13.7988L6 15.0249M20 6.5C20 8.433 18.433 10 16.5 10C14.567 10 13 8.433 13 6.5C13 4.567 14.567 3 16.5 3C18.433 3 20 4.567 20 6.5ZM2 14.6L2 20.4C2 20.9601 2 21.2401 2.10899 21.454C2.20487 21.6422 2.35785 21.7951 2.54601 21.891C2.75992 22 3.03995 22 3.6 22H4.4C4.96005 22 5.24008 22 5.45399 21.891C5.64215 21.7951 5.79513 21.6422 5.89101 21.454C6 21.2401 6 20.9601 6 20.4V14.6C6 14.0399 6 13.7599 5.89101 13.546C5.79513 13.3578 5.64215 13.2049 5.45399 13.109C5.24008 13 4.96005 13 4.4 13L3.6 13C3.03995 13 2.75992 13 2.54601 13.109C2.35785 13.2049 2.20487 13.3578 2.10899 13.546C2 13.7599 2 14.0399 2 14.6Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h3 class="text-[#1E2A1E] text-lg font-semibold mb-1 tracking-tight group-hover:text-[#57C84D] transition-colors">3. รอรับเหรียญ</h3>
                            <p class="text-[#4B5B4B]/70 font-medium text-sm leading-relaxed">
                                ดำเนินการอัตโนมัติ 24 ชั่วโมง ลดขั้นตอนการรอคอย
                            </p>
                        </div>
                    </div>
                </div>

                <div class="group p-6 rounded-[1.5rem] bg-white border border-slate-200 hover:border-[#2FAE44]/50 hover:shadow-[0_20px_50px_rgba(0,0,0,0.04)] hover:-translate-y-2 transition-all duration-400">
                    <div class="flex items-start gap-5">
                        <div class="flex-shrink-0 w-12 h-12 bg-slate-100/50 text-slate-400 group-hover:bg-[#EAF9E3] group-hover:text-[#57C84D] rounded-xl flex items-center justify-center transition-colors duration-500">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2827 3.45332C11.5131 2.98638 11.6284 2.75291 11.7848 2.67831C11.9209 2.61341 12.0791 2.61341 12.2152 2.67831C12.3717 2.75291 12.4869 2.98638 12.7174 3.45332L14.9041 7.88328C14.9721 8.02113 15.0061 8.09006 15.0558 8.14358C15.0999 8.19096 15.1527 8.22935 15.2113 8.25662C15.2776 8.28742 15.3536 8.29854 15.5057 8.32077L20.397 9.03571C20.9121 9.11099 21.1696 9.14863 21.2888 9.27444C21.3925 9.38389 21.4412 9.5343 21.4215 9.68377C21.3988 9.85558 21.2124 10.0372 20.8395 10.4004L17.3014 13.8464C17.1912 13.9538 17.136 14.0076 17.1004 14.0715C17.0689 14.128 17.0487 14.1902 17.0409 14.2545C17.0321 14.3271 17.0451 14.403 17.0711 14.5547L17.906 19.4221C17.994 19.9355 18.038 20.1922 17.9553 20.3445C17.8833 20.477 17.7554 20.57 17.6071 20.5975C17.4366 20.6291 17.2061 20.5078 16.7451 20.2654L12.3724 17.9658C12.2361 17.8942 12.168 17.8584 12.0962 17.8443C12.0327 17.8318 11.9673 17.8318 11.9038 17.8443C11.832 17.8584 11.7639 17.8942 11.6277 17.9658L7.25492 20.2654C6.79392 20.5078 6.56341 20.6291 6.39297 20.5975C6.24468 20.57 6.11672 20.477 6.04474 20.3445C5.962 20.1922 6.00603 19.9355 6.09407 19.4221L6.92889 14.5547C6.95491 14.403 6.96793 14.3271 6.95912 14.2545C6.95132 14.1902 6.93111 14.128 6.89961 14.0715C6.86402 14.0076 6.80888 13.9538 6.69859 13.8464L3.16056 10.4004C2.78766 10.0372 2.60121 9.85558 2.57853 9.68377C2.55879 9.5343 2.60755 9.38389 2.71125 9.27444C2.83044 9.14863 3.08797 9.11099 3.60304 9.03571L8.49431 8.32077C8.64642 8.29854 8.72248 8.28742 8.78872 8.25662C8.84736 8.22935 8.90016 8.19096 8.94419 8.14358C8.99391 8.09006 9.02793 8.02113 9.09597 7.88328L11.2827 3.45332Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h3 class="text-[#1E2A1E] text-lg font-semibold mb-1 tracking-tight group-hover:text-[#57C84D] transition-colors">4. รีวิว</h3>
                            <p class="text-[#4B5B4B]/70 font-medium text-sm leading-relaxed">
                                มั่นใจทุกธุรกรรมด้วยระบบความปลอดภัยมาตรฐานสูงสุด
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<section x-data="{ view: 'grid', tab: 'all', show: false }"
    x-init="setTimeout(() => show = true, 50)"
    x-cloak
    class="max-w-screen-xl mx-auto w-full px-6 py-12">

    <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-10 gap-6">
        <div class="text-left lg:w-1/3">
            <h2 class="text-3xl font-bold text-[#1E2A1E] tracking-tight mb-1">
                สถานะแพ็กเกจ<span class="text-[#57C84D]">วันนี้</span>
            </h2>
            <p class="text-[#4B5B4B]/70 text-sm font-normal leading-relaxed">
                อัปเดตข้อมูลสินค้าและสถานะการจองแบบเรียลไทม์
            </p>
        </div>

        <div class="flex justify-start lg:justify-center lg:w-1/3">
            <div class="flex bg-slate-50/5 p-1 rounded-2xl border border-slate-100">
                <button @click="tab = 'all'"
                    :class="tab === 'all' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                    class="px-5 py-2 text-sm font-medium rounded-xl transition-all">ทั้งหมด</button>
                <button @click="tab = 'recommended'"
                    :class="tab === 'recommended' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                    class="px-5 py-2 text-sm font-medium transition-all whitespace-nowrap rounded-xl">สินค้าแนะนำ</button>
                <button @click="tab = 'soon'"
                    :class="tab === 'soon' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                    class="px-5 py-2 text-sm font-medium transition-all whitespace-nowrap rounded-xl">จองคิวเร็วนี้</button>
            </div>
        </div>

        <div class="flex justify-start lg:justify-end lg:w-1/3">
            <div class="flex bg-slate-50/5 p-1 rounded-xl border border-slate-100">
                <button @click="view = 'grid'"
                    :class="view === 'grid' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                    class="p-2 rounded-lg transition-all" title="Grid View">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                </button>
                <button @click="view = 'list'"
                    :class="view === 'list' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                    class="p-2 rounded-lg transition-all" title="List View">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="view === 'grid' ? 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6' : 'flex flex-col gap-4'"
        class="transition-all duration-500">

        <div x-show="show && (tab === 'all' || tab === 'soon')"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            :class="view === 'list' ? 'lg:flex lg:items-center lg:justify-between mt-4' : ''"
            class="group relative bg-white border border-slate-200 rounded-2xl p-7 transition-all duration-300 hover:border-[#57C84D]">

            <div :class="view === 'list' ? 'lg:absolute lg:-top-4 lg:left-6 lg:right-auto lg:flex-row' : 'absolute top-6 right-6 flex-col items-end'" 
                 class="flex gap-2 absolute top-6 right-6 flex-col items-end lg:flex-col">
                <span class="text-sm font-medium text-red-500 bg-red-100/50 px-3 py-1 rounded-md whitespace-nowrap">
                    จองคิวได้วันพรุ่งนี้
                </span>
                <span class="text-sm font-medium text-purple-500 bg-purple-100/50 px-3 py-1 rounded-md whitespace-nowrap">
                    จองคิววันเสาร์นี้
                </span>
            </div>

            <div :class="view === 'list' ? 'lg:flex lg:items-center lg:gap-10 lg:flex-1' : ''">
                <div :class="view === 'list' ? 'lg:mb-0 lg:min-w-[200px]' : 'mb-6'" class="mb-6">
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 1</p>
                    <h3 class="text-xl font-medium text-[#1E2A1E]">100 Line Coins</h3>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:justify-center' : 'mb-8'" class="mb-8">
                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#1E2A1E]">500</span>
                        <span class="text-sm text-[#4B5B4B]">บาท</span>
                    </div>

                    <div :class="view === 'list' ? 'lg:mt-0 lg:flex lg:gap-4 lg:space-y-0' : 'mt-3 space-y-2.5'" class="mt-3 space-y-2.5">
                        <div class="flex justify-between items-center gap-2">
                             <span class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-md whitespace-nowrap">คิวปัจจุบัน: 10 คน</span>
                        </div>
                        <div class="flex justify-between items-center gap-2">
                            <span class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-md whitespace-nowrap">คงเหลือ: 10 ชิ้น</span>
                        </div>
                        <div class="flex justify-between items-center pt-2 border-t border-slate-100" :class="view === 'list' ? 'lg:border-t-0 lg:pt-0' : ''">
                            <span class="text-sm text-[#4B5B4B]" :class="view === 'list' ? 'lg:hidden' : ''">สถานะ</span>
                            <span class="flex items-center gap-1.5 text-sm font-medium text-[#57C84D]">
                                <span class="w-1.5 h-1.5 bg-[#57C84D] rounded-full animate-pulse"></span>
                                เปิดรับ
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <button :class="view === 'list' ? 'lg:w-auto lg:px-8 lg:ml-6' : 'w-full'"
                class="w-full py-3 rounded-xl bg-[#57C84D]/10 text-[#57C84D] text-sm font-semibold hover:bg-[#57C84D] hover:text-white transition-all duration-300">
                ดูข้อมูลเพิ่มเติม
            </button>
        </div>

        <div x-show="show && (tab === 'all' || tab === 'recommended')"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            :class="view === 'list' ? 'lg:flex lg:items-center lg:justify-between mt-4' : ''"
            class="group relative bg-white border border-slate-200 rounded-xl p-7 transition-all duration-300 hover:border-[#57C84D]">

            <div :class="view === 'list' ? 'lg:absolute lg:-top-4 lg:left-6 lg:right-auto' : 'absolute top-6 right-6'" class="absolute top-6 right-6">
                <span class="text-sm font-medium text-amber-500 bg-amber-100/50 px-3 py-1 rounded-md">สินค้าขายดี!</span>
            </div>

            <div :class="view === 'list' ? 'lg:flex lg:items-center lg:gap-10 lg:flex-1' : ''">
                <div :class="view === 'list' ? 'lg:mb-0 lg:min-w-[200px]' : 'mb-6'" class="mb-6">
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 2</p>
                    <h3 class="text-xl font-medium text-[#1E2A1E]">500 Line Coins</h3>
                </div>
                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:justify-center' : 'mb-8'" class="mb-8">
                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#1E2A1E]">750</span>
                        <span class="text-sm text-[#4B5B4B]">บาท</span>
                    </div>
                    <div :class="view === 'list' ? 'lg:mt-0 lg:flex lg:gap-4 lg:space-y-0' : 'mt-3 space-y-2.5'" class="mt-3 space-y-2.5">
                        <div class="flex justify-between items-center gap-2">
                             <span class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-md whitespace-nowrap">คิวปัจจุบัน: 10 คน</span>
                        </div>
                        <div class="flex justify-between items-center gap-2">
                            <span class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-md whitespace-nowrap">คงเหลือ: 10 ชิ้น</span>
                        </div>
                        <div class="flex justify-between items-center pt-2 border-t border-slate-100" :class="view === 'list' ? 'lg:border-t-0 lg:pt-0' : ''">
                            <span class="text-sm text-[#4B5B4B]" :class="view === 'list' ? 'lg:hidden' : ''">สถานะ</span>
                            <span class="flex items-center gap-1.5 text-sm font-medium text-[#57C84D]">
                                <span class="w-1.5 h-1.5 bg-[#57C84D] rounded-full animate-pulse"></span>
                                เปิดรับ
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <button :class="view === 'list' ? 'lg:w-auto lg:px-8 lg:ml-6' : 'w-full'"
                class="w-full py-3 rounded-xl bg-[#57C84D]/10 text-[#57C84D] text-sm font-semibold hover:bg-[#57C84D] hover:text-white transition-all duration-300">
                ดูข้อมูลเพิ่มเติม
            </button>
        </div>

        <div x-show="show && tab === 'all'"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            :class="view === 'list' ? 'lg:flex lg:items-center lg:justify-between' : ''"
            class="group relative bg-rose-100/10 border border-rose-200 rounded-xl p-7 grayscale-[0.5] opacity-80">

            <div :class="view === 'list' ? 'lg:flex lg:items-center lg:gap-10 lg:flex-1' : ''">
                <div :class="view === 'list' ? 'lg:mb-0 lg:min-w-[200px]' : 'mb-6'" class="mb-6">
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 3</p>
                    <h3 class="text-xl font-medium text-[#1E2A1E]">300 Line Coins</h3>
                </div>
                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:justify-center' : 'mb-8'" class="mb-8">
                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#1E2A1E]">1,450</span>
                        <span class="text-sm text-[#4B5B4B]">บาท</span>
                    </div>
                    <div :class="view === 'list' ? 'lg:mt-0 lg:flex lg:gap-4 lg:space-y-0' : 'mt-3 space-y-2.5'" class="mt-3 space-y-2.5">
                        <div class="flex justify-between items-center gap-2">
                             <span class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-md whitespace-nowrap grayscale">คิวปัจจุบัน: 0 คน</span>
                        </div>
                        <div class="flex justify-between items-center gap-2">
                            <span class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-md whitespace-nowrap grayscale">คงเหลือ: 0 ชิ้น</span>
                        </div>
                        <div class="flex justify-between items-center pt-2 border-t border-slate-100" :class="view === 'list' ? 'lg:border-t-0 lg:pt-0' : ''">
                            <span class="text-sm text-[#4B5B4B]" :class="view === 'list' ? 'lg:hidden' : ''">สถานะ</span>
                            <span class="flex items-center gap-1.5 text-sm font-medium text-red-500 grayscale">
                                <span class="w-1.5 h-1.5 bg-red-500 rounded-full animate-pulse grayscale"></span>
                                สินค้าหมด
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <button :class="view === 'list' ? 'lg:w-auto lg:px-8 lg:ml-6' : 'w-full'"
                class="w-full py-3 rounded-xl bg-red-100 text-red-400/50 text-sm font-semibold cursor-not-allowed grayscale">
                สินค้าหมด
            </button>
        </div>
    </div>
</section>

<section class="max-w-screen-xl mx-auto w-full px-6 py-16">
    <div class="mb-10 text-left lg:w-1/3">
            <h2 class="text-3xl font-bold text-[#1E2A1E] tracking-tight mb-1">
                สถานะ<span class="text-[#57C84D]">ระบบ</span>
            </h2>
            <p class="text-[#4B5B4B]/70 text-sm font-normal leading-relaxed">
                อัปเดตข้อมูลสถานะปัจจุบันบนเว็ปไซต์ของเรา
            </p>
        </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <div class="bg-white border border-slate-100 p-8 rounded-3xl shadow-sm hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-[#57C84D]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </div>
                <span class="text-slate-500 font-medium">ยอดคิวปัจจุบัน</span>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-4xl font-bold text-slate-800">50</span>
                <span class="text-slate-400 text-sm">คน</span>
            </div>
        </div>

        <div class="bg-white border border-slate-100 p-8 rounded-3xl shadow-sm hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-[#57C84D]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </div>
                <span class="text-slate-500 font-medium">สินค้าพร้อมขาย</span>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-4xl font-bold text-slate-800">50</span>
                <span class="text-slate-400 text-sm">คน</span>
            </div>
        </div>

        <div class="bg-white border border-slate-100 p-8 rounded-3xl shadow-sm hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-[#57C84D]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0110.068 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0113.932 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                    </svg>
                </div>
                <span class="text-slate-500 font-medium">สมาชิกที่สมัคร</span>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-4xl font-bold text-slate-800">124</span>
                <span class="text-slate-400 text-sm">คน</span>
            </div>
        </div>

    </div>
</section>

@endsection