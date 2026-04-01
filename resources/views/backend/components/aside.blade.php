<input type="checkbox" id="sidebar-toggle" class="peer/sidebar hidden">
<label for="sidebar-toggle" class="md:hidden fixed top-4 left-4 p-3 bg-white rounded-lg shadow-md cursor-pointer text-gray-600 hover:text-gray-800 transition-colors">
    <i class="fa-solid fa-bars text-xl"></i>
</label>

<label for="sidebar-toggle" class="md:hidden fixed inset-0 bg-black/50 hidden peer-checked/sidebar:block cursor-pointer transition-opacity"></label>

<aside class="fixed top-0 left-0 h-screen w-[100px] bg-white shadow-md transform -translate-x-full peer-checked/sidebar:translate-x-0 md:translate-x-0 transition-transform duration-300 overflow-y-auto">
    <div class="flex flex-col items-center py-10 gap-6 min-h-full">
        
        <a href="" class="text-center p-2 cursor-pointer text-gray-400 hover:text-gray-600 transition-colors">
            <i class="fa-duotone fa-solid fa-house text-xl"></i>
            <p class="text-gray-500 text-md mt-1">หน้าหลัก</p>
        </a>

        <div class="flex flex-col items-center w-20">
            <input type="checkbox" id="product" class="peer hidden">

            <label for="product" class="cursor-pointer text-center p-2 flex flex-col items-center text-gray-400 hover:text-gray-600 transition-colors peer-checked:[&_.arrow]:rotate-180">
                <i class="fa-sharp-duotone fa-solid fa-boxes-stacked text-2xl"></i>
                <p class="text-gray-500 text-md mt-1">จัดการ</p>
                <i class="fa-solid fa-chevron-down arrow text-lg mt-1 transition-transform duration-300"></i>
            </label>

            <div class="hidden peer-checked:flex flex-col items-center bg-gray-100 rounded-xl py-5 px-1 mt-2 gap-5 w-full">
                <a href="#" class="flex flex-col items-center text-gray-400 hover:text-gray-700 transition-colors group">
                    <i class="fa-solid fa-box text-2xl group-hover:-translate-y-1 transition-transform"></i>
                    <span class="text-[11px] font-medium mt-1 text-gray-500 text-center">รายการสินค้า</span>
                </a>
                <a href="#" class="flex flex-col items-center text-gray-400 hover:text-gray-700 transition-colors group">
                    <i class="fa-solid fa-gears text-2xl group-hover:-translate-y-1 transition-transform"></i>
                    <span class="text-[11px] font-medium mt-1 text-gray-500">เพิ่มสต็อก</span>
                </a>
                <a href="#" class="flex flex-col items-center text-gray-400 hover:text-gray-700 transition-colors group">
                    <i class="fa-solid fa-money-bill-wave text-2xl group-hover:-translate-y-1 transition-transform"></i>
                    <span class="text-[11px] font-medium mt-1 text-gray-500 text-center">บัญชีรับ-จ่าย</span>
                </a>
            </div>
        </div>

        <div class="flex flex-col items-center w-20">
            <input type="checkbox" id="custom" class="peer hidden">

            <label for="custom" class="cursor-pointer text-center p-2 flex flex-col items-center text-gray-400 hover:text-gray-600 transition-colors peer-checked:[&_.arrow]:rotate-180">
                <i class="fa-sharp-duotone fa-regular fa-pen-field text-xl"></i>
                <p class="text-gray-500 text-md mt-1">ปรับแต่ง</p>
                <i class="fa-solid fa-chevron-down arrow text-lg mt-1 transition-transform duration-300"></i>
            </label>

            <div class="hidden peer-checked:flex flex-col items-center bg-gray-100 rounded-xl py-5 px-1 mt-2 gap-5 w-full">
                <a href="#" class="flex flex-col items-center text-gray-400 hover:text-gray-700 transition-colors group">
                    <i class="fa-duotone fa-solid fa-browser text-2xl group-hover:-translate-y-1 transition-transform"></i>
                    <span class="text-[11px] font-medium mt-1 text-gray-500">เว็บไซต์</span>
                </a>
            </div>
        </div>

        <a href="" class="text-center p-2 cursor-pointer text-gray-400 hover:text-gray-600 transition-colors">
            <i class="fa-regular fa-users text-xl"></i>
            <p class="text-gray-500 text-md mt-1">จัดการผู้ใช้</p>
        </a>
        
    </div>
</aside>