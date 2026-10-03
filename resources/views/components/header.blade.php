{{-- resources/views/components/header.blade.php --}}
@props(['profile'])

<header class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-neutral-200">
    <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">
        <nav class="hidden md:flex items-center gap-6 text-xs tracked font-semibold text-neutral-700">
            <a href="{{ route('home') }}#about" class="hover:text-accent transition-colors">ABOUT</a>
            <a href="{{ route('home') }}#portfolio" class="hover:text-accent transition-colors">PORTFOLIO</a>
            <a href="{{ route('home') }}#experience" class="hover:text-accent transition-colors">EXPERIENCE</a>
        </nav>

        {{-- [UPDATE] Header diubah menjadi Suryanegara --}}
        <a href="{{ route('home') }}" class="font-display text-xl md:text-2xl text-neutral-900 tracked whitespace-nowrap">
            SURYANEGARA
        </a>

        <div class="hidden md:flex items-center gap-6 text-xs tracked font-semibold text-neutral-700">
            <a href="{{ route('home') }}#skills" class="hover:text-accent transition-colors">SKILLS</a>
            <a href="{{ route('home') }}#certifications" class="hover:text-accent transition-colors">CERTS</a>
            <a href="{{ asset($profile->resume_url ?? '#') }}" target="_blank" class="hover:text-accent transition-colors">RESUME</a>
            <a href="{{ route('home') }}#contact" class="bg-neutral-900 text-white px-5 py-2.5 hover:bg-accent transition-colors">CONTACT</a>
        </div>

        <button id="mobile-menu-btn" class="md:hidden text-neutral-900" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-neutral-100 px-6 py-4 space-y-4 text-xs tracked font-semibold text-neutral-800">
        <a href="{{ route('home') }}#about" class="block" onclick="document.getElementById('mobile-menu').classList.add('hidden')">ABOUT</a>
        <a href="{{ route('home') }}#portfolio" class="block" onclick="document.getElementById('mobile-menu').classList.add('hidden')">PORTFOLIO</a>
        <a href="{{ route('home') }}#experience" class="block" onclick="document.getElementById('mobile-menu').classList.add('hidden')">EXPERIENCE</a>
        <a href="{{ route('home') }}#skills" class="block" onclick="document.getElementById('mobile-menu').classList.add('hidden')">SKILLS</a>
        <a href="{{ route('home') }}#certifications" class="block" onclick="document.getElementById('mobile-menu').classList.add('hidden')">CERTS</a>
        <a href="{{ asset($profile->resume_url ?? '#') }}" target="_blank" class="block">RESUME</a>
        <a href="{{ route('home') }}#contact" class="block bg-neutral-900 text-white text-center py-3" onclick="document.getElementById('mobile-menu').classList.add('hidden')">CONTACT</a>
    </div>
</header>