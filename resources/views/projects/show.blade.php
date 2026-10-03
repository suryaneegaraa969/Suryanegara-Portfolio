{{-- resources/views/projects/show.blade.php --}}
@extends('layouts.app')

@section('content')

{{-- ============ HEADER BAND ============ --}}
<section class="bg-[#f0efec] pt-32 pb-14">
    <div class="max-w-5xl mx-auto px-6 animate-fade-in-up">
        <p class="text-xs tracked font-semibold text-neutral-500 mb-4">
            {{ $project->project_type ?? 'PROJECT' }}
        </p>
        <h1 class="font-display text-4xl md:text-6xl text-neutral-950 leading-[1.05] mb-8">
            {{ strtoupper($project->title) }}
        </h1>

        <div class="flex flex-wrap gap-x-10 gap-y-3 text-xs tracked font-semibold text-neutral-600 border-t border-neutral-300 pt-6">
            @if($project->role)
                <div>
                    <span class="block text-neutral-400 mb-1">ROLE</span>
                    {{ strtoupper($project->role) }}
                </div>
            @endif
            @if($project->duration)
                <div>
                    <span class="block text-neutral-400 mb-1">DURATION</span>
                    {{ strtoupper($project->duration) }}
                </div>
            @endif
            @if($project->tools_used)
                <div>
                    <span class="block text-neutral-400 mb-1">TOOLS</span>
                    {{ strtoupper(implode(' / ', $project->toolsArray())) }}
                </div>
            @endif
        </div>
    </div>
</section>

{{-- ============ IMAGE SLIDER — FULL BLEED ============ --}}
@php
    $images = $project->images->isNotEmpty()
        ? $project->images
        : collect([(object)['image_path' => $project->image, 'caption' => $project->title]]);
@endphp

<section class="bg-neutral-950">
    <div x-data="{
            current: 0,
            total: {{ $images->count() }},
            next() { this.current = (this.current + 1) % this.total },
            prev() { this.current = (this.current - 1 + this.total) % this.total }
         }"
         class="relative max-w-6xl mx-auto animate-fade-in-up" style="animation-delay: .1s;">

        <div class="relative h-80 md:h-[32rem]">
            @foreach($images as $index => $img)
                <div x-show="current === {{ $index }}"
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 scale-105"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="absolute inset-0">
                    <img src="{{ asset($img->image_path) }}" alt="{{ $img->caption ?? $project->title }}"
                         class="w-full h-full object-contain"
                         loading="{{ $index === 0 ? 'eager' : 'lazy' }}">
                </div>
            @endforeach
        </div>

        <div class="flex items-center justify-between px-6 py-5 border-t border-neutral-800">
            <span class="text-xs tracked text-neutral-500 font-semibold">
                <span x-text="(current + 1).toString().padStart(2, '0')"></span> / {{ str_pad($images->count(), 2, '0', STR_PAD_LEFT) }}
            </span>

            <span class="text-xs text-neutral-400 text-center flex-1 px-4">
                @foreach($images as $index => $img)
                    <span x-show="current === {{ $index }}" x-cloak>{{ $img->caption ?? '' }}</span>
                @endforeach
            </span>

            @if($images->count() > 1)
            <div class="flex gap-2 shrink-0">
                <button @click="prev()" class="w-9 h-9 border border-neutral-700 text-white flex items-center justify-center hover:bg-white hover:text-neutral-950 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="next()" class="w-9 h-9 border border-neutral-700 text-white flex items-center justify-center hover:bg-white hover:text-neutral-950 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
            @endif
        </div>

        {{-- Thumbnail strip --}}
        @if($images->count() > 1)
        <div class="flex gap-2 px-6 pb-6 overflow-x-auto">
            @foreach($images as $index => $img)
                <button @click="current = {{ $index }}"
                        class="shrink-0 w-20 h-14 overflow-hidden border-2 transition-colors"
                        :class="current === {{ $index }} ? 'border-white' : 'border-neutral-800 opacity-50 hover:opacity-80'">
                    <img src="{{ asset($img->image_path) }}" class="w-full h-full object-cover grayscale" loading="lazy">
                </button>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- ============ DESCRIPTION ============ --}}
<section class="bg-white py-20">
    <div class="max-w-3xl mx-auto px-6 animate-fade-in-up" style="animation-delay: .15s;">
        <p class="text-xs tracked font-semibold text-accent mb-6">THE PROJECT</p>
        @foreach(explode("\n\n", $project->full_description ?? $project->description) as $paragraph)
            <p class="text-neutral-700 leading-relaxed mb-5 text-[15px]">{{ $paragraph }}</p>
        @endforeach

        @if($project->link && $project->link !== '#')
        <a href="{{ $project->link }}" target="_blank"
           class="inline-flex items-center gap-2 mt-4 bg-neutral-950 text-white text-xs tracked font-semibold px-6 py-3.5 hover:bg-accent transition-colors">
            VIEW LIVE DASHBOARD
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
        @endif
    </div>
</section>

{{-- ============ MORE PROJECTS — DARK BAND ============ --}}
@if($otherProjects->isNotEmpty())
<section class="bg-neutral-950 py-20">
    <div class="max-w-6xl mx-auto px-6">
        <p class="text-xs tracked font-semibold text-neutral-500 mb-3 animate-fade-in-up">KEEP EXPLORING</p>
        <h2 class="font-display text-3xl text-white mb-12 animate-fade-in-up" style="animation-delay: .05s;">MORE PROJECTS</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($otherProjects as $other)
                <a href="{{ route('portfolio.show', $other->slug) }}" class="group block animate-fade-in-up">
                    <div class="relative overflow-hidden bg-neutral-900 aspect-[4/3]">
    <img src="{{ asset($other->image) }}" alt="{{ $other->title }}"
         class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500"
         loading="lazy">
</div>
                    <h3 class="mt-4 font-semibold text-sm text-white group-hover:text-accent transition-colors leading-snug">
                        {{ $other->title }}
                    </h3>
                    <span class="text-xs tracked font-semibold text-neutral-500 mt-1 inline-block group-hover:text-accent transition-colors">
                        VIEW PROJECT →
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection