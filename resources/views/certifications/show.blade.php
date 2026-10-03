{{-- resources/views/certifications/show.blade.php --}}
@extends('layouts.app')

@section('content')

{{-- ============ HEADER BAND ============ --}}
<section class="bg-[#f0efec] pt-32 pb-14">
    <div class="max-w-5xl mx-auto px-6 animate-fade-in-up">
        <p class="text-xs tracked font-semibold text-accent mb-4">CERTIFICATION</p>
        <h1 class="font-display text-3xl md:text-5xl text-neutral-950 leading-[1.1] mb-8">
            {{ strtoupper($certification->title) }}
        </h1>

        <div class="flex flex-wrap gap-x-10 gap-y-3 text-xs tracked font-semibold text-neutral-600 border-t border-neutral-300 pt-6">
            <div>
                <span class="block text-neutral-400 mb-1">ISSUER</span>
                {{ strtoupper($certification->issuer) }}
            </div>
            <div>
                <span class="block text-neutral-400 mb-1">CERTIFICATE NO.</span>
                {{ $certification->certificate_number }}
            </div>
            <div>
                <span class="block text-neutral-400 mb-1">ISSUED</span>
                {{ strtoupper($certification->issued_date) }}
            </div>
            @if($certification->duration)
            <div>
                <span class="block text-neutral-400 mb-1">DURATION</span>
                {{ strtoupper($certification->duration) }}
            </div>
            @endif
        </div>
    </div>
</section>

{{-- ============ PDF PREVIEW — FULL BLEED ============ --}}
@if($certification->certificate_file)
<section class="bg-neutral-950 py-10">
    <div class="max-w-4xl mx-auto px-6 animate-fade-in-up" style="animation-delay: .1s;">
        <div class="bg-white shadow-2xl">
            @php
    $filename = basename($certification->certificate_file);
@endphp
<iframe src="{{ route('certificate.view', $filename) }}"
        class="w-full h-[70vh] md:h-[85vh] border-0"
        title="{{ $certification->title }}">
</iframe>
        </div>

        {{-- Download button --}}
        <div class="flex justify-center mt-8">
            <a href="{{ asset($certification->certificate_file) }}" download
               class="inline-flex items-center gap-2 bg-white text-neutral-950 text-xs tracked font-bold px-8 py-4 hover:bg-accent hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                DOWNLOAD CERTIFICATE
            </a>
        </div>
    </div>
</section>
@else
<section class="bg-neutral-950 py-10">
    <div class="max-w-4xl mx-auto px-6 animate-fade-in-up" style="animation-delay: .1s;">
        <div class="bg-white shadow-2xl p-12 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto text-neutral-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <p class="text-neutral-600 text-lg">Certificate file not available</p>
            <p class="text-neutral-400 text-sm mt-1">The certificate PDF has not been uploaded yet.</p>
        </div>
    </div>
</section>
@endif

{{-- ============ DESCRIPTION ============ --}}
<section class="bg-white py-20">
    <div class="max-w-3xl mx-auto px-6 animate-fade-in-up" style="animation-delay: .15s;">
        <p class="text-xs tracked font-semibold text-accent mb-6">ABOUT THIS CERTIFICATION</p>
        @foreach(explode("\n\n", $certification->full_description ?? $certification->description) as $paragraph)
            <p class="text-neutral-700 leading-relaxed mb-5 text-[15px]">{{ $paragraph }}</p>
        @endforeach

        @if($certification->skillsArray())
        <div class="mt-10 pt-8 border-t border-neutral-200">
            <p class="text-xs tracked font-semibold text-neutral-500 mb-4">SKILLS COVERED</p>
            <div class="flex flex-wrap gap-2">
                @foreach($certification->skillsArray() as $skill)
                    <span class="px-3 py-1.5 bg-neutral-100 text-neutral-700 text-xs font-medium">{{ $skill }}</span>
                @endforeach
            </div>
        </div>
        @endif

        @if($certification->credential_url)
        <a href="{{ $certification->credential_url }}" target="_blank"
           class="inline-flex items-center gap-2 mt-8 text-xs tracked font-semibold text-neutral-950 hover:text-accent transition-colors">
            VERIFY CREDENTIAL ONLINE →
        </a>
        @endif
    </div>
</section>

{{-- ============ MORE CERTIFICATIONS — DARK BAND ============ --}}
@if($otherCertifications->isNotEmpty())
<section class="bg-neutral-950 py-20">
    <div class="max-w-6xl mx-auto px-6">
        <p class="text-xs tracked font-semibold text-neutral-500 mb-3 animate-fade-in-up">KEEP EXPLORING</p>
        <h2 class="font-display text-3xl text-white mb-12 animate-fade-in-up" style="animation-delay: .05s;">MORE CERTIFICATIONS</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-neutral-800">
            @foreach($otherCertifications as $other)
                <a href="{{ route('certification.show', $other->slug) }}" class="group block bg-neutral-950 p-7 hover:bg-neutral-900 transition-colors">
                    <span class="text-xs tracked font-semibold text-accent">{{ $other->issued_date }}</span>
                    <h3 class="font-semibold text-white mt-2 mb-2 leading-snug group-hover:text-accent transition-colors">{{ $other->title }}</h3>
                    <p class="text-xs text-neutral-500">{{ $other->issuer }}</p>
                    <span class="text-xs tracked font-semibold text-neutral-400 mt-4 inline-block group-hover:text-white transition-colors">
                        VIEW DETAILS →
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection