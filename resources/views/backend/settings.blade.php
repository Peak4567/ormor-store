@extends('backend.layouts')
@section('title', 'ตั้งค่าเว็บไซต์')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <div class="container mx-auto px-4 w-full space-y-6">

        <form action="{{ route('backend.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">

                <div class="col-span-1 md:col-span-4 bg-white rounded-md border border-gray-100 p-6">
                    <div class="mb-6 flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-extrabold text-gray-800">ตั้งค่าเว็บไซต์</h2>
                            <p class="text-[13px] text-gray-400 mt-1 font-medium">จัดการข้อมูลทั่วไปและช่องทางการติดต่อ</p>
                        </div>
                        
                        {{-- สวิตช์ เปิด-ปิด เว็บไซต์ (โหมดปรับปรุง) --}}
                        <div class="flex flex-col items-end">
                            <label class="relative inline-flex items-center cursor-pointer mb-1">
                                <input type="hidden" name="maintenance_mode" value="0">
                                <input type="checkbox" name="maintenance_mode" value="1" class="sr-only peer" 
                                       {{ ($setting->maintenance_mode ?? 0) == 1 ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                            </label>
                            <span class="text-[10px] font-bold text-gray-500 peer-checked:text-green-500 uppercase tracking-wider">
                                โหมดปรับปรุงเว็บ
                            </span>
                        </div>
                    </div>

                    <h3 class="text-[14px] font-extrabold text-gray-800 mb-4 border-b border-gray-100 pb-2">ข้อมูลทั่วไป</h3>

                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-20 h-20 bg-gray-50/50 rounded-md flex items-center justify-center relative overflow-hidden group cursor-pointer border border-gray-100">

                            <img id="preview-logo"
                                src="{{ $setting->logo ? asset($setting->logo) : 'https://via.placeholder.com/150?text=Logo' }}"
                                alt="Logo" class="w-full h-full object-cover">

                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="fa-solid fa-camera text-white text-xl"></i>
                            </div>

                            <input type="file" name="logo" class="absolute inset-0 opacity-0 cursor-pointer"
                                accept="image/png, image/jpeg" onchange="previewImage(this, 'preview-logo')">

                        </div>
                        <div class="flex-1">
                            <h4 class="font-extrabold text-sm text-gray-800">โลโก้เว็บไซต์</h4>
                            <p class="text-[11px] text-gray-400 font-medium mt-0.5 leading-tight">แนะนำขนาด 512x512px ไฟล์ PNG</p>
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
                        ตั้งค่าประกาศ/โฆษณา (Modal)
                    </h3>

                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-20 h-20 bg-gray-50/50 rounded-md flex items-center justify-center relative overflow-hidden group cursor-pointer border border-gray-100">

                                <img id="preview-popup"
                                    src="{{ $setting->popup_image ? asset($setting->popup_image) : 'https://via.placeholder.com/150?text=Popup' }}"
                                    alt="Popup Image" class="w-full h-full object-cover">

                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <i class="fa-solid fa-camera text-white text-xl"></i>
                                </div>

                                <input type="file" name="popup_image" class="absolute inset-0 opacity-0 cursor-pointer"
                                    accept="image/png, image/jpeg" onchange="previewImage(this, 'preview-popup')">

                            </div>
                            <div class="flex-1">
                                <h4 class="font-extrabold text-sm text-gray-800">รูปภาพประกาศ</h4>
                                <p class="text-[11px] text-gray-400 font-medium mt-0.5 leading-tight">แนะนำแนวนอนหรือจัตุรัส</p>
                            </div>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-extrabold text-gray-800">หัวข้อประกาศ</label>
                            <input type="text" name="popup_title"
                                value="{{ old('popup_title', $setting->popup_title ?? 'ยินดีต้อนรับสู่ Ormor Topup Coins') }}"
                                placeholder="หัวข้อประกาศ"
                                class="w-full px-4 py-2.5 bg-white border border-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-extrabold text-gray-800">รายละเอียดประกาศ</label>
                            <textarea name="popup_desc" rows="3" placeholder="ข้อความรายละเอียดในประกาศ..."
                                class="w-full px-4 py-2.5 bg-white border border-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-sm text-gray-600 placeholder-gray-400">{{ old('popup_desc', $setting->popup_desc ?? 'ระบบจองคิวเติม Coinsline (เหรียญไลน์) เปิดให้บริการเต็มรูปแบบแล้ว') }}</textarea>
                        </div>
                    </div>

                    <h3 class="text-[14px] font-extrabold text-gray-800 mt-8 mb-4 border-b border-gray-100 pb-2">ช่องทางติดต่อ</h3>

                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-20 h-20 bg-gray-50/50 rounded-md flex items-center justify-center relative overflow-hidden group cursor-pointer border border-gray-100">
                            <img id="preview-qr"
                                src="{{ $setting->qr_code ? asset($setting->qr_code) : 'https://via.placeholder.com/150?text=QR' }}"
                                alt="QR" class="w-full h-full object-cover">

                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="fa-solid fa-camera text-white text-xl"></i>
                            </div>

                            <input type="file" name="qr_code" class="absolute inset-0 opacity-0 cursor-pointer"
                                accept="image/png, image/jpeg" onchange="previewImage(this, 'preview-qr')">
                        </div>
                        <div class="flex-1">
                            <h4 class="font-extrabold text-sm text-gray-800">QR เว็บไซต์</h4>
                            <p class="text-[11px] text-gray-400 font-medium mt-0.5 leading-tight">แนะนำขนาด 512x512px ไฟล์ PNG</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block mb-2 text-sm font-extrabold text-gray-800">Facebook</label>
                            <input type="text" name="facebook" value="{{ $setting->facebook }}"
                                placeholder="Facebook"
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
                        <p class="text-[13px] text-gray-400 mt-1 font-medium">ตั้งค่าข้อมูลขั้นตอนการใช้งานที่แสดงหน้าเว็บ</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-8 flex-1">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="bg-gray-50/30 p-4 rounded-md border border-gray-50">
                                <h3 class="text-sm font-extrabold text-gray-800 mb-4 flex items-center gap-2">
                                    <span class="w-6 h-6 flex items-center justify-center bg-blue-50 text-[#0054F0] rounded-md text-xs">{{ $i }}</span>
                                    ขั้นตอนที่ {{ $i }}
                                </h3>

                                <div class="space-y-4">
                                    <div>
                                        <label class="block mb-2 text-xs font-bold text-gray-600">ไอคอน & หัวข้อ</label>

                                        @php
                                            $shopIcons = [
                                                'fa-solid fa-store' => 'ร้านค้าใหญ่',
                                                'fa-solid fa-shop' => 'ร้านค้าเล็ก',
                                                'fa-solid fa-cart-shopping' => 'รถเข็น',
                                                'fa-solid fa-basket-shopping' => 'ตะกร้าสินค้า',
                                                'fa-solid fa-bag-shopping' => 'ถุงช้อปปิ้ง',
                                                'fa-solid fa-tags' => 'ป้ายราคา',
                                                'fa-solid fa-box' => 'กล่องพัสดุ',
                                                'fa-solid fa-box-open' => 'เปิดพัสดุ',
                                                'fa-solid fa-truck-fast' => 'ส่งด่วน',
                                                'fa-solid fa-wallet' => 'กระเป๋าเงิน',
                                                'fa-solid fa-credit-card' => 'บัตรเครดิต',
                                                'fa-solid fa-money-bill-wave' => 'เงินสด',
                                                'fa-solid fa-coins' => 'เหรียญ',
                                                'fa-solid fa-receipt' => 'ใบเสร็จ',
                                                'fa-solid fa-gift' => 'ของขวัญ',
                                                'fa-solid fa-star' => 'ดาว',
                                                'fa-solid fa-heart' => 'ชื่นชอบ',
                                                'fa-solid fa-percent' => 'ส่วนลด',
                                                'fa-solid fa-bullhorn' => 'ประกาศ',
                                                'fa-solid fa-award' => 'การันตี',
                                                'fa-solid fa-user' => 'ผู้ใช้',
                                            ];
                                            $currentIcon = $setting->{'step_' . $i . '_icon'} ?: 'fa-solid fa-store';
                                        @endphp

                                        <div class="flex items-center gap-2">
                                            <div class="relative">
                                                <input type="hidden" name="step_{{ $i }}_icon"
                                                    id="input_icon_{{ $i }}" value="{{ $currentIcon }}">

                                                <button type="button"
                                                    onclick="document.getElementById('icon_dropdown_{{ $i }}').classList.toggle('hidden')"
                                                    class="flex items-center justify-center w-[50px] h-[42px] bg-white border border-gray-200 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition-all text-gray-600">
                                                    <i id="display_icon_{{ $i }}"
                                                        class="{{ $currentIcon }} text-lg"></i>
                                                </button>

                                                <div id="icon_dropdown_{{ $i }}"
                                                    class="hidden absolute left-0 top-full mt-1 w-[260px] bg-white border border-gray-200 rounded-lg shadow-xl p-3 z-50">
                                                    <div class="flex justify-between items-center mb-2">
                                                        <span class="text-xs font-bold text-gray-500">เลือกไอคอน</span>
                                                        <button type="button"
                                                            onclick="document.getElementById('icon_dropdown_{{ $i }}').classList.add('hidden')"
                                                            class="text-gray-400 hover:text-red-500 text-xs">
                                                            <i class="fa-solid fa-times"></i> ปิด
                                                        </button>
                                                    </div>

                                                    <div class="grid grid-cols-5 gap-2">
                                                        @foreach ($shopIcons as $class => $label)
                                                            <button type="button" title="{{ $label }}"
                                                                onclick="
                                                                document.getElementById('input_icon_{{ $i }}').value = '{{ $class }}';
                                                                document.getElementById('display_icon_{{ $i }}').className = '{{ $class }} text-lg';
                                                                document.getElementById('icon_dropdown_{{ $i }}').classList.add('hidden');
                                                            "
                                                                class="flex items-center justify-center p-2 rounded-md border border-gray-100 text-gray-500 bg-gray-50 hover:bg-green-50 hover:text-green-600 hover:border-green-500 transition-all">
                                                                <i class="{{ $class }} text-base"></i>
                                                            </button>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

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