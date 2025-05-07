<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index(){
        $settings = Setting::first();
        return view('dashboard.settings.settings', compact('settings'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'website_name'=> 'required|string|max:255',
            'dashboard_logo'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'site_logo'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:png,ico|max:512',
        ]);

        $settings = Setting::firstOrCreate([]);
        $settings->website_name = $request->website_name;

        if ($request->hasFile('dashboard_logo')) {
            if ($settings->dashboard_logo && Storage::disk('public')->exists($settings->dashboard_logo)) {
                Storage::disk('public')->delete($settings->dashboard_logo);
            }

            $file = $request->file('dashboard_logo');

            $randomNumber = rand(1000, 9999);
            $extension = $file->getClientOriginalExtension();
            $fileName = 'logo_' . $randomNumber . '.' . $extension;

            $imagePath = $file->storeAs('dashboard_logo', $fileName, 'public');

            $settings->dashboard_logo = $imagePath;
        }

        if ($request->hasFile('site_logo')) {
            if ($settings->site_logo && Storage::disk('public')->exists($settings->site_logo)) {
                Storage::disk('public')->delete($settings->site_logo);
            }

            $file = $request->file('site_logo');
            $randomNumber = rand(1000, 9999);
            $extension = $file->getClientOriginalExtension();
            $fileName = 'site_logo_' . $randomNumber . '.' . $extension;

            $imagePath = $file->storeAs('site_logo', $fileName, 'public');
            $settings->site_logo = $imagePath;
        }

        if ($request->hasFile('favicon')) {
            if ($settings->favicon && Storage::disk('public')->exists($settings->favicon)) {
                Storage::disk('public')->delete($settings->favicon);
            }

            $file = $request->file('favicon');
            $randomNumber = rand(1000, 9999);
            $extension = $file->getClientOriginalExtension();
            $fileName = 'favicon_' . $randomNumber . '.' . $extension;

            $imagePath = $file->storeAs('favicon', $fileName, 'public');
            $settings->favicon = $imagePath;
        }

        $settings->save();

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}

