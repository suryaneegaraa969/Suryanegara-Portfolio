@extends('layouts.admin', [
    'title' => 'Edit Skill',
    'headerTitle' => 'Edit Skill',
    'headerDescription' => 'Update skill details'
])

@section('content')
@if($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-100 rounded-xl text-red-800">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white rounded-xl border border-gray-100 p-6 max-w-2xl">
    <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="name">Skill Name</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="name" type="text" name="name" value="{{ old('name', $skill->name) }}" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="level">Proficiency Level</label>
                <select class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        id="level" name="level" required>
                    <option value="">Select Level</option>
                    <option value="beginner" {{ old('level', $skill->level) == 'beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="intermediate" {{ old('level', $skill->level) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="advanced" {{ old('level', $skill->level) == 'advanced' ? 'selected' : '' }}>Advanced</option>
                    <option value="expert" {{ old('level', $skill->level) == 'expert' ? 'selected' : '' }}>Expert</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="category">Category</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="category" type="text" name="category" value="{{ old('category', $skill->category) }}" required placeholder="e.g. Hard Skill, Soft Skill">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="sort_order">Sort Order (optional, default 0)</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="sort_order" type="number" name="sort_order" min="0" value="{{ old('sort_order', $skill->sort_order) }}">
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
                <a href="{{ route('admin.skills.index') }}" class="px-6 py-3 rounded-xl bg-gray-100 text-gray-700 font-medium hover:bg-gray-200 transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition-colors">Update Skill</button>
            </div>
        </div>
    </form>
</div>
@endsection