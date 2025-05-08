<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Social;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('dashboard.profile.edit', [
            'user' => $request->user(),
            'socials' => Social::first()
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->route('profile.edit')->with('success', 'Password updated successfully.');
    }

    public function checkOldPassword(Request $request)
    {
        $user = Auth::user();

        if (!$request->old_password) {
            return response()->json(['valid' => false]);
        }

        return response()->json([
            'valid' => Hash::check($request->old_password, $user->password)
        ]);
    }


    public function updateSocials(Request $request)
    {
        $request->validate([
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url'
        ]);

        $social = Social::first();

        if ($social) {
            $social->update($request->only(['facebook', 'instagram', 'linkedin', 'twitter','youtube']));
        } else {
            Social::create($request->only(['facebook', 'instagram', 'linkedin', 'twitter', 'youtube']));
        }

        return back()->with('success', 'Social links updated successfully.');
    }

}
