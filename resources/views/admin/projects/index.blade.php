@extends('layouts.admin', [
    'title' => 'Projects',
    'headerTitle' => 'Projects',
    'headerDescription' => 'Manage your portfolio projects'
])

@section('content')
<div class="flex items-center justify-between mb-6">
    <div></div>
    <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 text-white font-medium text-sm hover:bg-blue-700 transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Add New Project
    </a>
</div>

<div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-100">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Featured</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($projects as $project)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">{{ $project->title }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $project->slug }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($project->featured_image)
                                <img src="{{ Storage::url($project->featured_image) }}"
                                     alt="Featured"
                                     class="h-10 w-10 object-cover rounded-lg">
                            @else
                                <span class="px-3 py-1 inline-flex text-xs font-medium rounded-full bg-gray-100 text-gray-600">No Image</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.projects.edit', $project) }}"
                               class="text-blue-600 hover:text-blue-900 mr-4 font-medium">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-900 font-medium"
                                        onclick="return confirm('Are you sure you want to delete this project?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <p class="text-lg font-medium">No projects found</p>
                            <p class="text-sm text-gray-400 mt-1">Get started by creating your first project</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $projects->links() }}
</div>
@endsection