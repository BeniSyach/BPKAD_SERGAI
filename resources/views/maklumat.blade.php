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
            gap: 8px;
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.6);
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

        .maklumat-card {
            background: white;
            padding: 50px;
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(11, 31, 58, 0.10);
            border: 1px solid rgba(200, 168, 75, 0.15);
            text-align: center;
        }

        .maklumat-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.9rem;
            font-weight: 700;
            color: #0B1F3A;
            margin-bottom: 35px;
        }

        .maklumat-image-wrapper {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 24px 64px rgba(11, 31, 58, 0.18);
            transition: transform 0.4s ease;
        }

        .maklumat-image-wrapper:hover {
            transform: translateY(-6px);
        }

        .maklumat-image-wrapper img {
            width: 100%;
            display: block;
        }

        .maklumat-actions {
            margin-top: 35px;
        }

        .btn-maklumat {
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

        .btn-maklumat:hover {
            transform: translateY(-3px);
        }

        @media(max-width:768px) {
            .maklumat-card {
                padding: 30px;
            }
        }
    </style>
@endsection


@section('content')
    {{-- HERO --}}
    <section class="page-hero">
        <img class="hero-bg" src="{{ asset('assets/local/layanan.png') }}" alt="Maklumat Pelayanan">
        <div class="page-hero-overlay"></div>

        <div class="page-hero-content">
            <p class="page-hero-eyebrow">Profil BPKAD Kabupaten Serdang Bedagai</p>
            <h1 class="page-hero-title">Maklumat <span>Pelayanan</span></h1>
        </div>

        <div class="breadcrumb-bar">
            <div class="breadcrumb-inner">
                <a href="/">Beranda</a>
                <span style="color:rgba(255,255,255,0.3)">›</span>
                <a href="/layanan/maklumat">Layanan</a>
                <span style="color:rgba(255,255,255,0.3)">›</span>
                <span style="color:rgba(255,255,255,0.8)">Maklumat Pelayanan</span>
            </div>
        </div>
    </section>


    {{-- SECTION --}}
    <section class="vm-section">
        <img class="ornament" src="{{ asset('assets/local/ornament2.png') }}" alt="">

        <div class="vm-container">
            <div class="maklumat-card">

                <div class="maklumat-title">
                    Maklumat Pelayanan
                </div>

                <div class="maklumat-image-wrapper">
                    <a id="aImage" target="_blank">
                        <img id="srcImg" alt="Maklumat Pelayanan">
                    </a>
                </div>

                <div class="maklumat-actions">
                    <a id="btnOpen" target="_blank" class="btn-maklumat">
                        Lihat Full Size
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection


@section('morejs')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            loadMaklumat();
        });

        function loadMaklumat() {
            fetch('{{ route('maklumat.json') }}')
                .then(response => response.json())
                .then(data => {

                    if (!data || !data.url) return;

                    // gunakan base URL otomatis (tidak hardcode localhost)
                    let baseUrl = window.location.origin;
                    let href = baseUrl + data.url;

                    if (data.structure) {
                        href = href.replace('/dataimage', data.structure);
                    }

                    document.getElementById('aImage').href = href;
                    document.getElementById('btnOpen').href = href;
                    document.getElementById('srcImg').src = href;
                })
                .catch(err => console.error(err));
        }
    </script>
@endsection
