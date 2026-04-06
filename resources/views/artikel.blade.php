{{-- resources/views/artikel.blade.php --}}
@extends('base')

@section('css')
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --gold: #C9A84C;
            --gold-light: #E8C96D;
            --navy: #0B1F3A;
            --navy-mid: #12305C;
            --ink: #1A1A2E;
            --warm-white: #FAFAF7;
            --cream: #F5F0E8;
            --border: #E8E4DC;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--warm-white);
            color: var(--ink);
        }

        /* ── HERO ─────────────────────────────────────────── */
        .hero-wrapper {
            position: relative;
            height: clamp(320px, 48vh, 520px);
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.06);
            animation: heroKen 14s ease forwards;
        }

        @keyframes heroKen {
            to {
                transform: scale(1);
            }
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(170deg,
                    rgba(10, 20, 40, 0.88) 0%,
                    rgba(10, 20, 40, 0.60) 55%,
                    rgba(10, 20, 40, 0.75) 100%);
        }

        /* Noise grain texture */
        .hero-overlay::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            opacity: 0.35;
            pointer-events: none;
        }

        /* Diagonal gold accent band */
        .hero-overlay::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(115deg,
                    transparent 40%,
                    rgba(201, 168, 76, .07) 52%,
                    transparent 62%);
        }

        .hero-content {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-end;
            padding: clamp(1.5rem, 5vw, 4rem);
            padding-bottom: clamp(2rem, 6vw, 5rem);
            animation: riseIn .9s cubic-bezier(.22, 1, .36, 1) both;
        }

        @keyframes riseIn {
            from {
                opacity: 0;
                transform: translateY(22px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.6rem;
            font-weight: 600;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--gold-light);
            margin-bottom: 0.85rem;
        }

        .hero-eyebrow::before {
            content: '';
            display: block;
            width: 28px;
            height: 1.5px;
            background: var(--gold-light);
        }

        .hero-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2.4rem, 7vw, 5rem);
            font-weight: 700;
            color: #fff;
            line-height: 1.05;
            letter-spacing: -.01em;
        }

        .hero-title em {
            font-style: italic;
            color: var(--gold-light);
        }

        .hero-subtitle {
            margin-top: 1rem;
            font-size: clamp(0.8rem, 1.8vw, 1rem);
            color: rgba(255, 255, 255, .65);
            font-weight: 300;
            letter-spacing: 0.03em;
        }

        /* Floating bottom stripe */
        .hero-stripe {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--navy) 0%, var(--gold) 55%, var(--gold-light) 100%);
        }

        /* ── BREADCRUMB ───────────────────────────────────── */
        .breadcrumb-bar {
            background: #fff;
            border-bottom: 1px solid var(--border);
        }

        /* ── MAIN LAYOUT ──────────────────────────────────── */
        .page-wrap {
            max-width: 1280px;
            margin: 0 auto;
            padding: 3rem 1.25rem 5rem;
        }

        /* ── SECTION HEADING ──────────────────────────────── */
        .section-label {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 2rem;
        }

        .section-label__line {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, var(--border) 0%, transparent 100%);
        }

        .section-label__text {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.6rem, 4vw, 2.25rem);
            font-weight: 700;
            color: var(--navy);
            white-space: nowrap;
        }

        .section-label__dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--gold);
            flex-shrink: 0;
        }

        /* ── FEATURED ARTICLE ─────────────────────────────── */
        .featured {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow:
                0 2px 4px rgba(0, 0, 0, 0.04),
                0 12px 40px rgba(11, 31, 58, 0.10);
            margin-bottom: 4rem;
            transition: transform .35s, box-shadow .35s;
        }

        .featured:hover {
            transform: translateY(-4px);
            box-shadow:
                0 2px 4px rgba(0, 0, 0, 0.04),
                0 24px 60px rgba(11, 31, 58, 0.16);
        }

        .featured__img-wrap {
            position: relative;
            overflow: hidden;
            min-height: 380px;
        }

        .featured__img-wrap img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .6s cubic-bezier(.22, 1, .36, 1);
        }

        .featured:hover .featured__img-wrap img {
            transform: scale(1.04);
        }

        .featured__badge {
            position: absolute;
            top: 1.25rem;
            left: 1.25rem;
            background: var(--gold);
            color: var(--navy);
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            padding: 5px 12px;
            border-radius: 100px;
            z-index: 2;
        }

        .featured__content {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: clamp(1.75rem, 4vw, 3rem);
            background: #fff;
        }

        .featured__meta {
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 0.75rem;
        }

        .featured__title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.5rem, 3vw, 2.4rem);
            font-weight: 700;
            line-height: 1.2;
            color: var(--navy);
            margin-bottom: 1.25rem;
        }

        .featured__excerpt {
            font-size: 0.88rem;
            line-height: 1.85;
            color: #4B5563;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 5;
            overflow: hidden;
            flex: 1;
        }

        .featured__cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: 2rem;
            padding: 12px 28px;
            background: var(--navy);
            color: #fff;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            border-radius: 100px;
            text-decoration: none;
            transition: background .25s, gap .25s;
            align-self: flex-start;
        }

        .featured__cta:hover {
            background: var(--gold);
            color: var(--navy);
            gap: 14px;
        }

        .featured__cta svg {
            width: 15px;
            height: 15px;
        }

        /* ── ARTICLE GRID ─────────────────────────────────── */
        .article-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.75rem;
        }

        .article-card {
            display: flex;
            flex-direction: column;
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            text-decoration: none;
            box-shadow:
                0 1px 3px rgba(0, 0, 0, 0.04),
                0 6px 20px rgba(11, 31, 58, 0.07);
            transition: transform .35s, box-shadow .35s;
            animation: cardIn .5s cubic-bezier(.22, 1, .36, 1) both;
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow:
                0 1px 3px rgba(0, 0, 0, 0.04),
                0 20px 48px rgba(11, 31, 58, 0.14);
        }

        @keyframes cardIn {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .article-card__img {
            position: relative;
            padding-top: 60%;
            overflow: hidden;
        }

        .article-card__img img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .5s cubic-bezier(.22, 1, .36, 1);
        }

        .article-card:hover .article-card__img img {
            transform: scale(1.06);
        }

        /* Gold bottom-edge reveal on hover */
        .article-card__img::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .35s cubic-bezier(.22, 1, .36, 1);
        }

        .article-card:hover .article-card__img::after {
            transform: scaleX(1);
        }

        .article-card__body {
            display: flex;
            flex-direction: column;
            flex: 1;
            padding: 1.25rem 1.35rem 1.5rem;
        }

        .article-card__tag {
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 0.5rem;
        }

        .article-card__title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.2rem;
            font-weight: 600;
            line-height: 1.35;
            color: var(--navy);
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
            flex: 1;
        }

        .article-card__arrow {
            margin-top: 1rem;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--gold);
            letter-spacing: 0.04em;
            transition: gap .2s;
        }

        .article-card:hover .article-card__arrow {
            gap: 10px;
        }

        /* ── LOAD MORE ────────────────────────────────────── */
        .load-more-wrap {
            text-align: center;
            margin-top: 3.5rem;
        }

        #load-more {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 40px;
            border: 1.5px solid var(--navy);
            border-radius: 100px;
            background: transparent;
            color: var(--navy);
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            cursor: pointer;
            text-decoration: none;
            transition: background .25s, color .25s, border-color .25s, transform .2s;
        }

        #load-more:hover {
            background: var(--navy);
            color: #fff;
            transform: scale(1.02);
        }

        #load-more:disabled {
            opacity: 0.45;
            cursor: not-allowed;
            transform: none;
        }

        #load-more .spinner {
            width: 16px;
            height: 16px;
            border: 2px solid currentColor;
            border-top-color: transparent;
            border-radius: 50%;
            display: none;
            animation: spin .7s linear infinite;
        }

        #load-more.loading .spinner {
            display: block;
        }

        #load-more.loading .btn-label {
            display: none;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* ── DIVIDER ──────────────────────────────────────── */
        .editorial-divider {
            display: flex;
            align-items: center;
            gap: 16px;
            margin: 3.5rem 0 2.5rem;
        }

        .editorial-divider span {
            display: block;
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .editorial-divider i {
            width: 6px;
            height: 6px;
            background: var(--gold);
            transform: rotate(45deg);
        }

        /* ── EMPTY STATE ──────────────────────────────────── */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 4rem 2rem;
            color: #9CA3AF;
        }

        /* ── RESPONSIVE ───────────────────────────────────── */
        @media (max-width: 1024px) {
            .article-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .featured {
                grid-template-columns: 1fr;
            }

            .featured__img-wrap {
                min-height: 240px;
            }

            .article-grid {
                grid-template-columns: 1fr;
                gap: 1.25rem;
            }
        }

        @media (max-width: 480px) {
            .featured__content {
                padding: 1.5rem;
            }
        }
    </style>
@endsection

@section('content')
    {{-- ── HERO ──────────────────────────────────────────── --}}
    <div class="hero-wrapper">
        <img class="hero-bg" src="{{ asset('assets/local/artikel.png') }}" alt="Artikel BPKAD">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <span class="hero-eyebrow">BPKAD &mdash; Artikel &amp; Berita</span>
            <h1 class="hero-title">Artikel <em>Terkini</em></h1>
            <p class="hero-subtitle">Informasi dan wawasan terbaru dari kami</p>
        </div>
        <div class="hero-stripe"></div>
    </div>

    {{-- ── BREADCRUMB ────────────────────────────────────── --}}
    <div class="breadcrumb-bar">
        <div class="max-w-screen-xl mx-auto px-5 py-3 flex items-center gap-2 text-xs text-gray-500">
            <a href="/" class="text-navy-mid font-medium hover:text-yellow-600 transition-colors">Beranda</a>
            <span class="opacity-40">›</span>
            <span class="font-semibold text-gray-800">Artikel</span>
        </div>
    </div>

    {{-- ── MAIN ──────────────────────────────────────────── --}}
    <div class="page-wrap">

        {{-- Featured Article --}}
        @if ($firstarticle)
            <div class="section-label mb-8">
                <h2 class="section-label__text">Berita Utama</h2>
                <div class="section-label__dot"></div>
                <div class="section-label__line"></div>
            </div>

            <div class="featured">
                <div class="featured__img-wrap">
                    <img src="{{ asset($firstarticle->cover) }}" alt="{{ $firstarticle->title }}">
                    <span class="featured__badge">Utama</span>
                </div>
                <div class="featured__content">
                    <div>
                        <p class="featured__meta">Artikel Terbaru &mdash; BPKAD</p>
                        <h2 class="featured__title">{{ $firstarticle->title }}</h2>
                        <div class="featured__excerpt">
                            {!! $firstarticle->description !!}
                        </div>
                    </div>
                    <a href="{{ route('article.detail', [$firstarticle->slug]) }}" class="featured__cta">
                        Baca Selengkapnya
                        <svg viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.293 4.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L15.586 11H3a1 1 0 110-2h12.586l-3.293-3.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        @else
            <div class="empty-state">
                <p class="text-lg font-medium">Belum ada artikel utama.</p>
            </div>
        @endif

        {{-- Article Grid --}}
        <div class="editorial-divider">
            <span></span><i></i><span></span>
        </div>

        <div class="section-label">
            <h2 class="section-label__text">Artikel Lainnya</h2>
            <div class="section-label__dot"></div>
            <div class="section-label__line"></div>
        </div>

        <div class="article-grid" id="article-container">
            @forelse ($articles as $index => $article)
                <a class="article-card" href="{{ route('article.detail', [$article->slug]) }}"
                    style="animation-delay: {{ $index * 80 }}ms">
                    <div class="article-card__img">
                        <img src="{{ asset($article->cover) }}" alt="{{ $article->title }}" loading="lazy">
                    </div>
                    <div class="article-card__body">
                        <p class="article-card__tag">BPKAD</p>
                        <h3 class="article-card__title">{{ $article->title }}</h3>
                        <div class="article-card__arrow">
                            Baca
                            <svg width="14" height="14" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.293 4.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L15.586 11H3a1 1 0 110-2h12.586l-3.293-3.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </a>
            @empty
                <div class="empty-state">
                    <p>Belum ada artikel tersedia.</p>
                </div>
            @endforelse
        </div>

        {{-- Load More --}}
        <div class="load-more-wrap">
            <button id="load-more" data-offset="{{ count($articles) }}">
                <span class="spinner"></span>
                <span class="btn-label">Muat Lebih Banyak</span>
            </button>
        </div>

    </div>{{-- /page-wrap --}}
@endsection

@section('morejs')
    <script>
        (function() {
            const btn = document.getElementById('load-more');
            const container = document.getElementById('article-container');

            if (!btn) return;

            btn.addEventListener('click', async function() {
                const offset = btn.getAttribute('data-offset');
                btn.classList.add('loading');
                btn.disabled = true;

                try {
                    const res = await fetch(`{{ route('articles.load_more') }}?offset=${offset}`);
                    const data = await res.json();

                    if (data.length > 0) {
                        data.forEach((article, i) => {
                            const card = document.createElement('a');
                            card.className = 'article-card';
                            card.href = `/artikel/${article.slug}`;
                            card.style.animationDelay = `${i * 80}ms`;
                            card.innerHTML = `
                                <div class="article-card__img">
                                    <img src="/${article.cover}" alt="${article.title}" loading="lazy">
                                </div>
                                <div class="article-card__body">
                                    <p class="article-card__tag">BPKAD</p>
                                    <h3 class="article-card__title">${article.title}</h3>
                                    <div class="article-card__arrow">
                                        Baca
                                        <svg width="14" height="14" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.293 4.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L15.586 11H3a1 1 0 110-2h12.586l-3.293-3.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                            `;
                            container.appendChild(card);
                        });

                        btn.setAttribute('data-offset', parseInt(offset) + data.length);
                        btn.classList.remove('loading');
                        btn.disabled = false;
                    } else {
                        btn.innerHTML = '<span class="btn-label">Semua artikel telah dimuat</span>';
                        btn.disabled = true;
                        btn.style.opacity = '0.5';
                    }
                } catch (err) {
                    console.error(err);
                    btn.classList.remove('loading');
                    btn.disabled = false;
                }
            });
        })();
    </script>
@endsection
