@extends('layouts.admin', [
    'title' => 'Dashboard',
    'headerTitle' => 'Dashboard',
    'headerDescription' => 'Overview of your portfolio statistics'
])

@section('content')
<div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
    <!-- Projects Card -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-medium text-gray-900">Projects</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $stats['projects_count'] }}</p>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Certifications Card -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-medium text-gray-900">Certifications</h3>
                <p class="text-3xl font-bold text-green-600">{{ $stats['certifications_count'] }}</p>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Messages Card -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-medium text-gray-900">Messages</h3>
                <p class="text-3xl font-bold text-purple-600">{{ $stats['messages_count'] }}</p>
                @if ($stats['unread_messages'] > 0)
                    <span class="ml-2 px-2 py-0.5 bg-red-100 text-red-800 text-xs font-semibold rounded">{{ $stats['unread_messages'] }} unread</span>
                @endif
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11l3 3m0 0l3-3m-3 3V8m0 13a4 4 0 010-8h.01M8 11a4 4 0 000-8h.01" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Profile Card -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-medium text-gray-900">Profile</h3>
                <p class="text-3xl font-bold text-indigo-600">Complete</p>
            </div>
            <div class="bg-indigo-100 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
        </div>
    </div>
</div>
@endsection