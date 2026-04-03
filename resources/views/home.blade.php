@extends('layouts')

@section('content')

<section class="bg-gradient-to-t from-[#7ACB53]/100 to-[#B7E65A]/90 text-white min-h-screen flex items-center justify-center overflow-x-hidden w-full py-12 lg:py-12">

    <div class="grid w-full max-w-screen-xl px-6 lg:px-32 mx-auto gap-12 lg:py-12 grid-cols-1 lg:grid-cols-12 items-center">

        <div class="col-span-1 lg:col-span-8 order-2 lg:order-1 text-white flex flex-col gap-8 lg:gap-12 text-center lg:text-left items-center lg:items-start">

            <div class="space-y-2">
                <div class="inline-block px-3.5 py-1 rounded-full bg-green-200/10 border border-green-200/30 hover:bg-green-200/15 hover:border-green-200/50 transition-colorsbackdrop-blur-sm">
                    <p class="text-sm md:text-base font-normal text-white">
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

<section class="max-w-screen-xl mx-auto w-full px-4 py-6">
    <div class="flex flex-col lg:flex-row gap-6">

        <div class="w-full lg:w-1/4 text-center sm:text-start">
            <h2 class="text-4xl font-bold text-[#1E2A1E] leading-tight mb-4">
                ขั้นตอนการใช้งาน <br>
                <span class="text-[#57C84D]">ORMOR</span>
            </h2>
            <p class="text-[#4B5B4B]/70 text-xs sm:text-base font-medium leading-relaxed max-w-sm">
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
    class="max-w-screen-xl mx-auto w-full px-4 py-12">

    <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-10 gap-6">
        <div class="text-center sm:text-left lg:w-1/3">
            <h2 class="text-4xl font-bold text-[#1E2A1E] tracking-tight mb-1">
                สถานะแพ็กเกจ<span class="text-[#57C84D]">วันนี้</span>
            </h2>
            <p class="text-[#4B5B4B]/70 text-xs sm:text-base font-medium leading-relaxed">
                อัปเดตข้อมูลสินค้าและสถานะการจองแบบเรียลไทม์
            </p>
        </div>

        <div class="flex flex-row items-center justify-center sm:justify-between gap-2 lg:contents">

            <div class="flex justify-start lg:justify-center overflow-x-auto no-scrollbar">
                <div class="flex text-xs sm:text-sm bg-slate-50/5 p-1 rounded-2xl border border-slate-100 whitespace-nowrap">
                    <button @click="tab = 'all'"
                        :class="tab === 'all' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                        class="px-4 py-2 text-sm font-medium rounded-xl transition-all">ทั้งหมด</button>
                    <button @click="tab = 'recommended'"
                        :class="tab === 'recommended' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                        class="px-4 py-2 text-sm font-medium transition-all rounded-xl">สินค้าแนะนำ</button>
                    <button @click="tab = 'soon'"
                        :class="tab === 'soon' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                        class="px-4 py-2 text-sm font-medium transition-all rounded-xl">จองคิวเร็วนี้</button>
                </div>
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
            class="group relative bg-white border-2 border-slate-200 rounded-2xl p-7 transition-all duration-300 hover:border-[#57C84D]/50 hover:-translate-y-1.5">

            <div :class="view === 'list' ? 'lg:absolute lg:-top-4 lg:left-6 lg:right-auto' : 'absolute top-6 right-6'" class="absolute top-6 right-6">
                <span class="text-xs sm:text-sm font-medium text-sky-500 bg-sky-100 px-3 py-1 rounded-md">
                    <i class="fa-duotone fa-solid fa-calendar-lines-pen"></i> จองได้เร็วๆ นี้!
                </span>
            </div>

            <div :class="view === 'list' ? 'lg:flex lg:items-center lg:gap-10 lg:flex-1' : ''">
                <div :class="view === 'list' ? 'lg:mb-0 lg:min-w-[200px]' : 'mb-6'" class="mb-6">
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 1</p>
                    <h3 class="text-xl font-medium text-[#1E2A1E]">100 Line Coins</h3>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:justify-start' : 'mb-8'" class="mb-8">
                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#1E2A1E]">500</span>
                        <span class="text-sm text-[#4B5B4B]">บาท</span>
                    </div>

                    <div :class="view === 'list' ? 'lg:mt-0 lg:flex lg:items-center lg:gap-6 lg:flex-1 lg:justify-between' : 'mt-3 relative'" class="mt-3">

                        <div :class="view === 'list' ? 'lg:flex lg:gap-3 lg:space-y-0' : 'space-y-2.5'" class="space-y-2.5">
                            <div class="flex justify-between items-center gap-2">
                                <span class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-md whitespace-nowrap">คิวปัจจุบัน: 10 คน</span>
                            </div>
                            <div class="flex justify-between items-center gap-2">
                                <span class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-md whitespace-nowrap">คงเหลือ: 10 ชิ้น</span>
                            </div>
                        </div>

                        <div :class="view === 'list' 
                    ? 'lg:static lg:flex lg:flex-row lg:gap-2 lg:items-center' 
                    : 'absolute top-0 right-0 flex flex-col items-end gap-2.5'"
                            class="flex">
                            <span class="text-sm font-medium text-[#F4B400] bg-[#FFF8E8] px-3 py-1 whitespace-nowrap rounded-md">
                                <i class="fa-duotone fa-solid fa-calendar text-amber-500"></i> 4 เม.ย. 69
                            </span>
                            <span class="text-sm font-medium text-[#F4B400] bg-[#FFF8E8] px-3 py-1 whitespace-nowrap rounded-md">
                                <i class="fa-duotone fa-solid fa-alarm-clock text-amber-500"></i> 18.00
                            </span>
                        </div>

                        <div class="flex justify-between items-center mt-2 pt-2 border-t border-slate-100"
                            :class="view === 'list' ? 'lg:border-t-0 lg:pt-0 lg:mt-0 lg:ml-auto' : ''">
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
            class="group relative bg-white border-2 border-slate-200 rounded-xl p-7 transition-all duration-300 hover:border-[#57C84D]/50 hover:-translate-y-1.5">

            <div :class="view === 'list' ? 'lg:absolute lg:-top-4 lg:left-6 lg:right-auto' : 'absolute top-6 right-6'" class="absolute top-6 right-6">
                <span class="text-xs sm:text-sm font-medium text-orange-500 bg-orange-100 px-3 py-1 rounded-md">
                    <i class="fa-duotone fa-fire"></i> สินค้าขายดี!
                </span>
            </div>

            <div :class="view === 'list' ? 'lg:flex lg:items-center lg:gap-10 lg:flex-1' : ''">
                <div :class="view === 'list' ? 'lg:mb-0 lg:min-w-[200px]' : 'mb-6'" class="mb-6">
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 2</p>
                    <h3 class="text-xl font-medium text-[#1E2A1E]">500 Line Coins</h3>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:w-full lg:justify-between' : 'mb-8'" class="mb-8">

                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#1E2A1E]">750</span>
                        <span class="text-sm text-[#4B5B4B]">บาท</span>
                    </div>

                    <div :class="view === 'list' ? 'lg:mt-0 lg:flex lg:items-center lg:gap-8 lg:flex-1' : 'mt-3 space-y-2.5'" class="text-xs sm:text-sm mt-3 space-y-2.5">

                        <div :class="view === 'list' ? 'lg:flex lg:gap-3 lg:space-y-0' : 'space-y-2.5'" class="space-y-2.5">
                            <div class="flex justify-between items-center gap-2">
                                <span class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-md whitespace-nowrap">คิวปัจจุบัน: 10 คน</span>
                            </div>
                            <div class="flex justify-between items-center gap-2">
                                <span class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-md whitespace-nowrap">คงเหลือ: 10 ชิ้น</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mt-2 pt-2 border-t border-slate-100"
                            :class="view === 'list' ? 'lg:border-t-0 lg:pt-0 lg:mt-0 lg:ml-auto' : ''">
                            <span class="text-sm text-[#4B5B4B]" :class="view === 'list' ? 'lg:hidden' : ''">สถานะ</span>
                            <span class="flex items-center gap-1.5 text-sm font-medium text-[#57C84D] whitespace-nowrap">
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
            class="group relative bg-rose-100/20 border-2 border-rose-200 rounded-xl p-7 transition-all duration-300 hover:-translate-y-1.5">

            <div :class="view === 'list' ? 'lg:flex lg:items-center lg:gap-10 lg:flex-1' : ''">
                <div :class="view === 'list' ? 'lg:mb-0 lg:min-w-[200px]' : 'mb-6'" class="mb-6">
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 3</p>
                    <h3 class="text-xl font-medium text-[#1E2A1E]">300 Line Coins</h3>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:w-full lg:justify-between' : 'mb-8'" class="mb-8">

                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#1E2A1E]">1,450</span>
                        <span class="text-sm text-[#4B5B4B]">บาท</span>
                    </div>

                    <div :class="view === 'list' ? 'lg:mt-0 lg:flex lg:items-center lg:gap-8 lg:flex-1' : 'mt-3 space-y-2.5'" class="text-xs sm:text-sm mt-3 space-y-2.5">

                        <div :class="view === 'list' ? 'lg:flex lg:gap-3 lg:space-y-0' : 'space-y-2.5'" class="space-y-2.5">
                            <div class="flex justify-between items-center gap-2">
                                <span class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-md whitespace-nowrap grayscale">คิวปัจจุบัน: 0 คน</span>
                            </div>
                            <div class="flex justify-between items-center gap-2">
                                <span class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-md whitespace-nowrap grayscale">คงเหลือ: 0 ชิ้น</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mt-2 pt-2 border-t border-slate-100"
                            :class="view === 'list' ? 'lg:border-t-0 lg:pt-0 lg:mt-0 lg:ml-auto' : ''">
                            <span class="text-sm text-[#4B5B4B]" :class="view === 'list' ? 'lg:hidden' : ''">สถานะ</span>
                            <span class="flex items-center gap-1.5 text-sm font-medium text-red-500 whitespace-nowrap grayscale">
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

<section class="max-w-screen-xl mx-auto w-full px-4 py-12">
    <div class="flex flex-col lg:flex-row gap-16 items-center">

        <div class="w-full lg:w-1/3 text-center sm:text-start">
            <h2 class="text-4xl font-bold text-slate-900 mb-1.5 sm:mb-2">
                สถานะ<span class="text-[#57C84D]">ระบบ</span>
            </h2>
            <p class="text-slate-500 text-xs sm:text-base font-medium leading-relaxed max-w-sm">
                เรามุ่งมั่นพัฒนาเทคโนโลยีเพื่อรองรับผู้ใช้งานจำนวนมาก ด้วยระบบที่มีเสถียรภาพและรวดเร็วที่สุดในอุตสาหกรรม
            </p>
            <div class="mt-10 pt-10 border-t border-slate-200 flex flex-row justify-center sm:justify-start gap-4 sm:gap-8 text-center sm:text-start">
                <div>
                    <p class="text-slate-900 hover:text-sky-500 transition-colors font-semibold text-2xl">99.9%</p>
                    <p class="text-slate-400 text-xs font-medium">ระบบการทำงาน</p>
                </div>
                <div>
                    <p class="text-slate-900 hover:text-green-500 transition-colors font-semibold text-2xl">24/7</p>
                    <p class="text-slate-400 text-xs font-medium">ระบบการติดต่อ</p>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-2/3">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="group relative p-8 sm:p-10 rounded-3xl bg-white border border-slate-200 hover:-translate-y-1.5 hover:shadow-[0_40px_80px_rgba(0,0,0,0.04)] transition-all duration-700 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-blue-50/50 to-blue-100/50 opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                    <div class="relative z-10 flex flex-col items-center text-center sm:items-start sm:text-left gap-4 sm:gap-8">
                        <div class="w-14 h-14 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center group-hover:bg-blue-100/50 group-hover:scale-110 transition-all duration-500">
                            <i class="fa-duotone fa-solid fa-box text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-slate-500 font-medium text-base mb-2">ผู้สั่งซื้อสินค้า</p>
                            <div class="relative inline-block mb-2">
                                <h3 class="text-5xl sm:text-7xl font-semibold text-slate-900 transition-all group-hover:text-blue-600">0</h3>
                                <span class="absolute -bottom-1 left-0 w-full h-1 bg-blue-600 origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></span>
                            </div>
                            <p class="text-slate-500 mt-2 text-sm font-medium leading-relaxed max-w-xs mx-auto sm:mx-0">
                                จำนวนการเข้าใช้งานและทำรายการทั้งหมดบนแพลตฟอร์มในปีนี้
                            </p>
                        </div>
                    </div>
                    <div class="absolute -bottom-16 -right-16 w-32 h-32 bg-blue-500/5 rounded-full group-hover:scale-300 transition-transform duration-500"></div>
                </div>

                <div class="group relative p-8 sm:p-10 rounded-3xl bg-white border border-slate-200 hover:-translate-y-1.5 md:hover:translate-y-8 hover:shadow-[0_40px_80px_rgba(0,0,0,0.04)] transition-all duration-700 md:translate-y-10 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-orange-50/50 to-orange-100/50 opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                    <div class="relative z-10 flex flex-col items-center text-center sm:items-start sm:text-left gap-4 sm:gap-8">
                        <div class="w-14 h-14 bg-orange-50 text-orange-500 rounded-2xl flex items-center justify-center group-hover:bg-orange-100/50 group-hover:scale-110 transition-all duration-500">
                            <i class="fa-duotone fa-solid fa-circle-nodes text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-slate-500 font-medium text-base mb-2">ยอดคิวปัจจุบัน</p>
                            <div class="relative inline-block mb-2">
                                <h3 class="text-5xl sm:text-7xl font-semibold text-slate-900 transition-all group-hover:text-orange-600">0</h3>
                                <span class="absolute -bottom-1 left-0 w-full h-1 bg-orange-600 origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></span>
                            </div>
                            <p class="text-slate-500 mt-2 text-sm font-medium leading-relaxed max-w-xs mx-auto sm:mx-0">
                                รายการที่ดำเนินการสำเร็จผ่านระบบอัตโนมัติ 24 ชั่วโมง
                            </p>
                        </div>
                    </div>
                    <div class="absolute -bottom-16 -right-16 w-32 h-32 bg-orange-500/5 rounded-full group-hover:scale-300 transition-transform duration-500"></div>
                </div>

                <div class="group relative p-8 sm:p-10 rounded-3xl bg-white border border-slate-200 hover:-translate-y-1.5 hover:shadow-[0_40px_80px_rgba(0,0,0,0.04)] transition-all duration-700 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-emerald-50/50 to-emerald-100/50 opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                    <div class="relative z-10 flex flex-col items-center text-center sm:items-start sm:text-left gap-4 sm:gap-8">
                        <div class="w-14 h-14 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center group-hover:bg-emerald-100/50 group-hover:scale-110 transition-all duration-500">
                            <i class="fa-duotone fa-solid fa-badge-check text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-slate-500 font-medium text-base mb-2">สินค้าพร้อมขาย</p>
                            <div class="relative inline-block mb-2">
                                <h3 class="text-5xl sm:text-7xl font-semibold text-slate-900 transition-all group-hover:text-emerald-600">0</h3>
                                <span class="absolute -bottom-1 left-0 w-full h-1 bg-emerald-600 origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></span>
                            </div>
                            <p class="text-slate-500 mt-2 text-sm font-medium leading-relaxed max-w-xs mx-auto sm:mx-0">
                                สมาชิกที่ใช้งานระบบอย่างต่อเนื่องและเชื่อมั่นในบริการของเรา
                            </p>
                        </div>
                    </div>
                    <div class="absolute -bottom-16 -right-16 w-32 h-32 bg-emerald-500/5 rounded-full group-hover:scale-300 transition-transform duration-500"></div>
                </div>

                <div class="group relative p-8 sm:p-10 rounded-3xl bg-white border border-slate-200 hover:-translate-y-1.5 md:hover:translate-y-8 hover:shadow-[0_40px_80px_rgba(0,0,0,0.04)] transition-all duration-700 md:translate-y-10 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-purple-50/50 to-purple-100/50 opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                    <div class="relative z-10 flex flex-col items-center text-center sm:items-start sm:text-left gap-4 sm:gap-8">
                        <div class="w-14 h-14 bg-purple-50 text-purple-500 rounded-2xl flex items-center justify-center group-hover:bg-purple-100/50 group-hover:scale-110 transition-all duration-500">
                            <i class="fa-duotone fa-solid fa-users text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-slate-500 font-medium text-base mb-2">สมาชิกทั้งหมด</p>
                            <div class="relative inline-block mb-2">
                                <h3 class="text-5xl sm:text-7xl font-semibold text-slate-900 transition-all group-hover:text-purple-600">0</h3>
                                <span class="absolute -bottom-1 left-0 w-full h-1 bg-purple-600 origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></span>
                            </div>
                            <p class="text-slate-500 mt-2 text-sm font-medium leading-relaxed max-w-xs mx-auto sm:mx-0">
                                ขยายขอบเขตการให้บริการครอบคลุมหลายภูมิภาคทั่วโลก
                            </p>
                        </div>
                    </div>
                    <div class="absolute -bottom-16 -right-16 w-32 h-32 bg-purple-500/5 rounded-full group-hover:scale-300 transition-transform duration-500"></div>
                </div>

            </div>
        </div>

    </div>
</section>

<section class="max-w-screen-xl mx-auto w-full px-4 py-24">
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