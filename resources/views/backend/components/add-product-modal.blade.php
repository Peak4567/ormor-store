<div id="addProductModal"
    class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/40 transition-opacity">

    <div class="bg-white rounded-md w-full max-w-[500px] max-h-[90vh] overflow-y-auto shadow-sm relative p-8 font-[Prompt]">

        <button type="button" onclick="toggleModal()"
            class="absolute top-6 right-6 text-gray-800 hover:text-red-500 transition-colors">
            <i class="fa-solid fa-xmark text-xl font-bold"></i>
        </button>

        <div class="mb-6">
            <h2 class="text-2xl font-extrabold text-gray-900">เพิ่มสินค้า</h2>
            <p class="text-xs text-gray-400 mt-1 font-medium">เพิ่มสินค้าในรายการสินค้า</p>
        </div>

        <form action="{{ route('backend.product.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <h3 class="text-sm font-extrabold text-gray-400 mb-3">ข้อมูลทั่วไป</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-[13px] font-extrabold text-gray-800 mb-1.5">ชื่อสินค้า <span class="text-red-500">*</span></label>
                        <input type="text" name="product_name" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 text-sm">
                    </div>

                    <div class="flex gap-3 items-end">
                        <div class="flex-1">
                            <label class="block text-[13px] font-extrabold text-gray-800 mb-1.5">ราคาปกติ <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 font-bold">฿</span>
                                <input type="number" step="0.01" name="main_price" required
                                    class="w-full border border-gray-200 rounded-xl pl-8 pr-4 py-2.5 focus:outline-none focus:border-green-500 text-sm">
                            </div>
                        </div>
                        <button type="button" id="showAgentPriceBtn" onclick="toggleAgentPrice()"
                            class="bg-[#12C45A] hover:bg-green-600 text-white font-bold rounded-xl px-4 py-2.5 flex items-center justify-center gap-2 transition-colors w-[180px] text-sm">
                            <i class="fa-solid fa-percent"></i> เพิ่มราคาตัวแทน
                        </button>
                    </div>

                    <div id="agentPriceContainer" class="hidden flex gap-3 items-end">
                        <div class="flex-1">
                            <label class="block text-[13px] font-extrabold text-gray-800 mb-1.5">ราคาตัวแทน</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 font-bold">฿</span>
                                <input type="number" step="0.01" name="agent_price"
                                    class="w-full border border-gray-200 rounded-xl pl-8 pr-4 py-2.5 focus:outline-none focus:border-green-500 text-sm">
                            </div>
                        </div>
                        <button type="button" onclick="toggleAgentPrice()"
                            class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold rounded-xl px-4 py-2.5 flex items-center justify-center gap-2 transition-colors w-[180px] text-sm">
                            <i class="fa-solid fa-xmark"></i> ยกเลิก
                        </button>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-sm font-extrabold text-gray-400 mb-3">ระบบสต็อกและวันที่</h3>

                <div class="mb-4">
                    <label class="block text-[13px] font-extrabold text-gray-800 mb-1.5">สต็อกสินค้าทั้งหมด</label>
                    <input type="number" name="stock" placeholder="0"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:border-green-500 text-sm font-bold">
                </div>

                <div class="mb-4" id="dates-container">
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-[13px] font-extrabold text-gray-800">
                            วันที่ตั้งการขาย <span class="text-[10px] text-gray-400 font-medium">(สูงสุด 8 วัน)</span>
                        </label>
                        <button type="button" onclick="addDateRow()"
                            class="text-xs text-green-600 font-bold hover:text-green-700 transition-colors">
                            + เพิ่มวันที่
                        </button>
                    </div>

                    <div id="dates-wrapper" class="space-y-3">
                        <div class="flex gap-3 items-center date-row">
                            <input type="date" name="dates[]" required
                                class="flex-1 border border-gray-200 rounded-xl px-4 py-2 focus:outline-none focus:border-green-500 text-sm font-bold text-gray-600">
                            
                            <button type="button" onclick="removeDateRow(this)"
                                class="remove-date-btn hidden text-red-400 hover:text-red-600 p-2">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mb-4" id="time-slots-container">
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-[13px] font-extrabold text-gray-800">
                            เพิ่มช่วงเวลา <span class="text-[10px] text-gray-400 font-medium">(ใส่เวลาขาย - สูงสุด 8 ช่วง)</span>
                        </label>
                        <button type="button" id="add-time-btn"
                            class="text-xs text-green-600 font-bold hover:text-green-700 transition-colors">
                            + เพิ่มเวลา
                        </button>
                    </div>
                    <div id="slots-wrapper" class="space-y-3">
                        <div class="flex gap-3 items-center time-slot-row">
                            <input type="time" name="start_times[]" required
                                class="flex-1 border border-gray-200 rounded-xl px-4 py-2 focus:outline-none focus:border-green-500 text-sm font-bold text-gray-800">
                            <span class="text-gray-400 font-extrabold">-</span>
                            <input type="time" name="end_times[]" required
                                class="flex-1 border border-gray-200 rounded-xl px-4 py-2 focus:outline-none focus:border-green-500 text-sm font-bold text-gray-800">
                            <button type="button" class="remove-btn hidden text-red-400 hover:text-red-600 p-2">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-sm font-extrabold text-gray-400">ระบบสต็อก</h3>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="status" value="เปิดจอง" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#12C45A]"></div>
                    </label>
                </div>
            </div>

            <div class="flex gap-3 mt-4">
                <button type="button" onclick="toggleModal()"
                    class="w-1/2 border border-[#FF5B5B] text-[#FF5B5B] hover:bg-red-50 rounded-2xl py-3 font-bold text-sm transition-colors">ยกเลิก</button>
                <button type="submit"
                    class="w-1/2 bg-[#12C45A] hover:bg-green-600 text-white rounded-2xl py-3 font-bold text-sm transition-colors ">เพิ่มสินค้า</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('assets/js/backend/add-agent-price.js') }}"></script>
<script src="{{asset('assets/js/backend/add-timeslot.js')}}"></script>
<script src="{{asset('assets/js/backend/add-product-date.js')}}"></script>