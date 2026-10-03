@extends('layouts.admin', [
    'title' => 'Edit Project',
    'headerTitle' => 'Edit Project',
    'headerDescription' => 'Update project details'
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

<div class="bg-white rounded-xl border border-gray-100 p-6">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="title">Title</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="title" type="text" name="title" value="{{ old('title', $project->title) }}" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="slug">Slug (URL-friendly)</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="slug" type="text" name="slug" value="{{ old('slug', $project->slug) }}" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="description">Description</label>
                <textarea class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                          id="description" name="description" rows="5">{{ old('description', $project->description) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="technologies">Technologies (comma separated)</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="technologies" type="text" name="technologies" value="{{ old('technologies', $project->technologies) }}">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="project_url">Project URL</label>
                    <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                           id="project_url" type="url" name="project_url" value="{{ old('project_url', $project->project_url) }}">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="github_url">GitHub URL</label>
                    <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                           id="github_url" type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="start_date">Start Date</label>
                    <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                           id="start_date" type="date" name="start_date" value="{{ old('start_date', $project->start_date) }}">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="end_date">End Date</label>
                    <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                           id="end_date" type="date" name="end_date" value="{{ old('end_date', $project->end_date) }}">
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="featured_image">Featured Image</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="featured_image" type="file" name="featured_image" accept="image/*">
                @if($project->featured_image)
                    <p class="mt-2 text-sm text-gray-500">
                        Current: <img src="{{ Storage::url($project->featured_image) }}" alt="Preview" class="h-10 w-10 inline-block rounded-lg">
                    </p>
                @endif
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="images">Gallery Images (additional)</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="images" type="file" name="images[]" accept="image/*" multiple>
                @if($project->images->isNotEmpty())
                    <p class="mt-2 text-sm text-gray-500">Currently {{ $project->images->count() }} gallery image(s).</p>
                @endif
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
                <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 rounded-xl bg-gray-100 text-gray-700 font-medium hover:bg-gray-200 transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors">Update Project</button>
            </div>
        </div>
    </form>
</div>
@endsection