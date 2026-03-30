<nav class="fixed top-6 left-1/2 -translate-x-1/2 z-50 w-[90%] max-w-4xl">
    <div class="bg-black/90 backdrop-blur-xl border border-white/10 rounded-full px-5.5 py-3 flex items-center justify-between shadow-2xl">

        <div class="flex items-center gap-6">
            <a href="#" class="text-white/70 hover:text-white text-[15px] font-medium transition-colors">
                <i class="fa-regular fa-house"></i> หน้าหลัก</a>
            <a href="#" class="text-white/70 hover:text-white text-[15px] font-medium transition-colors">จองคิว</a>
        </div>

        <div class="absolute left-1/2 -translate-x-1/2">
            <a href="/" class="group flex items-center overflow-hidden">

                <img src="{{ asset('assets/image/logo.png') }}"
                    alt="Logo"
                    class="h-full w-12 mr-0 transition-all duration-500 ease group-hover:mr-3 group-hover:scale-105" />

                <span class="max-w-0 opacity-0 whitespace-nowrap transition-all duration-500 ease translate-x-[-15px] group-hover:max-w-xs group-hover:opacity-100 group-hover:translate-x-0">
                    <span class="text-xl font-bold text-white">
                        ORMORX
                    </span>
                </span>

            </a>
        </div>

        <div class="flex items-center gap-4">
            <a href="#" class="text-white/70 hover:text-white text-[15px] font-medium transition-colors hidden md:block">สมัครสมาชิก</a>
            <a href="/login" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 px-5 py-2 rounded-full text-[15px] font-semibold transition-all backdrop-blur-sm">
                เข้าสู่ระบบ
            </a>
        </div>

    </div>
</nav>