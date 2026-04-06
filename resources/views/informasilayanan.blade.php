@extends('base')

@section('css')
    <style>
        /* ══════════════ HERO ══════════════ */
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
        }

        .page-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(105deg,
                    rgba(11, 31, 58, 0.92) 0%,
                    rgba(18, 48, 92, 0.85) 50%,
                    rgba(11, 31, 58, 0.65) 100%);
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
            color: white;
        }

        .page-hero-eyebrow {
            font-size: .75rem;
            font-weight: 600;
            letter-spacing: .2em;
            text-transform: uppercase;
            color: #E8C96D;
            margin-bottom: 14px;
        }

        .page-hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.2rem);
            font-weight: 700;
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
            background: rgba(200, 168, 75, .12);
            backdrop-filter: blur(8px);
            border-top: 1px solid rgba(200, 168, 75, .2);
            padding: 10px 0;
        }

        .breadcrumb-inner {
            max-width: 1140px;
            margin: auto;
            padding: 0 24px;
            display: flex;
            gap: 8px;
            font-size: .75rem;
            color: rgba(255, 255, 255, .6);
        }

        .breadcrumb-inner a {
            color: #E8C96D;
            text-decoration: none;
        }


        /* ══════════════ SECTION ══════════════ */
        .info-section {
            background: #F8F5EE;
            padding: 110px 0;
        }

        .info-container {
            max-width: 1140px;
            margin: auto;
            padding: 0 24px;
        }

        .info-card {
            background: #fff;
            padding: 60px;
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(11, 31, 58, .1);
            border: 1px solid rgba(200, 168, 75, .15);
            text-align: center;
        }

        .info-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #0B1F3A;
            margin-bottom: 40px;
        }

        .info-card img {
            max-width: 80%;
            border-radius: 16px;
            box-shadow: 0 14px 40px rgba(11, 31, 58, .12);
        }

        @media(max-width:768px) {
            .info-card {
                padding: 30px;
            }

            .info-card img {
                max-width: 100%;
            }
        }
    </style>
@endsection



@section('content')
    {{-- HERO --}}
    <section class="page-hero">
        <img class="hero-bg" src="{{ asset('assets/local/layanan.png') }}" alt="Informasi Layanan">
        <div class="page-hero-overlay"></div>

        <div class="page-hero-content">
            <p class="page-hero-eyebrow">
                Layanan BPKAD Kabupaten Serdang Bedagai
            </p>
            <h1 class="page-hero-title">
                Informasi <span>Layanan</span>
            </h1>
        </div>

        <div class="breadcrumb-bar">
            <div class="breadcrumb-inner">
                <a href="/">Beranda</a>
                <span>›</span>
                <a href="/layanan">Layanan</a>
                <span>›</span>
                <span style="color:rgba(255,255,255,.85)">
                    Informasi Layanan
                </span>
            </div>
        </div>
    </section>



    {{-- SECTION --}}
    <section class="info-section">
        <div class="info-container">

            <div class="info-card">

                <div class="info-title">
                    Informasi Layanan
                </div>

                @if ($data && $data->url)
                    <a href="{{ $data->url }}" target="_blank">
                        <img src="{{ $data->url }}" alt="Informasi Layanan">
                    </a>
                @else
                    <p style="color:#4A5A6E;">
                        Informasi layanan belum tersedia.
                    </p>
                @endif

            </div>

        </div>
    </section>
@endsection
