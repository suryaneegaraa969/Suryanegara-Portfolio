<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin Panel' }} - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', system-ui, sans-serif; }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 min-h-screen flex">
    <!-- Sidebar -->
    <aside class="bg-white shadow-lg w-64 h-screen flex-shrink-0 border-r border-gray-100">
        <div class="p-6 border-b border-gray-100">
            <h1 class="text-xl font-bold text-gray-900">Admin Panel</h1>
        </div>
        <nav class="mt-6 px-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700 font-medium' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.profile.index') }}"
               class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-colors {{ request()->routeIs('admin.profile.*') ? 'bg-blue-50 text-blue-700 font-medium' : '' }}">
                Profile
            </a>
            <a href="{{ route('admin.projects.index') }}"
               class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-colors {{ request()->routeIs('admin.projects.*') ? 'bg-blue-50 text-blue-700 font-medium' : '' }}">
                Projects
            </a>
            <a href="{{ route('admin.certifications.index') }}"
               class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-colors {{ request()->routeIs('admin.certifications.*') ? 'bg-blue-50 text-blue-700 font-medium' : '' }}">
                Certifications
            </a>
            <a href="{{ route('admin.skills.index') }}"
               class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-colors {{ request()->routeIs('admin.skills.*') ? 'bg-blue-50 text-blue-700 font-medium' : '' }}">
                Skills
            </a>
            <a href="{{ route('admin.messages.index') }}"
               class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-colors {{ request()->routeIs('admin.messages.*') ? 'bg-blue-50 text-blue-700 font-medium' : '' }}">
                Messages
            </a>
            <form action="{{ route('admin.logout') }}" method="POST" class="mt-6 pt-4 border-t border-gray-100">
                @csrf
                <button type="submit"
                        class="w-full flex items-center px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-colors">
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 min-w-0">
        <!-- Header Bar -->
        <header class="sticky top-0 z-10 bg-white border-b border-gray-100 px-8 py-5">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">{{ $headerTitle ?? 'Dashboard' }}</h1>
                    @isset($headerDescription)
                        <p class="text-sm text-gray-500 mt-0.5">{{ $headerDescription }}</p>
                    @endisset
                </div>
                @isset($headerActions)
                    <div class="flex items-center gap-3">
                        {{ $headerActions }}
                    </div>
                @endisset
            </div>
        </header>

        <!-- Content Area -->
        <div class="p-8 md:p-10">
            <div class="max-w-7xl mx-auto">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-100 rounded-xl text-green-800 flex items-center gap-3">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 border border-red-100 rounded-xl text-red-800 flex items-center gap-3">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </main>
</body>
</html>