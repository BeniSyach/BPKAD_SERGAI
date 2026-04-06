{{-- resources/views/components/page-header.blade.php --}}
{{--
    Usage:
    <x-page-header
        image="assets/local/informasi.png"
        eyebrow="PPID — BPKAD"
        title="Informasi <em>Berkala</em>"
        desc="Deskripsi singkat halaman ini..."
    />

    Or with slot for custom content:
    <x-page-header image="assets/local/hero.png">
        ... custom HTML ...
    </x-page-header>
--}}

@props([
    'image' => 'assets/local/informasi.png',
    'eyebrow' => 'BPKAD — Kabupaten Serdang Bedagai',
    'title' => '',
    'desc' => '',
])

<link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=DM+Sans:wght@300;400;500;600&display=swap"
    rel="stylesheet">

<style>
    .ph-hero {
        position: relative;
        min-height: clamp(320px, 50vh, 520px);
        overflow: hidden;
        display: flex;
        align-items: flex-end;
    }

    .ph-hero__bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1.06);
        animation: phKenBurns 16s ease forwards;
    }

    @keyframes phKenBurns {
        to {
            transform: scale(1);
        }
    }

    .ph-hero__overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(175deg,
                rgba(10, 18, 38, 0.90) 0%,
                rgba(10, 18, 38, 0.58) 50%,
                rgba(10, 18, 38, 0.82) 100%);
    }

    .ph-hero__overlay::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(118deg,
                transparent 38%,
                rgba(201, 168, 76, .06) 52%,
                transparent 64%);
    }

    .ph-hero__corner {
        position: absolute;
        top: 0;
        right: 0;
        width: 240px;
        height: 240px;
        border-left: 1px solid rgba(232, 201, 109, .1);
        border-bottom: 1px solid rgba(232, 201, 109, .1);
        border-radius: 0 0 0 240px;
        pointer-events: none;
    }

    .ph-hero__content {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 860px;
        margin: 0 auto;
        padding: clamp(3rem, 8vw, 5rem) clamp(1.5rem, 5vw, 3rem);
        animation: phRise 1s cubic-bezier(.22, 1, .36, 1) both;
    }

    @keyframes phRise {
        from {
            opacity: 0;
            transform: translateY(28px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .ph-hero__eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.62rem;
        font-weight: 700;
        letter-spacing: 0.24em;
        text-transform: uppercase;
        color: #E8C96D;
        margin-bottom: 1rem;
    }

    .ph-hero__eyebrow::before,
    .ph-hero__eyebrow::after {
        content: '';
        display: block;
        width: 28px;
        height: 1px;
        background: #E8C96D;
        opacity: 0.55;
    }

    .ph-hero__title {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(2.2rem, 6.5vw, 4.2rem);
        font-weight: 700;
        line-height: 1.1;
        color: #fff;
        margin: 0 0 1.1rem;
        letter-spacing: -.01em;
    }

    .ph-hero__title em {
        font-style: italic;
        color: #E8C96D;
    }

    .ph-hero__desc {
        font-family: 'DM Sans', sans-serif;
        font-size: clamp(0.8rem, 1.8vw, 0.97rem);
        color: rgba(255, 255, 255, .7);
        line-height: 1.8;
        max-width: 580px;
        font-weight: 300;
    }

    .ph-hero__slot {
        font-family: 'DM Sans', sans-serif;
    }

    .ph-hero__stripe {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #0B1F3A 0%, #C9A84C 55%, #E8C96D 100%);
        z-index: 4;
    }

    .ph-hero__wave {
        position: absolute;
        bottom: -1px;
        left: 0;
        right: 0;
        height: 54px;
        z-index: 3;
        pointer-events: none;
    }

    @media (max-width: 640px) {
        .ph-hero__corner {
            display: none;
        }
    }
</style>

<section class="ph-hero">
    <img class="ph-hero__bg" src="{{ asset($image) }}" alt="Hero Background">
    <div class="ph-hero__overlay"></div>
    <div class="ph-hero__corner"></div>

    <div class="ph-hero__content">
        @if ($eyebrow)
            <div class="ph-hero__eyebrow">{{ $eyebrow }}</div>
        @endif

        @if ($title)
            <h1 class="ph-hero__title">{!! $title !!}</h1>
        @endif

        @if ($desc)
            <p class="ph-hero__desc">{{ $desc }}</p>
        @endif

        {{-- Custom slot content --}}
        @if ($slot->isNotEmpty())
            <div class="ph-hero__slot">
                {!! $slot !!}
            </div>
        @endif
    </div>

    <div class="ph-hero__stripe"></div>
    <svg class="ph-hero__wave" viewBox="0 0 1440 54" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,54 C480,0 960,0 1440,54 L1440,54 L0,54 Z" fill="#FAFAF7" />
    </svg>
</section>
