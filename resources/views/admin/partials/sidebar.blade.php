<aside class="bg-white shadow-lg w-64 h-screen">
    <div class="p-6 border-b">
        <h1 class="text-xl font-bold text-gray-800">Admin Panel</h1>
    </div>
    <nav class="mt-6 space-y-2">
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900 rounded-lg transition-colors">
            Dashboard
        </a>
        <a href="{{ route('admin.profile.index') }}"
           class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900 rounded-lg transition-colors">
            Profile
        </a>
        <a href="{{ route('admin.projects.index') }}"
           class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900 rounded-lg transition-colors">
            Projects
        </a>
        <a href="{{ route('admin.certifications.index') }}"
           class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900 rounded-lg transition-colors">
            Certifications
        </a>
        <a href="{{ route('admin.skills.index') }}"
           class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900 rounded-lg transition-colors">
            Skills
        </a>
        <a href="{{ route('admin.messages.index') }}"
           class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900 rounded-lg transition-colors">
            Messages
        </a>
        <form action="{{ route('admin.logout') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit"
                    class="w-full flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900 rounded-lg transition-colors">
                Logout
            </button>
        </form>
    </nav>
</aside>