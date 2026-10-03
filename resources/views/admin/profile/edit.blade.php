@extends('layouts.admin', [
    'title' => 'Edit Profile',
    'headerTitle' => 'Edit Profile',
    'headerDescription' => 'Update your profile information'
])

@section('content')
@if ($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-100 rounded-xl text-red-800">
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white rounded-xl border border-gray-100 p-6">
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <!-- Profile Image -->
            <div>
                <label for="profile_image" class="block text-gray-700 font-medium mb-2">Profile Image</label>
                <div class="flex items-center space-x-4">
                    @if ($profile->profile_image && Storage::disk('public')->exists($profile->profile_image))
                        <img src="{{ Storage::disk('public')->url($profile->profile_image) }}"
                             alt="Current Profile Image"
                             class="w-16 h-16 rounded-full object-cover border-2 border-gray-200">
                    @else
                        <img src="{{ asset('images/profile.jpg') }}"
                             alt="Default Profile Image"
                             class="w-16 h-16 rounded-full object-cover border-2 border-gray-200">
                    @endif
                    <div>
                        <p class="text-sm text-gray-500">Current Image</p>
                        <input type="file" name="profile_image" id="profile_image"
                               accept="image/*" class="block w-full text-sm text-gray-500 mt-1">
                        <p class="text-xs text-gray-400 mt-1">Max 2MB</p>
                    </div>
                </div>
            </div>

            <!-- Background Image -->
            <div>
                <label for="background_image" class="block text-gray-700 font-medium mb-2">Background Image</label>
                <div class="flex items-center space-x-4">
                    @if ($profile->background_image && Storage::disk('public')->exists($profile->background_image))
                        <img src="{{ Storage::disk('public')->url($profile->background_image) }}"
                             alt="Current Background Image"
                             class="w-16 h-16 rounded object-cover border-2 border-gray-200">
                    @else
                        <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                            <span class="text-xs text-gray-500">No Image</span>
                        </div>
                    @endif
                    <div>
                        <p class="text-sm text-gray-500">Current Image</p>
                        <input type="file" name="background_image" id="background_image"
                               accept="image/*" class="block w-full text-sm text-gray-500 mt-1">
                        <p class="text-xs text-gray-400 mt-1">Max 2MB</p>
                    </div>
                </div>
            </div>

            <!-- Text Fields -->
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                    <input type="text" name="name" id="name"
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                           value="{{ old('name', $profile->name ?? '') }}" required>
                </div>

                <div>
                    <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                    <input type="text" name="title" id="title"
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                           value="{{ old('title', $profile->title ?? '') }}" required>
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" id="email"
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                           value="{{ old('email', $profile->email ?? '') }}" required>
                </div>

                <div>
                    <label for="phone" class="block text-gray-700 font-medium mb-2">Phone</label>
                    <input type="tel" name="phone" id="phone"
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                           value="{{ old('phone', $profile->phone ?? '') }}">
                </div>
            </div>

            <div>
                <label for="short_bio" class="block text-gray-700 font-medium mb-2">Short Bio</label>
                <textarea name="short_bio" id="short_bio" rows="4"
                          class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                          required>{{ old('short_bio', $profile->short_bio ?? '') }}</textarea>
            </div>

            <div>
                <label for="resume_url" class="block text-gray-700 font-medium mb-2">Resume URL (optional)</label>
                <input type="url" name="resume_url" id="resume_url"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       value="{{ old('resume_url', $profile->resume_url ?? '') }}">
            </div>
        </div>

        <div class="pt-6 border-t border-gray-100 flex justify-end gap-3">
            <a href="{{ route('admin.profile.index') }}"
               class="px-6 py-3 rounded-xl bg-gray-100 text-gray-700 font-medium hover:bg-gray-200 transition-colors focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                Cancel
            </a>
            <button type="submit"
                    class="px-6 py-3 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Update Profile
            </button>
        </div>
    </form>
</div>
@endsection