@extends('base')

@section('css')
    <style>
        /* ══════════════ HERO (SAMA DENGAN VISI MISI) ══════════════ */
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

        .breadcrumb-inner span {
            color: rgba(255, 255, 255, 0.3);
        }

        /* ══════════════ SECTION (SAMA DENGAN VM) ══════════════ */
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
            max-width: 900px;
            margin: 0 auto;
            padding: 0 24px;
            position: relative;
            z-index: 1;
        }

        /* Card Motto */
        .motto-card {
            background: white;
            padding: 70px 50px;
            border-radius: 28px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(11, 31, 58, 0.10);
            border: 1px solid rgba(200, 168, 75, 0.15);
            position: relative;
            overflow: hidden;
        }

        /* Decorative Quote */
        .motto-card::before {
            content: '"';
            position: absolute;
            top: -30px;
            left: 30px;
            font-family: 'Playfair Display', serif;
            font-size: 10rem;
            color: rgba(200, 168, 75, 0.08);
            line-height: 1;
        }

        .motto-title {
            font-size: 0.75rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            font-weight: 600;
            color: #C8A84B;
            margin-bottom: 25px;
        }

        .motto-text {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.5rem, 3vw, 2.1rem);
            font-style: italic;
            color: #0B1F3A;
            line-height: 1.6;
        }

        .motto-footer {
            margin-top: 35px;
            font-size: 0.8rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            font-weight: 600;
            color: #C8A84B;
        }

        @media(max-width:768px) {
            .motto-card {
                padding: 45px 25px;
            }
        }
    </style>
@endsection


@section('content')
    {{-- HERO --}}
    <section class="page-hero">
        <img class="hero-bg" src="{{ asset('assets/local/visimisi.png') }}" alt="Motto BPKAD">
        <div class="page-hero-overlay"></div>

        <div class="page-hero-content">
            <p class="page-hero-eyebrow">Profil BPKAD Kabupaten Serdang Bedagai</p>
            <h1 class="page-hero-title">Motto <span>BPKAD</span></h1>
        </div>

        <div class="breadcrumb-bar">
            <div class="breadcrumb-inner">
                <a href="/">Beranda</a>
                <span>›</span>
                <a href="/profil">Profil</a>
                <span>›</span>
                <span style="color:rgba(255,255,255,0.75)">Motto</span>
            </div>
        </div>
    </section>


    {{-- MOTTO SECTION --}}
    <section class="vm-section">
        <img class="ornament" src="{{ asset('assets/local/ornament2.png') }}" alt="">

        <div class="vm-container">
            <div class="motto-card">

                <div class="motto-title">Motto Resmi</div>

                <div class="motto-text">
                    {!! $data && $data->motto ? $data->motto : 'Motto belum tersedia.' !!}
                </div>

                <div class="motto-footer">
                    Badan Pengelolaan Keuangan dan Aset Daerah
                </div>

            </div>
        </div>
    </section>
@endsection
