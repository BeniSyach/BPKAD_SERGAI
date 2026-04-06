@extends('base')

@section('css')
    <style>
        /* ══════════════ HERO BANNER ══════════════ */
        .page-hero {
            position: relative;
            height: 380px;
            overflow: hidden;
        }

        .page-hero img.hero-bg {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
            display: block;
        }

        .page-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(105deg,
                    rgba(11, 31, 58, 0.92) 0%,
                    rgba(18, 48, 92, 0.80) 50%,
                    rgba(11, 31, 58, 0.60) 100%);
        }

        .page-hero-content {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 24px;
        }

        .page-hero-eyebrow {
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #E8C96D;
            margin-bottom: 14px;
            opacity: 0;
            animation: fadeUp 0.8s 0.2s ease-out forwards;
        }

        .page-hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.4rem);
            font-weight: 700;
            color: white;
            line-height: 1.15;
            margin-bottom: 16px;
            opacity: 0;
            animation: fadeUp 0.8s 0.4s ease-out forwards;
        }

        .page-hero-title span {
            color: #E8C96D;
        }

        .page-hero-sub {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.65);
            opacity: 0;
            animation: fadeUp 0.8s 0.55s ease-out forwards;
        }

        /* Breadcrumb */
        .breadcrumb-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(200, 168, 75, 0.12);
            backdrop-filter: blur(8px);
            border-top: 1px solid rgba(200, 168, 75, 0.2);
            padding: 10px 0;
        }

        .breadcrumb-inner {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.55);
        }

        .breadcrumb-inner a {
            color: #E8C96D;
            text-decoration: none;
        }

        .breadcrumb-inner span {
            color: rgba(255, 255, 255, 0.3);
        }

        /* decorative lines on hero */
        .page-hero::after {
            content: '';
            position: absolute;
            bottom: 40px;
            right: 8%;
            width: 260px;
            height: 260px;
            border: 1px solid rgba(200, 168, 75, 0.1);
            border-radius: 50%;
            pointer-events: none;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(22px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        /* ══════════════ MAIN SECTION ══════════════ */
        .vm-section {
            position: relative;
            padding: 96px 0 112px;
            background: #F8F5EE;
            overflow: hidden;
        }

        /* Ornament background */
        .vm-section .ornament {
            position: absolute;
            right: -80px;
            top: -80px;
            width: 520px;
            height: 520px;
            object-fit: contain;
            opacity: 0.045;
            pointer-events: none;
            user-select: none;
        }

        /* Subtle dot-grid */
        .vm-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, rgba(11, 31, 58, 0.06) 1px, transparent 1px);
            background-size: 28px 28px;
            pointer-events: none;
        }

        .vm-container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 24px;
            position: relative;
            z-index: 1;
        }

        /* ══════════════ SECTION HEADER ══════════════ */
        .vm-section-header {
            text-align: center;
            margin-bottom: 72px;
        }

        .vm-eyebrow {
            display: inline-block;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #C8A84B;
            margin-bottom: 14px;
        }

        .vm-section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.9rem, 4vw, 2.8rem);
            font-weight: 700;
            color: #0B1F3A;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .vm-divider {
            width: 56px;
            height: 3px;
            background: linear-gradient(90deg, #C8A84B, #E8C96D);
            border-radius: 2px;
            margin: 0 auto;
        }

        /* ══════════════ LAYOUT ══════════════ */
        .vm-layout {
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 64px;
            align-items: start;
        }

        @media (max-width: 900px) {
            .vm-layout {
                grid-template-columns: 1fr;
                gap: 48px;
            }

            .vm-image-col {
                order: -1;
            }
        }

        /* ══════════════ CARDS ══════════════ */
        .vm-cards {
            display: flex;
            flex-direction: column;
            gap: 28px;
        }

        .vm-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 32px rgba(11, 31, 58, 0.07);
            border: 1px solid rgba(200, 168, 75, 0.12);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
            position: relative;
        }

        .vm-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 56px rgba(11, 31, 58, 0.13);
        }

        /* left accent bar */
        .vm-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 5px;
            background: linear-gradient(180deg, #C8A84B 0%, #E8C96D 100%);
            border-radius: 0 0 0 0;
        }

        .vm-card-head {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 22px 28px 18px 32px;
            background: linear-gradient(90deg, #0B1F3A 0%, #12305C 100%);
        }

        .vm-card-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(200, 168, 75, 0.18);
            border: 1px solid rgba(200, 168, 75, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .vm-card-label {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            font-weight: 600;
            color: white;
            letter-spacing: 0.02em;
        }

        .vm-card-num {
            margin-left: auto;
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: rgba(200, 168, 75, 0.18);
            line-height: 1;
            letter-spacing: -0.02em;
        }

        .vm-card-body {
            padding: 24px 28px 28px 32px;
        }

        .vm-card-body p,
        .vm-card-body ul,
        .vm-card-body ol {
            font-size: 0.9rem;
            line-height: 1.85;
            color: #4A5A6E;
        }

        /* Style list items from CMS */
        .vm-card-body li {
            padding-left: 6px;
            margin-bottom: 8px;
        }

        .vm-card-body ul {
            padding-left: 20px;
        }

        .vm-card-body ol {
            padding-left: 20px;
        }

        /* ══════════════ IMAGE COL ══════════════ */
        .vm-image-col {
            position: sticky;
            top: 100px;
        }

        .vm-image-wrap {
            position: relative;
        }

        /* Gold frame decoration */
        .vm-image-wrap::before {
            content: '';
            position: absolute;
            top: -16px;
            left: -16px;
            right: 16px;
            bottom: 16px;
            border: 2px solid rgba(200, 168, 75, 0.25);
            border-radius: 22px;
            z-index: 0;
        }

        .vm-image-wrap::after {
            content: '';
            position: absolute;
            bottom: -16px;
            right: -16px;
            left: 16px;
            top: 16px;
            background: linear-gradient(135deg, rgba(11, 31, 58, 0.06), rgba(200, 168, 75, 0.08));
            border-radius: 22px;
            z-index: 0;
        }

        .vm-image-wrap img {
            position: relative;
            z-index: 1;
            width: 100%;
            border-radius: 18px;
            display: block;
            box-shadow: 0 24px 64px rgba(11, 31, 58, 0.18);
        }

        /* Badge on image */
        .vm-image-badge {
            position: absolute;
            bottom: -14px;
            left: 28px;
            z-index: 2;
            background: linear-gradient(135deg, #C8A84B, #E8C96D);
            color: #0B1F3A;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 10px 22px;
            border-radius: 99px;
            box-shadow: 0 8px 24px rgba(200, 168, 75, 0.4);
            white-space: nowrap;
        }

        /* ══════════════ QUOTES STRIP ══════════════ */
        .vm-quote-strip {
            margin-top: 80px;
            padding: 40px 44px;
            background: linear-gradient(135deg, #0B1F3A 0%, #12305C 100%);
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .vm-quote-strip::before {
            content: '"';
            position: absolute;
            top: -20px;
            left: 24px;
            font-family: 'Playfair Display', serif;
            font-size: 9rem;
            color: rgba(200, 168, 75, 0.08);
            line-height: 1;
            pointer-events: none;
        }

        .vm-quote-strip p {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            font-style: italic;
            color: rgba(255, 255, 255, 0.82);
            line-height: 1.8;
            position: relative;
            z-index: 1;
            max-width: 680px;
            margin: 0 auto;
        }

        .vm-quote-strip span {
            display: block;
            margin-top: 14px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #C8A84B;
            font-style: normal;
            position: relative;
            z-index: 1;
        }
    </style>
@endsection


@section('content')
    {{-- ══════════════════════════════════════════ PAGE HERO ═══════════════════════════ --}}
    <section class="page-hero">
        <img class="hero-bg" src="{{ asset('assets/local/visimisi.png') }}" alt="Visi Misi BPKAD">
        <div class="page-hero-overlay"></div>

        <div class="page-hero-content">
            <p class="page-hero-eyebrow">Profil BPKAD Kabupaten Serdang Bedagai</p>
            <h1 class="page-hero-title">Visi & <span>Misi</span></h1>
            <p class="page-hero-sub">Landasan dan arah perjuangan kami untuk masyarakat</p>
        </div>

        <div class="breadcrumb-bar">
            <div class="breadcrumb-inner">
                <a href="/">Beranda</a>
                <span>›</span>
                <a href="/profil/visimisi">Profil</a>
                <span>›</span>
                <span style="color:rgba(255,255,255,0.75)">Visi & Misi</span>
            </div>
        </div>
    </section>


    {{-- ══════════════════════════════════════════
     VISI MISI SECTION
══════════════════════════════════════════ --}}
    <section class="vm-section">

        {{-- Ornament --}}
        <img class="ornament" src="{{ asset('assets/local/ornament2.png') }}" alt="">

        <div class="vm-container">

            {{-- Section Heading --}}
            <div class="vm-section-header reveal">
                <span class="vm-eyebrow">Landasan Organisasi</span>
                <h2 class="vm-section-title">Visi & Misi BPKAD</h2>
                <div class="vm-divider"></div>
            </div>

            {{-- Main Layout --}}
            <div class="vm-layout">

                {{-- LEFT: Cards --}}
                <div class="vm-cards">

                    {{-- VISI --}}
                    <div class="vm-card reveal">
                        <div class="vm-card-head">
                            <div class="vm-card-icon">👁</div>
                            <span class="vm-card-label">Visi</span>
                            <span class="vm-card-num">01</span>
                        </div>
                        <div class="vm-card-body">
                            {!! $data ? $data->vision : '<p>Data belum tersedia.</p>' !!}
                        </div>
                    </div>

                    {{-- MISI --}}
                    <div class="vm-card reveal">
                        <div class="vm-card-head">
                            <div class="vm-card-icon">🎯</div>
                            <span class="vm-card-label">Misi</span>
                            <span class="vm-card-num">02</span>
                        </div>
                        <div class="vm-card-body">
                            {!! $data ? $data->mission : '<p>Data belum tersedia.</p>' !!}
                        </div>
                    </div>

                </div>

                {{-- RIGHT: Image --}}
                <div class="vm-image-col reveal">
                    <div class="vm-image-wrap">
                        <img src="{{ asset('assets/local/javanese_people.png') }}" alt="BPKAD Serdang Bedagai">
                        <span class="vm-image-badge">BPKAD Serdang Bedagai</span>
                    </div>
                </div>

            </div>

            {{-- Quote Strip --}}
            <div class="vm-quote-strip reveal">
                <p>
                    Transparansi, akuntabilitas, dan integritas adalah tiga pilar utama dalam setiap langkah pengelolaan
                    keuangan dan aset daerah Kabupaten Serdang Bedagai.
                </p>
                <span>Badan Pengelolaan Keuangan dan Aset Daerah</span>
            </div>

        </div>
    </section>
@endsection
