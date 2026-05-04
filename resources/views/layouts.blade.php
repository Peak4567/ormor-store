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

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/image/logo.png') }}" type="image/png">

    <!-- Font Awesome CDN -->
    <link href=" {{ asset('font-awesome/css/all.min.css') }} " rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Alpine.js CDN -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    {{-- Sweet Alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body style="font-family: Prompt;">
    @include('components.navbar')

    @yield('content')
    @auth
        <div class="fixed bottom-6 right-6 z-[9999] animate-in fade-in slide-in-from-bottom-4 duration-700">
            <div
                class="group relative flex items-center gap-3 bg-white/80 backdrop-blur-xl border border-purple-200/50 px-5 py-3 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] hover:shadow-purple-200/50 transition-all duration-300">

                <span class="relative flex h-3 w-3">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
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

                <div
                    class="absolute inset-0 rounded-2xl bg-gradient-to-tr from-purple-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                </div>
            </div>
        </div>
    @endauth
    @include('components.footer')

    
</body>

</html>
