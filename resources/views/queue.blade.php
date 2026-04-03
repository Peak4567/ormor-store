@extends('layouts')

@section('title', 'Ormor Topup Coins | Packages')

@section('content')

<!-- Warning Section -->
<section class="max-w-screen-lg mx-auto mt-32 py-12 px-4 space-y-10">

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

<!-- Queue Section -->
<section x-data="{ view: 'grid', tab: 'all', show: false }"
    x-init="setTimeout(() => show = true, 50)"
    x-cloak
    class="max-w-screen-xl mx-auto w-full px-4 py-12">

    <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-10 gap-6">
        <div class="text-center sm:text-left lg:w-1/3">
            <h2 class="text-4xl font-bold text-[#1E2A1E] tracking-tight mb-1">
                แพ็กเกจที่เปิดให้จอง<span class="text-[#57C84D]">วันนี้</span>
            </h2>
            <p class="text-[#4B5B4B]/70 text-xs sm:text-base font-medium leading-relaxed">
                สามารถเลือกจองแพ็กเกจที่ต้องการของคุณได้
            </p>
        </div>

        <div class="flex flex-col items-center lg:items-end gap-2 lg:max-w-sm">

            <div class="relative w-full max-w-sm group">
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

            <div class="flex justify-start lg:justify-end overflow-x-auto no-scrollbar w-full">
                <div class="flex text-xs sm:text-sm bg-slate-50/5 p-1 rounded-2xl border border-slate-100 whitespace-nowrap ml-auto mr-auto lg:mr-0">
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

                    <div class="text-xl font-medium inline-block">
                        <h3 class="text-[#1E2A1E]">
                            <i class="fa-duotone fa-solid fa-coin-front text-amber-500"></i>
                            500 Line Coins
                        </h3>
                    </div>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:justify-start' : 'mb-8'" class="mb-8">
                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#57C84D]">230</span>
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
                จองสินค้าเลย!
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

                    <div class="text-xl font-medium inline-block">
                        <h3 class="text-[#1E2A1E]">
                            <i class="fa-duotone fa-solid fa-coin-front text-amber-500"></i>
                            800 Line Coins
                        </h3>
                    </div>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:w-full lg:justify-between' : 'mb-8'" class="mb-8">

                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#57C84D]">300</span>
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
                จองสินค้าเลย!
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
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 3</p>

                    <div class="text-xl font-medium inline-block">
                        <h3 class="text-[#1E2A1E]">
                            <i class="fa-duotone fa-solid fa-coin-front text-amber-500"></i>
                            1,600 Line Coins
                        </h3>
                    </div>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:w-full lg:justify-between' : 'mb-8'" class="mb-8">

                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#57C84D]">550</span>
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
                จองสินค้าเลย!
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
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 4</p>

                    <div class="text-xl font-medium inline-block">
                        <h3 class="text-[#1E2A1E]">
                            <i class="fa-duotone fa-solid fa-coin-front text-amber-500"></i>
                            3,300 Line Coins
                        </h3>
                    </div>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:w-full lg:justify-between' : 'mb-8'" class="mb-8">

                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#57C84D]">1,100</span>
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

        <div x-show="show && (tab === 'all')"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            :class="view === 'list' ? 'lg:flex lg:items-center lg:justify-between mt-4' : ''"
            class="group relative bg-white border-2 border-slate-200 rounded-xl p-7 transition-all duration-300 hover:border-[#57C84D]/50 hover:-translate-y-1.5">

            <div :class="view === 'list' ? 'lg:flex lg:items-center lg:gap-10 lg:flex-1' : ''">
                <div :class="view === 'list' ? 'lg:mb-0 lg:min-w-[200px]' : 'mb-6'" class="mb-6">
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 5</p>

                    <div class="text-xl font-medium inline-block">
                        <h3 class="text-[#1E2A1E]">
                            <i class="fa-duotone fa-solid fa-coin-front text-amber-500"></i>
                            10,000 Line Coins
                        </h3>
                    </div>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:w-full lg:justify-between' : 'mb-8'" class="mb-8">

                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#57C84D]">3,000</span>
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
                จองสินค้าเลย!
            </button>
        </div>

        <div x-show="show && (tab === 'all')"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            :class="view === 'list' ? 'lg:flex lg:items-center lg:justify-between mt-4' : ''"
            class="group relative bg-white border-2 border-slate-200 rounded-xl p-7 transition-all duration-300 hover:border-[#57C84D]/50 hover:-translate-y-1.5">

            <div :class="view === 'list' ? 'lg:flex lg:items-center lg:gap-10 lg:flex-1' : ''">
                <div :class="view === 'list' ? 'lg:mb-0 lg:min-w-[200px]' : 'mb-6'" class="mb-6">
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 6</p>

                    <div class="text-xl font-medium inline-block">
                        <h3 class="text-[#1E2A1E]">
                            <i class="fa-duotone fa-solid fa-coin-front text-amber-500"></i>
                            30,000 Line Coins
                        </h3>
                    </div>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:w-full lg:justify-between' : 'mb-8'" class="mb-8">

                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#57C84D]">9,000</span>
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
                จองสินค้าเลย!
            </button>
        </div>

        <div x-show="show && (tab === 'all')"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            :class="view === 'list' ? 'lg:flex lg:items-center lg:justify-between mt-4' : ''"
            class="group relative bg-white border-2 border-slate-200 rounded-xl p-7 transition-all duration-300 hover:border-[#57C84D]/50 hover:-translate-y-1.5">

            <div :class="view === 'list' ? 'lg:flex lg:items-center lg:gap-10 lg:flex-1' : ''">
                <div :class="view === 'list' ? 'lg:mb-0 lg:min-w-[200px]' : 'mb-6'" class="mb-6">
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 7</p>

                    <div class="text-xl font-medium inline-block">
                        <h3 class="text-[#1E2A1E]">
                            <i class="fa-duotone fa-solid fa-coin-front text-amber-500"></i>
                            50,000 Line Coins
                        </h3>
                    </div>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:w-full lg:justify-between' : 'mb-8'" class="mb-8">

                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#57C84D]">15,000</span>
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
                จองสินค้าเลย!
            </button>
        </div>

        <div x-show="show && (tab === 'all')"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            :class="view === 'list' ? 'lg:flex lg:items-center lg:justify-between mt-4' : ''"
            class="group relative bg-white border-2 border-slate-200 rounded-xl p-7 transition-all duration-300 hover:border-[#57C84D]/50 hover:-translate-y-1.5">

            <div :class="view === 'list' ? 'lg:flex lg:items-center lg:gap-10 lg:flex-1' : ''">
                <div :class="view === 'list' ? 'lg:mb-0 lg:min-w-[200px]' : 'mb-6'" class="mb-6">
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 8</p>

                    <div class="text-xl font-medium inline-block">
                        <h3 class="text-[#1E2A1E]">
                            <i class="fa-duotone fa-solid fa-coin-front text-amber-500"></i>
                            100,000 Line Coins
                        </h3>
                    </div>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:w-full lg:justify-between' : 'mb-8'" class="mb-8">

                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#57C84D]">31,800</span>
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
                จองสินค้าเลย!
            </button>
        </div>

        <div x-show="show && (tab === 'all')"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            :class="view === 'list' ? 'lg:flex lg:items-center lg:justify-between mt-4' : ''"
            class="group relative bg-white border-2 border-slate-200 rounded-xl p-7 transition-all duration-300 hover:border-[#57C84D]/50 hover:-translate-y-1.5">

            <div :class="view === 'list' ? 'lg:flex lg:items-center lg:gap-10 lg:flex-1' : ''">
                <div :class="view === 'list' ? 'lg:mb-0 lg:min-w-[200px]' : 'mb-6'" class="mb-6">
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 9</p>

                    <div class="text-xl font-medium inline-block">
                        <h3 class="text-[#1E2A1E]">
                            <i class="fa-duotone fa-solid fa-coin-front text-amber-500"></i>
                            200,000 Line Coins
                        </h3>
                    </div>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:w-full lg:justify-between' : 'mb-8'" class="mb-8">

                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#57C84D]">62,850</span>
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
                จองสินค้าเลย!
            </button>
        </div>

        <div x-show="show && (tab === 'all')"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            :class="view === 'list' ? 'lg:flex lg:items-center lg:justify-between mt-4' : ''"
            class="group relative bg-white border-2 border-slate-200 rounded-xl p-7 transition-all duration-300 hover:border-[#57C84D]/50 hover:-translate-y-1.5">

            <div :class="view === 'list' ? 'lg:flex lg:items-center lg:gap-10 lg:flex-1' : ''">
                <div :class="view === 'list' ? 'lg:mb-0 lg:min-w-[200px]' : 'mb-6'" class="mb-6">
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 10</p>

                    <div class="text-xl font-medium inline-block">
                        <h3 class="text-[#1E2A1E]">
                            <i class="fa-duotone fa-solid fa-coin-front text-amber-500"></i>
                            300,000 Line Coins
                        </h3>
                    </div>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:w-full lg:justify-between' : 'mb-8'" class="mb-8">

                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#57C84D]">93,550</span>
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
                จองสินค้าเลย!
            </button>
        </div>

        <div x-show="show && (tab === 'all')"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            :class="view === 'list' ? 'lg:flex lg:items-center lg:justify-between mt-4' : ''"
            class="group relative bg-white border-2 border-slate-200 rounded-xl p-7 transition-all duration-300 hover:border-[#57C84D]/50 hover:-translate-y-1.5">

            <div :class="view === 'list' ? 'lg:flex lg:items-center lg:gap-10 lg:flex-1' : ''">
                <div :class="view === 'list' ? 'lg:mb-0 lg:min-w-[200px]' : 'mb-6'" class="mb-6">
                    <p class="text-sm font-medium text-[#57C84D]">แพ็กเเกจลำดับที่ 11</p>

                    <div class="text-xl font-medium inline-block">
                        <h3 class="text-[#1E2A1E]">
                            <i class="fa-duotone fa-solid fa-coin-front text-amber-500"></i>
                            400,000 Line Coins
                        </h3>
                    </div>
                </div>

                <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:w-full lg:justify-between' : 'mb-8'" class="mb-8">

                    <div class="flex items-baseline gap-1">
                        <span class="text-3xl font-semibold text-[#57C84D]">123,300</span>
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
                จองสินค้าเลย!
            </button>
        </div>

    </div>
</section>

<!-- Queue Booking Section -->
<section class="bg-white border-2 border-slate-100 p-8">
    <div class="max-w-screen-xl mx-auto px-4">

        <div class="text-center sm:text-left my-8">
            <h2 class="text-4xl font-bold text-[#1E2A1E] tracking-tight mb-1">
                จองคิว<span class="text-[#57C84D]">แพ็กเกจเหรียญ</span>
            </h2>
            <p class="text-[#4B5B4B]/70 text-xs sm:text-base font-medium leading-relaxed">
                เลือกวัน, เวลา และแพ็กเกจที่ต้องการ จากนั้นตรวจสอบรายละเอียดก่อนยืนยันการจอง
            </p>
        </div>

        <div class="bg-slate-100/50 border border-slate-200/50 rounded-2xl p-8">
            <div class="flex items-center gap-3 mb-1">
                <div class="w-1 h-6 bg-[#57C84D] rounded-full"></div>
                <h3 class="text-2xl font-semibold text-[#1E2A1E]">เลือกวันและเวลา</h3>
            </div>

            <p class="text-base font-medium text-slate-500 mb-8 leading-relaxed">
                สามารถเลือกวันนัดหมายได้ภายในช่วงที่ระบบกำหนด และเวลาอาจมีการเปลี่ยนแปลง
                <span class="text-[#57C84D] font-semibold">กรุณาอัปเดตจากกลุ่ม LINE OpenChat</span>
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-1">
                    <label class="block text-lg font-semibold text-[#1E2A1E]">วันที่ต้องการจอง</label>
                    <div class="relative group">
                        <input
                            type="date"
                            x-model="bookingDate"
                            class="w-full px-5 py-4 bg-white border-2 border-slate-200 rounded-xl focus:border-[#57C84D]/50 focus:ring-0 transition-all text-slate-600 font-medium"
                            value="2026-04-04">
                    </div>
                    <p class="text-sm text-slate-400 mt-2">
                        วันที่เลือก: <span x-text="formatThaiDate(bookingDate)" class="font-medium">วันเสาร์ที่ 4 เมษายน พ.ศ. 2569</span>
                    </p>
                </div>

                <div class="space-y-1">
                    <label class="block text-lg font-semibold text-[#1E2A1E]">เวลาที่ต้องการจอง</label>
                    <div class="relative group">
                        <select
                            x-model="bookingTime"
                            class="w-full px-5 py-4 bg-white border-2 border-slate-200 rounded-xl focus:border-[#57C84D]/50 focus:ring-0 transition-all text-slate-600 font-medium appearance-none">
                            <option value="">กรุณาเลือกเวลาที่ต้องการ</option>
                            <option value="10:00">เวลา 10:00 น.</option>
                            <option value="13:00">เวลา 13:00 น.</option>
                            <option value="18:00">เวลา 18:00 น.</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                            <i class="fa-solid fa-chevron-down text-slate-400 text-sm"></i>
                        </div>
                    </div>
                    <p class="text-sm text-slate-400 mt-2">กรุณาเลือกเวลาที่สะดวกจากรายการที่เปิดรับ</p>
                </div>
            </div>
        </div>
        <div class="bg-slate-100/50 border border-slate-200/50 rounded-2xl p-8 mt-8">
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-1">
                    <div class="w-1 h-6 bg-[#57C84D] rounded-full"></div>
                    <h3 class="text-2xl font-semibold text-[#1E2A1E]">รายละเอียดที่เลือก</h3>
                </div>

                <p class="text-base font-medium text-slate-500 mb-8 leading-relaxed">
                    กรุณาเลือกจองคิวสินค้าที่ต้องการ และตรวจสอบรายละเอียดก่อนยืนยันการจอง
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <label class="block text-lg font-semibold text-[#1E2A1E]">จำนวนเหรียญ</label>
                        <input
                            type="text"
                            readonly
                            placeholder="ยังไม่ได้เลือกแพ็กเกจ"
                            :value="selectedPackage ? selectedPackage.coins : 'ยังไม่ได้เลือกแพ็กเกจ'"
                            class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-200/50 rounded-2xl text-slate-500 font-medium focus:outline-none cursor-default">
                    </div>

                    <div class="space-y-3">
                        <label class="block text-lg font-semibold text-[#1E2A1E]">ราคา</label>
                        <input
                            type="text"
                            readonly
                            placeholder="ราคาจะแสดงอัตโนมัติ"
                            :value="selectedPackage ? selectedPackage.price + ' บาท' : 'ราคาจะแสดงอัตโนมัติ'"
                            class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-200/50 rounded-2xl text-slate-500 font-medium focus:outline-none cursor-default">
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-lg font-semibold text-[#1E2A1E] mb-3">หมายเหตุเพิ่มเติม</label>
                <textarea
                    rows="4"
                    x-model="note"
                    placeholder="เช่น ขอคิวด่วน / หากมีการเปลี่ยนแปลงรอแจ้งใน LINE / สะดวกเวลาประมาณ 22:00"
                    class="w-full px-5 py-4 bg-white border-2 border-slate-200/50 rounded-2xl focus:border-[#57C84D]/50 focus:ring-0 transition-all text-slate-600 font-medium placeholder:text-slate-400 resize-none"></textarea>
            </div>

            <div class="pt-0">
                <button
                    @click="confirmBooking()"
                    class="w-full py-4 rounded-xl bg-[#57C84D] text-white text-base font-medium hover:bg-[#2F8F3A] hover:text-white transition-all duration-300">
                    <i class="fa-duotone fa-solid fa-coins"></i>
                    <span>จองคิวสินค้าเลย!</span>
                </button>
            </div>
        </div>
    </div>
</section>

<section class="max-w-screen-xl mx-auto w-full px-4 py-8">
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