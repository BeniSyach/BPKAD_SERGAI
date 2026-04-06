{{-- resources/views/informasi-serta-merta.blade.php --}}
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
        :root {
            --gold: #C9A84C;
            --gold-light: #E8C96D;
            --gold-pale: #FBF4E3;
            --navy: #0B1F3A;
            --navy-mid: #12305C;
            --navy-soft: #1A3A6B;
            --warm-white: #FAFAF7;
            --cream: #F5F0E8;
            --border: #E8E4DC;
            --muted: #6B7280;
            --ink: #1C1C2E;
            --success: #059669;
            --blue: #2563EB;
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

        /* ── HERO ─────────────────────────────────────────── */
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
            background: linear-gradient(175deg,
                    rgba(10, 18, 38, 0.92) 0%,
                    rgba(10, 18, 38, 0.62) 50%,
                    rgba(10, 18, 38, 0.85) 100%);
        }

        .hero__overlay::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(118deg,
                    transparent 38%,
                    rgba(201, 168, 76, .06) 52%,
                    transparent 64%);
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

        .hero__eyebrow::before,
        .hero__eyebrow::after {
            content: '';
            display: block;
            width: 28px;
            height: 1px;
            background: var(--gold-light);
            opacity: 0.55;
        }

        .hero__title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2rem, 6vw, 4rem);
            font-weight: 700;
            line-height: 1.08;
            color: #fff;
            margin: 0 0 1.1rem;
            letter-spacing: -.01em;
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

        /* ── BREADCRUMB ───────────────────────────────────── */
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
            opacity: 0.35;
        }

        .breadcrumb .active {
            color: var(--ink);
            font-weight: 600;
        }

        /* ── PAGE BODY ────────────────────────────────────── */
        .page-outer {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 1.5rem 5rem;
        }

        /* ── TABLE CARD ───────────────────────────────────── */
        .table-card {
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow:
                0 1px 3px rgba(0, 0, 0, 0.04),
                0 12px 40px rgba(11, 31, 58, 0.10);
            animation: cardRise .7s cubic-bezier(.22, 1, .36, 1) both;
        }

        @keyframes cardRise {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Card accent bar */
        .table-card__bar {
            height: 4px;
            background: linear-gradient(90deg, var(--navy) 0%, var(--gold) 60%, var(--gold-light) 100%);
        }

        /* Card header */
        .table-card__header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            padding: 1.75rem 2rem 1.25rem;
            border-bottom: 1px solid var(--border);
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
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-soft) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .table-card__icon .material-symbols-outlined {
            font-size: 20px;
            color: var(--gold-light);
            font-variation-settings: 'FILL' 1, 'wght' 400;
        }

        .table-card__eyebrow {
            display: block;
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 2px;
        }

        .table-card__title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.2rem, 3vw, 1.65rem);
            font-weight: 700;
            color: var(--navy);
            margin: 0;
            line-height: 1.2;
        }

        /* Stats badges in header */
        .table-stats {
            display: flex;
            gap: 0.65rem;
            flex-wrap: wrap;
        }

        .table-stat {
            display: flex;
            align-items: center;
            gap: 6px;
            background: var(--warm-white);
            border: 1px solid var(--border);
            border-radius: 100px;
            padding: 5px 13px;
            font-size: 0.7rem;
            font-weight: 500;
            color: var(--navy);
        }

        .table-stat .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--gold);
        }

        /* ── DATATABLE OVERRIDES ──────────────────────────── */
        .table-card__body {
            padding: 1.5rem 2rem 2rem;
        }

        /* DataTables controls */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 1.2rem;
        }

        .dataTables_wrapper .dataTables_length label,
        .dataTables_wrapper .dataTables_filter label {
            font-size: 0.8rem;
            color: var(--muted);
            font-family: 'DM Sans', sans-serif;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.8rem;
            padding: 7px 12px;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            background: var(--warm-white);
            color: var(--ink);
            outline: none;
            transition: border-color .2s;
        }

        .dataTables_wrapper .dataTables_length select:focus,
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: var(--gold);
        }

        /* Search input with icon */
        .dataTables_wrapper .dataTables_filter {
            position: relative;
        }

        /* The actual table */
        table#example {
            width: 100% !important;
            border-collapse: separate;
            border-spacing: 0;
            font-family: 'DM Sans', sans-serif;
        }

        table#example thead tr th {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
            color: rgba(255, 255, 255, .9);
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 14px 16px;
            border: none;
            white-space: nowrap;
        }

        table#example thead tr th:first-child {
            border-radius: 14px 0 0 0;
        }

        table#example thead tr th:last-child {
            border-radius: 0 14px 0 0;
        }

        /* Sorting arrows */
        table.dataTable thead .sorting::after,
        table.dataTable thead .sorting_asc::after,
        table.dataTable thead .sorting_desc::after {
            color: rgba(232, 201, 109, .55) !important;
        }

        table.dataTable thead .sorting_asc::after {
            color: var(--gold-light) !important;
        }

        table.dataTable thead .sorting_desc::after {
            color: var(--gold-light) !important;
        }

        table#example tbody tr {
            transition: background .2s;
        }

        table#example tbody tr:nth-child(even) td {
            background: var(--warm-white);
        }

        table#example tbody tr:hover td {
            background: var(--gold-pale) !important;
        }

        table#example tbody td {
            font-size: 0.85rem;
            padding: 13px 16px;
            color: var(--ink);
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        table#example tbody tr:last-child td {
            border-bottom: none;
        }

        /* Row number cell */
        table#example tbody td:first-child {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--muted);
            text-align: center;
            width: 52px;
        }

        /* Document name cell */
        table#example tbody td:nth-child(2) {
            font-weight: 500;
            color: var(--navy);
            line-height: 1.45;
        }

        /* Year cells */
        table#example tbody td:not(:first-child):not(:nth-child(2)) {
            text-align: center;
        }

        /* Document links */
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

        .doc-link:hover {
            opacity: .85;
            transform: scale(1.04);
        }

        .doc-link--url {
            background: rgba(37, 99, 235, 0.08);
            color: var(--blue);
            border: 1px solid rgba(37, 99, 235, 0.2);
        }

        .doc-link--file {
            background: rgba(5, 150, 105, 0.08);
            color: var(--success);
            border: 1px solid rgba(5, 150, 105, 0.2);
        }

        .doc-link svg {
            width: 11px;
            height: 11px;
            flex-shrink: 0;
        }

        /* Empty cell dash */
        .doc-empty {
            width: 20px;
            height: 1.5px;
            background: var(--border);
            display: inline-block;
            border-radius: 2px;
            vertical-align: middle;
        }

        /* DataTables info & pagination */
        .dataTables_wrapper .dataTables_info {
            font-size: 0.75rem;
            color: var(--muted);
            font-family: 'DM Sans', sans-serif;
            padding-top: 1rem;
        }

        .dataTables_wrapper .dataTables_paginate {
            padding-top: 1rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.78rem;
            font-weight: 500;
            padding: 6px 12px !important;
            border-radius: 8px !important;
            margin: 0 2px;
            border: 1px solid transparent !important;
            color: var(--navy) !important;
            transition: background .2s, color .2s;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: var(--gold-pale) !important;
            border-color: var(--border) !important;
            color: var(--navy) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: var(--navy) !important;
            border-color: var(--navy) !important;
            color: #fff !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
            color: #ccc !important;
            cursor: default;
        }

        /* ── LEGEND ───────────────────────────────────────── */
        .doc-legend {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-top: 1.5rem;
            padding: 1rem 1.25rem;
            background: var(--warm-white);
            border: 1px solid var(--border);
            border-radius: 12px;
            font-size: 0.75rem;
            color: var(--muted);
        }

        .doc-legend strong {
            font-weight: 600;
            color: var(--ink);
            margin-right: 4px;
        }

        .doc-legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* ── FOOTER NOTE ──────────────────────────────────── */
        .footer-note {
            margin-top: 2.5rem;
            padding: 1.5rem 1.75rem;
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
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
            color: var(--gold-light);
            font-variation-settings: 'FILL' 1, 'wght' 400;
        }

        .footer-note__text h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
            margin: 0 0 3px;
        }

        .footer-note__text p {
            font-size: 0.78rem;
            color: rgba(255, 255, 255, .65);
            margin: 0;
            line-height: 1.6;
        }

        /* ── RESPONSIVE ───────────────────────────────────── */
        @media (max-width: 768px) {
            .table-card__header {
                padding: 1.25rem 1.25rem 1rem;
            }

            .table-card__body {
                padding: 1rem 1rem 1.5rem;
            }

            .hero__corner {
                display: none;
            }

            table#example thead tr th:first-child {
                border-radius: 10px 0 0 0;
            }

            table#example thead tr th:last-child {
                border-radius: 0 10px 0 0;
            }
        }

        @media (max-width: 480px) {
            .table-stats {
                display: none;
            }
        }
    </style>
@endsection

@section('content')

    {{-- ── HERO ──────────────────────────────────────────── --}}
    <section class="hero">
        <img class="hero__bg" src="{{ asset('assets/local/informasi.png') }}" alt="Informasi Serta Merta">
        <div class="hero__overlay"></div>
        <div class="hero__corner"></div>
        <div class="hero__content">
            <div class="hero__eyebrow">PPID &mdash; BPKAD &mdash; Kabupaten Serdang Bedagai</div>
            <h1 class="hero__title">Informasi <em>Serta Merta</em></h1>
            <p class="hero__desc">
                Informasi yang berkaitan dengan hajat hidup orang banyak dan ketertiban umum
                serta wajib diumumkan secara serta merta tanpa penundaan.
            </p>
        </div>
        <div class="hero__stripe"></div>
        <svg class="hero__wave" viewBox="0 0 1440 54" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,54 C480,0 960,0 1440,54 L1440,54 L0,54 Z" fill="#FAFAF7" />
        </svg>
    </section>

    {{-- ── BREADCRUMB ────────────────────────────────────── --}}
    <div class="breadcrumb">
        <div class="breadcrumb__inner">
            <a href="/">Beranda</a>
            <span class="sep">›</span>
            <a href="#">PPID</a>
            <span class="sep">›</span>
            <span class="active">Informasi Serta Merta</span>
        </div>
    </div>

    {{-- ── MAIN ──────────────────────────────────────────── --}}
    <div class="page-outer">
        <div class="table-card">
            <div class="table-card__bar"></div>

            {{-- Header --}}
            <div class="table-card__header">
                <div class="table-card__title-wrap">
                    <div class="table-card__icon">
                        <span class="material-symbols-outlined">campaign</span>
                    </div>
                    <div>
                        <span class="table-card__eyebrow">Dokumen Publik</span>
                        <h2 class="table-card__title">Informasi Serta Merta</h2>
                    </div>
                </div>

                <div class="table-stats">
                    <div class="table-stat">
                        <span class="dot"></span>
                        {{ count($results ?? []) }} Dokumen
                    </div>
                    @if (!empty($arr_year))
                        <div class="table-stat">
                            <span class="dot"></span>
                            {{ count($arr_year) }} Tahun
                        </div>
                    @endif
                    <div class="table-stat">
                        <span class="dot"></span>
                        Publik
                    </div>
                </div>
            </div>

            {{-- Table --}}
            <div class="table-card__body">
                <div style="overflow-x:auto;">
                    <table id="example" class="stripe hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" data-priority="1">No</th>
                                <th class="text-left" data-priority="1">Nama Dokumen</th>
                                @foreach ($arr_year ?? [] as $year)
                                    <th class="text-center">{{ $year }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($results ?? [] as $v)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $v['name'] ?? '-' }}</td>
                                    @foreach ($v['year'] ?? [] as $year)
                                        <td>
                                            @if (($year['type'] ?? null) === 0 && !empty($year['document']))
                                                <a class="doc-link doc-link--url" href="{{ $year['document'] }}"
                                                    target="_blank" rel="noopener">
                                                    <svg viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                                        <path
                                                            d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                                    </svg>
                                                    Tautan
                                                </a>
                                            @elseif (($year['type'] ?? null) === 1 && !empty($year['document']))
                                                <a class="doc-link doc-link--file" href="{{ $year['document'] }}"
                                                    target="_blank" rel="noopener">
                                                    <svg viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Dokumen
                                                </a>
                                            @else
                                                <span class="doc-empty"></span>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ 2 + count($arr_year ?? []) }}" class="text-center py-8 text-gray-400">
                                        Belum ada data tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Legend --}}
                <div class="doc-legend">
                    <strong>Keterangan:</strong>
                    <div class="doc-legend-item">
                        <a class="doc-link doc-link--url" style="pointer-events:none;">
                            <svg viewBox="0 0 20 20" fill="currentColor" width="11" height="11">
                                <path
                                    d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                <path
                                    d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                            </svg>
                            Tautan
                        </a>
                        = Tautan eksternal
                    </div>
                    <div class="doc-legend-item">
                        <a class="doc-link doc-link--file" style="pointer-events:none;">
                            <svg viewBox="0 0 20 20" fill="currentColor" width="11" height="11">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                    clip-rule="evenodd" />
                            </svg>
                            Dokumen
                        </a>
                        = File unduhan
                    </div>
                    <div class="doc-legend-item">
                        <span class="doc-empty"></span>
                        &nbsp;= Belum tersedia
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer Note --}}
        <div class="footer-note">
            <div class="footer-note__icon">
                <span class="material-symbols-outlined">info</span>
            </div>
            <div class="footer-note__text">
                <h3>Tentang Informasi Serta Merta</h3>
                <p>
                    Sesuai UU No. 14 Tahun 2008, informasi ini wajib diumumkan tanpa penundaan
                    karena menyangkut hajat hidup orang banyak dan ketertiban umum.
                </p>
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
                            previous: '‹',
                        },
                    },
                    pageLength: 10,
                    dom: '<"flex flex-wrap items-center justify-between gap-3 mb-4"lf>rt<"flex flex-wrap items-center justify-between gap-3 mt-2"ip>',
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection
