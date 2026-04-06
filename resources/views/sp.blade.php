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
            color: #fff;
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
            margin: auto;
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
            margin: auto;
            padding: 0 24px;
            position: relative;
            z-index: 1;
        }

        .standar-card {
            background: #fff;
            padding: 50px;
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(11, 31, 58, 0.10);
            border: 1px solid rgba(200, 168, 75, 0.15);
        }

        .standar-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.9rem;
            font-weight: 700;
            color: #0B1F3A;
            text-align: center;
            margin-bottom: 40px;
        }

        /* Grid */
        .standar-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 28px;
        }

        .standar-item {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 14px 40px rgba(11, 31, 58, 0.08);
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .standar-item:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 60px rgba(11, 31, 58, 0.15);
        }

        .standar-item img {
            width: 100%;
            height: 170px;
            object-fit: cover;
        }

        .standar-item-title {
            padding: 16px;
            font-weight: 600;
            text-align: center;
            color: #0B1F3A;
        }

        @media(max-width:768px) {
            .standar-card {
                padding: 30px;
            }
        }
    </style>
@endsection


@section('content')
    {{-- HERO --}}
    <section class="page-hero">
        <img class="hero-bg" src="{{ asset('assets/local/layanan.png') }}" alt="Standar Pelayanan">
        <div class="page-hero-overlay"></div>

        <div class="page-hero-content">
            <p class="page-hero-eyebrow">Profil BPKAD Kabupaten Serdang Bedagai</p>
            <h1 class="page-hero-title">Standar <span>Pelayanan</span></h1>
        </div>

        <div class="breadcrumb-bar">
            <div class="breadcrumb-inner">
                <a href="/">Beranda</a>
                <span style="color:rgba(255,255,255,0.3)">›</span>
                <a href="layanan/standarpelayanan">Layanan</a>
                <span style="color:rgba(255,255,255,0.8)">› Standar Pelayanan</span>
            </div>
        </div>
    </section>


    {{-- SECTION --}}
    <section class="vm-section">
        <img class="ornament" src="{{ asset('assets/local/ornament2.png') }}" alt="">

        <div class="vm-container">
            <div class="standar-card">

                <div class="standar-title">
                    Standar Pelayanan
                </div>

                @php
                    $dataBidang = [
                        [
                            'url' => 'assets/local/skretariat.png',
                            'nama' => 'Sekretariat',
                            'link' => 'https://drive.google.com/drive/folders/1t0vAt7vrjttSsrlH-dvbllLfpDeQvKfm',
                        ],
                        [
                            'url' => 'assets/local/anggaran.png',
                            'nama' => 'Anggaran',
                            'link' => 'https://drive.google.com/open?id=13QCBGgdkkSL4kkeD0X5G1U_nmqqpyObS',
                        ],
                        [
                            'url' => 'assets/local/akunting.png',
                            'nama' => 'Perbendaharaan dan Akuntansi',
                            'link' => 'https://drive.google.com/drive/folders/1r2XIkzkxe-VKrTT2EpdYvQB7W8AiQEcY',
                        ],
                        [
                            'url' => 'assets/local/aset.png',
                            'nama' => 'Aset',
                            'link' => 'https://drive.google.com/drive/folders/1F-KpyifFcjYZgNPkgYlQq2hxQBlLzVku',
                        ],
                        [
                            'url' => 'assets/local/uptd.png',
                            'nama' => 'UPTD',
                            'link' => 'https://drive.google.com/drive/folders/1F-KpyifFcjYZgNPkgYlQq2hxQBlLzVku',
                        ],
                    ];
                @endphp

                <div class="standar-grid">
                    @foreach ($dataBidang as $bidang)
                        <a href="{{ $bidang['link'] }}" target="_blank" class="standar-item">
                            <img src="{{ asset($bidang['url']) }}" alt="{{ $bidang['nama'] }}">
                            <div class="standar-item-title">
                                {{ $bidang['nama'] }}
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection
