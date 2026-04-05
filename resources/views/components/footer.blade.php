<footer class="bg-[#7ACB53] text-white py-12 px-6 sm:px-12">
    <div class="max-w-screen-xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 sm:gap-10 mb-6 sm:mb-12">
            
            <div class="flex flex-col items-center sm:items-start gap-1 text-center sm:text-left">
                <h2 class="text-2xl sm:text-3xl font-bold tracking-tight">
                    ORMORX STORE
                </h2>
                <p class="text-white/90 text-xs sm:text-sm font-medium max-w-xs">
                    ระบบจองคิวสำหรับตัวแทน ORMOR TOPUP COINS 
                </p>
            </div>

            <div class="flex flex-col items-center sm:items-start gap-1.5 sm:gap-3">
                <h3 class="text-lg font-medium border-b-2 border-white/20 pb-1 mb-0.5 w-fit">
                    เมนูเพื่อความสะดวก
                </h3>
                <nav class="flex flex-col items-center sm:items-start gap-1 sm:gap-2 text-white/80">
                    <a href="{{ route('home.page') }}" class="hover:text-white transition-colors text-sm font-normal">หน้าหลัก</a>
                    <a href="{{ route('packages.page') }}" class="hover:text-white transition-colors text-sm font-normal">ระบบจอง</a>
                    <a href="{{ route('transaction.page') }}" class="hover:text-white transition-colors text-sm font-normal">ประวัติการจอง</a>
                </nav>
            </div>

            <div class="flex flex-col items-center sm:items-start gap-1.5 sm:gap-3">
                <h3 class="text-lg font-medium border-b-2 border-white/20 pb-1 mb-0.5 w-fit">
                    เมนูการใช้งาน
                </h3>
                <nav class="flex flex-col items-center sm:items-start gap-1 sm:gap-2 text-white/80">
                    <a href="{{ route('register.page') }}" class="hover:text-white transition-colors text-sm font-normal">สมัครสมาชิก</a>
                    <a href="{{ route('login.page') }}" class="hover:text-white transition-colors text-sm font-normal">เข้าสู่ระบบ</a>
                </nav>
            </div>

            <div class="flex justify-center sm:justify-start md:justify-end items-start">
                <div class="bg-white p-2 px-3 rounded-xl flex items-center gap-3 shadow-lg">
                    <a href="#" class="hover:opacity-80 transition-opacity">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/LINE_logo.svg" alt="Line" class="w-8 h-8">
                    </a>
                    <a href="#" class="hover:opacity-80 transition-opacity">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_%282019%29.png" alt="Facebook" class="w-8 h-8">
                    </a>
                </div>
            </div>
        </div>

        <div class="pt-4 sm:pt-8 border-t border-white/20 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-xs md:text-sm text-white font-medium text-center md:text-left">
                <p>Copyright 2026 <span class="text-lg leading-none">©</span> NaHost (Navigate Innovations Co., Ltd.) All rights reserved.</p>
            </div>
            
            <div class="flex items-center gap-6 text-xs md:text-sm font-medium">
                <a href="{{ route('privacy_policy.page') }}" class="hover:text-white/70 transition-colors">Privacy Policy</a>
                <a href="{{ route('terms_conditions.page') }}" class="hover:text-white/70 transition-colors">Terms & Conditions</a>
            </div>
        </div>
    </div>
</footer>