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
        try {
            $setting = Setting::first();
            if (!$setting) {
                $setting = new Setting();
            }

            if ($request->hasFile('logo')) {
                // 1. ลบไฟล์รูปเก่าทิ้ง (ถ้ามี)
                if ($setting->logo && File::exists(public_path($setting->logo))) {
                    File::delete(public_path($setting->logo));
                }

                $logoFile = $request->file('logo');
                $logoName = time() . '_logo.' . $logoFile->getClientOriginalExtension();

                $logoFile->move(public_path('assets/image/upload'), $logoName);

                $setting->logo = 'assets/image/upload/' . $logoName;
            }

            if ($request->hasFile('qr_code')) {
                if ($setting->qr_code && File::exists(public_path($setting->qr_code))) {
                    File::delete(public_path($setting->qr_code));
                }

                $qrFile = $request->file('qr_code');
                $qrName = time() . '_qr.' . $qrFile->getClientOriginalExtension();

                $qrFile->move(public_path('assets/image/upload'), $qrName);

                $setting->qr_code = 'assets/image/upload/' . $qrName;
            }
            $setting->site_name = $request->site_name;
            $setting->description = $request->description;
            $setting->website_url = $request->website_url;
            $setting->warning_text = $request->warning_text;
            $setting->facebook = $request->facebook;
            $setting->line = $request->line;

            for ($i = 1; $i <= 4; $i++) {
                $setting->{"step_{$i}_icon"} = $request->{"step_{$i}_icon"};
                $setting->{"step_{$i}_title"} = $request->{"step_{$i}_title"};
                $setting->{"step_{$i}_desc"} = $request->{"step_{$i}_desc"};
            }

            $setting->save();

            return redirect()->back()->with('success', 'บันทึกการตั้งค่าเว็บไซต์เรียบร้อยแล้ว');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด: ' . $e->getMessage());
        }
    }
}
