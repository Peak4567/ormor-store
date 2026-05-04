@extends('layouts')

@section('content')
    <section
        class="bg-gradient-to-t from-[#7ACB53]/100 to-[#B7E65A]/90 text-white min-h-screen flex items-center justify-center overflow-x-hidden w-full py-12 lg:py-12">

        <div
            class="grid w-full max-w-screen-xl px-6 lg:px-32 mx-auto gap-12 lg:py-12 grid-cols-1 lg:grid-cols-12 items-center">

            <div
                class="col-span-1 lg:col-span-8 order-2 lg:order-1 text-white flex flex-col gap-8 lg:gap-12 text-center lg:text-left items-center lg:items-start">

                <div class="space-y-2">
                    <div
                        class="inline-block px-3.5 py-1 rounded-full bg-green-200/10 border border-green-200/30 hover:bg-green-200/15 hover:border-green-200/50 transition-colorsbackdrop-blur-sm">
                        <p class="text-sm md:text-base font-normal text-white">
                            ระบบจองคิวเติม Coinsline (เหรียญไลน์) รองรับตัวแทน & ลูกค้าทั่วไป
                        </p>
                    </div>

                    <h1 class="max-w-3xl text-5xl font-bold md:text-7xl lg:text-7xl text-white">
                        {{ $web_cfg->site_name ?? '#' }}
                    </h1>

                    <p class="max-w-xl font-normal md:text-lg lg:text-md leading-relaxed mx-auto lg:mx-0 text-white/90">
                        {{ $web_cfg->description ?? '#' }}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-4 sm:justify-center">

                    <!-- QR Code Panel -->
                    <div
                        class="bg-white px-2 py-2 rounded-2xl shadow-sm w-full max-w-sm sm:w-fit flex-shrink-0 self-stretch flex items-center mx-auto text-left lg:mx-0">
                        <div
                            class="p-2 bg-slate-100/50 flex flex-col items-center justify-center text-slate-400 rounded-2xl border-2 border-dashed border-slate-200 w-full">
                            <img src="{{ $web_cfg->qr_code ?? '#' }}" alt="QR Code"
                                class="w-36 h-36 sm:w-36 sm:h-36 object-cover rounded-lg">
                        </div>
                        <div
                            class="sm:hidden flex p-6 text-slate-800 text-sm flex flex-col justify-between relative min-h-[144px] w-full">
                            <p class="text-[#1E2A1E] font-medium">
                                โปรดสแกน QR Code เพื่อเข้ากลุ่ม LINE ของเรา เพื่อรับข่าวสาร โปรโมชัน และอัปเดตต่าง ๆ
                                ได้ก่อนใคร
                            </p>

                            <a href="{{ $web_cfg->line ?? '#' }}"
                                class="flex gap-2 text-[#F4B400] font-bold flex items-center gap-2 hover:translate-x-1 transition-transform mt-2">
                                คลิกที่นี่ เพื่อเข้ากลุ่ม <svg width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="3"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Information Panel -->
                    <div
                        class="flex flex-col lg:flex-row lg:items-start gap-6 justify-center lg:justify-start w-full max-w-sm">

                        <div class="flex flex-col gap-2 w-full">

                            <div class="hidden sm:flex items-center gap-2">
                                <button
                                    class="px-4 py-1.5 rounded-full bg-white text-[#58A83D] text-xs shadow-sm font-bold border border-white">ทั่วไป</button>
                            </div>

                            <div
                                class="hidden sm:flex bg-white p-6 text-left rounded-2xl shadow-sm text-slate-800 text-sm flex flex-col justify-between relative min-h-[144px] w-full">
                                <p class="text-[#1E2A1E] font-medium">
                                    โปรดแสกน QR Code เพื่อจองคิวของคุณ และรอการยืนยันจากเจ้าหน้าที่ของเรา
                                </p>

                                <a href="{{ $web_cfg->line ?? '#' }}"
                                    class="text-[#F4B400] font-bold flex items-center gap-2 hover:translate-x-1 transition-transform mt-2">
                                    ตรวจสอบเพิ่มเติม <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 order-1 lg:order-2 flex flex-col items-center justify-center gap-10 lg:gap-20 w-full">
                <div
                    class="relative w-full max-w-[240px] lg:max-w-[300px] aspect-square flex items-center justify-center group mt-30 lg:mt-0">
                    <div
                        class="absolute inset-0 bg-white/20 opacity-0 group-hover:opacity-100 blur-[60px] transition-all duration-700 rounded-full scale-50 group-hover:scale-100">
                    </div>

                    <img src="{{ $web_cfg->logo ?? '#' }}" alt="Hero Logo"
                        class="w-full h-auto relative z-10 scale-110 lg:scale-125 -translate-y-4 rotate-[2deg] drop-shadow-[0_30px_50px_rgba(0,0,0,0.3)] transition-transform duration-500 group-hover:rotate-0 object-contain">

                    <div class="absolute -bottom-4 w-1/2 h-4 bg-black/10 blur-xl rounded-[100%]"></div>
                </div>

                <a href="https://linevoom.line.me/post/1175001267066672713" target="_blank" x-data="{
                    reviews: [
                        '+1 ค่ะ  แอดมินตอบกลับไวมากค่ะ',
                        '+1 อธิบายเพิ่มเติมได้เข้าใจดีคับ เติมเหรียญไวมากคับ ',
                        '+10000 เติมเหรียญไลน์เร็ว  มีใบเสร็จค่ะ',
                        '+1 คับ เร็วมากค่ะะะ'
                    ],
                    currentIndex: 0,
                    init() {
                        setInterval(() => {
                            this.currentIndex = (this.currentIndex + 1) % this.reviews.length;
                        }, 3000);
                    }
                }"
                    class="hidden lg:flex items-center gap-3 w-full max-w-[320px] py-3.5 px-4 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-lg shadow-sm overflow-hidden flex-shrink-0 cursor-pointer hover:bg-white/20 transition-all duration-300">

                    <div class="flex items-center -space-x-3 flex-shrink-0">
                        <img src="{{ asset('assets/image/profile/p1.jpg') }}"
                            class="w-10 h-10 rounded-full border-2 border-white/30 object-cover" alt="Reviewer 1">
                        <img src="{{ asset('assets/image/profile/p2.jpg') }}"
                            class="w-10 h-10 rounded-full border-2 border-white/30 object-cover" alt="Reviewer 2">
                        <img src="{{ asset('assets/image/profile/p3.jpg') }}"
                            class="w-10 h-10 rounded-full border-2 border-white/30 object-cover" alt="Reviewer 3">

                        <div
                            class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-[10px] text-white font-bold border-2 border-white/30">
                            +99
                        </div>
                    </div>

                    <div class="flex flex-col items-start leading-tight min-w-0 h-[40px] justify-center">
                        <p class="text-[15px] font-semibold text-white truncate w-full">รีวิวจากผู้ใช้จริง</p>

                        <div class="relative w-full overflow-hidden h-[20px]">
                            <template x-for="(review, index) in reviews" :key="index">
                                <p x-show="currentIndex === index" x-transition:enter="transition ease-out duration-500"
                                    x-transition:enter-start="opacity-0 translate-y-4"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-300 absolute top-0"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 -translate-y-4"
                                    class="text-[13px] text-white/80 font-normal truncate w-full"
                                    x-text="`&quot;${review}&quot;`">
                                </p>
                            </template>
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </section>

    <!-- Warning Section -->
    <section class="max-w-screen-lg mx-auto py-12 px-4 space-y-10">

        <div
            class="group relative flex items-center justify-between p-5 rounded-2xl bg-white border border-rose-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition-all duration-500 hover:shadow-[0_20px_40px_rgb(225,29,72,0.05)]">
            <div class="absolute left-0 top-4 bottom-4 w-[3px] bg-rose-400 rounded-r-full opacity-80"></div>

            <div class="flex items-center gap-4">
                <div class="flex-shrink-0">
                    <div class="bg-red-50 text-red-500 p-2.5 rounded-xl">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4 13.9999L5.57465 20.2985C5.61893 20.4756 5.64107 20.5642 5.66727 20.6415C5.92317 21.397 6.60352 21.9282 7.39852 21.9933C7.4799 21.9999 7.5712 21.9999 7.75379 21.9999C7.98244 21.9999 8.09677 21.9999 8.19308 21.9906C9.145 21.8982 9.89834 21.1449 9.99066 20.193C10 20.0967 10 19.9823 10 19.7537V5.49991M18.5 13.4999C20.433 13.4999 22 11.9329 22 9.99991C22 8.06691 20.433 6.49991 18.5 6.49991M10.25 5.49991H6.5C4.01472 5.49991 2 7.51463 2 9.99991C2 12.4852 4.01472 14.4999 6.5 14.4999H10.25C12.0164 14.4999 14.1772 15.4468 15.8443 16.3556C16.8168 16.8857 17.3031 17.1508 17.6216 17.1118C17.9169 17.0756 18.1402 16.943 18.3133 16.701C18.5 16.4401 18.5 15.9179 18.5 14.8736V5.1262C18.5 4.08191 18.5 3.55976 18.3133 3.2988C18.1402 3.05681 17.9169 2.92421 17.6216 2.88804C17.3031 2.84903 16.8168 3.11411 15.8443 3.64427C14.1772 4.55302 12.0164 5.49991 10.25 5.49991Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
                @if (!empty($web_cfg->warning_text))
                    <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                        <span class="text-red-500 font-medium text-base">คำเตือน</span>
                        <p class="text-slate-600 font-medium text-base sm:text-base">
                            {{ $web_cfg->warning_text }}
                        </p>
                    </div>
                @endif
            </div>

            <div class="hidden md:block pr-2">
                <svg class="w-4 h-4 text-slate-300 group-hover:text-rose-400 group-hover:translate-x-1 transition-all"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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

                    @for ($i = 1; $i <= 4; $i++)
                        <div
                            class="group p-6 rounded-[1.5rem] bg-white border border-slate-200 hover:border-[#2FAE44]/50 hover:shadow-[0_20px_50px_rgba(0,0,0,0.04)] hover:-translate-y-2 transition-all duration-400">
                            <div class="flex items-start gap-5">

                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-slate-100/50 text-slate-400 group-hover:bg-[#EAF9E3] group-hover:text-[#57C84D] rounded-xl flex items-center justify-center transition-colors duration-500">
                                    <i class="{{ $web_cfg['step_' . $i . '_icon'] }} text-2xl"></i>
                                </div>

                                <div class="text-left">
                                    <h3
                                        class="text-[#1E2A1E] text-lg font-semibold mb-1 tracking-tight group-hover:text-[#57C84D] transition-colors">
                                        {{ $i }}. {{ $web_cfg->{'step_' . $i . '_title'} }}
                                    </h3>
                                    <p class="text-[#4B5B4B]/70 font-medium text-sm leading-relaxed">
                                        {{ $web_cfg->{'step_' . $i . '_desc'} }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endfor

                </div>
            </div>

        </div>
    </section>

    <section x-data="{ view: 'grid', tab: 'all', show: false }" x-init="setTimeout(() => show = true, 50)" x-cloak class="max-w-screen-xl mx-auto w-full px-4 py-12">

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
                    <div
                        class="flex text-xs sm:text-sm bg-slate-50/5 p-1 rounded-2xl border border-slate-100 whitespace-nowrap">
                        <button @click="tab = 'all'"
                            :class="tab === 'all' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                            class="px-4 py-2 text-sm font-medium rounded-xl transition-all">ยอดนิยม</button>
                        <button @click="tab = 'recommended'"
                            :class="tab === 'recommended' ? 'bg-white text-[#57C84D] shadow-sm' : 'text-slate-400'"
                            class="px-4 py-2 text-sm font-medium transition-all rounded-xl">สินค้าแนะนำ</button>
                    </div>
                </div>
            </div>
        </div>

        @php
            $popularProducts = $products->sortByDesc('bookings_count')->take(3);
            $hasPopular = $popularProducts->isNotEmpty();

            $recommendedProducts = $products
                ->where('success_bookings_count', '>', 0)
                ->sortByDesc('success_bookings_count')
                ->take(3);
            $hasRecommended = $recommendedProducts->isNotEmpty();
        @endphp

        <div :class="view === 'grid' ? 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6' : 'flex flex-col gap-4'"
            class="transition-all duration-500">

            @foreach ($products as $product)
                @php
                    $isPopular = $popularProducts->contains('id', $product->id);
                    $isRec = $recommendedProducts->contains('id', $product->id);
                @endphp

                <div x-show="show && ((tab === 'all' && @js($isPopular)) || (tab === 'recommended' && @js($isRec)))"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                    :class="view === 'list' ? 'lg:flex lg:items-center lg:justify-between mt-4' : ''"
                    class="group relative border-2 rounded-2xl p-7 transition-all duration-300 
    {{ $product->isOutOfStock ? 'bg-slate-50/50 border-slate-200 grayscale-[0.3]' : 'bg-white border-slate-200 hover:border-[#57C84D]/50 hover:-translate-y-1.5' }}">

                    <div :class="view === 'list' ? 'lg:absolute lg:-top-4 lg:left-6 lg:right-auto' : 'absolute top-6 right-6'"
                        class="absolute top-6 right-6 z-10">
                        <template x-if="tab === 'all'">
                            <span
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-sky-500 bg-sky-50 px-3 py-1 rounded-md border border-sky-100">
                                ยอดนิยมอันดับ {{ $popularProducts->search(fn($p) => $p->id === $product->id) + 1 }}
                            </span>
                        </template>
                        <template x-if="tab === 'recommended'">
                            <span
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-500 bg-amber-50 px-3 py-1 rounded-md border border-amber-100">
                                แนะนำอันดับ
                                {{ $recommendedProducts->values()->search(fn($p) => $p->id === $product->id) + 1 }}
                            </span>
                        </template>
                    </div>

                    <div :class="view === 'list' ? 'lg:flex lg:items-center lg:gap-10 lg:flex-1' : ''">
                        <div :class="view === 'list' ? 'lg:mb-0 lg:min-w-[200px]' : 'mb-6'" class="mb-6">
                            <p class="text-sm font-medium text-[#57C84D]">
                                @if ($product->canBook)
                                    <i class="fa-solid fa-bolt animate-pulse"></i>
                                @endif
                                สินค้าคุณภาพ
                            </p>

                            <div class="text-xl font-medium inline-block mt-1">
                                <h3 class="text-[#1E2A1E]">
                                    <i class="fa-duotone fa-solid fa-coin-front text-amber-500"></i>
                                    {{ $product->product_name }}
                                </h3>
                            </div>
                        </div>

                        <div :class="view === 'list' ? 'lg:mb-0 lg:flex lg:items-center lg:gap-12 lg:flex-1 lg:justify-start' :
                            'mb-8'"
                            class="mb-8">
                            <div class="flex items-baseline gap-1.5">
                                <span
                                    class="text-3xl font-semibold text-[#57C84D]">{{ number_format($product->displayPrice, 0) }}</span>
                                <span class="text-sm text-[#4B5B4B] font-bold">บาท</span>
                            </div>

                            <div :class="view === 'list' ?
                                'lg:mt-0 lg:flex lg:items-center lg:gap-6 lg:flex-1 lg:justify-between' :
                                'mt-3 relative'"
                                class="mt-3">
                                <div :class="view === 'list' ? 'lg:flex lg:gap-3 lg:space-y-0' : 'space-y-2.5'"
                                    class="space-y-2.5">
                                    <div class="flex justify-between items-center gap-2">
                                        <span
                                            class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-md whitespace-nowrap">สำเร็จแล้ว:
                                            {{ number_format($product->success_bookings_count ?? 0) }} ครั้ง</span>
                                    </div>
                                    <div class="flex justify-between items-center gap-2">
                                        <span
                                            class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-md whitespace-nowrap">คงเหลือ:
                                            {{ number_format($product->stock) }} ชิ้น</span>
                                    </div>
                                </div>

                                <div :class="view === 'list' ? 'lg:static lg:flex lg:flex-row lg:gap-2 lg:items-center' :
                                    'absolute top-0 right-0 flex flex-col items-end gap-2.5'"
                                    class="flex">
                                    <span
                                        class="text-sm font-medium text-[#F4B400] bg-[#FFF8E8] px-3 py-1 whitespace-nowrap rounded-md border border-[#FFE8C4]">
                                        <i class="fa-duotone fa-solid fa-calendar text-amber-500"></i>
                                        {{ $product->displayDate }}
                                    </span>
                                    <span
                                        class="text-sm font-medium text-[#F4B400] bg-[#FFF8E8] px-3 py-1 whitespace-nowrap rounded-md border border-[#FFE8C4]">
                                        <i class="fa-duotone fa-solid fa-alarm-clock text-amber-500"></i>
                                        {{ $product->displayTime }}
                                    </span>
                                </div>

                                <div class="flex justify-between items-center mt-3 pt-3 border-t border-slate-100"
                                    :class="view === 'list' ? 'lg:border-t-0 lg:pt-0 lg:mt-0 lg:ml-auto' : ''">
                                    <span class="text-sm text-[#4B5B4B] font-bold"
                                        :class="view === 'list' ? 'lg:hidden' : ''">สถานะ</span>
                                    @if ($product->canBook)
                                        <span class="flex items-center gap-1.5 text-sm font-medium text-[#57C84D]">
                                            <span class="w-1.5 h-1.5 bg-[#57C84D] rounded-full animate-pulse"></span>
                                            เปิดรับ
                                        </span>
                                    @elseif ($product->isOpenToday && $product->isWaitingForTime)
                                        <span class="flex items-center gap-1.5 text-sm font-medium text-orange-500">
                                            <span class="w-1.5 h-1.5 bg-orange-500 rounded-full animate-pulse"></span>
                                            รอเปิด
                                        </span>
                                    @else
                                        <span class="flex items-center gap-1.5 text-sm font-medium text-slate-400">
                                            <span class="w-1.5 h-1.5 bg-slate-300 rounded-full"></span> ปิดรับ
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($product->canBook)
                        <a href="{{ route('frontend.queue') }}"
                            :class="view === 'list' ? 'lg:w-auto lg:px-8 lg:ml-6' : 'w-full'"
                            class="block text-center w-full py-3.5 rounded-xl bg-[#F0FDF4] text-[#22C55E] text-[15px] font-bold hover:bg-[#22C55E] hover:text-white transition-all duration-300">
                            จองสินค้าเลย!
                        </a>
                    @else
                        <button disabled :class="view === 'list' ? 'lg:w-auto lg:px-8 lg:ml-6' : 'w-full'"
                            class="w-full py-3.5 rounded-xl bg-slate-50 text-slate-400 text-[15px] font-bold cursor-not-allowed border border-slate-100">
                            ไม่สามารถจองได้
                        </button>
                    @endif
                </div>
            @endforeach

            <div x-show="tab === 'all' && !@js($hasPopular)" x-cloak
                class="col-span-full py-16 text-center bg-white border border-dashed border-slate-300 rounded-2xl">
                <i class="fa-solid fa-fire text-5xl text-slate-200 mb-4"></i>
                <h3 class="text-xl font-bold text-slate-700">ยังไม่มีสินค้ายอดนิยม</h3>
                <p class="text-slate-500">รออัปเดตรายการสินค้ายอดฮิตเร็วๆ นี้</p>
            </div>

            <div x-show="tab === 'recommended' && !@js($hasRecommended)" x-cloak
                class="col-span-full py-16 text-center bg-white border border-dashed border-slate-300 rounded-2xl">
                <i class="fa-duotone fa-solid fa-thumbs-up text-5xl text-slate-200 mb-4"></i>
                <h3 class="text-xl font-bold text-slate-700">ยังไม่มีสินค้าแนะนำ</h3>
                <p class="text-slate-500">รออัปเดตรายการที่ทำรายการสำเร็จสูงสุดเร็วๆ นี้</p>
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
                <div
                    class="mt-10 pt-10 border-t border-slate-200 flex flex-row justify-center sm:justify-start gap-4 sm:gap-8 text-center sm:text-start">
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

                    <div
                        class="group relative p-8 sm:p-10 rounded-3xl bg-white border border-slate-200 hover:-translate-y-1.5 hover:shadow-[0_40px_80px_rgba(0,0,0,0.04)] transition-all duration-700 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-b from-blue-50/50 to-blue-100/50 opacity-0 group-hover:opacity-100 transition-all duration-500">
                        </div>
                        <div
                            class="relative z-10 flex flex-col items-center text-center sm:items-start sm:text-left gap-4 sm:gap-8">
                            <div
                                class="w-14 h-14 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center group-hover:bg-blue-100/50 group-hover:scale-110 transition-all duration-500">
                                <i class="fa-duotone fa-solid fa-box text-2xl"></i>
                            </div>
                            <div>
                                <p class="text-slate-500 font-medium text-base mb-2">ผู้สั่งซื้อสินค้า</p>
                                <div class="relative inline-block mb-2">
                                    <h3
                                        class="text-5xl sm:text-7xl font-semibold text-slate-900 transition-all group-hover:text-blue-600">
                                        {{ number_format($totalSuccessBookings) }}
                                    </h3>
                                    <span
                                        class="absolute -bottom-1 left-0 w-full h-1 bg-blue-600 origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></span>
                                </div>
                                <p
                                    class="text-slate-500 mt-2 text-sm font-medium leading-relaxed max-w-xs mx-auto sm:mx-0">
                                    จำนวนรายการทั้งหมดที่ดำเนินการสำเร็จบนแพลตฟอร์ม
                                </p>
                            </div>
                        </div>
                        <div
                            class="absolute -bottom-16 -right-16 w-32 h-32 bg-blue-500/5 rounded-full group-hover:scale-300 transition-transform duration-500">
                        </div>
                    </div>

                    <div
                        class="group relative p-8 sm:p-10 rounded-3xl bg-white border border-slate-200 hover:-translate-y-1.5 md:hover:translate-y-8 hover:shadow-[0_40px_80px_rgba(0,0,0,0.04)] transition-all duration-700 md:translate-y-10 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-b from-orange-50/50 to-orange-100/50 opacity-0 group-hover:opacity-100 transition-all duration-500">
                        </div>
                        <div
                            class="relative z-10 flex flex-col items-center text-center sm:items-start sm:text-left gap-4 sm:gap-8">
                            <div
                                class="w-14 h-14 bg-orange-50 text-orange-500 rounded-2xl flex items-center justify-center group-hover:bg-orange-100/50 group-hover:scale-110 transition-all duration-500">
                                <i class="fa-duotone fa-solid fa-circle-nodes text-2xl"></i>
                            </div>
                            <div>
                                <p class="text-slate-500 font-medium text-base mb-2">ยอดคิวปัจจุบัน</p>
                                <div class="relative inline-block mb-2">
                                    <h3
                                        class="text-5xl sm:text-7xl font-semibold text-slate-900 transition-all group-hover:text-orange-600">
                                        {{ number_format($currentQueue) }}
                                    </h3>
                                    <span
                                        class="absolute -bottom-1 left-0 w-full h-1 bg-orange-600 origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></span>
                                </div>
                                <p
                                    class="text-slate-500 mt-2 text-sm font-medium leading-relaxed max-w-xs mx-auto sm:mx-0">
                                    รายการที่กำลังดำเนินการผ่านระบบอัตโนมัติในขณะนี้
                                </p>
                            </div>
                        </div>
                        <div
                            class="absolute -bottom-16 -right-16 w-32 h-32 bg-orange-500/5 rounded-full group-hover:scale-300 transition-transform duration-500">
                        </div>
                    </div>
                    <div
                        class="group relative p-8 sm:p-10 rounded-3xl bg-white border border-slate-200 hover:-translate-y-1.5 hover:shadow-[0_40px_80px_rgba(0,0,0,0.04)] transition-all duration-700 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-b from-emerald-50/50 to-emerald-100/50 opacity-0 group-hover:opacity-100 transition-all duration-500">
                        </div>
                        <div
                            class="relative z-10 flex flex-col items-center text-center sm:items-start sm:text-left gap-4 sm:gap-8">
                            <div
                                class="w-14 h-14 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center group-hover:bg-emerald-100/50 group-hover:scale-110 transition-all duration-500">
                                <i class="fa-duotone fa-solid fa-badge-check text-2xl"></i>
                            </div>
                            <div>
                                <p class="text-slate-500 font-medium text-base mb-2">สินค้าพร้อมขาย</p>
                                <div class="relative inline-block mb-2">
                                    <h3
                                        class="text-5xl sm:text-7xl font-semibold text-slate-900 transition-all group-hover:text-emerald-600">
                                        {{ number_format($totalStock) }}
                                    </h3>
                                    <span
                                        class="absolute -bottom-1 left-0 w-full h-1 bg-emerald-600 origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></span>
                                </div>
                                <p
                                    class="text-slate-500 mt-2 text-sm font-medium leading-relaxed max-w-xs mx-auto sm:mx-0">
                                    จำนวนสต็อกเหรียญและแพ็กเกจทั้งหมดที่พร้อมให้บริการ
                                </p>
                            </div>
                        </div>
                        <div
                            class="absolute -bottom-16 -right-16 w-32 h-32 bg-emerald-500/5 rounded-full group-hover:scale-300 transition-transform duration-500">
                        </div>
                    </div>
                    <div
                        class="group relative p-8 sm:p-10 rounded-3xl bg-white border border-slate-200 hover:-translate-y-1.5 md:hover:translate-y-8 hover:shadow-[0_40px_80px_rgba(0,0,0,0.04)] transition-all duration-700 md:translate-y-10 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-b from-purple-50/50 to-purple-100/50 opacity-0 group-hover:opacity-100 transition-all duration-500">
                        </div>
                        <div
                            class="relative z-10 flex flex-col items-center text-center sm:items-start sm:text-left gap-4 sm:gap-8">
                            <div
                                class="w-14 h-14 bg-purple-50 text-purple-500 rounded-2xl flex items-center justify-center group-hover:bg-purple-100/50 group-hover:scale-110 transition-all duration-500">
                                <i class="fa-duotone fa-solid fa-users text-2xl"></i>
                            </div>
                            <div>
                                <p class="text-slate-500 font-medium text-base mb-2">สมาชิกทั้งหมด</p>
                                <div class="relative inline-block mb-2">
                                    <h3
                                        class="text-5xl sm:text-7xl font-semibold text-slate-900 transition-all group-hover:text-purple-600">
                                        {{ number_format($totalUsers) }}
                                    </h3>
                                    <span
                                        class="absolute -bottom-1 left-0 w-full h-1 bg-purple-600 origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></span>
                                </div>
                                <p
                                    class="text-slate-500 mt-2 text-sm font-medium leading-relaxed max-w-xs mx-auto sm:mx-0">
                                    จำนวนสมาชิกที่ไว้วางใจใช้บริการระบบเติมเหรียญของเรา
                                </p>
                            </div>
                        </div>
                        <div
                            class="absolute -bottom-16 -right-16 w-32 h-32 bg-purple-500/5 rounded-full group-hover:scale-300 transition-transform duration-500">
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <section class="max-w-screen-xl mx-auto w-full px-4 py-24">
        <div
            class="relative overflow-hidden bg-gradient-to-br from-[#F6C63B] to-[#FFD95A] rounded-2xl p-10 md:p-16 flex flex-col md:flex-row items-center justify-between gap-6 sm:gap-12 shadow-[0_8px_30px_rgb(0,0,0,0.05)] border border-white/50">

            <div
                class="absolute -top-16 -left-16 w-56 h-56 bg-[#F4B400] blur-md rounded-full rotate-[25deg] opacity-50 z-0">
            </div>
            <div
                class="absolute top-1/2 -right-20 -translate-y-1/2 w-80 h-80 bg-[#F4B400] blur-md rounded-full opacity-50 z-0">
            </div>
            <div
                class="absolute -bottom-24 right-1/4 w-72 h-40 bg-[#F4B400] blur-md rounded-3xl -rotate-[15deg] opacity-50 z-0">
            </div>

            <div class="w-full md:w-3/5 text-left relative z-10">
                <div
                    class="inline-block bg-white/80 backdrop-blur-sm px-5 py-1.5 rounded-2xl mb-5 shadow-sm border border-white/50">
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
                <a href="https://lin.ee/60NndJX" target="_blank"
                    class="group relative flex items-center justify-between bg-white/70 backdrop-blur-sm hover:bg-white transition-all duration-500 px-7 py-4 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_30px_rgba(120,182,143,0.2)] hover:-translate-y-1.5 hover:scale-[1.02] border border-white/50 overflow-hidden">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-[#57C84D]/10 flex items-center justify-center group-hover:bg-[#57C84D] transition-all duration-500">
                            <svg class="w-5 h-5 text-[#57C84D] group-hover:text-white" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-[#1E2A1E] text-md font-medium">ติดต่อผ่านทางไลน์</span>
                    </div>
                    <svg class="w-5 h-5 text-[#57C84D] opacity-0 -translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-500"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
                <a href="{{ $web_cfg->website_url ?? '#' }}" target="_blank"
                    class="group relative flex items-center justify-between bg-white/70 backdrop-blur-sm hover:bg-white transition-all duration-500 px-7 py-4 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_30px_rgba(120,182,143,0.2)] hover:-translate-y-1.5 hover:scale-[1.02] border border-white/50 overflow-hidden">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-[#57C84D]/10 flex items-center justify-center group-hover:bg-[#57C84D] transition-all duration-500">
                            <svg class="w-5 h-5 text-[#57C84D] group-hover:text-white" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                </path>
                            </svg>
                        </div>
                        <span class="text-[#1E2A1E] text-md font-medium">ติดต่อผ่านทางเว็บไซต์</span>
                    </div>
                    <svg class="w-5 h-5 text-[#57C84D] opacity-0 -translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-500"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>

        </div>
    </section>

    <div x-data="{
        open: false,
        init() {
            // ดึงข้อมูลเวลาที่บันทึกไว้
            const lastShown = localStorage.getItem('ormor_popup_time');
            const now = new Date().getTime();
            const oneHour = 60 * 60 * 1000; // 1 ชั่วโมง (มิลลิวินาที)
    
            // ถ้าไม่เคยมีข้อมูล (เข้าครั้งแรก) หรือเวลาผ่านไปเกิน 1 ชั่วโมงแล้ว ให้แสดง Popup
            if (!lastShown || (now - lastShown > oneHour)) {
                // หน่วงเวลาเล็กน้อยให้ Popup เด้งขึ้นมาแบบสมูท
                setTimeout(() => {
                    this.open = true;
                }, 100);
            }
        },
        closeModal() {
            this.open = false;
            // บันทึกเวลาปัจจุบันตอนที่กดปิด Popup ลง LocalStorage
            localStorage.setItem('ormor_popup_time', new Date().getTime());
        }
    }" x-show="open" x-cloak
        class="fixed inset-0 z-[99999] flex items-center justify-center p-4 bg-slate-900/60 transition-all duration-300 Prompt"
        style="display: none;">

        <div @click.away="closeModal()" x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="relative w-full max-w-lg bg-white rounded-xl shadow-[0_20px_60px_rgba(0,0,0,0.1)] border border-slate-100 overflow-hidden flex flex-col">

            <button @click="closeModal()"
                class="absolute top-5 right-5 w-9 h-9 flex items-center justify-center rounded-full bg-slate-100 text-slate-400 hover:bg-red-100 hover:text-red-500 transition-all z-10">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>

            <div class="relative h-48 sm:h-56 bg-green-50 overflow-hidden flex items-center justify-center">
                <img src="{{ $web_cfg->popup_image ?? asset('assets/image/logo.png') }}" alt="Announcement Banner"
                    class="w-full h-full object-cover">

                <div class="absolute inset-0 bg-gradient-to-t from-white via-white/20 to-transparent opacity-80"></div>
            </div>

            <div class="p-8 text-center sm:text-left flex-1">
                <span
                    class="inline-block px-3 py-1 bg-green-50 text-[#2CB05C] text-[11px] font-bold tracking-wider uppercase rounded-lg mb-3 border border-green-100">
                    ประกาศสำคัญ
                </span>

                <h3 class="text-2xl sm:text-3xl font-bold text-slate-800 tracking-tight mb-3">
                    {{ $web_cfg->popup_title ?? 'ยินดีต้อนรับสู่ Ormor Topup Coins' }}
                </h3>

                <p class="text-sm sm:text-base text-slate-600 leading-relaxed mb-6 font-medium">
                    {{ $web_cfg->popup_desc ?? 'ระบบจองคิวเติม Coinsline (เหรียญไลน์) เปิดให้บริการเต็มรูปแบบแล้ว พีคขอให้ทุกคนอ่านรายละเอียดและเงื่อนไขการจองคิวให้ครบถ้วนก่อนทำรายการ เพื่อความสะดวกและรวดเร็วในการให้บริการครับ' }}
                </p>

                <div class="flex flex-col sm:flex-row gap-3">
                    <button @click="closeModal()"
                        class="flex-1 bg-[#2CB05C] hover:bg-[#24964e] text-white py-3.5 rounded-2xl font-bold active:scale-95 transition-all duration-300 text-sm">
                        รับทราบและเริ่มใช้งาน
                    </button>

                    <a href="{{ $web_cfg->line ?? 'https://line.me/R/ti/p/@YOUR_LINE_ID' }}" target="_blank"
                        class="flex-1 sm:max-w-[140px] border border-green-100 bg-green-50/50 hover:border-green-200 text-[#2CB05C] py-3.5 rounded-2xl font-bold hover:bg-green-100 active:scale-95 transition-all duration-300 flex items-center justify-center gap-2 text-sm">
                        <i class="fa-brands fa-line text-lg"></i> ติดต่อเรา
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
