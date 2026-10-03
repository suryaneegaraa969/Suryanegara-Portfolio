{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- ============ SEO META TAGS ============ --}}
    <title>{{ $seo['title'] ?? ($profile->name ?? 'Personal Portfolio') . ' — Data Analyst Portfolio' }}</title>
    <meta name="description" content="{{ $seo['description'] ?? 'Data Analyst portfolio showcasing projects, skills, and certifications.' }}">
    <meta name="author" content="{{ $profile->name ?? 'Ahmad Barroq Suryanegara' }}">
    <link rel="canonical" href="{{ $seo['url'] ?? url()->current() }}">

    {{-- Open Graph (Facebook, WhatsApp, LinkedIn) --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $seo['title'] ?? ($profile->name ?? 'Personal Portfolio') }}">
    <meta property="og:description" content="{{ $seo['description'] ?? '' }}">
    <meta property="og:image" content="{{ $seo['image'] ?? asset('images/profile.jpg') }}">
    <meta property="og:url" content="{{ $seo['url'] ?? url()->current() }}">
    <meta property="og:site_name" content="{{ $profile->name ?? 'Ahmad Barroq Suryanegara' }} Portfolio">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo['title'] ?? ($profile->name ?? 'Personal Portfolio') }}">
    <meta name="twitter:description" content="{{ $seo['description'] ?? '' }}">
    <meta name="twitter:image" content="{{ $seo['image'] ?? asset('images/profile.jpg') }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}">

    {{-- Structured Data (JSON-LD) for Google rich results --}}
    @php
    $jsonLdName = $profile->name ?? 'Ahmad Barroq Suryanegara';
    $jsonLdTitle = $profile->title ?? 'Data Analyst';
    $jsonLdEmail = $profile->email ?? '';
@endphp
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Person",
    "name": "{{ $profile->name ?? 'Ahmad Barroq Suryanegara' }}",
    "jobTitle": "{{ $profile->title ?? 'Data Analyst' }}",
    "url": "{{ url('/') }}",
    "email": "{{ $profile->email ?? '' }}",
    "sameAs": [
        "https://linkedin.com/in/ahmad-barroq-suryanegara",
        "https://github.com/suryaneegaraa969"
    ]
}
</script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Plausible Analytics (replace YOUR_DOMAIN with your actual domain) --}}
    <script defer data-domain="YOUR_DOMAIN" src="https://plausible.io/js/script.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-neutral-900 font-sans antialiased">
    <x-header :profile="$profile ?? null" />
    <main>
        @yield('content')
    </main>
    <x-footer :profile="$profile ?? null" />

    <div x-data="{ show: false, type: 'success', title: '', message: '' }"
         x-on:toast.window="
            type = $event.detail.type;
            title = $event.detail.title;
            message = $event.detail.message;
            show = true;
            setTimeout(() => show = false, 5000);
         "
         x-show="show"
         x-cloak
         x-transition:enter="transition ease-out duration-400"
         x-transition:enter-start="opacity-0 translate-y-4 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-4"
         class="fixed bottom-6 right-6 z-[100] max-w-sm w-full">
        <div class="bg-neutral-950 border-l-4 shadow-2xl p-5 flex items-start gap-4"
             :class="type === 'success' ? 'border-accent' : 'border-red-500'">
            <div class="shrink-0 w-9 h-9 rounded-full flex items-center justify-center"
                 :class="type === 'success' ? 'bg-accent/20' : 'bg-red-500/20'">
                <svg x-show="type === 'success'" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <svg x-show="type === 'error'" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="flex-1">
                <p class="text-xs tracked font-bold text-white" x-text="title"></p>
                <p class="text-xs text-neutral-400 mt-1 leading-relaxed" x-text="message"></p>
            </div>
            <button @click="show = false" class="shrink-0 text-neutral-500 hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</body>
</html>