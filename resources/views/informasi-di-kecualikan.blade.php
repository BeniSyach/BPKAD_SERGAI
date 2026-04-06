{{-- resources/views/informasi-dikecualikan.blade.php --}}
@extends('base')

@section('css')
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet">

    {{-- DataTables --}}
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" rel="stylesheet">

    <style>
        /* --- Gunakan style yang sama dengan informasi-setiap-saat --- */
        body {
            font-family: 'DM Sans', sans-serif;
            background: #FAFAF7;
            color: #1C1C2E;
            margin: 0;
        }

        /* --- HERO --- */
        .hero {
            position: relative;
            min-height: clamp(340px, 50vh, 520px);
            overflow: hidden;
            display: flex;
            align-items: flex-end;
        }

        .hero__bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.06);
            animation: kenBurns 16s ease forwards;
        }

        @keyframes kenBurns {
            to {
                transform: scale(1);
            }
        }

        .hero__overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(175deg, rgba(10, 18, 38, .92) 0%, rgba(10, 18, 38, .62) 50%, rgba(10, 18, 38, .85) 100%);
        }

        .hero__corner {
            position: absolute;
            top: 0;
            right: 0;
            width: 240px;
            height: 240px;
            border-left: 1px solid rgba(232, 201, 109, .1);
            border-bottom: 1px solid rgba(232, 201, 109, .1);
            border-radius: 0 0 0 240px;
            pointer-events: none;
        }

        .hero__content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 860px;
            margin: 0 auto;
            padding: clamp(3rem, 8vw, 5rem) clamp(1.5rem, 5vw, 3rem);
            animation: heroRise 1s cubic-bezier(.22, 1, .36, 1) both;
        }

        @keyframes heroRise {
            from {
                opacity: 0;
                transform: translateY(28px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero__eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 0.62rem;
            font-weight: 700;
            letter-spacing: 0.24em;
            text-transform: uppercase;
            color: var(--gold-light);
            margin-bottom: 1rem;
        }

        .hero__title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2rem, 6vw, 4rem);
            font-weight: 700;
            color: #fff;
            margin: 0 0 1.1rem;
        }

        .hero__title em {
            font-style: italic;
            color: var(--gold-light);
        }

        .hero__desc {
            font-size: clamp(0.8rem, 1.8vw, 0.97rem);
            color: rgba(255, 255, 255, .7);
            line-height: 1.8;
            max-width: 580px;
            font-weight: 300;
        }

        .hero__stripe {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--navy) 0%, var(--gold) 55%, var(--gold-light) 100%);
            z-index: 4;
        }

        .hero__wave {
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 54px;
            z-index: 3;
            pointer-events: none;
        }

        /* --- Breadcrumb --- */
        .breadcrumb {
            background: #fff;
            border-bottom: 1px solid var(--border);
        }

        .breadcrumb__inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 11px 1.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.72rem;
            color: var(--muted);
            flex-wrap: wrap;
        }

        .breadcrumb a {
            color: var(--navy-mid);
            font-weight: 500;
            text-decoration: none;
            transition: color .2s;
        }

        .breadcrumb a:hover {
            color: var(--gold);
        }

        .breadcrumb .sep {
            opacity: .35;
        }

        .breadcrumb .active {
            color: var(--ink);
            font-weight: 600;
        }

        .page-outer {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 1.5rem 5rem;
        }

        .table-card {
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .04), 0 12px 40px rgba(11, 31, 58, .10);
        }

        .table-card__bar {
            height: 4px;
            background: linear-gradient(90deg, #0B1F3A 0%, #C9A84C 60%, #E8C96D 100%);
        }

        .table-card__header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            padding: 1.75rem 2rem 1.25rem;
            border-bottom: 1px solid #E8E4DC;
        }

        .table-card__title-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .table-card__icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, #0B1F3A 0%, #1A3A6B 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .table-card__icon .material-symbols-outlined {
            font-size: 20px;
            color: #E8C96D;
            font-variation-settings: 'FILL' 1, 'wght' 400;
        }

        .table-card__eyebrow {
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: #C9A84C;
            margin-bottom: 2px;
            display: block;
        }

        .table-card__title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.2rem, 3vw, 1.65rem);
            font-weight: 700;
            color: #0B1F3A;
            margin: 0;
            line-height: 1.2;
        }

        .table-stats {
            display: flex;
            gap: .65rem;
            flex-wrap: wrap;
        }

        .table-stat {
            display: flex;
            align-items: center;
            gap: 6px;
            background: #FAFAF7;
            border: 1px solid #E8E4DC;
            border-radius: 100px;
            padding: 5px 13px;
            font-size: 0.7rem;
            font-weight: 500;
            color: #0B1F3A;
        }

        .table-stat .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #C9A84C;
        }

        .table-card__body {
            padding: 1.5rem 2rem 2rem;
        }

        .doc-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 12px;
            border-radius: 100px;
            font-size: 0.7rem;
            font-weight: 600;
            text-decoration: none;
            transition: opacity .2s, transform .2s;
            white-space: nowrap;
        }

        .doc-link--url {
            background: rgba(37, 99, 235, .08);
            color: #2563EB;
            border: 1px solid rgba(37, 99, 235, .2);
        }

        .doc-link--file {
            background: rgba(5, 150, 105, .08);
            color: #059669;
            border: 1px solid rgba(5, 150, 105, .2);
        }

        .doc-link:hover {
            opacity: .85;
            transform: scale(1.04);
        }

        .doc-empty {
            width: 20px;
            height: 1.5px;
            background: #E8E4DC;
            display: inline-block;
            border-radius: 2px;
            vertical-align: middle;
        }

        .doc-legend {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-top: 1.5rem;
            padding: 1rem 1.25rem;
            background: #FAFAF7;
            border: 1px solid #E8E4DC;
            border-radius: 12px;
            font-size: 0.75rem;
            color: #6B7280;
        }

        .doc-legend strong {
            font-weight: 600;
            color: #1C1C2E;
            margin-right: 4px;
        }

        .doc-legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .footer-note {
            margin-top: 2.5rem;
            padding: 1.5rem 1.75rem;
            background: linear-gradient(135deg, #0B1F3A 0%, #12305C 100%);
            border-radius: 18px;
            display: flex;
            align-items: center;
            gap: 1.25rem;
            flex-wrap: wrap;
        }

        .footer-note__icon {
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(255, 255, 255, .1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-note__icon .material-symbols-outlined {
            font-size: 22px;
            color: #E8C96D;
        }

        .footer-note__text h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
            margin: 0 0 3px;
        }

        .footer-note__text p {
            font-size: .78rem;
            color: rgba(255, 255, 255, .65);
            margin: 0;
            line-height: 1.6;
        }
    </style>
@endsection

@section('content')
    {{-- Hero --}}
    <section class="hero">
        <img class="hero__bg" src="{{ asset('assets/local/informasi-dikecualikan.png') }}">
        <div class="hero__overlay"></div>
        <div class="hero__corner"></div>
        <div class="hero__content">
            <div class="hero__eyebrow">PPID &mdash; BPKAD &mdash; Kabupaten Serdang Bedagai</div>
            <h1 class="hero__title">Informasi <em>Dikecualikan</em></h1>
            <p class="hero__desc">
                Informasi yang tidak dapat diakses Pemohon Informasi Publik sesuai UU No. 14 Tahun 2008 Tentang Keterbukaan
                Informasi Publik.
            </p>
        </div>
        <div class="hero__stripe"></div>
        <svg class="hero__wave" viewBox="0 0 1440 54" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,54 C480,0 960,0 1440,54 L1440,54 L0,54 Z" fill="#FAFAF7" />
        </svg>
    </section>

    {{-- Breadcrumb --}}
    <div class="breadcrumb">
        <div class="breadcrumb__inner">
            <a href="/">Beranda</a>
            <span class="sep">›</span>
            <a href="#">PPID</a>
            <span class="sep">›</span>
            <span class="active">Informasi Dikecualikan</span>
        </div>
    </div>

    {{-- Table Card --}}
    <div class="page-outer">
        <div class="table-card">
            <div class="table-card__bar"></div>
            <div class="table-card__header">
                <div class="table-card__title-wrap">
                    <div class="table-card__icon">
                        <span class="material-symbols-outlined">campaign</span>
                    </div>
                    <div>
                        <span class="table-card__eyebrow">Dokumen Tidak Publik</span>
                        <h2 class="table-card__title">Informasi Dikecualikan</h2>
                    </div>
                </div>
                <div class="table-stats">
                    <div class="table-stat"><span class="dot"></span>{{ count($results ?? []) }} Dokumen</div>
                    @if (!empty($arr_year))
                        <div class="table-stat"><span class="dot"></span>{{ count($arr_year) }} Tahun</div>
                    @endif
                    <div class="table-stat"><span class="dot"></span>Privasi</div>
                </div>
            </div>

            <div class="table-card__body">
                <div style="overflow-x:auto;">
                    <table id="example" class="stripe hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dokumen</th>
                                @foreach ($arr_year ?? [] as $year)
                                    <th>{{ $year }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($results ?? [] as $v)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $v['name'] ?? '-' }}</td>
                                    @foreach ($v['year'] ?? [] as $year)
                                        <td>
                                            @if (($year['type'] ?? null) === 0 && !empty($year['document']))
                                                <a class="doc-link doc-link--url" href="{{ $year['document'] }}"
                                                    target="_blank">Tautan</a>
                                            @elseif(($year['type'] ?? null) === 1 && !empty($year['document']))
                                                <a class="doc-link doc-link--file" href="{{ $year['document'] }}"
                                                    target="_blank">Dokumen</a>
                                            @else
                                                <span class="doc-empty"></span>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ 2 + count($arr_year ?? []) }}" class="text-center py-8 text-gray-400">
                                        Belum ada data tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Legend --}}
                <div class="doc-legend">
                    <strong>Keterangan:</strong>
                    <div class="doc-legend-item"><a class="doc-link doc-link--url" style="pointer-events:none;">Tautan</a> =
                        Tautan eksternal</div>
                    <div class="doc-legend-item"><a class="doc-link doc-link--file" style="pointer-events:none;">Dokumen</a>
                        = File unduhan</div>
                    <div class="doc-legend-item"><span class="doc-empty"></span> = Belum tersedia</div>
                </div>
            </div>
        </div>

        {{-- Footer Note --}}
        <div class="footer-note">
            <div class="footer-note__icon">
                <span class="material-symbols-outlined">info</span>
            </div>
            <div class="footer-note__text">
                <h3>Tentang Informasi Dikecualikan</h3>
                <p>Informasi ini tidak dapat diberikan kepada publik sesuai UU No. 14 Tahun 2008.</p>
            </div>
        </div>
    </div>
@endsection

@section('morejs')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script>
        $(function() {
            $('#example').DataTable({
                responsive: true,
                language: {
                    search: 'Cari:',
                    lengthMenu: 'Tampilkan _MENU_ data',
                    info: 'Menampilkan _START_–_END_ dari _TOTAL_ data',
                    infoEmpty: 'Tidak ada data',
                    infoFiltered: '(difilter dari _MAX_ total data)',
                    zeroRecords: 'Tidak ditemukan data yang sesuai',
                    emptyTable: 'Belum ada data tersedia',
                    paginate: {
                        first: '«',
                        last: '»',
                        next: '›',
                        previous: '‹'
                    }
                },
                pageLength: 10,
                dom: '<"flex flex-wrap items-center justify-between gap-3 mb-4"lf>rt<"flex flex-wrap items-center justify-between gap-3 mt-2"ip>'
            }).columns.adjust().responsive.recalc();
        });
    </script>
@endsection
