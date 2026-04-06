{{-- resources/views/sekretariat.blade.php --}}
@extends('base')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/import/slick-1.8.1/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/import/slick-1.8.1/slick/slick-theme.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;900&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap"
        rel="stylesheet">

    <style>
        /* ─── CSS Variables ─────────────────────────────── */
        :root {
            --gold: #C9A84C;
            --gold-light: #E8C96D;
            --gold-pale: #FBF4E3;
            --navy: #0B1F3A;
            --navy-mid: #12305C;
            --navy-soft: #1A3A6B;
            --white: #FFFFFF;
            --text-dark: #1E293B;
            --text-muted: #64748B;
            --border: #E2E8F0;
            --radius-lg: 20px;
            --radius-xl: 28px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            background: #F8FAFC;
        }

        /* ─── HERO ───────────────────────────────────────── */
        .page-hero {
            position: relative;
            min-height: 420px;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .page-hero img.hero-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.04);
            animation: heroZoom 12s ease forwards;
        }

        @keyframes heroZoom {
            to {
                transform: scale(1);
            }
        }

        .page-hero-overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(160deg,
                    rgba(11, 31, 58, 0.92) 0%,
                    rgba(18, 48, 92, 0.78) 60%,
                    rgba(11, 31, 58, 0.55) 100%);
        }

        /* Diagonal gold stripe accent */
        .page-hero-overlay::after {
            content: '';
            position: absolute;
            inset: 0;
            background:
                linear-gradient(105deg,
                    transparent 45%,
                    rgba(201, 168, 76, 0.06) 55%,
                    transparent 65%);
        }

        .page-hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 860px;
            margin: 0 auto;
            padding: clamp(3rem, 8vw, 6rem) 1.5rem;
            text-align: center;
            animation: fadeUp 0.9s cubic-bezier(.22, 1, .36, 1) both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(28px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            border: 1px solid rgba(232, 201, 109, 0.45);
            border-radius: 100px;
            background: rgba(232, 201, 109, 0.08);
            backdrop-filter: blur(8px);
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold-light);
            margin-bottom: 1.25rem;
        }

        .page-hero-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--gold-light);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .4;
                transform: scale(1.5);
            }
        }

        .page-hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.75rem, 5vw, 3rem);
            font-weight: 700;
            color: var(--white);
            line-height: 1.2;
            margin-bottom: 1.25rem;
        }

        .page-hero-title span {
            color: var(--gold-light);
        }

        .page-hero-desc {
            font-size: clamp(0.875rem, 2vw, 1rem);
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.75;
            max-width: 600px;
            margin: 0 auto 2rem;
        }

        /* Gold divider decoration */
        .hero-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 0;
        }

        .hero-divider span {
            display: block;
            height: 1px;
            width: 60px;
            background: linear-gradient(90deg, transparent, var(--gold-light));
        }

        .hero-divider span:last-child {
            background: linear-gradient(90deg, var(--gold-light), transparent);
        }

        .hero-divider i {
            width: 8px;
            height: 8px;
            border: 1.5px solid var(--gold-light);
            transform: rotate(45deg);
            opacity: 0.8;
        }

        /* ─── PAGE BODY ──────────────────────────────────── */
        .page-body {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 1rem 4rem;
        }

        /* ─── PANEL CARD ─────────────────────────────────── */
        .panel-section {
            margin: 2rem 0;
        }

        .panel-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow:
                0 1px 2px rgba(0, 0, 0, 0.04),
                0 8px 32px rgba(11, 31, 58, 0.08);
            overflow: hidden;
            transition: box-shadow .35s, transform .35s;
        }

        .panel-card:hover {
            box-shadow:
                0 1px 2px rgba(0, 0, 0, 0.04),
                0 16px 48px rgba(11, 31, 58, 0.14);
            transform: translateY(-3px);
        }

        .panel-accent-bar {
            height: 4px;
            background: linear-gradient(90deg, var(--navy) 0%, var(--gold) 60%, var(--gold-light) 100%);
        }

        .panel-inner {
            padding: clamp(1.5rem, 4vw, 2.5rem);
        }

        .panel-header {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .panel-icon-wrap {
            flex-shrink: 0;
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-soft) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
        }

        .panel-eyebrow {
            display: block;
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 3px;
        }

        .panel-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.15rem, 3vw, 1.5rem);
            font-weight: 700;
            color: var(--navy);
            line-height: 1.25;
            margin: 0;
        }

        .panel-divider {
            height: 1px;
            background: linear-gradient(90deg, var(--gold-light) 0%, var(--border) 70%, transparent 100%);
            margin-bottom: 1.5rem;
        }

        .panel-body {
            font-size: 0.935rem;
            line-height: 1.9;
            color: var(--text-dark);
        }

        .panel-body p {
            margin-bottom: 0.65rem;
        }

        .panel-body ul,
        .panel-body ol {
            padding-left: 1.4rem;
            margin-bottom: 0.75rem;
        }

        .panel-body li {
            margin-bottom: 0.35rem;
        }

        /* ─── GALLERY / SLIDER ───────────────────────────── */
        .gallery-wrap {
            width: 100%;
        }

        .slider-for img {
            width: 100%;
            max-height: 480px;
            object-fit: cover;
            cursor: zoom-in;
            border-radius: 14px;
        }

        .slider-nav {
            margin-top: 14px;
            padding: 0 4px;
        }

        .slider-nav img {
            height: 88px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            margin: 0 5px;
            opacity: .65;
            transition: opacity .25s, transform .25s;
        }

        .slider-nav .slick-current img,
        .slider-nav img:hover {
            opacity: 1;
            transform: scale(1.04);
        }

        @media(max-width:600px) {
            .slider-nav img {
                height: 60px;
            }
        }

        /* Slick arrow override */
        .slick-prev,
        .slick-next {
            width: 38px;
            height: 38px;
            background: var(--navy) !important;
            border-radius: 50%;
            z-index: 10;
            transition: background .2s;
        }

        .slick-prev:hover,
        .slick-next:hover {
            background: var(--gold) !important;
        }

        .slick-prev {
            left: 10px;
        }

        .slick-next {
            right: 10px;
        }

        .slick-prev::before,
        .slick-next::before {
            font-size: 16px;
            line-height: 38px;
        }

        /* ─── MODAL ──────────────────────────────────────── */
        #modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(5, 13, 26, 0.92);
            justify-content: center;
            align-items: center;
            z-index: 9999;
            backdrop-filter: blur(6px);
        }

        #modal.show {
            display: flex;
        }

        #modal-img {
            max-width: 92vw;
            max-height: 88vh;
            object-fit: contain;
            border-radius: 14px;
            box-shadow: 0 40px 120px rgba(0, 0, 0, 0.7);
            animation: zoomIn .3s cubic-bezier(.22, 1, .36, 1);
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(.88);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        #modal-close {
            position: fixed;
            top: 1.2rem;
            right: 1.5rem;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background .2s;
            z-index: 10001;
            backdrop-filter: blur(4px);
        }

        #modal-close:hover {
            background: rgba(255, 255, 255, 0.22);
        }

        /* ─── BREADCRUMB ─────────────────────────────────── */
        .breadcrumb-bar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 12px 0;
        }

        .breadcrumb-bar .container {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.78rem;
            color: var(--text-muted);
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .breadcrumb-bar a {
            color: var(--navy-mid);
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb-bar a:hover {
            color: var(--gold);
        }

        .breadcrumb-bar .sep {
            opacity: 0.4;
        }

        .breadcrumb-bar .active {
            color: var(--text-dark);
            font-weight: 600;
        }

        /* ─── RESPONSIVE ─────────────────────────────────── */
        @media (max-width: 768px) {
            .page-hero {
                min-height: 320px;
            }
        }
    </style>
@endsection

@section('content')

    {{-- ── HERO ──────────────────────────────────────────── --}}
    <section class="page-hero">
        <img class="hero-bg" src="{{ asset('assets/local/skretariat.png') }}" alt="Sekretariat">
        <div class="page-hero-overlay"></div>
        <div class="page-hero-content">
            <div class="page-hero-badge">Bidang Sekretariat</div>
            <h1 class="page-hero-title">
                Sekretariat Badan Pengelolaan<br>
                <span>Keuangan dan Aset Daerah</span>
            </h1>
            <p class="page-hero-desc">
                Dipimpin oleh seorang Sekretaris yang berkedudukan di bawah dan
                bertanggung jawab kepada Kepala Badan.
            </p>
            <div class="hero-divider">
                <span></span><i></i><span></span>
            </div>
        </div>
    </section>

    {{-- ── BREADCRUMB ────────────────────────────────────── --}}
    <div class="breadcrumb-bar">
        <div class="container">
            <a href="/">Beranda</a>
            <span class="sep">›</span>
            <a href="#">Profil</a>
            <span class="sep">›</span>
            <span class="active">Sekretariat</span>
        </div>
    </div>

    {{-- ── PAGE BODY ─────────────────────────────────────── --}}
    <div class="page-body">

        {{-- Tugas --}}
        <div class="panel-section">
            <div class="panel-card">
                <div class="panel-accent-bar"></div>
                <div class="panel-inner">
                    <div class="panel-header">
                        <div class="panel-icon-wrap">📋</div>
                        <div>
                            <span class="panel-eyebrow">Uraian</span>
                            <h2 class="panel-title">Tugas Sekretariat</h2>
                        </div>
                    </div>
                    <div class="panel-divider"></div>
                    <div class="panel-body">
                        {!! $data ? $data->job : '' !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- Sub Bidang --}}
        <div class="panel-section">
            <div class="panel-card">
                <div class="panel-accent-bar"></div>
                <div class="panel-inner">
                    <div class="panel-header">
                        <div class="panel-icon-wrap">🏛️</div>
                        <div>
                            <span class="panel-eyebrow">Struktur</span>
                            <h2 class="panel-title">Sub Bidang</h2>
                        </div>
                    </div>
                    <div class="panel-divider"></div>
                    <div class="panel-body">
                        {!! $data ? $data->sub_sector : '' !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- Tugas Sub Bidang --}}
        <div class="panel-section">
            <div class="panel-card">
                <div class="panel-accent-bar"></div>
                <div class="panel-inner">
                    <div class="panel-header">
                        <div class="panel-icon-wrap">📌</div>
                        <div>
                            <span class="panel-eyebrow">Detail</span>
                            <h2 class="panel-title">Tugas Sub Bidang</h2>
                        </div>
                    </div>
                    <div class="panel-divider"></div>
                    <div class="panel-body">
                        {!! $data ? $data->sub_sector_job : '' !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- Gallery --}}
        @if ($data && $data->images)
            <div class="panel-section">
                <div class="panel-card">
                    <div class="panel-accent-bar"></div>
                    <div class="panel-inner">
                        <div class="panel-header">
                            <div class="panel-icon-wrap">🖼️</div>
                            <div>
                                <span class="panel-eyebrow">Dokumentasi</span>
                                <h2 class="panel-title">Galeri Foto</h2>
                            </div>
                        </div>
                        <div class="panel-divider"></div>
                        <div class="gallery-wrap">
                            <div class="slider-for mb-3">
                                @foreach ($data->images as $d)
                                    <div>
                                        <img src="{{ asset($d->image) }}" onclick="showModal('{{ asset($d->image) }}')"
                                            alt="Gallery image" />
                                    </div>
                                @endforeach
                            </div>
                            <div class="slider-nav">
                                @foreach ($data->images as $d)
                                    <div>
                                        <img src="{{ asset($d->image) }}" alt="Thumbnail" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>{{-- /page-body --}}

    {{-- ── MODAL ────────────────────────────────────────── --}}
    <div id="modal" onclick="closeModal()">
        <button id="modal-close" onclick="closeModal()" aria-label="Tutup">&times;</button>
        <img id="modal-img" onclick="event.stopPropagation()" alt="Preview" />
    </div>

@endsection

@section('morejs')
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ asset('assets/import/slick-1.8.1/slick/slick.min.js') }}"></script>

    <script>
        $(function() {
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                fade: true,
                asNavFor: '.slider-nav',
                lazyLoad: 'ondemand'
            });
            $('.slider-nav').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                centerMode: true,
                focusOnSelect: true,
                arrows: false,
                lazyLoad: 'ondemand',
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                ]
            });
        });

        function showModal(src) {
            $('#modal-img').attr('src', src);
            $('#modal').addClass('show');
            $('body').css('overflow', 'hidden');
        }

        function closeModal() {
            $('#modal').removeClass('show');
            $('body').css('overflow', '');
        }

        // Close on Escape key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });
    </script>
@endsection
