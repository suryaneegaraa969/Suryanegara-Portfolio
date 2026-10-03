{{-- resources/views/errors/500.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-neutral-50 flex items-center justify-center px-6 py-20">
    <div class="max-w-md w-full text-center animate-fade-in-up">

        {{-- Big 500 Number --}}
        <div class="mb-8">
            <span class="font-display text-[120px] md:text-[160px] text-neutral-950 leading-none tracking-tight select-none">500</span>
        </div>

        {{-- Title --}}
        <h1 class="font-display text-3xl md:text-4xl text-neutral-950 mb-4 leading-tight">
            SERVER ERROR
        </h1>

        {{-- Description --}}
        <p class="text-neutral-600 text-base md:text-lg leading-relaxed mb-10 max-w-sm mx-auto">
            Something went wrong on our end. We've been notified and are working to fix it.
            Please try again in a few moments.
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

            <button onclick="window.location.reload()"
                    class="inline-flex items-center gap-2 px-8 py-4 border border-neutral-950 text-neutral-950 text-xs tracked font-bold hover:bg-neutral-950 hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                TRY AGAIN
            </button>
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