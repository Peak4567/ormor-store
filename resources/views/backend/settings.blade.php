@extends('backend.layouts')
@section('title', 'ตั้งค่าเว็บไซต์')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <div class="container mx-auto px-4 w-full space-y-6">

        <form action="{{ route('backend.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">

                <div class="col-span-1 md:col-span-4 bg-white rounded-md border border-gray-100 p-6">
                    <div class="mb-6">
                        <h2 class="text-xl font-extrabold text-gray-800">ตั้งค่าเว็บไซต์</h2>
                        <p class="text-[13px] text-gray-400 mt-1 font-medium">จัดการข้อมูลทั่วไปและช่องทางการติดต่อ</p>
                    </div>

                    <h3 class="text-[14px] font-extrabold text-gray-800 mb-4 border-b border-gray-100 pb-2">ข้อมูลทั่วไป
                    </h3>

                    <div class="flex items-center gap-4 mb-6">
                        <div
                            class="w-20 h-20 bg-gray-50/50 rounded-md flex items-center justify-center relative overflow-hidden group cursor-pointer border border-gray-100">

                            <img id="preview-logo"
                                src="{{ $setting->logo ? asset($setting->logo) : 'https://via.placeholder.com/150?text=Logo' }}"
                                alt="Logo" class="w-full h-full object-cover">

                            <div
                                class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="fa-solid fa-camera text-white text-xl"></i>
                            </div>

                            <input type="file" name="logo" class="absolute inset-0 opacity-0 cursor-pointer"
                                accept="image/png, image/jpeg" onchange="previewImage(this, 'preview-logo')">

                        </div>
                        <div class="flex-1">
                            <h4 class="font-extrabold text-sm text-gray-800">โลโก้เว็บไซต์</h4>
                            <p class="text-[11px] text-gray-400 font-medium mt-0.5 leading-tight">แนะนำขนาด 512x512px
                                ไฟล์ PNG</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block mb-2 text-sm font-extrabold text-gray-800">ชื่อเว็บไซต์</label>
                            <input type="text" name="site_name" value="{{ $setting->site_name }}"
                                placeholder="ชื่อเว็บไซต์"
                                class="w-full px-4 py-2.5 bg-white border border-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-extrabold text-gray-800">คำอธิบาย</label>
                            <input type="text" name="description" value="{{ $setting->description }}"
                                placeholder="คำอธิบาย"
                                class="w-full px-4 py-2.5 bg-white border border-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-extrabold text-gray-800">ลิ้งค์เว็บ</label>
                            <input type="text" name="website_url" value="{{ $setting->website_url }}"
                                placeholder="ลิ้งค์เว็บ"
                                class="w-full px-4 py-2.5 bg-white border border-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-extrabold text-gray-800">คำเตือน</label>
                            <input type="text" name="warning_text" value="{{ $setting->warning_text }}"
                                placeholder="คำเตือน"
                                class="w-full px-4 py-2.5 bg-white border border-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">
                        </div>
                    </div>

                    <h3 class="text-[14px] font-extrabold text-gray-800 mt-8 mb-4 border-b border-gray-100 pb-2">
                        ช่องทางติดต่อ</h3>

                    <div class="flex items-center gap-4 mb-6">
                        <div
                            class="w-20 h-20 bg-gray-50/50 rounded-md flex items-center justify-center relative overflow-hidden group cursor-pointer border border-gray-100">
                            <img id="preview-qr"
                                src="{{ $setting->qr_code ? asset($setting->qr_code) : 'https://via.placeholder.com/150?text=QR' }}"
                                alt="QR" class="w-full h-full object-cover">

                            <div
                                class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="fa-solid fa-camera text-white text-xl"></i>
                            </div>

                            <input type="file" name="qr_code" class="absolute inset-0 opacity-0 cursor-pointer"
                                accept="image/png, image/jpeg" onchange="previewImage(this, 'preview-qr')">
                        </div>
                        <div class="flex-1">
                            <h4 class="font-extrabold text-sm text-gray-800">QR เว็บไซต์</h4>
                            <p class="text-[11px] text-gray-400 font-medium mt-0.5 leading-tight">แนะนำขนาด 512x512px
                                ไฟล์ PNG</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block mb-2 text-sm font-extrabold text-gray-800">Facebook</label>
                            <input type="text" name="facebook" value="{{ $setting->facebook }}" placeholder="Facebook"
                                class="w-full px-4 py-2.5 bg-white border border-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-extrabold text-gray-800">Line</label>
                            <input type="text" name="line" value="{{ $setting->line }}" placeholder="Line"
                                class="w-full px-4 py-2.5 bg-white border border-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">
                        </div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-8 bg-white rounded-md border border-gray-100 p-6 flex flex-col">
                    <div class="mb-8">
                        <h2 class="text-xl font-extrabold text-gray-800">ขั้นตอนการใช้งาน</h2>
                        <p class="text-[13px] text-gray-400 mt-1 font-medium">
                            ตั้งค่าข้อมูลขั้นตอนการใช้งานที่แสดงหน้าเว็บ</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-8 flex-1">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="bg-gray-50/30 p-4 rounded-md border border-gray-50">
                                <h3 class="text-sm font-extrabold text-gray-800 mb-4 flex items-center gap-2">
                                    <span
                                        class="w-6 h-6 flex items-center justify-center bg-blue-50 text-[#0054F0] rounded-md text-xs">{{ $i }}</span>
                                    ขั้นตอนที่ {{ $i }}
                                </h3>

                                <div class="space-y-4">
                                    <div>
                                        <label class="block mb-2 text-xs font-bold text-gray-600">ไอคอน & หัวข้อ</label>
                                        <div class="flex items-center gap-2">
                                            <input type="text" name="step_{{ $i }}_icon"
                                                value="{{ $setting->{'step_' . $i . '_icon'} }}"
                                                placeholder="fa-solid fa-star"
                                                class="w-[100px] text-center px-3 py-2.5 bg-white border border-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">

                                            <input type="text" name="step_{{ $i }}_title"
                                                value="{{ $setting->{'step_' . $i . '_title'} }}" placeholder="หัวข้อ"
                                                class="flex-1 px-4 py-2.5 bg-white border border-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block mb-2 text-xs font-bold text-gray-600">คำอธิบาย</label>
                                        <input type="text" name="step_{{ $i }}_desc"
                                            value="{{ $setting->{'step_' . $i . '_desc'} }}" placeholder="คำอธิบายสั้นๆ"
                                            class="w-full px-4 py-2.5 bg-white border border-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                    <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                        <button type="submit"
                            class="px-8 py-2.5 bg-[#2CB05C] hover:bg-green-600 text-white rounded-md text-sm font-bold transition-colors">
                            บันทึกการตั้งค่า
                        </button>
                    </div>
                </div>

            </div>
        </form>

    </div>

    @include('backend.components.sweetalert-messages')
    <script src="{{ asset('assets/js/backend/settings.js') }}"></script>
@endsection
