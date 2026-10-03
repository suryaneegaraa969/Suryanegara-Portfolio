{{-- resources/views/components/portfolio-card.blade.php --}}
@props(['project'])

<a href="{{ route('portfolio.show', $project->slug) }}" class="group block">
    <div class="relative overflow-hidden bg-neutral-100 aspect-[4/3]">
        <img src="{{ asset($project->image) }}" alt="{{ $project->title }}"
             class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500">
        <div class="absolute top-3 right-3 w-8 h-8 bg-white/90 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-neutral-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </div>
    </div>
    <h3 class="mt-4 font-semibold text-sm text-neutral-900 group-hover:text-accent transition-colors leading-snug">
        {{ $project->title }}
    </h3>
    <p class="text-xs text-neutral-500 mt-1 line-clamp-2">{{ $project->description }}</p>
</a>