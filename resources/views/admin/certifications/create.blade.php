@extends('layouts.admin', [
    'title' => 'Create Certification',
    'headerTitle' => 'Create New Certification',
    'headerDescription' => 'Add a new certification to your portfolio'
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
    <form action="{{ route('admin.certifications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="title">Title</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="title" type="text" name="title" value="{{ old('title') }}" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="slug">Slug (URL-friendly)</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="slug" type="text" name="slug" value="{{ old('slug') }}" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="issuer">Issuer</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="issuer" type="text" name="issuer" value="{{ old('issuer') }}" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="certificate_number">Certificate Number (optional)</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="certificate_number" type="text" name="certificate_number" value="{{ old('certificate_number') }}">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="issued_date">Issued Date</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="issued_date" type="date" name="issued_date" value="{{ old('issued_date') }}">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="description">Description (short)</label>
                <textarea class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                          id="description" name="description" rows="3">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="full_description">Full Description (optional, for detail page)</label>
                <textarea class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                          id="full_description" name="full_description" rows="5">{{ old('full_description') }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="skills_covered">Skills Covered (comma-separated, optional)</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="skills_covered" type="text" name="skills_covered" value="{{ old('skills_covered') }}" placeholder="e.g. Python, Data Analysis, Tableau">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="duration">Duration (optional)</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="duration" type="text" name="duration" value="{{ old('duration') }}" placeholder="e.g. 3 months, 40 hours">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="credential_url">Credential URL (optional)</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="credential_url" type="url" name="credential_url" value="{{ old('credential_url') }}">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2" for="certificate_file">Certificate File (PDF, max 10MB)</label>
                <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                       id="certificate_file" type="file" name="certificate_file" accept="application/pdf">
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
                <a href="{{ route('admin.certifications.index') }}" class="px-6 py-3 rounded-xl bg-gray-100 text-gray-700 font-medium hover:bg-gray-200 transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 rounded-xl bg-green-600 text-white font-medium hover:bg-green-700 transition-colors">Create Certification</button>
            </div>
        </div>
    </form>
</div>
@endsection