<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first() ?? new Setting();

        return view('backend.settings', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'popup_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'qr_code' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $setting = Setting::first() ?? new Setting();
        $data = $request->except(['_token', 'logo', 'popup_image', 'qr_code']);

        $data['maintenance_mode'] = $request->input('maintenance_mode', 0);

        $uploadPath = public_path('assets/image/upload');
        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true, true);
        }

        if ($request->hasFile('logo')) {
            if ($setting->logo && File::exists(public_path($setting->logo))) {
                File::delete(public_path($setting->logo));
            }
            $fileName = time() . '_logo.' . $request->logo->extension();
            $request->logo->move($uploadPath, $fileName);
            $data['logo'] = 'assets/image/upload/' . $fileName;
        }

        if ($request->hasFile('popup_image')) {
            if ($setting->popup_image && File::exists(public_path($setting->popup_image))) {
                File::delete(public_path($setting->popup_image));
            }
            $fileName = time() . '_popup.' . $request->popup_image->extension();
            $request->popup_image->move($uploadPath, $fileName);
            $data['popup_image'] = 'assets/image/upload/' . $fileName;
        }

        if ($request->hasFile('qr_code')) {
            if ($setting->qr_code && File::exists(public_path($setting->qr_code))) {
                File::delete(public_path($setting->qr_code));
            }
            $fileName = time() . '_qr.' . $request->qr_code->extension();
            $request->qr_code->move($uploadPath, $fileName);
            $data['qr_code'] = 'assets/image/upload/' . $fileName;
        }

        if ($setting->exists) {
            $setting->update($data);
        } else {
            Setting::create($data);
        }

        return redirect()->back()->with('success', 'บันทึกการตั้งค่าเว็บไซต์เรียบร้อยแล้ว!');
    }
}
