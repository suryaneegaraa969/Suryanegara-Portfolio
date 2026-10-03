<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = ProfileData::first();
        return view('admin.profile.index', compact('profile'));
    }

    public function edit()
    {
        $profile = ProfileData::first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'short_bio' => 'required|string',
            'resume_url' => 'nullable|url',
            'profile_image' => 'nullable|image|max:2048',
            'background_image' => 'nullable|image|max:2048',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $profile = ProfileData::first();

        $data = $request->except(['profile_image', 'background_image']);

        if ($request->hasFile('profile_image')) {
            if ($profile->profile_image && Storage::disk('public')->exists($profile->profile_image)) {
                Storage::disk('public')->delete($profile->profile_image);
            }
            $path = $request->file('profile_image')->store('profile', 'public');
            $data['profile_image'] = $path;
        }

        if ($request->hasFile('background_image')) {
            if ($profile->background_image && Storage::disk('public')->exists($profile->background_image)) {
                Storage::disk('public')->delete($profile->background_image);
            }
            $path = $request->file('background_image')->store('background', 'public');
            $data['background_image'] = $path;
        }

        $profile->update($data);

        return redirect()->route('admin.profile.index')
            ->with('success', 'Profile updated successfully.');
    }
}