{{-- resources/views/informasi-berkala.blade.php --}}
@extends('base')

@section('css')
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet">

    <style>
        :root {
            --gold: #C9A84C;
            --gold-light: #E8C96D;
            --gold-pale: #FBF4E3;
            --navy: #0B1F3A;
            --navy-mid: #12305C;
            --navy-soft: #1A3A6B;
            --warm-white: #FAFAF7;
            --cream: #F5F0E8;
            --border: #E8E4DC;
            --muted: #6B7280;
            --ink: #1C1C2E;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--warm-white);
            color: var(--ink);
            margin: 0;
        }

        /* ── HERO ─────────────────────────────────────────── */
        .hero {
            position: relative;
            min-height: clamp(360px, 52vh, 540px);
            overflow: hidden;
            display: flex;
            align-items: flex-end;
        }

        .hero__bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.06);
            animation: kenBurns 16s ease forwards;
        }

        @keyframes kenBurns {
            to {
                transform: scale(1);
            }
        }

        /* Multi-layer overlay */
        .hero__overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(175deg,
                    rgba(10, 18, 38, 0.90) 0%,
                    rgba(10, 18, 38, 0.60) 50%,
                    rgba(10, 18, 38, 0.80) 100%);
        }

        /* Decorative diagonal shimmer */
        .hero__overlay::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(118deg,
                    transparent 38%,
                    rgba(201, 168, 76, .06) 52%,
                    transparent 64%);
        }

        /* Geometric corner accent */
        .hero__corner {
            position: absolute;
            top: 0;
            right: 0;
            width: 280px;
            height: 280px;
            border-left: 1px solid rgba(232, 201, 109, .12);
            border-bottom: 1px solid rgba(232, 201, 109, .12);
            border-radius: 0 0 0 280px;
            pointer-events: none;
        }

        .hero__content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 860px;
            margin: 0 auto;
            padding: clamp(3rem, 8vw, 5rem) clamp(1.5rem, 5vw, 3rem);
            animation: heroRise 1s cubic-bezier(.22, 1, .36, 1) both;
        }

        @keyframes heroRise {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero__eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 0.62rem;
            font-weight: 700;
            letter-spacing: 0.24em;
            text-transform: uppercase;
            color: var(--gold-light);
            margin-bottom: 1.1rem;
        }

        .hero__eyebrow::before,
        .hero__eyebrow::after {
            content: '';
            display: block;
            height: 1px;
            background: var(--gold-light);
            opacity: 0.6;
        }

        .hero__eyebrow::before {
            width: 32px;
        }

        .hero__eyebrow::after {
            width: 32px;
        }

        .hero__title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2.4rem, 7vw, 4.5rem);
            font-weight: 700;
            line-height: 1.08;
            color: #fff;
            margin: 0 0 1.25rem;
            letter-spacing: -.01em;
        }

        .hero__title em {
            font-style: italic;
            color: var(--gold-light);
        }

        .hero__desc {
            font-size: clamp(0.82rem, 1.8vw, 1rem);
            color: rgba(255, 255, 255, .72);
            line-height: 1.8;
            max-width: 600px;
            font-weight: 300;
        }

        /* Slanted bottom edge */
        .hero__wave {
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 60px;
            z-index: 3;
            pointer-events: none;
        }

        /* Gold stripe */
        .hero__stripe {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--navy) 0%, var(--gold) 55%, var(--gold-light) 100%);
            z-index: 4;
        }

        /* ── BREADCRUMB ───────────────────────────────────── */
        .breadcrumb {
            background: #fff;
            border-bottom: 1px solid var(--border);
        }

        .breadcrumb__inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 11px 1.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.72rem;
            color: var(--muted);
            flex-wrap: wrap;
        }

        .breadcrumb a {
            color: var(--navy-mid);
            font-weight: 500;
            text-decoration: none;
            transition: color .2s;
        }

        .breadcrumb a:hover {
            color: var(--gold);
        }

        .breadcrumb .sep {
            opacity: 0.35;
        }

        .breadcrumb .active {
            color: var(--ink);
            font-weight: 600;
        }

        /* ── PAGE BODY ────────────────────────────────────── */
        .page-outer {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3.5rem 1.5rem 6rem;
        }

        /* ── SECTION INTRO ────────────────────────────────── */
        .section-intro {
            text-align: center;
            margin-bottom: 3.5rem;
        }

        .section-intro__tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.62rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 0.85rem;
        }

        .section-intro__tag::before,
        .section-intro__tag::after {
            content: '';
            display: block;
            width: 24px;
            height: 1.5px;
            background: var(--gold);
            opacity: 0.6;
        }

        .section-intro__title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.8rem, 4.5vw, 3rem);
            font-weight: 700;
            color: var(--navy);
            line-height: 1.15;
            margin: 0 0 1rem;
        }

        .section-intro__title em {
            font-style: italic;
            color: var(--gold);
        }

        .section-intro__desc {
            font-size: clamp(0.85rem, 1.8vw, 0.95rem);
            color: var(--muted);
            line-height: 1.85;
            max-width: 580px;
            margin: 0 auto;
        }

        /* ── INFO BADGE ROW ───────────────────────────────── */
        .info-badges {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-bottom: 3rem;
        }

        .info-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 100px;
            padding: 8px 18px;
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--navy);
            box-shadow: 0 2px 8px rgba(11, 31, 58, .06);
        }

        .info-badge .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--gold);
            flex-shrink: 0;
        }

        /* ── CATEGORY GRID ────────────────────────────────── */
        .category-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.25rem;
        }

        /* ── CATEGORY CARD ────────────────────────────────── */
        .cat-card {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 1.5rem 1.4rem;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            overflow: hidden;
            transition: transform .35s cubic-bezier(.22, 1, .36, 1),
                box-shadow .35s,
                border-color .35s;
            animation: cardFloat .6s cubic-bezier(.22, 1, .36, 1) both;
        }

        .cat-card:hover {
            transform: translateY(-5px);
            box-shadow:
                0 2px 4px rgba(0, 0, 0, 0.04),
                0 20px 48px rgba(11, 31, 58, 0.14);
            border-color: transparent;
        }

        @keyframes cardFloat {
            from {
                opacity: 0;
                transform: translateY(22px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Gold top-bar reveal */
        .cat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .35s cubic-bezier(.22, 1, .36, 1);
        }

        .cat-card:hover::before {
            transform: scaleX(1);
        }

        /* Background pattern on hover */
        .cat-card::after {
            content: '';
            position: absolute;
            bottom: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201, 168, 76, .07) 0%, transparent 70%);
            pointer-events: none;
            transition: opacity .35s;
            opacity: 0;
        }

        .cat-card:hover::after {
            opacity: 1;
        }

        /* Icon wrap */
        .cat-card__icon {
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-soft) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .35s;
        }

        .cat-card:hover .cat-card__icon {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
        }

        .cat-card__icon .material-symbols-outlined {
            font-size: 22px;
            color: rgba(255, 255, 255, .9);
            transition: color .35s;
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .cat-card:hover .cat-card__icon .material-symbols-outlined {
            color: var(--navy);
        }

        /* Text */
        .cat-card__body {
            flex: 1;
            min-width: 0;
        }

        .cat-card__name {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--navy);
            line-height: 1.45;
            margin: 0 0 0.5rem;
            transition: color .25s;
        }

        .cat-card:hover .cat-card__name {
            color: var(--navy-mid);
        }

        .cat-card__cta {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--gold);
            letter-spacing: 0.04em;
            transition: gap .25s;
        }

        .cat-card:hover .cat-card__cta {
            gap: 9px;
        }

        .cat-card__cta svg {
            width: 12px;
            height: 12px;
        }

        /* ── EMPTY STATE ──────────────────────────────────── */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 5rem 2rem;
            color: var(--muted);
        }

        .empty-state .icon {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            opacity: 0.35;
        }

        /* ── FOOTER NOTE ──────────────────────────────────── */
        .footer-note {
            margin-top: 4rem;
            padding: 1.75rem 2rem;
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 1.25rem;
            flex-wrap: wrap;
        }

        .footer-note__icon {
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: rgba(255, 255, 255, .1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-note__icon .material-symbols-outlined {
            font-size: 24px;
            color: var(--gold-light);
            font-variation-settings: 'FILL' 1, 'wght' 400;
        }

        .footer-note__text h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: #fff;
            margin: 0 0 4px;
        }

        .footer-note__text p {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, .65);
            margin: 0;
            line-height: 1.6;
        }

        /* ── RESPONSIVE ───────────────────────────────────── */
        @media (max-width: 1024px) {
            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .category-grid {
                grid-template-columns: 1fr;
                gap: 0.9rem;
            }

            .cat-card {
                padding: 1.2rem;
            }

            .hero__corner {
                display: none;
            }

            .info-badges {
                gap: 0.75rem;
            }
        }
    </style>
@endsection

@section('content')
    {{-- ── HERO ──────────────────────────────────────────── --}}
    <section class="hero">
        <img class="hero__bg" src="{{ asset('assets/local/informasi.png') }}" alt="Informasi Berkala">
        <div class="hero__overlay"></div>
        <div class="hero__corner"></div>

        <div class="hero__content">
            <div class="hero__eyebrow">PPID &mdash; BPKAD &mdash; Kabupaten Serdang Bedagai</div>
            <h1 class="hero__title">
                Informasi <em>Berkala</em>
            </h1>
            <p class="hero__desc">
                Informasi yang wajib diperbaharui kemudian disediakan dan diumumkan kepada publik secara berkala
                sekurang-kurangnya setiap 6 bulan sekali.
            </p>
        </div>

        <div class="hero__stripe"></div>
        <svg class="hero__wave" viewBox="0 0 1440 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,60 C360,0 1080,0 1440,60 L1440,60 L0,60 Z" fill="#FAFAF7" />
        </svg>
    </section>

    {{-- ── BREADCRUMB ────────────────────────────────────── --}}
    <div class="breadcrumb">
        <div class="breadcrumb__inner">
            <a href="/">Beranda</a>
            <span class="sep">›</span>
            <a href="#">PPID</a>
            <span class="sep">›</span>
            <span class="active">Informasi Berkala</span>
        </div>
    </div>

    {{-- ── MAIN ──────────────────────────────────────────── --}}
    <div class="page-outer">

        {{-- Section Intro --}}
        <div class="section-intro">
            <div class="section-intro__tag">
                Kategori Informasi
            </div>
            <h2 class="section-intro__title">
                Pilih <em>Kategori</em> Informasi
            </h2>
            <p class="section-intro__desc">
                Klik salah satu kategori di bawah untuk melihat dokumen dan informasi yang tersedia.
            </p>
        </div>

        {{-- Info Badges --}}
        <div class="info-badges">
            <div class="info-badge">
                <span class="dot"></span>
                Diperbarui setiap 6 bulan
            </div>
            <div class="info-badge">
                <span class="dot"></span>
                {{ $data->count() }} Kategori Tersedia
            </div>
            <div class="info-badge">
                <span class="dot"></span>
                Informasi Publik
            </div>
        </div>

        {{-- Category Grid --}}
        <div class="category-grid">
            @forelse ($data as $index => $v)
                @php
                    $iconMap = [
                        'Ringkasan Program dan Kegiatan yang sedang dijalankan' => 'history_edu',
                        'Ringkasan Laporan Keuangan' => 'request_quote',
                        'Informasi Pengadaan Barang dan Jasa' => 'inventory_2',
                        'Informasi tentang Peraturan, Keputusan, atau Kebijakan yang Mengikat' => 'local_police',
                        'Ringkasan Informasi tentang Kinerja' => 'work',
                        'Informasi Tentang Tata Cara Pengaduan Penyalahgunaan Wewenang atau Pelanggaran' => 'dangerous',
                        'Informasi tentang Prosedur Peringatan Dini dan Prosedur Evakuasi Keadaan Darurat' => 'warning',
                    ];
                    $icon = $iconMap[$v->name] ?? 'info';
                @endphp

                <a class="cat-card" href="/ppid/informasi-berkala/{{ $v->slug }}"
                    style="animation-delay: {{ $index * 70 }}ms">

                    <div class="cat-card__icon">
                        <span class="material-symbols-outlined">{{ $icon }}</span>
                    </div>

                    <div class="cat-card__body">
                        <p class="cat-card__name">{{ $v->name }}</p>
                        <span class="cat-card__cta">
                            Lihat Dokumen
                            <svg viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.293 4.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L15.586 11H3a1 1 0 110-2h12.586l-3.293-3.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </a>

            @empty
                <div class="empty-state">
                    <div class="icon">
                        <span class="material-symbols-outlined" style="font-size:3.5rem;opacity:.3;">folder_open</span>
                    </div>
                    <p class="font-medium text-gray-500">Belum ada kategori informasi.</p>
                </div>
            @endforelse
        </div>

        {{-- Footer Note --}}
        <div class="footer-note">
            <div class="footer-note__icon">
                <span class="material-symbols-outlined">info</span>
            </div>
            <div class="footer-note__text">
                <h3>Tentang Informasi Berkala</h3>
                <p>
                    Sesuai dengan UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik, informasi ini
                    wajib disediakan, diumumkan, dan diperbarui minimal setiap 6 bulan sekali oleh badan publik.
                </p>
            </div>
        </div>

    </div>
@endsection

@section('morejs')
    <script>
        // Stagger animation on scroll using IntersectionObserver
        const cards = document.querySelectorAll('.cat-card');

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            cards.forEach(card => observer.observe(card));
        }
    </script>
@endsection
