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
            line-height: 1.2;
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


        /* ══════════════ MAIN SECTION ══════════════ */
        .skm-section {
            background: #F8F5EE;
            padding: 110px 0;
        }

        .skm-container {
            max-width: 1140px;
            margin: auto;
            padding: 0 24px;
        }

        /* Section Header */
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.1rem;
            font-weight: 700;
            color: #0B1F3A;
        }

        .section-header .divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #C8A84B, #E8C96D);
            margin: 16px auto 0;
        }

        /* Card */
        .skm-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 14px 40px rgba(11, 31, 58, .08);
            overflow: hidden;
            border: 1px solid rgba(200, 168, 75, .15);
            transition: .3s ease;
            padding: 30px;
        }

        .skm-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 60px rgba(11, 31, 58, .15);
        }

        /* Table Styling */
        .skm-table {
            width: 100%;
            border-collapse: collapse;
        }

        .skm-table th,
        .skm-table td {
            padding: 14px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        .skm-table th {
            background: #f3efe4;
            color: #0B1F3A;
            font-weight: 600;
        }

        .download-btn {
            background: linear-gradient(90deg, #C8A84B, #E8C96D);
            color: #0B1F3A;
            padding: 6px 14px;
            border-radius: 30px;
            font-size: .75rem;
            font-weight: 600;
            text-decoration: none;
            transition: .3s;
        }

        .download-btn:hover {
            opacity: .85;
        }

        /* Reveal Animation */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: .8s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: none;
        }
    </style>
@endsection



@section('content')
    {{-- HERO --}}
    <section class="page-hero">
        <img class="hero-bg" src="{{ asset('assets/local/aduan.png') }}" alt="SK Pengelola Aduan">
        <div class="page-hero-overlay"></div>

        <div class="page-hero-content">
            <p class="page-hero-eyebrow">
                Layanan BPKAD Kabupaten Serdang Bedagai
            </p>
            <h1 class="page-hero-title">
                SK <span>Pengelola Aduan</span>
            </h1>
        </div>

        <div class="breadcrumb-bar">
            <div class="breadcrumb-inner">
                <a href="/">Beranda</a>
                <span>›</span>
                <a href="/aduan/skaduan">Aduan</a>
                <span>›</span>
                <span style="color:rgba(255,255,255,.85)">
                    SK Pengelola Aduan
                </span>
            </div>
        </div>
    </section>



    {{-- MAIN --}}
    <section class="skm-section">
        <div class="skm-container">

            <div class="section-header reveal">
                <h2>Dokumen SK Pengelola Aduan</h2>
                <div class="divider"></div>
            </div>

            <div class="skm-card reveal">

                <table class="skm-table">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $d)
                            <tr>
                                <td>{{ $d->year }}</td>
                                <td>
                                    @if ($d->quarter_1)
                                        <a href="{{ $d->quarter_1 }}" target="_blank" class="download-btn">
                                            Download File
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" style="text-align:center;padding:20px;">
                                    Data tidak tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </section>
@endsection



@section('morejs')
    <script>
        document.addEventListener("scroll", function() {
            document.querySelectorAll(".reveal").forEach(function(el) {
                if (el.getBoundingClientRect().top < window.innerHeight - 100) {
                    el.classList.add("active");
                }
            });
        });
    </script>
@endsection
