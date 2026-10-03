@extends('layouts.admin', [
    'title' => 'Profile Management',
    'headerTitle' => 'Profile Management',
    'headerDescription' => 'View and manage your profile information'
])

@section('content')
@if ($profile)
<div class="space-y-6">
    <!-- Profile Image Preview -->
    <div class="bg-white rounded-xl border border-gray-100 p-6 text-center">
        @if ($profile->profile_image && Storage::disk('public')->exists($profile->profile_image))
            <img src="{{ Storage::disk('public')->url($profile->profile_image) }}"
                 alt="Profile Image"
                 class="w-24 h-24 rounded-full mx-auto mb-4 object-cover border-2 border-gray-200">
        @else
            <img src="{{ asset('images/profile.jpg') }}"
                 alt="Default Profile Image"
                 class="w-24 h-24 rounded-full mx-auto mb-4 object-cover border-2 border-gray-200">
        @endif
        <p class="text-sm text-gray-500">Profile Image</p>
    </div>

    <!-- Profile Info -->
    <div class="bg-white rounded-xl border border-gray-100 p-6">
        <div class="space-y-4">
            <div class="flex justify-between py-3 border-b border-gray-100">
                <span class="text-gray-500 font-medium">Name</span>
                <span class="text-gray-900 font-semibold">{{ $profile->name ?? 'Not set' }}</span>
            </div>
            <div class="flex justify-between py-3 border-b border-gray-100">
                <span class="text-gray-500 font-medium">Title</span>
                <span class="text-gray-900 font-semibold">{{ $profile->title ?? 'Not set' }}</span>
            </div>
            <div class="flex justify-between py-3 border-b border-gray-100">
                <span class="text-gray-500 font-medium">Email</span>
                <span class="text-gray-900 font-semibold">{{ $profile->email ?? 'Not set' }}</span>
            </div>
            <div class="flex justify-between py-3 border-b border-gray-100">
                <span class="text-gray-500 font-medium">Phone</span>
                <span class="text-gray-900 font-semibold">{{ $profile->phone ?? 'Not set' }}</span>
            </div>
            <div class="flex justify-between py-3 border-b border-gray-100">
                <span class="text-gray-500 font-medium">Short Bio</span>
                <span class="text-gray-900 font-semibold max-w-md">{{ $profile->short_bio ?? 'Not set' }}</span>
            </div>
            @if ($profile->resume_url)
            <div class="flex justify-between py-3">
                <span class="text-gray-500 font-medium">Resume URL</span>
                <a href="{{ $profile->resume_url }}" target="_blank" class="text-blue-600 hover:underline text-sm">{{ $profile->resume_url }}</a>
            </div>
            @endif
        </div>
    </div>

    <div class="flex justify-end">
        <a href="{{ route('admin.profile.edit') }}"
           class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit Profile
        </a>
    </div>
</div>
@else
<div class="bg-white rounded-xl border border-gray-100 p-12 text-center">
    <p class="text-gray-500 mb-6">No profile data found. Please create a profile first.</p>
    <a href="{{ route('admin.profile.edit') }}"
       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Create Profile
    </a>
</div>
@endif
@endsection