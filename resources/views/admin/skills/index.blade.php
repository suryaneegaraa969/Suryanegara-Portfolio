@extends('layouts.admin', [
    'title' => 'Skills',
    'headerTitle' => 'Skills',
    'headerDescription' => 'Manage your skills and expertise'
])

@section('content')
<div class="flex items-center justify-between mb-6">
    <div></div>
    <a href="{{ route('admin.skills.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-indigo-600 text-white font-medium text-sm hover:bg-indigo-700 transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Add New Skill
    </a>
</div>

<div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-100">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Level</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Sort Order</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($skills as $skill)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">{{ $skill->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                @if($skill->level === 'expert')
                                    bg-purple-100 text-purple-800
                                @elseif($skill->level === 'advanced')
                                    bg-blue-100 text-blue-800
                                @elseif($skill->level === 'intermediate')
                                    bg-yellow-100 text-yellow-800
                                @else
                                    bg-gray-100 text-gray-800
                                @endif
                                capitalize">
                                {{ $skill->level }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 capitalize">{{ $skill->category }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $skill->sort_order ?? 0 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.skills.edit', $skill) }}"
                               class="text-blue-600 hover:text-blue-900 mr-4 font-medium">Edit</a>
                            <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-900 font-medium"
                                        onclick="return confirm('Are you sure you want to delete this skill?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <p class="text-lg font-medium">No skills found</p>
                            <p class="text-sm text-gray-400 mt-1">Get started by adding your first skill</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection