@extends('base')

@section('css')
    <style>
        /* ══════════════ HERO (KONSISTEN SEMUA HALAMAN) ══════════════ */
        .page-hero {
            position: relative;
            height: 380px;
            overflow: hidden;
        }

        .page-hero img.hero-bg {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
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
        }

        .page-hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.4rem);
            font-weight: 700;
            color: white;
            line-height: 1.15;
        }

        .page-hero-title span {
            color: #E8C96D;
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

        /* ══════════════ SECTION ══════════════ */
        .vm-section {
            position: relative;
            padding: 110px 0;
            background: #F8F5EE;
            overflow: hidden;
        }

        .vm-section .ornament {
            position: absolute;
            right: -80px;
            top: -80px;
            width: 520px;
            height: 520px;
            object-fit: contain;
            opacity: 0.045;
            pointer-events: none;
        }

        .vm-container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 24px;
            position: relative;
            z-index: 1;
        }

        /* Card */
        .sk-card {
            background: white;
            padding: 50px;
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(11, 31, 58, 0.10);
            border: 1px solid rgba(200, 168, 75, 0.15);
            text-align: center;
        }

        .sk-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.9rem;
            font-weight: 700;
            color: #0B1F3A;
            margin-bottom: 35px;
        }

        /* Iframe Wrapper */
        .sk-iframe-wrapper {
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(11, 31, 58, 0.15);
        }

        .sk-iframe-wrapper iframe {
            width: 100%;
            height: 80vh;
            border: none;
        }

        /* Button */
        .sk-actions {
            margin-top: 35px;
        }

        .btn-sk {
            padding: 12px 28px;
            border-radius: 99px;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            text-decoration: none;
            background: linear-gradient(135deg, #C8A84B, #E8C96D);
            color: #0B1F3A;
            box-shadow: 0 8px 24px rgba(200, 168, 75, 0.4);
            transition: all 0.3s ease;
        }

        .btn-sk:hover {
            transform: translateY(-3px);
        }

        @media(max-width:768px) {
            .sk-card {
                padding: 30px;
            }
        }
    </style>
@endsection


@section('content')
    {{-- HERO --}}
    <section class="page-hero">
        <img class="hero-bg" src="{{ asset('assets/local/skweb.png') }}" alt="SK Pengelola Website">
        <div class="page-hero-overlay"></div>

        <div class="page-hero-content">
            <p class="page-hero-eyebrow">Profil BPKAD Kabupaten Serdang Bedagai</p>
            <h1 class="page-hero-title">SK <span>Pengelola Website</span></h1>
        </div>

        <div class="breadcrumb-bar">
            <div class="breadcrumb-inner">
                <a href="/">Beranda</a>
                <span style="color:rgba(255,255,255,0.3)">›</span>
                <a href="/profil">Profil</a>
                <span style="color:rgba(255,255,255,0.3)">›</span>
                <span style="color:rgba(255,255,255,0.75)">SK Pengelola Website</span>
            </div>
        </div>
    </section>


    {{-- SECTION --}}
    <section class="vm-section">
        <img class="ornament" src="{{ asset('assets/local/ornament2.png') }}" alt="">

        <div class="vm-container">
            <div class="sk-card">

                <div class="sk-title">
                    SK Pengelola Website
                </div>

                @if ($data && $data->url)
                    <div class="sk-iframe-wrapper">
                        <iframe src="{{ $data->url }}" allow="autoplay"></iframe>
                    </div>

                    <div class="sk-actions">
                        <a href="{{ $data->url }}" target="_blank" class="btn-sk">
                            Buka di Tab Baru
                        </a>
                    </div>
                @else
                    <p>Dokumen belum tersedia.</p>
                @endif

            </div>
        </div>
    </section>
@endsection
