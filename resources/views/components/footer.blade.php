{{-- resources/views/components/footer.blade.php --}}
@props(['profile'])

<footer class="bg-neutral-950 text-neutral-400 py-12">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
        <p class="text-xs tracked">&copy; {{ date('Y') }} {{ strtoupper($profile->name ?? 'AHMAD BARROQ SURYANEGARA') }}</p>
        <div class="flex gap-6 text-xs tracked">
            <a href="mailto:{{ $profile->email ?? '#' }}" class="hover:text-white transition-colors">{{ $profile->email ?? 'EMAIL' }}</a>
            <span class="text-neutral-700">/</span>
            <span>{{ $profile->phone ?? '' }}</span>
        </div>
    </div>
</footer>