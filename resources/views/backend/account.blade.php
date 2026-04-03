@extends('backend.layouts')
@section('title', 'จัดการรายการบัญชี')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <div class="sm:pt-25 pb-10">
        <div class="container mx-auto px-4 w-full">

            <div class="bg-white rounded-md border border-gray-100 p-6 mb-6">
                <form action="{{ route('backend.account') }}" method="GET">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="relative flex-1">
                            <i
                                class="fa-solid fa-magnifying-glass absolute left-5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="ค้นหารายละเอียด หรือ วันที่ (เช่น 2026-04)..."
                                class="w-full pl-12 pr-4 py-3 bg-white border border-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">
                        </div>
                        <button type="submit"
                            class="px-8 py-2.5 bg-[#2CB05C] text-white rounded-full text-sm font-bold transition-colors">
                            ค้นหา
                        </button>
                        @if (request()->anyFilled(['search', 'price_sort', 'day_filter']))
                            <a href="{{ route('backend.account') }}"
                                class="text-xs text-gray-400 hover:text-red-500 font-bold">ล้างตัวกรอง</a>
                        @endif
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="font-extrabold text-gray-800 text-sm">ตัวกรอง</span>

                        <div class="relative">
                            <select name="price_sort" onchange="this.form.submit()"
                                class="appearance-none bg-white border border-gray-100 rounded-2xl px-5 py-2.5 pr-12 text-sm text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-gray-200 cursor-pointer min-w-[160px]">
                                <option value="">ราคาสินค้า</option>
                                <option value="high" {{ request('price_sort') == 'high' ? 'selected' : '' }}>ราคามาก -
                                    น้อย</option>
                                <option value="low" {{ request('price_sort') == 'low' ? 'selected' : '' }}>ราคาน้อย - มาก
                                </option>
                            </select>
                            <i
                                class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 text-[10px] pointer-events-none"></i>
                        </div>

                        <div class="relative">
                            <select name="category_filter" onchange="this.form.submit()"
                                class="appearance-none bg-white border border-gray-100 rounded-2xl px-5 py-2.5 pr-12 text-sm text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-gray-200 cursor-pointer min-w-[160px]">
                                <option value="">หมวดหมู่ทั้งหมด</option>
                                <option value="รายรับ" {{ request('category_filter') == 'รายรับ' ? 'selected' : '' }}>รายรับ
                                </option>
                                <option value="รายจ่าย" {{ request('category_filter') == 'รายจ่าย' ? 'selected' : '' }}>
                                    รายจ่าย</option>
                            </select>
                            <i
                                class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 text-[10px] pointer-events-none"></i>
                        </div>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-12 gap-6 items-start">
                <div class="col-span-8 bg-white rounded-md border border-gray-100 p-6">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h2 class="text-xl font-extrabold text-gray-800">บัญชี รายรับ-รายจ่าย</h2>
                            <p class="text-[13px] text-gray-400 mt-1 font-medium">
                                จัดการบัญชี รายรับ-รายจ่าย ทั้งหมด</p>
                        </div>
                        <button onclick="toggleAccountModal()"
                            class="bg-[#5B73FA] hover:bg-[#4860e8] text-white px-6 py-2.5 rounded-2xl text-sm font-bold transition-all">
                            เพิ่มรายการ
                        </button>
                    </div>

                    <div class="overflow-x-auto flex-1 mb-6">
                        <table class="w-full text-sm text-center whitespace-nowrap">
                            <thead class="text-gray-800 font-extrabold">
                                <tr class="bg-[#F8F9FA]">
                                    <th class="py-4 px-4 rounded-l-2xl w-16">#</th>
                                    <th class="py-4 px-4 text-left">วันที่</th>
                                    <th class="py-4 px-4 text-left">รายละเอียด</th>
                                    <th class="py-4 px-4 text-left">หมวดหมู่</th>
                                    <th class="py-4 px-4">จำนวนเงิน</th>
                                    <th class="py-4 px-4 rounded-r-2xl w-32">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 font-medium">
                                @forelse ($accounts as $account)
                                    <tr class="border-b border-gray-50/50">
                                        <td class="py-5 px-4">{{ $loop->iteration }}</td>
                                        <td class="py-5 px-4 text-left">{{ $account->thai_date }}</td>

                                        <td class="py-5 px-4 text-left">{{ $account->description }}</td>
                                        <td class="py-5 px-4 text-left">
                                            <span
                                                class="{{ $account->category == 'รายรับ' ? 'text-blue-500' : 'text-red-500' }}">
                                                {{ $account->category }}
                                            </span>
                                        </td>
                                        <td class="py-5 px-4 text-gray-800 font-bold">
                                            {{ number_format($account->category == 'รายรับ' ? $account->income : $account->expense, 2) }}
                                        </td>
                                        <td class="py-5 px-4">
                                            <div class="flex items-center justify-center gap-2.5">
                                                <button type="button"
                                                    onclick="openEditAccountModal({{ $account->toJson() }})"
                                                    class="w-9 h-9 flex items-center justify-center bg-[#C3E8CB] text-[#4FA960] rounded-xl hover:bg-green-300 transition-colors">
                                                    <i class="fa-solid fa-gear"></i>
                                                </button>
                                                <button type="button"
                                                    onclick="confirmDelete({{ $account->id }}, '{{ $account->description }}', '{{ route('backend.account.destroy', $account->id) }}')"
                                                    class="w-9 h-9 flex items-center justify-center bg-[#FFB5B5] text-[#FF5B5B] rounded-xl hover:bg-red-300 transition-colors">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="py-20 text-center">
                                            <div class="flex flex-col items-center justify-center">
                                                <div
                                                    class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                                    <i class="fa-sharp-duotone fa-solid fa-piggy-bank text-4xl text-gray-200"></i>
                                                </div>
                                                <h3 class="text-lg font-extrabold text-gray-800">ไม่พบรายการบัญชีรายรับ-รายจ่าย</h3>
                                                <p class="text-sm text-gray-400 mt-1">ยังไม่มีการเพิ่มข้อมูลบัญชีลงในระบบ
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-12 flex justify-between items-center bg-white p-5 rounded-md border border-gray-100">
                        <div class="text-[14px] text-[#2CB05C] font-extrabold">
                            แสดง {{ $accounts->firstItem() ?? 0 }}-{{ $accounts->lastItem() ?? 0 }} จาก
                            {{ $accounts->total() }} รายการ
                        </div>

                        <div class="custom-pagination">
                            {{ $accounts->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>

                <div class="col-span-4 space-y-6">
                    <div class="bg-white rounded-md p-6 border border-gray-100">
                        <div class="flex justify-between items-center mb-5">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="bg-[#FEF2F2] w-10 h-10 rounded-full flex items-center justify-center text-[#e11d48]">
                                    <i class="fa-solid fa-wallet text-lg"></i>
                                </div>
                                <h3 class="font-bold text-gray-800 text-lg">รายจ่ายทั้งหมด</h3>
                            </div>
                        </div>
                        <div class="bg-[#FEF2F2] rounded-md p-4 flex justify-between items-end">
                            <div>
                                <h1 class="text-[#e11d48] text-3xl font-bold">฿{{ number_format($totalExpense, 2) }}</h1>
                                <p class="text-[#e11d48] text-sm mt-1 font-medium">รายจ่ายประจำระบบ</p>
                            </div>
                            <div class="flex items-end space-x-1.5 h-12">
                                <div class="w-3 bg-[#f43f5e] h-full rounded-sm"></div>
                                <div class="w-3 bg-[#f43f5e] h-3/4 rounded-sm"></div>
                                <div class="w-3 bg-[#f43f5e] h-1/2 rounded-sm"></div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-md p-6 border border-gray-100">
                        <div class="flex justify-between items-center mb-5">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="bg-[#EFF6FF] w-10 h-10 rounded-full flex items-center justify-center text-[#3B82F6]">
                                    <i class="fa-solid fa-arrow-up text-lg"></i>
                                </div>
                                <h3 class="font-bold text-gray-800 text-lg">ยอดคงเหลือ</h3>
                            </div>
                        </div>
                        <div class="bg-[#EFF6FF] rounded-md p-4 flex justify-between items-end">
                            <div>
                                <h1 class="text-[#3B82F6] text-3xl font-bold">฿{{ number_format($totalBalance, 2) }}</h1>
                                <p class="text-[#3B82F6] text-sm mt-1 font-medium text-opacity-80">ยอดสุทธิปัจจุบัน</p>
                            </div>
                            <div class="flex items-end space-x-1.5 h-12">
                                <div class="w-3 bg-[#3B82F6] h-full rounded-sm"></div>
                                <div class="w-3 bg-[#3B82F6] h-1/2 rounded-sm"></div>
                                <div class="w-3 bg-[#3B82F6] h-4/5 rounded-sm"></div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-md p-6 border border-gray-100">
                        <div class="flex justify-between items-center mb-5">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="bg-[#D1FAE5] w-10 h-10 rounded-full flex items-center justify-center text-[#059669]">
                                    <i class="fa-solid fa-wallet text-lg"></i>
                                </div>
                                <h3 class="font-bold text-gray-800 text-lg">รายรับทั้งหมด</h3>
                            </div>
                        </div>
                        <div class="bg-[#D1FAE5] rounded-md p-4 flex justify-between items-end">
                            <div>
                                <h1 class="text-[#059669] text-3xl font-bold">฿{{ number_format($totalIncome, 2) }}</h1>
                                <p class="text-[#059669] text-sm mt-1 font-medium">
                                    รายรับ {{ $incomeGrowth >= 0 ? '+' : '' }}{{ number_format($incomeGrowth, 0) }}%
                                    <i class="fa-solid fa-arrow-trend-up"></i>
                                </p>
                            </div>
                            <div class="flex items-end space-x-1.5 h-12">
                                <div class="w-3 bg-[#10B981] h-3/4 rounded-sm"></div>
                                <div class="w-3 bg-[#10B981] h-full rounded-sm"></div>
                                <div class="w-3 bg-[#10B981] h-4/5 rounded-sm"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('backend.components.add-account-modal')
    @include('backend.components.sweetalert-messages')
    @include('backend.components.edit-account-modal')
    <script src="{{ asset('assets/js/backend/add-account-modal.js') }}"></script>
    <script src="{{ asset('assets/js/backend/edit-account-modal.js') }}"></script>
    <script src="{{ asset('assets/js/backend/sweetalert.js') }}"></script>
@endsection
