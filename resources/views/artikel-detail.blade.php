{{-- resources/views/article-detail.blade.php --}}
@extends('base')

@section('css')
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --gold: #C9A84C;
            --gold-light: #E8C96D;
            --gold-pale: #FBF4E3;
            --navy: #0B1F3A;
            --navy-mid: #12305C;
            --ink: #1C1C2E;
            --warm-white: #FAFAF7;
            --cream: #F5F0E8;
            --border: #E8E4DC;
            --muted: #6B7280;
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

        /* ── BREADCRUMB ───────────────────────────────────── */
        .breadcrumb-bar {
            background: #fff;
            border-bottom: 1px solid var(--border);
        }

        .breadcrumb-bar .inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 12px 1.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.72rem;
            color: var(--muted);
            flex-wrap: wrap;
        }

        .breadcrumb-bar a {
            color: var(--navy-mid);
            font-weight: 500;
            text-decoration: none;
            transition: color .2s;
        }

        .breadcrumb-bar a:hover {
            color: var(--gold);
        }

        .breadcrumb-bar .sep {
            opacity: 0.4;
        }

        .breadcrumb-bar .current {
            color: var(--ink);
            font-weight: 600;
        }

        /* ── PAGE LAYOUT ──────────────────────────────────── */
        .page-outer {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2.5rem 1.5rem 5rem;
        }

        .page-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 3rem;
            align-items: start;
        }

        /* ── ARTICLE MAIN ─────────────────────────────────── */
        .article-main {
            min-width: 0;
            /* prevent overflow */
        }

        /* Meta bar */
        .article-meta-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .article-meta-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .article-tag {
            display: inline-block;
            background: var(--gold-pale);
            color: var(--gold);
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            padding: 5px 13px;
            border-radius: 100px;
            border: 1px solid rgba(201, 168, 76, .25);
        }

        .article-date {
            font-size: 0.78rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .article-date::before {
            content: '';
            display: inline-block;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: var(--muted);
            opacity: 0.5;
        }

        /* Share button */
        .share-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 18px;
            border: 1.5px solid var(--border);
            border-radius: 100px;
            background: #fff;
            color: var(--navy);
            font-size: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: border-color .2s, background .2s, color .2s;
            font-family: 'DM Sans', sans-serif;
        }

        .share-btn:hover {
            border-color: var(--gold);
            background: var(--gold-pale);
            color: var(--gold);
        }

        .share-btn svg {
            width: 15px;
            height: 15px;
        }

        /* Title */
        .article-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.75rem, 4.5vw, 3rem);
            font-weight: 700;
            line-height: 1.18;
            color: var(--navy);
            margin: 0 0 0.5rem;
            letter-spacing: -.01em;
        }

        /* Gold accent underline on title */
        .article-title-wrap {
            position: relative;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
        }

        .article-title-wrap::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 64px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            border-radius: 2px;
        }

        /* Cover image */
        .article-cover-wrap {
            margin-bottom: 2.5rem;
            border-radius: 20px;
            overflow: hidden;
            box-shadow:
                0 2px 4px rgba(0, 0, 0, 0.04),
                0 16px 48px rgba(11, 31, 58, 0.12);
            position: relative;
        }

        .article-cover-wrap img {
            width: 100%;
            max-height: 480px;
            object-fit: cover;
            display: block;
        }

        /* Reading progress bar */
        #progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            width: 0%;
            background: linear-gradient(90deg, var(--navy), var(--gold));
            z-index: 9999;
            transition: width .1s linear;
        }

        /* Article body content */
        .article-body {
            font-size: clamp(0.9rem, 1.8vw, 1.02rem);
            line-height: 1.95;
            color: #374151;
        }

        .article-body h1,
        .article-body h2,
        .article-body h3,
        .article-body h4 {
            font-family: 'Cormorant Garamond', serif;
            color: var(--navy);
            font-weight: 700;
            line-height: 1.25;
            margin-top: 2rem;
            margin-bottom: 0.75rem;
        }

        .article-body h2 {
            font-size: 1.7rem;
        }

        .article-body h3 {
            font-size: 1.35rem;
        }

        .article-body p {
            margin-bottom: 1.15rem;
        }

        .article-body a {
            color: var(--gold);
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .article-body img {
            max-width: 100%;
            border-radius: 12px;
            margin: 1.5rem 0;
        }

        .article-body ul,
        .article-body ol {
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .article-body li {
            margin-bottom: 0.45rem;
        }

        .article-body blockquote {
            margin: 2rem 0;
            padding: 1.25rem 1.5rem;
            border-left: 3px solid var(--gold);
            background: var(--gold-pale);
            border-radius: 0 12px 12px 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.2rem;
            font-style: italic;
            color: var(--navy-mid);
        }

        .article-body table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5rem 0;
            font-size: 0.88rem;
        }

        .article-body th {
            background: var(--navy);
            color: #fff;
            padding: 10px 14px;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.06em;
        }

        .article-body td {
            padding: 10px 14px;
            border-bottom: 1px solid var(--border);
        }

        .article-body tr:nth-child(even) td {
            background: var(--cream);
        }

        /* Share strip at bottom */
        .article-share-strip {
            margin-top: 3rem;
            padding: 1.5rem 1.75rem;
            background: #fff;
            border-radius: 16px;
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .article-share-strip p {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--navy);
            margin: 0;
        }

        .share-actions {
            display: flex;
            gap: 10px;
        }

        .share-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 16px;
            border-radius: 100px;
            font-size: 0.72rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: opacity .2s, transform .2s;
            border: none;
            font-family: 'DM Sans', sans-serif;
        }

        .share-pill:hover {
            opacity: 0.85;
            transform: scale(1.03);
        }

        .share-pill.copy {
            background: var(--navy);
            color: #fff;
        }

        .share-pill.whatsapp {
            background: #25D366;
            color: #fff;
        }

        .share-pill svg {
            width: 14px;
            height: 14px;
        }

        /* ── SIDEBAR ──────────────────────────────────────── */
        .article-sidebar {
            position: sticky;
            top: 1.5rem;
        }

        .sidebar-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow:
                0 1px 3px rgba(0, 0, 0, 0.04),
                0 8px 28px rgba(11, 31, 58, 0.08);
        }

        .sidebar-header {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-header h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: #fff;
            margin: 0;
        }

        .sidebar-header::before {
            content: '';
            display: block;
            width: 3px;
            height: 20px;
            border-radius: 2px;
            background: var(--gold);
            flex-shrink: 0;
        }

        .sidebar-list {
            list-style: none;
            margin: 0;
            padding: 0.75rem 0;
        }

        .sidebar-list li {
            border-bottom: 1px solid var(--border);
        }

        .sidebar-list li:last-child {
            border-bottom: none;
        }

        .sidebar-list a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.85rem 1.25rem;
            text-decoration: none;
            transition: background .2s;
        }

        .sidebar-list a:hover {
            background: var(--gold-pale);
        }

        .sidebar-thumb {
            flex-shrink: 0;
            width: 68px;
            height: 52px;
            border-radius: 10px;
            overflow: hidden;
        }

        .sidebar-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .35s;
        }

        .sidebar-list a:hover .sidebar-thumb img {
            transform: scale(1.08);
        }

        .sidebar-list p {
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--navy);
            line-height: 1.4;
            margin: 0;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
        }

        .sidebar-list a:hover p {
            color: var(--navy-mid);
        }

        /* ── TOAST ────────────────────────────────────────── */
        .toast {
            position: fixed;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%) translateY(20px);
            background: var(--navy);
            color: #fff;
            font-size: 0.8rem;
            font-weight: 500;
            padding: 10px 22px;
            border-radius: 100px;
            opacity: 0;
            pointer-events: none;
            transition: opacity .3s, transform .3s;
            white-space: nowrap;
            z-index: 9998;
        }

        .toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        /* ── RESPONSIVE ───────────────────────────────────── */
        @media (max-width: 1024px) {
            .page-grid {
                grid-template-columns: 1fr;
            }

            .article-sidebar {
                position: static;
            }

            .sidebar-list {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 0;
            }

            .sidebar-list li {
                border-right: 1px solid var(--border);
            }

            .sidebar-list li:nth-child(even) {
                border-right: none;
            }
        }

        @media (max-width: 640px) {
            .article-meta-bar {
                flex-direction: column;
                align-items: flex-start;
            }

            .sidebar-list {
                grid-template-columns: 1fr;
            }

            .sidebar-list li {
                border-right: none;
            }

            .article-share-strip {
                flex-direction: column;
            }

            .article-cover-wrap img {
                max-height: 260px;
            }
        }
    </style>
@endsection

@section('content')
    {{-- Reading progress bar --}}
    <div id="progress-bar"></div>

    {{-- ── BREADCRUMB ────────────────────────────────────── --}}
    <div class="breadcrumb-bar">
        <div class="inner">
            <a href="/">Beranda</a>
            <span class="sep">›</span>
            <a href="{{ route('artikel.index') ?? '#' }}">Artikel</a>
            <span class="sep">›</span>
            @if ($article)
                <span class="current" style="max-width:320px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                    {{ Str::limit($article->title, 50) }}
                </span>
            @endif
        </div>
    </div>

    {{-- ── PAGE ──────────────────────────────────────────── --}}
    <div class="page-outer">
        <div class="page-grid">

            {{-- ── ARTICLE MAIN ──────────────────────────────── --}}
            <article class="article-main" id="article-content">
                @if ($article)
                    {{-- Meta bar --}}
                    <div class="article-meta-bar">
                        <div class="article-meta-left">
                            <span class="article-tag">BPKAD</span>
                            <span class="article-date">{{ date_format($article->created_at, 'd F Y') }}</span>
                        </div>
                        <button class="share-btn" onclick="copyLink()">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="18" cy="5" r="3" />
                                <circle cx="6" cy="12" r="3" />
                                <circle cx="18" cy="19" r="3" />
                                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49" />
                                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49" />
                            </svg>
                            Bagikan
                        </button>
                    </div>

                    {{-- Title --}}
                    <div class="article-title-wrap">
                        <h1 class="article-title">{{ $article->title }}</h1>
                    </div>

                    {{-- Cover --}}
                    <div class="article-cover-wrap">
                        <img src="{{ asset($article->cover ?? '/assets/local/logosurakarta.png') }}"
                            onerror="this.onerror=null;this.src='{{ asset('/assets/local/logosurakarta.png') }}'"
                            alt="{{ $article->title }}" />
                    </div>

                    {{-- Body --}}
                    <div class="article-body">
                        {!! $article->description !!}
                    </div>

                    {{-- Share strip --}}
                    <div class="article-share-strip">
                        <p>Bagikan artikel ini</p>
                        <div class="share-actions">
                            <button class="share-pill copy" onclick="copyLink()">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2" />
                                    <path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1" />
                                </svg>
                                Salin Link
                            </button>
                            <a class="share-pill whatsapp"
                                href="https://wa.me/?text={{ urlencode($article->title . ' - ' . request()->fullUrl()) }}"
                                target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                                    <path
                                        d="M12 0C5.373 0 0 5.373 0 12c0 2.117.554 4.103 1.523 5.829L.057 23.94l6.282-1.447A11.946 11.946 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.95 0-3.77-.528-5.33-1.448l-.382-.227-3.726.858.924-3.614-.249-.393A10 10 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
                                </svg>
                                WhatsApp
                            </a>
                        </div>
                    </div>
                @else
                    <div class="text-center py-20 text-gray-400">
                        <p class="text-lg font-medium">Artikel tidak ditemukan.</p>
                    </div>
                @endif
            </article>

            {{-- ── SIDEBAR ────────────────────────────────────── --}}
            <aside class="article-sidebar">
                <div class="sidebar-card">
                    <div class="sidebar-header">
                        <h2>Berita Lainnya</h2>
                    </div>
                    <ul class="sidebar-list">
                        @forelse ($articles as $item)
                            <li>
                                <a href="{{ route('article.detail', $item->slug) }}">
                                    <div class="sidebar-thumb">
                                        <img src="{{ asset($item->cover ?? '/assets/local/logosurakarta.png') }}"
                                            onerror="this.onerror=null;this.src='{{ asset('/assets/local/logosurakarta.png') }}'"
                                            alt="{{ $item->title }}" loading="lazy">
                                    </div>
                                    <p>{{ $item->title }}</p>
                                </a>
                            </li>
                        @empty
                            <li class="px-5 py-4 text-sm text-gray-400">Belum ada artikel lain.</li>
                        @endforelse
                    </ul>
                </div>
            </aside>

        </div>{{-- /page-grid --}}
    </div>{{-- /page-outer --}}

    {{-- Toast notification --}}
    <div class="toast" id="toast">Link disalin!</div>
@endsection

@section('morejs')
    <script>
        // ── Reading progress bar ──────────────────────────────
        (function() {
            const bar = document.getElementById('progress-bar');
            const content = document.getElementById('article-content');

            if (!bar || !content) return;

            window.addEventListener('scroll', () => {
                const rect = content.getBoundingClientRect();
                const totalHeight = content.offsetHeight;
                const scrolled = Math.max(0, -rect.top);
                const pct = Math.min(100, (scrolled / (totalHeight - window.innerHeight)) * 100);
                bar.style.width = pct + '%';
            }, {
                passive: true
            });
        })();

        // ── Copy link ─────────────────────────────────────────
        function copyLink() {
            const url = window.location.href;

            if (navigator.share) {
                navigator.share({
                    title: document.title,
                    url
                });
                return;
            }

            navigator.clipboard.writeText(url).then(() => {
                showToast('Link berhasil disalin!');
            }).catch(() => {
                // Fallback
                const el = document.createElement('textarea');
                el.value = url;
                document.body.appendChild(el);
                el.select();
                document.execCommand('copy');
                document.body.removeChild(el);
                showToast('Link berhasil disalin!');
            });
        }

        function showToast(msg) {
            const toast = document.getElementById('toast');
            toast.textContent = msg;
            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 2800);
        }
    </script>
@endsection
