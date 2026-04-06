{{-- resources/views/produk-hukum-perda.blade.php --}}
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
            --blue: #2563EB;
            --green: #059669;
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
            min-height: clamp(340px, 50vh, 520px);
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

        .hero__overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(175deg,
                    rgba(10, 18, 38, 0.92) 0%,
                    rgba(10, 18, 38, 0.60) 50%,
                    rgba(10, 18, 38, 0.86) 100%);
        }

        .hero__overlay::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(118deg, transparent 38%, rgba(201, 168, 76, .06) 52%, transparent 64%);
        }

        .hero__corner {
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
                transform: translateY(28px);
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
            margin-bottom: 1rem;
        }

        .hero__eyebrow::before,
        .hero__eyebrow::after {
            content: '';
            display: block;
            width: 28px;
            height: 1px;
            background: var(--gold-light);
            opacity: 0.55;
        }

        .hero__title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2rem, 6vw, 4rem);
            font-weight: 700;
            line-height: 1.08;
            color: #fff;
            margin: 0 0 1rem;
            letter-spacing: -.01em;
        }

        .hero__title em {
            font-style: italic;
            color: var(--gold-light);
        }

        .hero__desc {
            font-size: clamp(0.8rem, 1.8vw, 0.97rem);
            color: rgba(255, 255, 255, .7);
            line-height: 1.8;
            max-width: 560px;
            font-weight: 300;
        }

        .hero__stripe {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--navy) 0%, var(--gold) 55%, var(--gold-light) 100%);
            z-index: 4;
        }

        .hero__wave {
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 54px;
            z-index: 3;
            pointer-events: none;
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
            max-width: 1100px;
            margin: 0 auto;
            padding: 3rem 1.5rem 5rem;
        }

        /* ── SEARCH & FILTER BAR ──────────────────────────── */
        .toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 1.75rem;
        }

        .search-wrap {
            position: relative;
            flex: 1;
            min-width: 220px;
            max-width: 380px;
        }

        .search-wrap svg {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: var(--muted);
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            padding: 10px 14px 10px 38px;
            border: 1.5px solid var(--border);
            border-radius: 12px;
            background: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.82rem;
            color: var(--ink);
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .search-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201, 168, 76, .12);
        }

        .search-input::placeholder {
            color: var(--muted);
        }

        .count-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 16px;
            background: var(--gold-pale);
            border: 1px solid rgba(201, 168, 76, .3);
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--navy);
            white-space: nowrap;
        }

        .count-badge .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--gold);
        }

        /* ── MAIN CARD ────────────────────────────────────── */
        .main-card {
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow:
                0 1px 3px rgba(0, 0, 0, 0.04),
                0 12px 40px rgba(11, 31, 58, 0.10);
            animation: cardRise .7s cubic-bezier(.22, 1, .36, 1) both;
        }

        @keyframes cardRise {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .main-card__bar {
            height: 4px;
            background: linear-gradient(90deg, var(--navy) 0%, var(--gold) 60%, var(--gold-light) 100%);
        }

        .main-card__header {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 1.75rem 2rem 1.5rem;
            border-bottom: 1px solid var(--border);
        }

        .main-card__icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-soft) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .main-card__icon .material-symbols-outlined {
            font-size: 22px;
            color: var(--gold-light);
            font-variation-settings: 'FILL' 1, 'wght' 400;
        }

        .main-card__eyebrow {
            display: block;
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 3px;
        }

        .main-card__title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.2rem, 3vw, 1.6rem);
            font-weight: 700;
            color: var(--navy);
            margin: 0;
            line-height: 1.2;
        }

        /* ── TABLE ROWS ───────────────────────────────────── */
        .perda-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .perda-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.1rem 2rem;
            border-bottom: 1px solid var(--border);
            transition: background .2s;
            animation: rowIn .5s cubic-bezier(.22, 1, .36, 1) both;
        }

        .perda-item:last-child {
            border-bottom: none;
        }

        .perda-item:hover {
            background: var(--gold-pale);
        }

        @keyframes rowIn {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .perda-item.hidden-row {
            display: none;
        }

        /* Number */
        .perda-num {
            flex-shrink: 0;
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--warm-white);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.72rem;
            font-weight: 700;
            color: var(--muted);
            transition: background .2s, color .2s, border-color .2s;
        }

        .perda-item:hover .perda-num {
            background: var(--navy);
            color: #fff;
            border-color: var(--navy);
        }

        /* Icon */
        .perda-doc-icon {
            flex-shrink: 0;
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: rgba(11, 31, 58, .06);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .2s;
        }

        .perda-doc-icon .material-symbols-outlined {
            font-size: 19px;
            color: var(--navy-mid);
            font-variation-settings: 'FILL' 1, 'wght' 300;
        }

        .perda-item:hover .perda-doc-icon {
            background: rgba(11, 31, 58, .1);
        }

        /* Name */
        .perda-name {
            flex: 1;
            font-size: 0.88rem;
            font-weight: 500;
            color: var(--navy);
            line-height: 1.5;
            min-width: 0;
        }

        /* Link button */
        .perda-link {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            border-radius: 100px;
            font-size: 0.72rem;
            font-weight: 600;
            text-decoration: none;
            transition: opacity .2s, transform .2s;
            white-space: nowrap;
        }

        .perda-link:hover {
            opacity: .85;
            transform: scale(1.04);
        }

        .perda-link--url {
            background: rgba(37, 99, 235, .08);
            color: var(--blue);
            border: 1px solid rgba(37, 99, 235, .2);
        }

        .perda-link--file {
            background: rgba(5, 150, 105, .08);
            color: var(--green);
            border: 1px solid rgba(5, 150, 105, .2);
        }

        .perda-link svg {
            width: 12px;
            height: 12px;
            flex-shrink: 0;
        }

        /* ── EMPTY STATE ──────────────────────────────────── */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--muted);
        }

        .empty-state .material-symbols-outlined {
            font-size: 3rem;
            opacity: .3;
            display: block;
            margin-bottom: 0.75rem;
        }

        /* No-results (search) */
        #no-results {
            display: none;
            text-align: center;
            padding: 3rem 2rem;
            color: var(--muted);
            font-size: 0.88rem;
        }

        /* ── FOOTER NOTE ──────────────────────────────────── */
        .footer-note {
            margin-top: 2.5rem;
            padding: 1.5rem 1.75rem;
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
            border-radius: 18px;
            display: flex;
            align-items: center;
            gap: 1.25rem;
            flex-wrap: wrap;
        }

        .footer-note__icon {
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(255, 255, 255, .1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-note__icon .material-symbols-outlined {
            font-size: 22px;
            color: var(--gold-light);
            font-variation-settings: 'FILL' 1, 'wght' 400;
        }

        .footer-note__text h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
            margin: 0 0 3px;
        }

        .footer-note__text p {
            font-size: 0.78rem;
            color: rgba(255, 255, 255, .65);
            margin: 0;
            line-height: 1.6;
        }

        /* ── RESPONSIVE ───────────────────────────────────── */
        @media (max-width: 768px) {
            .main-card__header {
                padding: 1.25rem 1.25rem 1rem;
            }

            .perda-item {
                padding: 1rem 1.25rem;
                flex-wrap: wrap;
                gap: 0.75rem;
            }

            .perda-doc-icon {
                display: none;
            }

            .hero__corner {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .perda-name {
                font-size: 0.82rem;
            }

            .search-wrap {
                max-width: 100%;
            }

            .toolbar {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
@endsection

@section('content')

    {{-- ── HERO ──────────────────────────────────────────── --}}
    <section class="hero">
        <img class="hero__bg" src="{{ asset('assets/local/produkhukum.png') }}" alt="Produk Hukum Perda">
        <div class="hero__overlay"></div>
        <div class="hero__corner"></div>
        <div class="hero__content">
            <div class="hero__eyebrow">PPID &mdash; BPKAD &mdash; Kab. Serdang Bedagai</div>
            <h1 class="hero__title">Produk Hukum <em>Perda</em></h1>
            <p class="hero__desc">
                Peraturan Daerah BPKAD Kabupaten Serdang Bedagai yang berlaku
                dan dapat diakses oleh masyarakat secara terbuka.
            </p>
        </div>
        <div class="hero__stripe"></div>
        <svg class="hero__wave" viewBox="0 0 1440 54" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,54 C480,0 960,0 1440,54 L1440,54 L0,54 Z" fill="#FAFAF7" />
        </svg>
    </section>

    {{-- ── BREADCRUMB ────────────────────────────────────── --}}
    <div class="breadcrumb">
        <div class="breadcrumb__inner">
            <a href="/">Beranda</a>
            <span class="sep">›</span>
            <a href="#">Produk Hukum</a>
            <span class="sep">›</span>
            <span class="active">Perda</span>
        </div>
    </div>

    {{-- ── MAIN ──────────────────────────────────────────── --}}
    <div class="page-outer">

        {{-- Toolbar --}}
        <div class="toolbar">
            <div class="search-wrap">
                <svg viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd" />
                </svg>
                <input type="text" class="search-input" id="perda-search" placeholder="Cari nama perda..."
                    autocomplete="off">
            </div>
            <div class="count-badge">
                <span class="dot"></span>
                <span id="count-label">{{ count($regions ?? []) }} Perda</span>
            </div>
        </div>

        {{-- Main Card --}}
        <div class="main-card">
            <div class="main-card__bar"></div>

            <div class="main-card__header">
                <div class="main-card__icon">
                    <span class="material-symbols-outlined">gavel</span>
                </div>
                <div>
                    <span class="main-card__eyebrow">Regulasi Daerah</span>
                    <h2 class="main-card__title">Produk Hukum Perda</h2>
                </div>
            </div>

            {{-- List --}}
            <ul class="perda-list" id="perda-list">
                @forelse ($regions ?? [] as $region)
                    <li class="perda-item" data-name="{{ strtolower($region->name) }}"
                        style="animation-delay: {{ $loop->index * 50 }}ms">

                        <span class="perda-num">{{ $loop->iteration }}</span>

                        <div class="perda-doc-icon">
                            <span class="material-symbols-outlined">description</span>
                        </div>

                        <span class="perda-name">{{ $region->name }}</span>

                        @if ($region->link)
                            @if ($region->type == 1)
                                <a class="perda-link perda-link--url" href="{{ $region->link }}" target="_blank"
                                    rel="noopener">
                                    <svg viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                        <path
                                            d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                    </svg>
                                    Tautan
                                </a>
                            @else
                                <a class="perda-link perda-link--file" href="{{ $region->link }}" target="_blank"
                                    rel="noopener">
                                    <svg viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Unduh
                                </a>
                            @endif
                        @endif
                    </li>
                @empty
                    <li>
                        <div class="empty-state">
                            <span class="material-symbols-outlined">folder_open</span>
                            <p class="font-medium">Belum ada data Perda tersedia.</p>
                        </div>
                    </li>
                @endforelse
            </ul>

            {{-- No results message --}}
            <div id="no-results">
                <span class="material-symbols-outlined"
                    style="font-size:2.5rem;opacity:.3;display:block;margin-bottom:.5rem;">search_off</span>
                Tidak ditemukan perda yang sesuai.
            </div>
        </div>

        {{-- Footer Note --}}
        <div class="footer-note">
            <div class="footer-note__icon">
                <span class="material-symbols-outlined">info</span>
            </div>
            <div class="footer-note__text">
                <h3>Tentang Produk Hukum Perda</h3>
                <p>
                    Peraturan Daerah ini diterbitkan oleh BPKAD Kabupaten Serdang Bedagai
                    sebagai bagian dari transparansi dan keterbukaan informasi publik.
                </p>
            </div>
        </div>

    </div>

@endsection

@section('morejs')
    <script>
        (function() {
            const searchInput = document.getElementById('perda-search');
            const list = document.getElementById('perda-list');
            const noResults = document.getElementById('no-results');
            const countLabel = document.getElementById('count-label');
            const items = Array.from(list.querySelectorAll('.perda-item'));
            const total = items.length;

            searchInput.addEventListener('input', function() {
                const q = this.value.trim().toLowerCase();
                let visible = 0;

                items.forEach(item => {
                    const name = item.dataset.name || '';
                    const match = !q || name.includes(q);
                    item.classList.toggle('hidden-row', !match);
                    if (match) visible++;
                });

                noResults.style.display = visible === 0 ? 'block' : 'none';
                countLabel.textContent = `${visible} Perda${q ? ' ditemukan' : ''}`;
            });
        })();
    </script>
@endsection
