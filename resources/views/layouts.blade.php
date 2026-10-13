<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'ORMOR TOPUP COINS ระบบจองคิวเติม Coinsline (เหรียญไลน์) รองรับตัวแทน & ลูกค้าทั่วไป')">
    <meta name="keywords" content="เติมเหรียญราคาถูก, เติม coins, Ormor Topup, เติมเหรียญไลน์, เติมเกม">
    <meta name="robots" content="index, follow">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Ormor Topup Coins | บริการเติมเหรียญราคาถูก มั่นใจ 100%')">
    <meta property="og:description" content="@yield('meta_description', 'เติมเหรียญสะดวก รวดเร็ว ปลอดภัย ตรวจสอบสถานะได้ตลอด 24 ชม.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="canonical" href="{{ url()->current() }}">
    <title>Ormor Topup Coins | Website</title>

    <link rel="icon" href="{{ asset('assets/image/logo.png') }}" type="image/png">

    <link href=" {{ asset('font-awesome/css/all.min.css') }} " rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{-- Sweet Alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        @keyframes wiggle {
            0%, 100% { transform: rotate(-10deg); }
            50% { transform: rotate(10deg); }
        }
    </style>
</head>

<body style="font-family: Prompt;" class="bg-slate-50">

    @include('components.navbar')

    @if(isset($web_cfg) && $web_cfg->maintenance_mode == 1)
        <div class="bg-red-500 text-white text-center py-2 text-sm font-bold shadow-md relative z-[1000]">
            <i class="fa-solid fa-triangle-exclamation mr-2"></i> 
            ขณะนี้เว็บไซต์อยู่ในโหมด "ปิดปรับปรุง" (สมาชิกทั่วไปจะไม่สามารถเข้าใช้งานได้และถูกส่งไปหน้าแจ้งเตือน) 
            <a href="{{ route('backend.settings') }}" class="underline ml-2 hover:text-red-200">ตั้งค่าปิดโหมดนี้</a>
        </div>
    @endif

    @yield('content')
    
    @auth
        <div class="fixed bottom-6 right-6 z-[9999] animate-in fade-in slide-in-from-bottom-4 duration-700">
            <div class="group relative flex items-center gap-3 bg-white/80 backdrop-blur-xl border border-purple-200/50 px-5 py-3 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] hover:shadow-purple-200/50 transition-all duration-300">

                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                </span>

                <div class="flex flex-col">
                    <span class="text-[12px] text-slate-400 font-medium leading-none mb-1">สถานะบัญชี</span>
                    <div class="flex items-center gap-2">
                        @if (auth()->user()->level === 'admin')
                            <span class="text-sm font-semibold text-red-600">ผู้ดูแลระบบ</span>
                            <i class="fa-solid fa-shield-check text-red-600 text-sm"></i>
                        @elseif(auth()->user()->level === 'agent')
                            <span class="text-sm font-semibold text-purple-800">คุณเป็นตัวแทนแล้ว</span>
                            <i class="fa-solid fa-badge-check text-purple-600 text-sm"></i>
                        @else
                            <span class="text-sm font-semibold text-slate-800">สมาชิกทั่วไป</span>
                            <i class="fa-solid fa-user text-slate-500 text-sm"></i>
                        @endif
                    </div>
                </div>

                <div class="absolute inset-0 rounded-2xl bg-gradient-to-tr from-purple-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
            </div>
        </div>
        
        <div x-data="{ open: false }" class="fixed top-24 right-6 z-[9999]">
            <button @click="open = !open"
                class="relative flex items-center justify-center w-12 h-12 bg-white rounded-full shadow-[0_8px_30px_rgb(0,0,0,0.12)] border border-purple-100 hover:scale-105 transition-transform duration-300">
                <i class="fa-solid fa-bell text-yellow-500 text-xl"
                    :class="open ? '' : 'animate-[wiggle_1s_ease-in-out_infinite]'"></i>

                <span class="absolute top-0 right-0 flex h-3.5 w-3.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-red-500 border-2 border-white"></span>
                </span>
            </button>

            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-[-10px] scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                x-transition:leave-end="opacity-0 translate-y-[-10px] scale-95"
                class="absolute right-0 mt-3 w-[320px] sm:w-[350px] bg-white rounded-2xl border border-gray-100 overflow-hidden"
                style="display: none;">

                <div class="px-5 py-3 bg-gradient-to-r from-purple-50 to-white border-b border-purple-100 flex justify-between items-center">
                    <span class="font-bold text-[#2CB05C] text-sm">
                        <i class="fa-solid fa-bullhorn mr-1.5 text-[#2CB05C]"></i> ประกาศจากระบบ
                    </span>
                    <button @click="open = false" class="text-gray-400 hover:text-red-500 transition-colors">
                        <i class="fa-solid fa-xmark text-lg"></i>
                    </button>
                </div>

                <div class="p-5">
                    <img src="{{ isset($web_cfg) && $web_cfg->popup_image ? asset($web_cfg->popup_image) : asset('assets/image/upload/1777869664_popup.png') }}" alt="Notification Image"
                        class="w-full h-32 object-cover rounded-xl mb-4 border border-gray-50">

                    <h3 class="font-extrabold text-gray-800 text-[15px] mb-2">
                        {{ $web_cfg->popup_title ?? 'ยินดีต้อนรับสู่ Ormor Topup Coins ค่ะ' }}
                    </h3>

                    <p class="text-sm text-gray-500 leading-relaxed">
                        {{ $web_cfg->popup_desc ?? 'ระบบจองคิวเติม Coinsline (เหรียญไลน์) เปิดให้บริการเพื่อความสะดวกรวดเร็วของลูกค้าทุกท่าน...' }}
                    </p>

                    <div class="mt-4 pt-4 border-t border-gray-50 flex justify-between items-center text-xs text-gray-400">
                        <span><i class="fa-regular fa-clock mr-1"></i> อัปเดตล่าสุด</span>
                        <span>เมื่อสักครู่</span>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    
    @include('components.footer')

</body>
</html>