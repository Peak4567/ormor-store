@extends('backend.layouts')
@section('title', 'จัดการรายชื่อสมาชิก')

@section('content')
    <div class="container mx-auto px-4 w-full space-y-6">

        {{-- ส่วน Search & Filter (ดีไซน์เดียวกับ Product) --}}
        <form action="{{ route('backend.users') }}" method="GET">
            <div class="bg-white rounded-xl border border-gray-100 p-6">
                <div class="flex items-center gap-4 mb-6">
                    <div class="relative flex-1">
                        <i class="fa-solid fa-magnifying-glass absolute left-5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="ค้นหาชื่อผู้ใช้, อีเมล หรือรหัสผู้ใช้...."
                            class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">
                    </div>
                    <button type="submit"
                        class="px-8 py-2.5 bg-green-500 text-white hover:bg-green-600 rounded-full text-sm font-bold transition-colors">
                        ค้นหา
                    </button>
                    @if (request()->anyFilled(['search', 'role']))
                        <a href="{{ route('backend.users') }}"
                            class="text-xs text-gray-400 hover:text-red-500 font-bold">ล้างตัวกรอง</a>
                    @endif
                </div>

                <div class="flex items-center gap-4">
                    <span class="font-extrabold text-gray-800 text-sm">ตัวกรอง</span>

                    <div class="relative">
                        <select name="role" onchange="this.form.submit()"
                            class="appearance-none bg-white border border-gray-100 rounded-2xl px-5 py-2.5 pr-12 text-sm text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-gray-200 cursor-pointer min-w-[160px]">
                            <option value="">ตำแหน่งทั้งหมด</option>
                            <option value="Admin" {{ request('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="User" {{ request('role') == 'User' ? 'selected' : '' }}>User</option>
                        </select>
                        <i
                            class="fa-solid fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-gray-300 text-[10px] pointer-events-none"></i>
                    </div>
                </div>
            </div>
        </form>

        {{-- ส่วนตารางข้อมูล (ดีไซน์เดียวกับ Product) --}}
        <div class="bg-white rounded-xl border border-gray-100 p-6 flex flex-col min-h-[500px]">

            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-xl font-extrabold text-gray-800">รายชื่อสมาชิกทั้งหมด</h2>
                    <p class="text-[13px] text-gray-400 mt-1 font-medium">จัดการรายชื่อสมาชิกทั้งหมดในระบบ
                    </p>
                </div>
            </div>

            <div class="overflow-x-auto flex-1">
                <table class="w-full text-sm text-center whitespace-nowrap">
                    <thead class="text-gray-800 font-extrabold">
                        <tr class="bg-[#F8F9FA]">
                            <th class="py-4 px-4 rounded-l-2xl w-16">#</th>
                            <th class="py-4 px-4 text-left">ชื่อผู้ใช้</th>
                            <th class="py-4 px-4 text-left">อีเมล</th>
                            <th class="py-4 px-4">ตำแหน่ง</th>
                            <th class="py-4 px-4">วันที่สร้าง</th>
                            <th class="py-4 px-4 rounded-r-2xl w-32">จัดการ</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-600 font-medium">
                        @forelse ($users as $user)
                            <tr class="border-b border-gray-50/50 hover:bg-gray-50/30 transition-colors">

                                <td class="py-5 px-4 text-gray-800 font-bold">
                                    {{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}
                                </td>

                                <td class="py-5 px-4 text-left">
                                    <div class="text-gray-800 font-bold">{{ $user->name }}</div>
                                    <div class="text-[11px] text-gray-400 mt-0.5">ID: {{ $user->users_code }}</div>
                                </td>

                                <td class="py-5 px-4 text-left text-gray-500">{{ $user->email }}</td>

                                <td class="py-5 px-4">
                                    @php
                                        $currentLevel = strtolower($user->level ?? 'member');
                                        $colorClass = match ($currentLevel) {
                                            'admin'
                                                => 'bg-red-50 text-red-600 border-red-200 focus:ring-red-500/20 hover:bg-red-100',
                                            'agent'
                                                => 'bg-blue-50 text-blue-600 border-blue-200 focus:ring-blue-500/20 hover:bg-blue-100',
                                            default
                                                => 'bg-gray-50 text-gray-600 border-gray-200 focus:ring-gray-500/20 hover:bg-gray-100',
                                        };
                                    @endphp

                                    <div class="relative inline-block w-28">
                                        <select onchange="changeUserLevel({{ $user->id }}, this.value)"
                                            class="w-full appearance-none px-3 py-1.5 pr-8 rounded-lg text-[12px] border outline-none cursor-pointer transition-all text-center {{ $colorClass }}">
                                            <option value="admin" class="text-red-600 bg-white"
                                                {{ $currentLevel === 'admin' ? 'selected' : '' }}>
                                                แอดมิน
                                            </option>
                                            <option value="agent" class="text-blue-600 bg-white"
                                                {{ $currentLevel === 'agent' ? 'selected' : '' }}>
                                                ตัวแทน
                                            </option>
                                            <option value="member" class="text-gray-600 bg-white"
                                                {{ in_array($currentLevel, ['member', '']) ? 'selected' : '' }}>
                                                สมาชิก
                                            </option>

                                        </select>
                                        <i
                                            class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-[10px] pointer-events-none opacity-60"></i>
                                    </div>
                                </td>

                                <td class="py-5 px-4 text-gray-800 font-bold">
                                    {{ $user->thai_date ?? $user->created_at->format('d/m/Y') }}
                                </td>

                                <td class="py-5 px-4">
                                    <div class="flex items-center justify-center gap-2.5">
                                        <button type="button"
                                            onclick="confirmDelete({{ $user->id }}, '{{ $user->name }}', '{{ route('backend.users.destroy', $user->id) }}')"
                                            class="w-11 h-11 bg-[#FFB5B5]/20 text-[#FF5B5B] rounded-2xl hover:bg-[#FF5B5B] hover:text-white transition-all flex items-center justify-center mx-auto group">
                                            <i class="fa-solid fa-trash-can group-hover:scale-110 transition-transform"></i>
                                        </button>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-20 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div
                                            class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                            <i class="fa-solid fa-users-slash text-4xl text-gray-200"></i>
                                        </div>
                                        <h3 class="text-lg font-extrabold text-gray-800">ไม่พบรายชื่อสมาชิก</h3>
                                        <p class="text-sm text-gray-400 mt-1">ยังไม่มีการเพิ่มข้อมูลสมาชิกลงในระบบ</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ส่วน Pagination ดีไซน์ใหม่ล่าสุด --}}
            <div class="mt-12 flex justify-between items-center bg-white p-5 rounded-md border border-gray-100">
                <div class="text-[14px] text-[#2CB05C] font-extrabold">
                    แสดง {{ $users->firstItem() ?? 0 }}-{{ $users->lastItem() ?? 0 }} จาก {{ $users->total() }}
                    รายการ
                </div>
                <div class="custom-pagination">
                    {{ $users->appends(request()->query())->links('pagination::tailwind') }}
                </div>
            </div>

        </div>

    </div>
    @include('backend.components.sweetalert-messages')
    <script src="{{ asset('assets/js/backend/sweetalert.js') }}"></script>
    <script src="{{ asset('assets/js/backend/update-users-status.js') }}"></script>
@endsection
