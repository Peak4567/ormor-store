<input type="checkbox" id="sidebar-toggle" class="peer/sidebar hidden">

<label for="sidebar-toggle"
    class="md:hidden fixed inset-0 top-20 bg-black/40 hidden peer-checked/sidebar:block cursor-pointer z-40 transition-opacity"></label>

<aside
    class="fixed top-20 left-0 w-full bg-white border-b border-gray-100 shadow-xl shadow-gray-200/20 max-h-0 overflow-y-auto peer-checked/sidebar:max-h-[85vh] md:peer-checked/sidebar:max-h-screen md:top-0 md:left-0 md:w-[100px] md:h-screen md:max-h-screen md:border-b-0 md:border-r md:shadow-sm md:overflow-y-auto transition-all duration-300 z-40">

    <div class="flex flex-col md:items-center py-6 md:py-10 px-6 md:px-0 gap-2 md:gap-6 min-h-full">

        <a href="{{ route('backend.home') }}"
            class="flex md:flex-col items-center p-3 md:p-2 text-gray-500 hover:text-[#2CB05C] hover:bg-green-50 md:hover:bg-transparent rounded-xl transition-all w-full md:w-auto">
            <i class="fa-duotone fa-solid fa-house text-xl w-10 text-center md:w-auto"></i>
            <p class="text-sm md:text-[13px] mt-0 md:mt-1.5  md:font-medium flex-1 md:flex-none">หน้าหลัก</p>
        </a>

        <div class="flex flex-col w-full md:w-20 md:items-center">
            <input type="checkbox" id="product" class="peer hidden">
            <label for="product"
                class="cursor-pointer flex md:flex-col items-center p-3 md:p-2 text-gray-500 hover:text-[#2CB05C] hover:bg-green-50 md:hover:bg-transparent rounded-xl transition-all w-full md:w-auto peer-checked:[&_.arrow]:rotate-180">
                <i
                    class="fa-sharp-duotone fa-solid fa-boxes-stacked text-xl md:text-[22px] w-10 text-center md:w-auto"></i>
                <p
                    class="text-sm md:text-[13px] mt-0 md:mt-1.5 font-bold md:font-medium flex-1 md:flex-none md:text-center">
                    จัดการ</p>
                <i
                    class="fa-solid fa-chevron-down arrow text-sm md:text-[10px] md:mt-1 transition-transform duration-300"></i>
            </label>

            <div
                class="hidden peer-checked:flex flex-col md:items-center bg-gray-50 md:bg-gray-100 rounded-xl py-3 md:py-4 px-2 md:px-1 mt-1 md:mt-2 gap-1 md:gap-4 w-full">
                <a href="{{ route('backend.product') }}"
                    class="flex md:flex-col items-center p-2 md:p-0 text-gray-500 hover:text-gray-800 transition-colors group rounded-lg hover:bg-white md:hover:bg-transparent">
                    <i
                        class="fa-solid fa-box text-lg md:text-xl md:group-hover:-translate-y-1 transition-transform w-10 text-center md:w-auto"></i>
                    <span
                        class="text-sm md:text-[11px] md:font-medium mt-0 md:mt-1 flex-1 md:flex-none md:text-center">รายการสินค้า</span>
                </a>
                <a href="{{ route('backend.booking') }}"
                    class="flex md:flex-col items-center p-2 md:p-0 text-gray-500 hover:text-gray-800 transition-colors group rounded-lg hover:bg-white md:hover:bg-transparent">
                    <i
                        class="fa-duotone fa-solid fa-calendar-circle-user text-lg md:text-xl md:group-hover:-translate-y-1 transition-transform w-10 text-center md:w-auto"></i>
                    <span
                        class="text-sm md:text-[11px] md:font-medium mt-0 md:mt-1 flex-1 md:flex-none md:text-center">จอง</span>
                </a>
                <a href="{{ route('backend.account') }}"
                    class="flex md:flex-col items-center p-2 md:p-0 text-gray-500 hover:text-gray-800 transition-colors group rounded-lg hover:bg-white md:hover:bg-transparent">
                    <i
                        class="fa-solid fa-money-bill-wave text-lg md:text-xl md:group-hover:-translate-y-1 transition-transform w-10 text-center md:w-auto"></i>
                    <span
                        class="text-sm md:text-[11px] md:font-medium mt-0 md:mt-1 flex-1 md:flex-none md:text-center">บัญชีรับ-จ่าย</span>
                </a>
            </div>
        </div>

        <div class="flex flex-col w-full md:w-20 md:items-center">
            <input type="checkbox" id="custom" class="peer hidden">
            <label for="custom"
                class="cursor-pointer flex md:flex-col items-center p-3 md:p-2 text-gray-500 hover:text-[#2CB05C] hover:bg-green-50 md:hover:bg-transparent rounded-xl transition-all w-full md:w-auto peer-checked:[&_.arrow]:rotate-180">
                <i
                    class="fa-sharp-duotone fa-regular fa-pen-field text-xl md:text-[22px] w-10 text-center md:w-auto"></i>
                <p class="text-sm md:text-[13px] mt-0 md:mt-1.5 md:font-medium flex-1 md:flex-none md:text-center">
                    ปรับแต่ง</p>
                <i
                    class="fa-solid fa-chevron-down arrow text-sm md:text-[10px] md:mt-1 transition-transform duration-300"></i>
            </label>

            <div
                class="hidden peer-checked:flex flex-col md:items-center bg-gray-50 md:bg-gray-100 rounded-xl py-3 md:py-4 px-2 md:px-1 mt-1 md:mt-2 gap-1 md:gap-4 w-full">
                <a href="{{ route('backend.settings') }}"
                    class="flex md:flex-col items-center p-2 md:p-0 text-gray-500 hover:text-gray-800 transition-colors group rounded-lg hover:bg-white md:hover:bg-transparent">
                    <i
                        class="fa-duotone fa-solid fa-browser text-lg md:text-xl md:group-hover:-translate-y-1 transition-transform w-10 text-center md:w-auto"></i>
                    <span
                        class="text-sm md:text-[11px] md:font-medium mt-0 md:mt-1 flex-1 md:flex-none md:text-center">เว็บไซต์</span>
                </a>
            </div>
        </div>
        <a href="{{ route('backend.users') }}"
            class="flex md:flex-col items-center p-3 md:p-2 text-gray-500 hover:text-[#2CB05C] hover:bg-green-50 md:hover:bg-transparent rounded-xl transition-all w-full md:w-auto">
            <i class="fa-regular fa-users text-xl w-10 text-center md:w-auto"></i>
            <p class="text-sm md:text-[13px] mt-0 md:mt-1.5 md:font-medium flex-1 md:flex-none">จัดการผู้ใช้</p>
        </a>

    </div>
</aside>
