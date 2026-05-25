<nav x-data="{
    mobileMenuOpen: false,
    visible: true,
    lastScroll: 0,
    handleScroll() {
        let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
        if (currentScroll <= 0) {
            this.visible = true;
        } else if (currentScroll > this.lastScroll && !this.mobileMenuOpen) {
            this.visible = false;
        } else {
            this.visible = true;
        }
        this.lastScroll = currentScroll;
    }
}" x-init="window.addEventListener('scroll', () => handleScroll())"
    :class="visible ? 'translate-y-0 opacity-100' : '-translate-y-32 opacity-0'"
    class="fixed top-6 left-1/2 -translate-x-1/2 z-50 w-[90%] max-w-4xl transition-all duration-500 ease-in-out">

    <div
        class="bg-black/50 backdrop-blur-xl border border-white/15 rounded-full px-6 py-3 flex items-center justify-between shadow-2xl relative">

        <div class="flex items-center gap-4">
            <a href="{{ route('frontend.home') }}"
                class="hidden sm:flex items-center gap-1.5 font-bold text-white/70 hover:text-white text-[15px] font-medium transition-all duration-300">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z"
                        stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                หน้าหลัก
            </a>

            <a href="{{ route('frontend.queue') }}"
                class="hidden sm:flex items-center gap-1.5 text-white/70 hover:text-white text-[15px] font-medium transition-all duration-300">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.9996 8C15.9996 9.06087 15.5782 10.0783 14.828 10.8284C14.0779 11.5786 13.0605 12 11.9996 12C10.9387 12 9.92131 11.5786 9.17116 10.8284C8.42102 10.0783 7.99959 9.06087 7.99959 8M3.63281 7.40138L2.93281 15.8014C2.78243 17.6059 2.70724 18.5082 3.01227 19.2042C3.28027 19.8157 3.74462 20.3204 4.33177 20.6382C5.00006 21 5.90545 21 7.71623 21H16.283C18.0937 21 18.9991 21 19.6674 20.6382C20.2546 20.3204 20.7189 19.8157 20.9869 19.2042C21.2919 18.5082 21.2167 17.6059 21.0664 15.8014L20.3664 7.40138C20.237 5.84875 20.1723 5.07243 19.8285 4.48486C19.5257 3.96744 19.0748 3.5526 18.5341 3.29385C17.92 3 17.141 3 15.583 3L8.41623 3C6.85821 3 6.07921 3 5.4651 3.29384C4.92433 3.5526 4.47349 3.96744 4.17071 4.48486C3.82689 5.07243 3.76219 5.84875 3.63281 7.40138Z"
                        stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                จองคิว
            </a>

            <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="sm:hidden flex items-center gap-1.5 bg-white/10 hover:bg-white/20 text-white border border-white/20 px-5 py-2 rounded-full text-[15px] font-semibold transition-all backdrop-blur-sm">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 12H21M3 6H21M3 18H21" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                เมนู
            </button>
        </div>

        <div class="absolute left-1/2 -translate-x-1/2">
            <a href="{{ route('frontend.home') }}" class="flex items-center">
                <img src="{{ asset('assets/image/logo.png') }}" alt="Logo"
                    class="h-full w-16 mr-2 transition-all duration-300 hover:scale-110" />
            </a>
        </div>

        <div class="flex items-center gap-4">
            @guest
                <a href="{{ route('register.page') }}"
                    class="text-white/70 hover:text-white text-[15px] font-medium transition-colors hidden sm:block">สมัครสมาชิก</a>
                <a href="{{ route('login.page') }}"
                    class="bg-white/10 hover:bg-white/20 text-white border border-white/20 px-5 py-2 rounded-full text-[15px] font-semibold transition-all backdrop-blur-sm">
                    เข้าสู่ระบบ
                </a>
            @endguest
            @auth
                <div class="flex items-center gap-4">
                    <div class="relative" x-data="{ profileOpen: false }">

                        <button @click="profileOpen = !profileOpen" class="flex items-center gap-2 focus:outline-none">
                            <div
                                class="w-10 h-10 rounded-full bg-[#57C84D]/20 hover:bg-[#57C84D]/40 text-red-100 border border-[#57C84D]/30 flex items-center justify-center text-white border-2 border-white/20">
                                <i class="fa-duotone fa-solid fa-user"></i>
                            </div>
                            <i class="fa-solid fa-chevron-down text-white text-[10px] transition-transform"
                                :class="profileOpen ? 'rotate-180' : ''"></i>
                        </button>

                        <div x-show="profileOpen" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95 translate-y-[-10px]"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                            x-transition:leave-end="opacity-0 scale-95 translate-y-[-10px]"
                            class="absolute right-0 mt-3 w-64 bg-black/70 backdrop-blur-2xl border border-white/15 rounded-3xl p-4 shadow-2xl z-[100] origin-top-right"
                            @click.away="profileOpen = false" style="display: none;">

                            <div class="flex flex-col gap-1">
                                <div class="px-4 py-3 mb-2 border-b border-white/10">
                                    <p class="text-white/50 text-xs font-medium">บัญชีผู้ใช้ ({{ auth()->user()->level }})
                                    </p>
                                    <p class="text-white font-semibold truncate">{{ auth()->user()->name }}</p>
                                    <p class="text-white/50 text-xs font-medium">{{ auth()->user()->email }}</p>
                                    </p>
                                    @if (auth()->user()->level === 'agent')
                                        <div class="mt-2 flex items-center justify-between">
                                            <span class="text-[10px] text-white/40 font-mono select-all">
                                                ID:
                                                @php
                                                    $user = auth()->user();

                                                    if (empty($user->users_code)) {
                                                        $user->users_code =
                                                            'U' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
                                                        $user->save();
                                                    }

                                                    $userCode = $user->users_code;
                                                @endphp
                                                {{ $userCode }}
                                            </span>

                                            <button
                                                onclick="navigator.clipboard.writeText('{{ $userCode }}'); 
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'คัดลอกรหัส {{ $userCode }} แล้ว',
                showConfirmButton: false,
                timer: 1500,
                customClass: { popup: 'font-[Prompt] rounded-xl' }
            });"
                                                class="text-[10px] font-bold text-[#2CB05C] bg-[#2CB05C]/10 px-2 py-0.5 rounded-md border border-[#2CB05C]/20 hover:bg-[#2CB05C] hover:text-white transition-all duration-300"
                                                title="คัดลอกรหัสผู้ใช้">
                                                <i class="fa-regular fa-copy mr-1"></i> คัดลอก ID
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                @if (auth()->user()->level === 'admin')
                                    <a href="{{ route('backend.home') }}"
                                        class="text-white/80 hover:text-white hover:bg-[#57C84D]/20 px-4 py-2 rounded-2xl text-sm font-medium flex items-center gap-3 transition-all duration-200">
                                        <i class="fa-duotone fa-solid fa-gauge-high text-[#57C84D]"></i> จัดการหลังบ้าน
                                    </a>
                                    <hr class="my-1 border-white/5">
                                @endif

                                <a href="{{ route('profile.edit') }}"
                                    class="text-white/80 hover:text-white hover:bg-white/10 px-4 py-2 rounded-2xl text-sm font-medium flex items-center gap-3 transition-all duration-200">
                                    <i class="fa-duotone fa-solid fa-user-gear text-[#57C84D]"></i>
                                    ตั้งค่าโปรไฟล์
                                </a>

                                <a href="{{ route('frontend.history') }}"
                                    class="text-white/80 hover:text-white hover:bg-white/10 px-4 py-2 rounded-2xl text-sm font-medium flex items-center gap-3 transition-all duration-200">
                                    <i class="fa-duotone fa-solid fa-clock-rotate-left text-[#57C84D]"></i>
                                    ประวัติการสั่งซื้อ
                                </a>

                                <hr class="my-2 border-white/10">

                                <form action="{{ route('logout') }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="w-full bg-red-500/20 hover:bg-red-500/40 text-red-100 border border-red-500/30 px-5 py-2 rounded-full text-sm font-semibold transition-all backdrop-blur-sm">
                                        <i class="fa-light fa-right-from-bracket"></i> ออกจากระบบ
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
        </div>

        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translate-y-[-20px]" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-[-5px]"
            x-transition:leave-end="opacity-0 translate-y-[-10px]"
            class="absolute top-full left-0 right-0 mt-4 sm:hidden bg-black/70 backdrop-blur-2xl border border-white/15 rounded-3xl p-6 shadow-2xl z-[60]"
            @click.away="mobileMenuOpen = false" style="display: none;">

            <div class="flex flex-col gap-5">
                <a href="{{ route('frontend.home') }}"
                    class="text-white text-lg font-medium flex items-center gap-3 border-b border-white/10 pb-3">หน้าหลัก</a>
                <a href="{{ route('frontend.queue') }}"
                    class="text-white text-lg font-medium flex items-center gap-3 border-b border-white/10 pb-3">จองคิว</a>

                @guest
                    <a href="{{ route('register.page') }}"
                        class="text-white text-lg font-medium flex items-center gap-3 border-b border-white/10 pb-3">สมัครสมาชิก</a>
                    <a href="{{ route('login.page') }}"
                        class="text-white text-lg font-medium flex items-center gap-3 border-b border-white/10 pb-3">เข้าสู่ระบบ</a>
                @endguest

                @auth
                    @if (auth()->user()->level === 'admin')
                        <a href="{{ route('backend.home') }}"
                            class="text-[#57C84D] text-lg font-medium flex items-center gap-3 border-b border-white/10 pb-3">จัดการหลังบ้าน</a>
                    @endif

                    <a href="{{ route('profile.edit') }}"
                        class="text-white text-lg font-medium flex items-center gap-3 border-b border-white/10 pb-3">ตั้งค่าโปรไฟล์</a>

                    <a href="{{ route('frontend.history') }}"
                        class="text-white text-lg font-medium flex items-center gap-3 border-b border-white/10 pb-3">ประวัติการสั่งซื้อ</a>
                @endauth

                <div class="pt-2 text-center text-white/50 text-xs">
                    ระบบจองคิวสำหรับตัวแทน ORMOR TOPUP COINS
                </div>
            </div>
        </div>
    </div>
</nav>
