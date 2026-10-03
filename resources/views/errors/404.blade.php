{{-- resources/views/errors/404.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-neutral-50 flex items-center justify-center px-6 py-20">
    <div class="max-w-md w-full text-center animate-fade-in-up">

        {{-- Big 404 Number --}}
        <div class="mb-8">
            <span class="font-display text-[120px] md:text-[160px] text-neutral-950 leading-none tracking-tight select-none">404</span>
        </div>

        {{-- Title --}}
        <h1 class="font-display text-3xl md:text-4xl text-neutral-950 mb-4 leading-tight">
            PAGE NOT FOUND
        </h1>

        {{-- Description --}}
        <p class="text-neutral-600 text-base md:text-lg leading-relaxed mb-10 max-w-sm mx-auto">
            The page you're looking for doesn't exist or has been moved.
            It might be a typo in the URL or the page was removed.
        </p>

        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 px-8 py-4 bg-neutral-950 text-white text-xs tracked font-bold hover:bg-accent hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                BACK TO HOME
            </a>

            <a href="{{ route('portfolio.show', $projects->first()->slug ?? '#') }}"
               class="inline-flex items-center gap-2 px-8 py-4 border border-neutral-950 text-neutral-950 text-xs tracked font-bold hover:bg-neutral-950 hover:text-white transition-colors">
                VIEW LATEST PROJECT
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        {{-- Decorative Element --}}
        <div class="mt-16">
            <div class="w-24 h-px bg-neutral-300 mx-auto mb-4"></div>
            <p class="text-xs text-neutral-400 tracking-wide">
                SURYANEGARA PORTFOLIO
            </p>
        </div>

    </div>
</div>
@endsection