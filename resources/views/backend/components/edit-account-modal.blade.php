<div id="editAccountModal"
    class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/40 duration-150">

    <div class="bg-white rounded-xl w-full max-w-[500px] max-h-[90vh] overflow-y-auto shadow-sm relative p-8 font-[Prompt] transition-all transform scale-95 opacity-0"
        id="editModalContent">

        <button type="button" onclick="closeEditAccountModal()"
            class="absolute top-6 right-6 text-gray-800 hover:text-red-500 transition-colors">
            <i class="fa-solid fa-xmark text-xl font-bold"></i>
        </button>

        <div class="mb-6">
            <h2 class="text-2xl font-extrabold text-gray-900">แก้ไขบัญชีรายรับ-รายจ่าย</h2>
            <p class="text-xs text-gray-400 mt-1 font-medium">แก้ไขรายละเอียดรายการบัญชีของคุณ</p>
        </div>

        <form id="editAccountForm" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <h3 class="text-sm font-extrabold text-gray-400 mb-4">ข้อมูลทั่วไป</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-[13px] font-extrabold text-gray-800 mb-1.5">รายละเอียด <span
                                class="text-red-500">*</span></label>
                        <textarea name="description" id="edit_description" required rows="3"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:border-green-500 text-sm"></textarea>
                    </div>

                    <div>
                        <label class="block text-[13px] font-extrabold text-gray-800 mb-1.5">หมวดหมู่ <span
                                class="text-red-500">*</span></label>
                        <div class="relative">
                            <select name="category" id="edit_category" required
                                class="w-full appearance-none border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:border-green-500 text-sm font-bold text-gray-600 bg-white">
                                <option value="รายรับ">รายรับ</option>
                                <option value="รายจ่าย">รายจ่าย</option>
                            </select>
                            <i
                                class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-300 text-[10px] pointer-events-none"></i>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[13px] font-extrabold text-gray-800 mb-1.5">จำนวนเงิน <span
                                class="text-red-500">*</span></label>
                        <div class="relative">
                            <span
                                class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 font-bold text-sm">฿</span>
                            <input type="number" name="amount" id="edit_amount" required step="0.01"
                                class="w-full border border-gray-200 rounded-xl pl-8 pr-4 py-2.5 focus:outline-none focus:border-green-500 text-sm font-bold text-gray-800">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex gap-3 mt-8">
                <button type="button" onclick="closeEditAccountModal()"
                    class="w-1/2 border border-[#FF5B5B] text-[#FF5B5B] hover:bg-red-50 rounded-2xl py-3 font-bold text-sm transition-colors">
                    ยกเลิก
                </button>
                <button type="submit"
                    class="w-1/2 bg-[#12C45A] hover:bg-green-600 text-white rounded-2xl py-3 font-bold text-sm transition-colors shadow-sm">
                    อัปเดตรายการ
                </button>
            </div>
        </form>
    </div>
</div>
