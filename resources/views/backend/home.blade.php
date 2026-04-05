@extends('backend.layouts')
@section('title', 'หน้าหลัก')
@section('content')
    <div class="container mx-auto px-4 w-full space-y-6">

        <div class="bg-white rounded-[20px] shadow-sm flex flex-col md:flex-row overflow-hidden">
            <div class="bg-[#00c365] p-6 flex items-center md:w-[60%] lg:w-[70%]">
                <div class="bg-white/20 p-3 rounded-2xl mr-4 flex-shrink-0">
                    <i class="fa-solid fa-play text-3xl text-white pl-1"></i>
                </div>
                <div>
                    <h2 class="text-white font-bold text-2xl">เริ่มต้นการใช้งาน</h2>
                    <p class="text-white/90 text-sm mt-1">เรียนรู้การใช้งานเว็บไซต์ผ่านการดูวิดีโอสาธิตวิธีใช้งาน</p>
                </div>
            </div>
            <div class="p-6 flex items-center justify-center md:justify-end md:w-[40%] lg:w-[30%] bg-white">
                <a href="#"
                    class="border border-gray-300 px-10 py-2.5 text-center rounded-full text-gray-700 font-medium hover:bg-gray-50 transition">
                    ดูวิดีโอ
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-md shadow-sm p-5">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="bg-[#a7f3d0] w-10 h-10 rounded-full flex items-center justify-center text-[#059669]">
                            <i class="fa-solid fa-wallet text-lg"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg">รายได้ทั้งหมด</h3>
                    </div>
                </div>
                <div class="bg-[#d1fae5] rounded-xl p-4 flex justify-between items-end">
                    <div>
                        <h1 class="text-[#059669] text-3xl font-bold">
                            ฿{{ number_format($totalIncome, 2) }}
                        </h1>
                        @if ($incomeGrowth > 0)
                            <p class="text-[#059669] text-sm mt-1 font-medium">
                                รายรับเพิ่ม +{{ number_format($incomeGrowth, 0) }}%
                                <i class="fa-solid fa-arrow-trend-up ml-1"></i>
                            </p>
                        @elseif($incomeGrowth < 0)
                            <p class="text-[#059610] text-sm mt-1 font-medium">
                                รายรับลด {{ number_format($incomeGrowth, 0) }}%
                                <i class="fa-solid fa-arrow-trend-down ml-1"></i>
                            </p>
                        @else
                            <p class="text-gray-400 text-sm mt-1">
                                รายรับคงที่ 0%
                            </p>
                        @endif
                    </div>
                    <div class="flex items-end space-x-1.5 h-12">
                        <div class="w-3 bg-[#10b981] h-full rounded-sm"></div>
                        <div class="w-3 bg-[#10b981] h-3/4 rounded-sm"></div>
                        <div class="w-3 bg-[#10b981] h-1/2 rounded-sm"></div>
                        <div class="w-3 bg-[#10b981] h-4/5 rounded-sm"></div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-md shadow-sm p-5">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="bg-[#fef08a] w-10 h-10 rounded-full flex items-center justify-center text-[#ca8a04]">
                            <i class="fa-solid fa-users text-lg"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg">ลูกค้าทั้งหมด</h3>
                    </div>
                </div>
                <div class="bg-[#fef9c3] rounded-xl p-4 flex justify-between items-end">
                    <div>
                        <h1 class="text-[#ca8a04] text-3xl font-[1000]">
                            {{ number_format($totalUser) }}<span class="text-xl ml-1">คน</span>
                        </h1>

                        @if ($userGrowth > 0)
                            <p class="text-[#eab308] text-sm mt-1 font-medium">
                                เพิ่มขึ้น +{{ number_format($userGrowth, 0) }}%
                                <i class="fa-solid fa-arrow-trend-up ml-1"></i>
                            </p>
                        @elseif($userGrowth < 0)
                            <p class="text-red-500 text-sm mt-1 font-medium">
                                ลดลง {{ number_format($userGrowth, 0) }}%
                                <i class="fa-solid fa-arrow-trend-down ml-1"></i>
                            </p>
                        @else
                            <p class="text-yellow-400 text-sm mt-1 font-medium">
                                จำนวนคงที่
                            </p>
                        @endif
                    </div>
                    <div class="flex items-end space-x-1.5 h-12">
                        <div class="w-3 bg-[#eab308] h-3/4 rounded-sm"></div>
                        <div class="w-3 bg-[#eab308] h-full rounded-sm"></div>
                        <div class="w-3 bg-[#eab308] h-2/5 rounded-sm"></div>
                        <div class="w-3 bg-[#eab308] h-1/2 rounded-sm"></div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-md shadow-sm p-5">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="bg-[#fecdd3] w-10 h-10 rounded-full flex items-center justify-center text-[#e11d48]">
                            <i class="fa-solid fa-user-tie text-lg"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg">ตัวแทนทั้งหมด</h3>
                    </div>
                </div>
                <div class="bg-[#ffe4e6] rounded-xl p-4 flex justify-between items-end">
                    <div>
                        <h1 class="text-[#e11d48] text-3xl font-[1000]">
                            {{ number_format($totalAgent) }} <span class="text-xl ml-1">คน</span>
                        </h1>

                        @if ($agentGrowth > 0)
                            <p class="text-[#e11d48] text-sm mt-1 font-medium">
                                เพิ่มขึ้น +{{ number_format($agentGrowth, 0) }}%
                                <i class="fa-solid fa-arrow-trend-up ml-1"></i>
                            </p>
                        @elseif($agentGrowth < 0)
                            <p class="text-[#e11d48] text-sm mt-1 font-medium">
                                ลดลง {{ number_format($agentGrowth, 0) }}%
                                <i class="fa-solid fa-arrow-trend-down ml-1"></i>
                            </p>
                        @else
                            <p class="text-red-500 text-sm mt-1 font-medium">
                                จำนวนตัวแทนคงที่
                            </p>
                        @endif
                    </div>
                    <div class="flex items-end space-x-1.5 h-12">
                        <div class="w-3 bg-[#f43f5e] h-4/5 rounded-sm"></div>
                        <div class="w-3 bg-[#f43f5e] h-1/2 rounded-sm"></div>
                        <div class="w-3 bg-[#f43f5e] h-full rounded-sm"></div>
                        <div class="w-3 bg-[#f43f5e] h-1/3 rounded-sm"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="bg-white shadow-sm rounded-md p-6 lg:col-span-2 flex flex-col">
                <h3 class="font-bold text-xl text-gray-800">ภาพรวมรายได้</h3>
                <p class="text-gray-400 text-sm mb-6">รายได้ทั้งหมด</p>

                <div class="flex-grow w-full h-[250px] relative">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Line_chart_example.svg/800px-Line_chart_example.svg.png"
                        class="w-full h-full object-contain opacity-30" alt="Chart Placeholder">
                </div>
            </div>

            <div class="bg-white shadow-sm rounded-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-bold text-lg text-gray-800">การจองล่าสุด</h3>
                    <a href="#" class="text-sm font-bold text-gray-800 hover:underline">ดูทั้งหมด</a>
                </div>

                <div class="space-y-4">
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-[#00c365] text-white flex items-center justify-center font-bold text-sm">
                                    {{ $i }}
                                </div>
                                <div class="leading-tight">
                                    <h4 class="text-sm font-bold text-gray-800">xPintoKung_Z</h4>
                                    <p class="text-[11px] text-gray-400"><i class="fa-solid fa-receipt mr-1"></i>1
                                        ออเดอร์</p>
                                </div>
                            </div>
                            <button
                                class="border border-gray-300 rounded-full px-4 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50">
                                ข้อมูล
                            </button>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

    </div>
@endsection
