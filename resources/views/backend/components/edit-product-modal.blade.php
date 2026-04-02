<div id="editProductModal"
    class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/40 transition-opacity">

    <div
        class="bg-white rounded-xl w-full max-w-[500px] max-h-[90vh] overflow-y-auto shadow-sm relative p-8 font-[Prompt]">

        <button type="button" onclick="closeEditModal()"
            class="absolute top-6 right-6 text-gray-800 hover:text-red-500 transition-colors">
            <i class="fa-solid fa-xmark text-xl font-bold"></i>
        </button>

        <div class="mb-6">
            <h2 class="text-2xl font-extrabold text-gray-900">แก้ไขสินค้า</h2>
            <p class="text-xs text-gray-400 mt-1 font-medium">แก้ไขข้อมูลรายการสินค้า</p>
        </div>

        <form id="editProductForm" method="POST">
            @csrf
            @method('PUT') <div class="mb-4">
                <h3 class="text-sm font-extrabold text-gray-400 mb-3">ข้อมูลทั่วไป</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-[13px] font-extrabold text-gray-800 mb-1.5">ชื่อสินค้า <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="product_name" id="edit_product_name" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:border-green-500 text-sm">
                    </div>

                    {{-- ส่วนราคาปกติ และ ปุ่มเพิ่มราคาตัวแทน --}}
                    <div class="flex gap-3 items-end">
                        <div class="flex-1">
                            <label class="block text-[13px] font-extrabold text-gray-800 mb-1.5">ราคาปกติ <span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 font-bold">฿</span>
                                <input type="number" step="0.01" name="main_price" id="edit_main_price" required
                                    class="w-full border border-gray-200 rounded-xl pl-8 pr-4 py-2.5 focus:outline-none focus:border-green-500 text-sm">
                            </div>
                        </div>

                        {{-- ปุ่มเพิ่มราคาตัวแทน --}}
                        <button type="button" id="showEditAgentPriceBtn" onclick="toggleEditAgentPrice()"
                            class="bg-[#12C45A] hover:bg-green-600 text-white font-bold rounded-xl px-6 py-2.5 flex items-center justify-center gap-2 transition-colors text-sm">
                            <i class="fa-solid fa-percent"></i> เพิ่มราคาตัวแทน
                        </button>
                    </div>

                    <div id="editAgentPriceContainer" class="hidden mt-4">
                        <label class="block text-[13px] font-extrabold text-gray-800 mb-1.5">ราคาตัวแทน</label>
                        <div class="flex gap-4 items-center">
                            {{-- ช่องกรอกราคา: ขอบมนเท่ากับราคาปกติ --}}
                            <div class="relative flex-1">
                                <span class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-300 font-bold">฿</span>
                                <input type="number" step="0.01" name="agent_price" id="edit_agent_price"
                                    class="w-full border border-gray-200 rounded-2xl pl-10 pr-4 py-3 focus:outline-none focus:border-green-500 text-sm font-medium transition-all">
                            </div>

                            {{-- ปุ่มยกเลิก: สีเทาอ่อน ขอบมนหนา ตัวหนังสือหนา --}}
                            <button type="button" onclick="toggleEditAgentPrice()"
                                class="bg-[#F8F9FA] hover:bg-gray-100 text-[#1e293b] font-bold rounded-2xl px-8 py-3 flex items-center justify-center gap-2 transition-all text-sm min-w-[120px]">
                                <i class="fa-solid fa-xmark text-xs"></i> ยกเลิก
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-sm font-extrabold text-gray-400 mb-3">ระบบสต็อกและวันที่</h3>

                <div class="mb-4">
                    <label class="block text-[13px] font-extrabold text-gray-800 mb-1.5">สต็อกสินค้าทั้งหมด</label>
                    <input type="number" name="stock" id="edit_stock"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:border-green-500 text-sm font-bold">
                </div>

                <div class="mb-4" id="edit-dates-container">
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-[13px] font-extrabold text-gray-800">
                            วันที่ตั้งการขาย <span class="text-[10px] text-gray-400 font-medium">(สูงสุด 8 วัน)</span>
                        </label>
                        <button type="button" onclick="addEditDateRow()"
                            class="text-xs text-green-600 font-bold hover:text-green-700 transition-colors">
                            + เพิ่มวันที่
                        </button>
                    </div>
                    <div id="edit-dates-wrapper" class="space-y-3">
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-[13px] font-extrabold text-gray-800">
                            ช่วงเวลาขาย <span class="text-[10px] text-gray-400 font-medium">(สูงสุด 8 ช่วง)</span>
                        </label>
                        <button type="button" onclick="addEditTimeRow()"
                            class="text-xs text-green-600 font-bold hover:text-green-700 transition-colors">
                            + เพิ่มเวลา
                        </button>
                    </div>
                    <div id="edit-slots-wrapper" class="space-y-3">
                    </div>
                </div>

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-sm font-extrabold text-gray-400">ระบบสต็อก</h3>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="status" id="edit_status" value="เปิดจอง" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#12C45A]">
                        </div>
                    </label>
                </div>
            </div>

            <div class="flex gap-3 mt-4">
                <button type="button" onclick="closeEditModal()"
                    class="w-1/2 border border-gray-300 text-gray-500 hover:bg-gray-50 rounded-2xl py-3 font-bold text-sm transition-colors">
                    ยกเลิก
                </button>
                <button type="submit"
                    class="w-1/2 bg-[#12C45A] hover:bg-green-600 text-white rounded-2xl py-3 font-bold text-sm transition-colors shadow-lg">
                    บันทึกการแก้ไข
                </button>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('assets/js/backend/edit-product-date.js') }}"></script>
<script src="{{ asset('assets/js/backend/edit-timeslot.js') }}"></script>
<script src="{{ asset('assets/js/backend/edit-agent-price.js') }}"></script>
