<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ปิดปรับปรุงระบบ - {{ $web_cfg->site_name ?? 'Ormor Topup' }}</title>
    <link rel="icon" href="{{ asset('assets/image/logo.png') }}" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="{{ asset('font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-2xl w-full text-center">
        <div class="relative w-48 h-48 mx-auto mb-10 animate-float">
            <div class="absolute inset-0 bg-green-200 rounded-full opacity-30"></div>
            <div
                class="relative flex items-center justify-center w-full h-full bg-white rounded-full border border-green-50">
                <i class="fa-solid fa-screwdriver-wrench text-6xl text-gray-200"></i>
            </div>
        </div>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-800 mb-4">
            กำลังปรับปรุงระบบชั่วคราว
        </h1>
        <p class="text-slate-500 text-lg mb-10 font-medium leading-relaxed">
            ขออภัยในความไม่สะดวกครับ <span class="text-[#ca2fd8] font-bold">NaHost</span> กำลังพัฒนาระบบของ <span
                class="text-[#ca2fd8] font-bold">{{ $web_cfg->site_name ?? 'Ormor Topup' }}</span>
            กำลังเพิ่มประสิทธิภาพการทำงานให้ดียิ่งขึ้น แวะมาหาเราใหม่ในอีกไม่ช้านะครับ
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ $web_cfg->line ?? '#' }}"
                class="w-full sm:w-auto flex items-center justify-center gap-3 bg-[#00B900] hover:bg-[#009900] text-white px-8 py-4 rounded-xl font-bold transition-all active:scale-95">
                <i class="fa-brands fa-line text-2xl"></i>
                ติดต่อผ่าน LINE
            </a>

            @auth
                @if (auth()->user()->level === 'admin')
                    <a href="{{ route('backend.home') }}"
                        class="w-full sm:w-auto flex items-center justify-center gap-2 bg-slate-800 hover:bg-slate-900 text-white px-8 py-4 rounded-xl font-bold transition-all active:scale-95">
                        <i class="fa-solid fa-gauge-high"></i>
                        เข้าสู่ระบบหลังบ้าน
                    </a>
                @endif
            @else
            @endauth
        </div>

        <p class="mt-12 text-slate-400 text-sm">
            &copy; {{ date('Y') }} NaHost (Navigate Innovations Co., Ltd.) All rights reserved.
        </p>
    </div>

</body>

</html>
