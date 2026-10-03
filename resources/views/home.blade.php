{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')

{{-- ============ HERO — GIANT TYPE + PHOTO ============ --}}
<section class="relative bg-[#f0efec] pt-32 pb-0 overflow-hidden flex flex-col min-h-screen">
    
    {{-- 1. Bagian Atas (Label Kiri & Kanan) --}}
    <div class="max-w-7xl mx-auto px-6 w-full relative z-20 shrink-0">
        <div class="flex justify-between items-start mb-2">
            <div class="text-xs tracked font-semibold text-neutral-500 leading-relaxed">
                DATA ANALYST<br>THAT MOVES<br>WITH DATA.
                <div class="w-10 h-px bg-neutral-400 mt-2"></div>
            </div>
            <div class="text-xs tracked font-semibold text-neutral-500 text-right leading-relaxed">
                PORTFOLIO<br>2025 / 2026
                <div class="w-10 h-px bg-neutral-400 mt-2 ml-auto"></div>
            </div>
        </div>
    </div>

    {{-- 2. Bagian Tengah (Teks 2 Baris & Foto Diperbesar) --}}
    <div class="relative flex-grow flex justify-center items-end w-full mt-4 md:mt-0">
        
        {{-- [UPDATE] Dibagi menjadi 2 baris menggunakan <br> dengan text-align center dan leading rapat --}}
        <h1 class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-[11vw] md:text-[9.5vw] text-neutral-950 font-extrabold select-none text-center leading-[0.85] z-0 tracking-tight whitespace-nowrap">
            AHMAD BARROQ<br>SURYANEGARA
        </h1>

        {{-- Foto Profile PNG --}}
        <img src="{{ asset('images/profile1.png') }}"
             alt="Ahmad Barroq Suryanegara"
             class="relative z-10 w-auto h-[78vh] md:h-[92vh] object-contain object-bottom grayscale drop-shadow-2xl"
             loading="eager">
    </div>

    {{-- 3. Bagian Bawah (Bio & Tombol) --}}
    <div class="max-w-7xl mx-auto px-6 w-full relative z-20 shrink-0 pb-12 mt-4">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-t border-neutral-300 pt-8">
            <p class="text-neutral-700 max-w-md text-sm leading-relaxed">
                {{ $profile->short_bio ?? 'I am an undergraduate Informatics student at Ahmad Dahlan University with a strong interest in data analytics and evidence-based decision making.' }}
            </p>
            <div class="flex gap-3 shrink-0">
                <a href="#portfolio" class="bg-neutral-950 text-white text-xs tracked font-semibold px-6 py-3.5 hover:bg-accent transition-colors">
                    VIEW WORK
                </a>
                <a href="#contact" class="border border-neutral-950 text-neutral-950 text-xs tracked font-semibold px-6 py-3.5 hover:bg-neutral-950 hover:text-white transition-colors">
                    GET IN TOUCH
                </a>
            </div>
        </div>
    </div>

</section>
{{-- ============ BLACK BAND — 3 QUICK LINKS (ICONS) ============ --}}
<section class="bg-neutral-950 py-16">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">
        
        <a href="#portfolio" class="reveal-on-scroll group flex items-center gap-5">
            {{-- [UPDATE] Ikon Project --}}
            <img src="{{ asset('images/project-icon.png') }}"
                 class="w-16 h-16 object-contain grayscale group-hover:grayscale-0 opacity-70 group-hover:opacity-100 transition-all duration-300" alt="Projects"
                 loading="lazy">
            <div>
                <h3 class="text-white font-display text-lg tracked">PROJECTS</h3>
                <p class="text-neutral-400 text-xs mt-1">Data dashboards & web builds.</p>
                <span class="text-accent text-xs font-semibold tracked mt-2 inline-block group-hover:translate-x-1 transition-transform">VIEW ALL →</span>
            </div>
        </a>
        
        <a href="#skills" class="reveal-on-scroll group flex items-center gap-5">
            {{-- [UPDATE] Ikon Skill --}}
            <img src="{{ asset('images/skill-icon.png') }}"
                 class="w-16 h-16 object-contain grayscale group-hover:grayscale-0 opacity-70 group-hover:opacity-100 transition-all duration-300" alt="Skills"
                 loading="lazy">
            <div>
                <h3 class="text-white font-display text-lg tracked">SKILLS</h3>
                <p class="text-neutral-400 text-xs mt-1">Python, Tableau, Laravel & more.</p>
                <span class="text-accent text-xs font-semibold tracked mt-2 inline-block group-hover:translate-x-1 transition-transform">EXPLORE →</span>
            </div>
        </a>
        
        <a href="#certifications" class="reveal-on-scroll group flex items-center gap-5">
            {{-- [UPDATE] Ikon Certificate --}}
            <img src="{{ asset('images/certif-icon.png') }}"
                 class="w-16 h-16 object-contain grayscale group-hover:grayscale-0 opacity-70 group-hover:opacity-100 transition-all duration-300" alt="Certifications"
                 loading="lazy">
            <div>
                <h3 class="text-white font-display text-lg tracked">CERTIFIED</h3>
                <p class="text-neutral-400 text-xs mt-1">BNSP Associate Data Scientist.</p>
                <span class="text-accent text-xs font-semibold tracked mt-2 inline-block group-hover:translate-x-1 transition-transform">VIEW CERTS →</span>
            </div>
        </a>
        
    </div>
</section>

{{-- ============ ABOUT — FULL BLEED PHOTO + BIG TEXT ============ --}}
<section id="about" class="relative bg-[#e9e7e2] py-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
        <div class="reveal-on-scroll order-2 md:order-1">
            <p class="text-xs tracked font-semibold text-neutral-500 mb-4">NEW SEASON — WHO I AM</p>
            <h2 class="font-display text-4xl md:text-5xl text-neutral-950 leading-[1.05] mb-6">
                ABOUT<br>ME
            </h2>
            <p class="text-neutral-700 text-sm leading-relaxed max-w-md mb-8">
                {{ $profile->short_bio }}
            </p>
            <div class="grid grid-cols-2 gap-6 max-w-md">
                <div>
                    <h4 class="font-semibold text-neutral-900 text-sm">Ahmad Dahlan University</h4>
                    <p class="text-xs text-neutral-600 mt-1">Informatics — GPA 3.50/4.00 | 2022–Present</p>
                </div>
                <div>
                    <h4 class="font-semibold text-neutral-900 text-sm">SMAN 1 Bantarkawung</h4>
                    <p class="text-xs text-neutral-600 mt-1">MIPA | 2019–2022</p>
                </div>
            </div>
            <a href="#contact" class="inline-block mt-8 bg-neutral-950 text-white text-xs tracked font-semibold px-6 py-3.5 hover:bg-accent transition-colors">
                EXPLORE CONTACT
            </a>
        </div>
        <div class="reveal-on-scroll order-1 md:order-2 relative h-80 md:h-[480px] overflow-hidden rounded-md">
            
            {{-- [UPDATE] Foto diatur dengan object-bottom dan scale-110 origin-bottom agar zoom pas di bawah --}}
            <img src="{{ asset('images/profile.jpg') }}"
                 alt="Ahmad Barroq Suryanegara"
                 class="w-full h-full object-cover object-bottom origin-bottom scale-110 grayscale hover:grayscale-0 transition-all duration-500"
                 loading="lazy">
                 
        </div>
    </div>
</section>

{{-- ... SISA KODE SEBELUMNYA TETAP SAMA ... --}}

{{-- ============ QUICK STATS ROW (ala Fast Delivery / Easy Returns) ============ --}}
<section class="bg-[#f0efec] py-14 border-y border-neutral-200">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8">
        <div class="reveal-on-scroll flex items-start gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-neutral-800 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            <div>
                <h4 class="text-sm font-semibold text-neutral-900">Fast Learner</h4>
                <p class="text-xs text-neutral-500 mt-0.5">Adapts quickly to new tools</p>
            </div>
        </div>
        <div class="reveal-on-scroll flex items-start gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-neutral-800 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
                <h4 class="text-sm font-semibold text-neutral-900">BNSP Certified</h4>
                <p class="text-xs text-neutral-500 mt-0.5">Associate Data Scientist</p>
            </div>
        </div>
        <div class="reveal-on-scroll flex items-start gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-neutral-800 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
            <div>
                <h4 class="text-sm font-semibold text-neutral-900">Team Player</h4>
                <p class="text-xs text-neutral-500 mt-0.5">Strong collaboration skills</p>
            </div>
        </div>
        <div class="reveal-on-scroll flex items-start gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-neutral-800 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
            </svg>
            <div>
                <h4 class="text-sm font-semibold text-neutral-900">Reliable</h4>
                <p class="text-xs text-neutral-500 mt-0.5">On-time, on-quality delivery</p>
            </div>
        </div>
    </div>
</section>

{{-- ============ PORTFOLIO — "BEST OF" GRID ============ --}}
<section id="portfolio" class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-10 reveal-on-scroll">
    <h2 class="font-display text-3xl md:text-4xl text-neutral-950">BEST OF MY WORK</h2>
</div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($projects as $project)
                <div class="reveal-on-scroll">
                    <x-portfolio-card :project="$project" />
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ EXPERIENCE — DARK BAND ============ --}}
<section id="experience" class="bg-neutral-950 py-24">
    <div class="max-w-7xl mx-auto px-6">
        <p class="text-xs tracked font-semibold text-neutral-500 mb-3 reveal-on-scroll">CAREER TIMELINE</p>
        <h2 class="font-display text-3xl md:text-4xl text-white mb-14 reveal-on-scroll">WORK EXPERIENCE</h2>

        <div class="space-y-0 divide-y divide-neutral-800">
            <div class="reveal-on-scroll grid grid-cols-1 md:grid-cols-4 gap-4 py-7 group hover:bg-neutral-900/50 transition-colors px-2">
                <span class="text-xs tracked text-neutral-500">OCT 2025 – JAN 2026</span>
                <h3 class="md:col-span-2 text-white font-semibold group-hover:text-accent transition-colors">Web Development Intern</h3>
                <p class="text-neutral-400 text-xs leading-relaxed">Developed a web-based Internship Application Information System — system analysis, database design, UI/UX, and development.</p>
            </div>
            <div class="reveal-on-scroll grid grid-cols-1 md:grid-cols-4 gap-4 py-7 group hover:bg-neutral-900/50 transition-colors px-2">
                <span class="text-xs tracked text-neutral-500">JUN – JUL 2025</span>
                <h3 class="md:col-span-2 text-white font-semibold group-hover:text-accent transition-colors">Data Analyst — Financial Dashboard</h3>
                <p class="text-neutral-400 text-xs leading-relaxed">Preprocessed a financial dataset for a water delivery truck business, built an interactive Tableau dashboard.</p>
            </div>
            <div class="reveal-on-scroll grid grid-cols-1 md:grid-cols-4 gap-4 py-7 group hover:bg-neutral-900/50 transition-colors px-2">
                <span class="text-xs tracked text-neutral-500">JUL 2–9, 2025</span>
                <h3 class="md:col-span-2 text-white font-semibold group-hover:text-accent transition-colors">Data Analyst — E-Commerce Dashboard</h3>
                <p class="text-neutral-400 text-xs leading-relaxed">Analyzed an e-commerce dataset and built a Tableau dashboard for pricing and product insights.</p>
            </div>
        </div>
    </div>
</section>

{{-- ============ SKILLS ============ --}}
<section id="skills" class="bg-[#f0efec] py-24">
    <div class="max-w-7xl mx-auto px-6">
        <p class="text-xs tracked font-semibold text-neutral-500 mb-3 reveal-on-scroll">CAPABILITIES</p>
        <h2 class="font-display text-3xl md:text-4xl text-neutral-950 mb-14 reveal-on-scroll">SKILLS & EXPERTISE</h2>

        @php
            $hardSkills = $skills->filter(fn($s) => stripos($s->category, 'hard') !== false);
            $softSkills = $skills->filter(fn($s) => stripos($s->category, 'soft') !== false);

            // Map string levels to percentage values for progress bars
            $levelMap = [
                'beginner' => 25,
                'intermediate' => 50,
                'advanced' => 75,
                'expert' => 100,
            ];
        @endphp

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h3 class="text-xs tracked font-bold text-neutral-900 mb-6 pb-3 border-b-2 border-neutral-950">HARD SKILLS</h3>
                <div class="space-y-5">
                    @foreach($hardSkills as $skill)
                        @php $levelPercent = $levelMap[$skill->level] ?? (is_numeric($skill->level) ? $skill->level : 50); @endphp
                        <div class="reveal-on-scroll">
                            <div class="flex justify-between text-sm mb-1.5">
                                <span class="font-medium text-neutral-800">{{ $skill->name }}</span>
                            </div>
                            <div class="w-full bg-neutral-300 h-1.5 rounded">
                                <div class="bg-neutral-950 h-1.5 rounded" style="width: {{ $levelPercent }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <h3 class="text-xs tracked font-bold text-neutral-900 mb-6 pb-3 border-b-2 border-accent">SOFT SKILLS</h3>
                <div class="space-y-5">
                    @foreach($softSkills as $skill)
                        @php $levelPercent = $levelMap[$skill->level] ?? (is_numeric($skill->level) ? $skill->level : 50); @endphp
                        <div class="reveal-on-scroll">
                            <div class="flex justify-between text-sm mb-1.5">
                                <span class="font-medium text-neutral-800">{{ $skill->name }}</span>
                            </div>
                            <div class="w-full bg-neutral-300 h-1.5 rounded">
                                <div class="bg-accent h-1.5 rounded" style="width: {{ $levelPercent }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ CERTIFICATIONS ============ --}}
<section id="certifications" class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <p class="text-xs tracked font-semibold text-neutral-500 mb-3 reveal-on-scroll">CREDENTIALS</p>
        <h2 class="font-display text-3xl md:text-4xl text-neutral-950 mb-14 reveal-on-scroll">TRAINING & CERTIFICATIONS</h2>

        @if($certifications->isEmpty())
            <p class="text-neutral-500 text-sm">No certifications found.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-neutral-200">
                @foreach($certifications as $cert)
                    <div class="reveal-on-scroll bg-white p-7 hover:bg-neutral-50 transition-colors">
                        <span class="text-xs tracked font-semibold text-accent">{{ $cert->issued_date }}</span>
                        <h3 class="font-semibold text-neutral-900 mt-2 mb-2 leading-snug">{{ $cert->title }}</h3>
                        <p class="text-xs text-neutral-500 mb-3">{{ $cert->issuer }}</p>
                        <p class="text-xs text-neutral-600 leading-relaxed mb-4">{{ $cert->description }}</p>
                        {{-- SESUDAH --}}
<a href="{{ route('certification.show', $cert->slug) }}" class="text-xs tracked font-bold text-neutral-950 hover:text-accent transition-colors">
    VIEW CERTIFICATE →
</a>    
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- CONTACT --}}
<section id="contact" class="bg-neutral-950 py-24">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12">
        <div class="reveal-on-scroll">
            <p class="text-xs tracked font-semibold text-neutral-500 mb-3">LET'S TALK</p>
            <h2 class="font-display text-4xl md:text-5xl text-white mb-6 leading-tight">GET IN<br>TOUCH</h2>
            <p class="text-neutral-400 text-sm max-w-sm mb-8">
                Have a project in mind or just want to connect? Send a message and I'll get back to you.
            </p>
            <div class="text-sm text-neutral-300 space-y-2 mb-8">
                <p>{{ $profile->email ?? '' }}</p>
                <p>{{ $profile->phone ?? '' }}</p>
            </div>

            <div class="flex gap-4">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->phone ?? '') }}"
                   target="_blank"
                   class="w-11 h-11 border border-neutral-700 flex items-center justify-center text-neutral-300 hover:bg-white hover:text-neutral-950 hover:border-white transition-colors"
                   aria-label="WhatsApp">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                        <path d="M12.004 2C6.486 2 2.002 6.482 2.002 12c0 1.9.525 3.68 1.437 5.205L2 22l4.925-1.418A9.953 9.953 0 0012.004 22C17.52 22 22 17.52 22 12S17.52 2 12.004 2zm0 18.17c-1.634 0-3.157-.47-4.448-1.283l-.319-.19-3.08.887.903-3.102-.208-.325A7.95 7.95 0 014.02 12c0-4.408 3.584-7.992 7.984-7.992 4.4 0 7.984 3.584 7.984 7.992 0 4.408-3.584 7.992-7.984 7.992z"/>
                    </svg>
                </a>
                <a href="https://www.linkedin.com/in/ahmad-barroq-suryanegara-b758962a5/?isSelfProfile=true"
                   target="_blank"
                   class="w-11 h-11 border border-neutral-700 flex items-center justify-center text-neutral-300 hover:bg-white hover:text-neutral-950 hover:border-white transition-colors"
                   aria-label="LinkedIn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-1.337-.025-3.058-1.865-3.058-1.866 0-2.153 1.459-2.153 2.961v5.701h-3v-11h2.879v1.502h.041c.401-.761 1.381-1.563 2.841-1.563 3.039 0 3.6 2.001 3.6 4.604v6.457z"/>
                    </svg>
                </a>
                <a href="https://github.com/suryaneegaraa969"
                   target="_blank"
                   class="w-11 h-11 border border-neutral-700 flex items-center justify-center text-neutral-300 hover:bg-white hover:text-neutral-950 hover:border-white transition-colors"
                   aria-label="GitHub">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="reveal-on-scroll"
             x-data="{
                loading: false,
                errors: {},
                form: { sender_name: '', sender_email: '', subject: '', message: '', website: '' },
                async submitForm() {
                    this.loading = true;
                    this.errors = {};
                    try {
                        const res = await fetch('{{ route('contact.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                            },
                            body: JSON.stringify(this.form),
                        });
                        const data = await res.json();

                        if (res.ok) {
                            this.form = { sender_name: '', sender_email: '', subject: '', message: '', website: '' };
                            window.dispatchEvent(new CustomEvent('toast', {
                                detail: {
                                    type: 'success',
                                    title: 'MESSAGE SENT',
                                    message: 'Thanks for reaching out — I\'ll get back to you as soon as possible.',
                                }
                            }));
                        } else if (res.status === 422) {
                            this.errors = data.errors || {};
                            window.dispatchEvent(new CustomEvent('toast', {
                                detail: {
                                    type: 'error',
                                    title: 'SOMETHING\'S MISSING',
                                    message: 'Please check the form — some fields need your attention.',
                                }
                            }));
                        } else {
                            throw new Error('Request failed');
                        }
                    } catch (e) {
                        window.dispatchEvent(new CustomEvent('toast', {
                            detail: {
                                type: 'error',
                                title: 'COULDN\'T SEND MESSAGE',
                                message: 'Something went wrong. Please try again in a moment.',
                            }
                        }));
                    } finally {
                        this.loading = false;
                    }
                }
             }">
            <form @submit.prevent="submitForm" class="space-y-5">
                <div>
                    <label class="block text-xs tracked font-semibold text-neutral-400 mb-2">NAME</label>
                    <input type="text" x-model="form.sender_name" required
                           class="w-full bg-transparent border-b py-2.5 text-white focus:outline-none transition-colors"
                           :class="errors.sender_name ? 'border-red-500' : 'border-neutral-700 focus:border-accent'">
                    <p x-show="errors.sender_name" x-text="errors.sender_name?.[0]" class="text-red-500 text-xs mt-1"></p>
                </div>
                <div>
                    <label class="block text-xs tracked font-semibold text-neutral-400 mb-2">EMAIL</label>
                    <input type="email" x-model="form.sender_email" required
                           class="w-full bg-transparent border-b py-2.5 text-white focus:outline-none transition-colors"
                           :class="errors.sender_email ? 'border-red-500' : 'border-neutral-700 focus:border-accent'">
                    <p x-show="errors.sender_email" x-text="errors.sender_email?.[0]" class="text-red-500 text-xs mt-1"></p>
                </div>
                <div>
                    <label class="block text-xs tracked font-semibold text-neutral-400 mb-2">SUBJECT</label>
                    <input type="text" x-model="form.subject"
                           class="w-full bg-transparent border-b py-2.5 text-white focus:outline-none transition-colors"
                           :class="errors.subject ? 'border-red-500' : 'border-neutral-700 focus:border-accent'">
                    <p x-show="errors.subject" x-text="errors.subject?.[0]" class="text-red-500 text-xs mt-1"></p>
                </div>
                <div>
                    <label class="block text-xs tracked font-semibold text-neutral-400 mb-2">MESSAGE</label>
                    <textarea x-model="form.message" rows="4" required
                              class="w-full bg-transparent border-b py-2.5 text-white focus:outline-none transition-colors resize-none"
                              :class="errors.message ? 'border-red-500' : 'border-neutral-700 focus:border-accent'"></textarea>
                    <p x-show="errors.message" x-text="errors.message?.[0]" class="text-red-500 text-xs mt-1"></p>
                </div>
                <input type="text" name="website" x-model="form.website"
                           class="hidden" tabindex="-1" autocomplete="off"
                           style="display:none !important; visibility:hidden !important; opacity:0 !important; position:absolute !important; left:-9999px !important;">

                <button type="submit" :disabled="loading"
                        class="bg-white text-neutral-950 text-xs tracked font-bold px-8 py-3.5 hover:bg-accent hover:text-white transition-colors mt-2 disabled:opacity-50 disabled:cursor-not-allowed">
                    <span x-show="!loading">SEND MESSAGE</span>
                    <span x-show="loading">SENDING...</span>
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
