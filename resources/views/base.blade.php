<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BPKAD || Badan Pengelolaan Keuangan dan Aset Daerah Kabupaten Serdang Bedagai</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <link href="{{ asset(mix('/css/app.css')) }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('logobpkad.png') }}">

    @yield('css')
    <style>
        /* ═══ NOTIF FAB + TOAST ═══ */
        .notif-fab {
            position: fixed;
            bottom: 32px;
            right: 32px;
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, #C8A84B, #E8C96D);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 8px 28px rgba(200, 168, 75, 0.45);
            transition: transform 0.2s, box-shadow 0.2s;
            z-index: 9999;
            border: none;
            text-decoration: none;
        }

        .notif-fab:hover {
            transform: scale(1.08);
            box-shadow: 0 12px 36px rgba(200, 168, 75, 0.6);
        }

        .notif-fab svg {
            width: 22px;
            height: 22px;
            fill: #0B1F3A;
        }

        .notif-fab-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            background: #E53E3E;
            color: white;
            font-size: 10px;
            font-weight: 700;
            border-radius: 10px;
            padding: 1px 5px;
            min-width: 18px;
            text-align: center;
            border: 2px solid var(--cream);
            display: none;
            animation: badge-pop 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) both;
        }

        @keyframes badge-pop {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }

        /* Toast */
        .toast-container {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 10000;
            display: flex;
            flex-direction: column;
            gap: 10px;
            pointer-events: none;
            max-width: 340px;
            width: calc(100vw - 40px);
        }

        .toast-item {
            background: white;
            border-left: 4px solid #C8A84B;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(11, 31, 58, 0.18);
            padding: 14px 40px 14px 14px;
            display: flex;
            align-items: flex-start;
            gap: 11px;
            pointer-events: all;
            animation: toast-in 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) both;
            position: relative;
            cursor: pointer;
        }

        .toast-item:hover {
            box-shadow: 0 12px 40px rgba(11, 31, 58, 0.22);
        }

        .toast-item.removing {
            animation: toast-out 0.3s ease-in forwards;
        }

        @keyframes toast-in {
            from {
                opacity: 0;
                transform: translateX(60px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        @keyframes toast-out {
            to {
                opacity: 0;
                transform: translateX(60px);
            }
        }

        .toast-icon {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            background: rgba(200, 168, 75, 0.12);
        }

        .toast-body {
            flex: 1;
            min-width: 0;
        }

        .toast-title {
            font-size: 13px;
            font-weight: 700;
            color: #0B1F3A;
            margin-bottom: 2px;
        }

        .toast-msg {
            font-size: 12px;
            color: #6B7280;
            line-height: 1.5;
        }

        .toast-close {
            position: absolute;
            top: 8px;
            right: 10px;
            background: none;
            border: none;
            cursor: pointer;
            color: #9CA3AF;
            font-size: 16px;
            line-height: 1;
            padding: 3px 5px;
            border-radius: 4px;
        }

        .toast-close:hover {
            color: #0B1F3A;
            background: #F3F4F6;
        }

        .toast-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, #C8A84B, #E8C96D);
            border-radius: 0 0 0 12px;
            animation: progress-shrink 5s linear forwards;
        }

        @keyframes progress-shrink {
            from {
                width: 100%;
            }

            to {
                width: 0%;
            }
        }
    </style>
    <style>
        :root {
            --navy: #0B1F3A;
            --navy-mid: #12305C;
            --gold: #C8A84B;
            --gold-light: #E8C96D;
            --cream: #F8F5EE;
            --slate: #5A6A7E;
            --text: #1A2535;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            color: var(--text);
            -webkit-font-smoothing: antialiased;
        }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1ece3;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gold);
            border-radius: 99px;
        }

        /* ── HEADER ── */
        #mainHeader {
            background: rgba(11, 31, 58, 0.97);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(200, 168, 75, 0.15);
        }

        /* ── TOP BAR ── */
        .header-topbar {
            background: rgba(200, 168, 75, 0.08);
            border-bottom: 1px solid rgba(200, 168, 75, 0.1);
            padding: 5px 0;
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.45);
            letter-spacing: 0.06em;
        }

        /* ── NAV LINK BASE ── */
        .nav-link {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            color: rgba(255, 255, 255, 0.72);
            font-size: 0.78rem;
            font-weight: 500;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 6px 2px;
            position: relative;
            transition: color 0.25s;
            white-space: nowrap;
            cursor: pointer;
            background: none;
            border: none;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--gold-light);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .nav-link.active {
            color: var(--gold);
        }

        /* chevron icon */
        .nav-link .chev {
            width: 12px;
            height: 12px;
            transition: transform 0.25s;
            opacity: .6;
            flex-shrink: 0;
        }

        /* ── DROPDOWN ── */
        .nav-item {
            position: relative;
        }

        .nav-dropdown {
            position: absolute;
            top: calc(100% + 14px);
            left: 50%;
            transform: translateX(-50%) translateY(-6px);
            min-width: 220px;
            background: white;
            border-radius: 12px;
            box-shadow:
                0 4px 6px -1px rgba(0, 0, 0, 0.08),
                0 20px 48px -8px rgba(11, 31, 58, 0.22),
                0 0 0 1px rgba(200, 168, 75, 0.12);
            padding: 8px 0;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease, transform 0.2s ease;
            z-index: 100;
        }

        /* arrow tip */
        .nav-dropdown::before {
            content: '';
            position: absolute;
            top: -6px;
            left: 50%;
            transform: translateX(-50%);
            width: 12px;
            height: 12px;
            background: white;
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        }

        .nav-item:hover .nav-dropdown,
        .nav-item:focus-within .nav-dropdown {
            opacity: 1;
            pointer-events: auto;
            transform: translateX(-50%) translateY(0);
        }

        .nav-item:hover .chev {
            transform: rotate(180deg);
        }

        .nav-dropdown a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 18px;
            font-size: 0.82rem;
            font-weight: 400;
            color: #334155;
            letter-spacing: 0.01em;
            transition: background 0.15s, color 0.15s, padding-left 0.2s;
            text-decoration: none;
        }

        .nav-dropdown a:hover {
            background: rgba(11, 31, 58, 0.04);
            color: var(--navy);
            padding-left: 24px;
        }

        .nav-dropdown a .dd-dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--gold);
            flex-shrink: 0;
            opacity: 0;
            transition: opacity 0.15s;
        }

        .nav-dropdown a:hover .dd-dot {
            opacity: 1;
        }

        .nav-dropdown hr {
            margin: 6px 14px;
            border: none;
            border-top: 1px solid rgba(200, 168, 75, 0.12);
        }

        /* ── MOBILE MENU ── */
        #mobileMenu {
            background: var(--navy);
        }

        .mob-nav-link {
            display: block;
            color: rgba(255, 255, 255, 0.72);
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            transition: color 0.2s;
        }

        .mob-nav-link:hover {
            color: var(--gold-light);
        }

        .mob-nav-link.active {
            color: var(--gold);
        }

        .mob-toggle {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.72);
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            cursor: pointer;
            transition: color 0.2s;
        }

        .mob-toggle:hover {
            color: var(--gold-light);
        }

        .mob-toggle .chev {
            width: 14px;
            height: 14px;
            transition: transform 0.25s;
        }

        .mob-toggle.open {
            color: var(--gold-light);
        }

        .mob-toggle.open .chev {
            transform: rotate(180deg);
        }

        .mob-submenu {
            display: none;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 8px;
            margin: 4px 0 8px;
            overflow: hidden;
        }

        .mob-submenu.open {
            display: block;
        }

        .mob-submenu a {
            display: block;
            color: rgba(255, 255, 255, 0.55);
            font-size: 0.8rem;
            padding: 9px 16px;
            transition: color 0.15s, background 0.15s;
            text-decoration: none;
        }

        .mob-submenu a:hover {
            color: var(--gold-light);
            background: rgba(255, 255, 255, 0.04);
        }

        /* ── GOLD DIVIDER ── */
        .gold-divider {
            width: 56px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            border-radius: 2px;
        }

        /* ── SECTION TITLE ── */
        .section-title {
            font-family: 'Playfair Display', serif;
            color: var(--navy);
        }

        /* ── FOOTER ── */
        footer {
            background: var(--navy);
            background-image:
                radial-gradient(ellipse at 80% 0%, rgba(200, 168, 75, 0.08) 0%, transparent 60%),
                radial-gradient(ellipse at 10% 100%, rgba(200, 168, 75, 0.05) 0%, transparent 50%);
        }

        /* ── REVEAL ANIMATION ── */
        .reveal {
            opacity: 0;
            transform: translateY(32px);
            transition: opacity 0.75s ease, transform 0.75s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: none;
        }

        /* ── MOBILE MENU ── */
        #mobileMenu {
            background: var(--navy);
            border-top: 1px solid rgba(200, 168, 75, 0.2);
        }

        /* Page fade-in */
        @keyframes pageFade {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        main {
            animation: pageFade 0.6s ease-out both;
        }
    </style>
</head>

<body>

    <!-- ═══════════════════════════════════════════
         HEADER
    ═══════════════════════════════════════════ -->
    <header id="mainHeader" class="sticky top-0 z-50 transition-all duration-300">

        {{-- Top bar --}}
        <div class="header-topbar hidden md:block">
            <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
                <span>Badan Pengelolaan Keuangan dan Aset Daerah · Kabupaten Serdang Bedagai</span>
                <span style="color:rgba(200,168,75,0.7)">Melayani dengan Integritas</span>
            </div>
        </div>

        {{-- Main nav bar --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-[68px]">

                {{-- Logo --}}
                <a href="{{ route('beranda') }}" class="flex items-center gap-3 group shrink-0">
                    <div class="relative">
                        <div class="absolute inset-0 rounded-full scale-125 opacity-0 group-hover:opacity-100 transition-all duration-500"
                            style="background: radial-gradient(circle, rgba(200,168,75,0.2), transparent)"></div>
                        <img src="{{ asset('/assets/local/logobpkad.png') }}" class="h-10 w-auto relative"
                            alt="Logo" loading="lazy">
                    </div>
                    <div class="hidden lg:block">
                        <p class="text-white font-semibold text-sm leading-tight tracking-wide">BPKAD Serdang Bedagai
                        </p>
                        <p class="text-xs" style="color:rgba(200,168,75,0.8); letter-spacing:0.04em">Kab. Serdang
                            Bedagai</p>
                    </div>
                </a>

                {{-- ── DESKTOP NAV ── --}}
                <nav class="hidden lg:flex items-center gap-1">

                    {{-- Beranda --}}
                    <div class="nav-item">
                        <a href="{{ route('beranda') }}"
                            class="nav-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                    </div>

                    {{-- Profil --}}
                    <div class="nav-item">
                        <button class="nav-link {{ request()->is('profil*') ? 'active' : '' }}">
                            Profil
                            <svg class="chev" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="nav-dropdown">
                            <a href="{{ route('visimisi') }}"><span class="dd-dot"></span>Visi &amp; Misi</a>
                            <a href="{{ route('structure') }}"><span class="dd-dot"></span>Struktur Organisasi</a>
                            <a href="{{ route('motto') }}"><span class="dd-dot"></span>Motto</a>
                            <a href="{{ route('skpengelolawebsite') }}"><span class="dd-dot"></span>SK Pengelola
                                Website</a>
                        </div>
                    </div>

                    {{-- Layanan --}}
                    <div class="nav-item">
                        <button class="nav-link {{ request()->is('layanan*') ? 'active' : '' }}">
                            Layanan
                            <svg class="chev" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="nav-dropdown">
                            <a href="{{ route('maklumat') }}"><span class="dd-dot"></span>Maklumat Pelayanan</a>
                            <a href="{{ route('sp') }}"><span class="dd-dot"></span>Standar Pelayanan</a>
                            <a href="{{ route('skm') }}"><span class="dd-dot"></span>Survey Kepuasan Masyarakat</a>
                            <a href="{{ route('informasilayanan') }}"><span class="dd-dot"></span>Informasi Layanan</a>
                        </div>
                    </div>

                    {{-- Aduan --}}
                    <div class="nav-item">
                        <button class="nav-link {{ request()->is('aduan*') ? 'active' : '' }}">
                            Aduan
                            <svg class="chev" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="nav-dropdown">
                            <a href="https://www.lapor.go.id/" target="_blank"><span class="dd-dot"></span>SP4N ↗</a>
                            <hr>
                            <a href="{{ route('skaduan') }}"><span class="dd-dot"></span>SK Pengelola Aduan</a>
                            <a href="{{ route('grafikaduan') }}"><span class="dd-dot"></span>Grafik Aduan</a>
                        </div>
                    </div>

                    {{-- Bidang --}}
                    <div class="nav-item">
                        <button class="nav-link {{ request()->is('bidang*') ? 'active' : '' }}">
                            Bidang
                            <svg class="chev" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="nav-dropdown">
                            <a href="{{ route('sekretariat') }}"><span class="dd-dot"></span>Sekretariat</a>
                            <a href="{{ route('anggaran') }}"><span class="dd-dot"></span>Anggaran</a>
                            <a href="{{ route('perbendaharaan') }}"><span class="dd-dot"></span>Perbendaharaan &amp;
                                Akuntansi</a>
                            <a href="{{ route('aset') }}"><span class="dd-dot"></span>Aset</a>
                            <a href="{{ route('uptd') }}"><span class="dd-dot"></span>UPTD</a>
                        </div>
                    </div>

                    {{-- Artikel --}}
                    <div class="nav-item">
                        <a href="{{ route('artikel.index') }}"
                            class="nav-link {{ request()->is('artikel*') ? 'active' : '' }}">Artikel</a>
                    </div>

                    {{-- PPID --}}
                    <div class="nav-item">
                        <button class="nav-link {{ request()->is('ppid*') ? 'active' : '' }}">
                            PPID
                            <svg class="chev" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="nav-dropdown">
                            <a href="{{ route('information.periodic') }}"><span class="dd-dot"></span>Informasi
                                Berkala</a>
                            <a href="{{ route('information.serta-merta') }}"><span class="dd-dot"></span>Informasi
                                Serta Merta</a>
                            <a href="{{ route('information.setiap-saat') }}"><span class="dd-dot"></span>Informasi
                                Setiap Saat</a>
                            <a href="{{ route('information.di-kecualikan') }}"><span class="dd-dot"></span>Informasi
                                Dikecualikan</a>
                            <hr>
                        </div>
                    </div>

                    {{-- Produk Hukum --}}
                    <div class="nav-item">
                        <button class="nav-link {{ request()->is('produk-hukum*') ? 'active' : '' }}">
                            Produk Hukum
                            <svg class="chev" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="nav-dropdown">
                            <a href="{{ route('produkhukumperda') }}"><span class="dd-dot"></span>Produk Hukum
                                Perda</a>
                            <a href="{{ route('produkhukumperwali') }}"><span class="dd-dot"></span>Produk Hukum
                                Perwali</a>
                        </div>
                    </div>

                    {{-- FAQ --}}
                    <div class="nav-item">
                        <a href="{{ route('faq') }}"
                            class="nav-link {{ request()->is('faq*') ? 'active' : '' }}">FAQ</a>
                    </div>

                </nav>

                {{-- Mobile Btn --}}
                <button id="menuBtn" class="lg:hidden p-2 rounded-lg transition-colors" style="color:var(--gold)">
                    <svg id="iconOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="iconClose" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>
        </div>

        {{-- ── MOBILE MENU ── --}}
        <div id="mobileMenu" class="lg:hidden hidden">
            <div class="max-w-7xl mx-auto px-6 py-4" style="border-top:1px solid rgba(200,168,75,0.12)">

                <a href="{{ route('beranda') }}"
                    class="mob-nav-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a>

                {{-- Profil --}}
                <button class="mob-toggle {{ request()->is('profil*') ? 'active' : '' }}" onclick="mobToggle(this)">
                    Profil
                    <svg class="chev" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="mob-submenu {{ request()->is('profil*') ? 'open' : '' }}">
                    <a href="{{ route('visimisi') }}">Visi &amp; Misi</a>
                    <a href="{{ route('structure') }}">Struktur Organisasi</a>
                    <a href="{{ route('motto') }}">Motto</a>
                    <a href="{{ route('skpengelolawebsite') }}">SK Pengelola Website</a>
                </div>

                {{-- Layanan --}}
                <button class="mob-toggle {{ request()->is('layanan*') ? 'active' : '' }}" onclick="mobToggle(this)">
                    Layanan
                    <svg class="chev" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="mob-submenu {{ request()->is('layanan*') ? 'open' : '' }}">
                    <a href="{{ route('maklumat') }}">Maklumat Pelayanan</a>
                    <a href="{{ route('sp') }}">Standar Pelayanan</a>
                    <a href="{{ route('skm') }}">Survey Kepuasan Masyarakat</a>
                    <a href="{{ route('informasilayanan') }}">Informasi Layanan</a>
                </div>

                {{-- Aduan --}}
                <button class="mob-toggle {{ request()->is('aduan*') ? 'active' : '' }}" onclick="mobToggle(this)">
                    Aduan
                    <svg class="chev" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="mob-submenu {{ request()->is('aduan*') ? 'open' : '' }}">
                    <a href="https://www.lapor.go.id/" target="_blank">SP4N ↗</a>
                    <a href="{{ route('skaduan') }}">SK Pengelola Aduan</a>
                    <a href="{{ route('grafikaduan') }}">Grafik Aduan</a>
                </div>

                {{-- Bidang --}}
                <button class="mob-toggle {{ request()->is('bidang*') ? 'active' : '' }}" onclick="mobToggle(this)">
                    Bidang
                    <svg class="chev" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="mob-submenu {{ request()->is('bidang*') ? 'open' : '' }}">
                    <a href="{{ route('sekretariat') }}">Sekretariat</a>
                    <a href="{{ route('anggaran') }}">Anggaran</a>
                    <a href="{{ route('perbendaharaan') }}">Perbendaharaan &amp; Akuntansi</a>
                    <a href="{{ route('aset') }}">Aset</a>
                    <a href="{{ route('uptd') }}">UPTD</a>
                </div>

                <a href="{{ route('artikel.index') }}"
                    class="mob-nav-link {{ request()->is('artikel*') ? 'active' : '' }}">Artikel</a>

                {{-- PPID --}}
                <button class="mob-toggle {{ request()->is('ppid*') ? 'active' : '' }}" onclick="mobToggle(this)">
                    PPID
                    <svg class="chev" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="mob-submenu {{ request()->is('ppid*') ? 'open' : '' }}">
                    <a href="{{ route('information.periodic') }}">Informasi Berkala</a>
                    <a href="{{ route('information.serta-merta') }}">Informasi Serta Merta</a>
                    <a href="{{ route('information.setiap-saat') }}">Informasi Setiap Saat</a>
                    <a href="{{ route('information.di-kecualikan') }}">Informasi Dikecualikan</a>
                </div>

                {{-- Produk Hukum --}}
                <button class="mob-toggle {{ request()->is('produk-hukum*') ? 'active' : '' }}"
                    onclick="mobToggle(this)">
                    Produk Hukum
                    <svg class="chev" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="mob-submenu {{ request()->is('produk-hukum*') ? 'open' : '' }}">
                    <a href="{{ route('produkhukumperda') }}">Produk Hukum Perda</a>
                    <a href="{{ route('produkhukumperwali') }}">Produk Hukum Perwali</a>
                </div>

                <a href="{{ route('faq') }}"
                    class="mob-nav-link {{ request()->is('faq*') ? 'active' : '' }}">FAQ</a>

            </div>
        </div>
    </header>


    <!-- ═══════════════════════════════════════════
         CONTENT
    ═══════════════════════════════════════════ -->
    <main class="min-h-screen">
        @yield('content')
    </main>


    <!-- ═══════════════════════════════════════════
         FOOTER
    ═══════════════════════════════════════════ -->
    <footer class="mt-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 pt-16 pb-10 grid md:grid-cols-3 gap-12">

            <!-- About -->
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <img src="{{ asset('/assets/local/logobpkad.png') }}" class="h-10 w-auto opacity-90"
                        alt="Logo">
                    <div>
                        <p class="text-white font-semibold text-sm">BPKAD</p>
                        <p class="text-xs" style="color:var(--gold)">Serdang Bedagai</p>
                    </div>
                </div>
                <p id="short_his" class="text-sm leading-relaxed" style="color:rgba(255,255,255,0.55)"></p>
            </div>

            <!-- Kontak -->
            <div>
                <h3 class="text-white font-semibold text-base mb-6 flex items-center gap-2">
                    <span class="inline-block w-6 h-px" style="background:var(--gold)"></span>
                    Kontak
                </h3>
                <div class="space-y-3 text-sm" style="color:rgba(255,255,255,0.55)">
                    <p class="textEmail flex items-start gap-2">
                        <span style="color:var(--gold)" class="mt-0.5 shrink-0">✉</span>
                        <span class="textEmailInner"></span>
                    </p>
                    <p class="flex items-start gap-2">
                        <span style="color:var(--gold)" class="mt-0.5 shrink-0">📍</span>
                        <span class="textAddressInner"></span>
                    </p>
                    <p class="flex items-start gap-2">
                        <span style="color:var(--gold)" class="mt-0.5 shrink-0">☎</span>
                        <span class="textPhoneInner"></span>
                    </p>
                    <p class="flex items-start gap-2">
                        <span style="color:var(--gold)" class="mt-0.5 shrink-0">⏰</span>
                        <span class="textOfficeHoursInner"></span>
                    </p>
                </div>
            </div>

            <!-- Visitor Stats -->
            <div>
                <h3 class="text-white font-semibold text-base mb-6 flex items-center gap-2">
                    <span class="inline-block w-6 h-px" style="background:var(--gold)"></span>
                    Statistik Pengunjung
                </h3>
                <div class="space-y-3 text-sm" style="color:rgba(255,255,255,0.55)">
                    <div class="flex justify-between border-b pb-2" style="border-color:rgba(255,255,255,0.08)">
                        <span>Hari Ini</span>
                        <span class="text-white font-medium">{{ $todayVisitors }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2" style="border-color:rgba(255,255,255,0.08)">
                        <span>Kemarin</span>
                        <span class="text-white font-medium">{{ $yesterdayVisitors }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2" style="border-color:rgba(255,255,255,0.08)">
                        <span>Bulan Ini</span>
                        <span class="text-white font-medium">{{ $thisMonthVisitors }}</span>
                    </div>
                    <div class="flex justify-between pt-1">
                        <span class="text-white font-semibold">Total</span>
                        <span class="font-bold text-base" style="color:var(--gold)">{{ $totalVisitors }}</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom bar -->
        <div class="border-t mx-4 sm:mx-6 md:mx-0" style="border-color:rgba(200,168,75,0.15)"></div>
        <div class="text-center text-xs py-5" style="color:rgba(255,255,255,0.35)">
            © 2026 BPKAD Kabupaten Serdang Bedagai &nbsp;·&nbsp; Semua Hak Dilindungi
        </div>
    </footer>


    <!-- ═══════════════════════════════════════════
     SCRIPTS
═══════════════════════════════════════════ -->
    <script defer>
        console.log("SCRIPT LOADED");


        // ─────────────────────────────
        // MOBILE MENU TOGGLE
        // ─────────────────────────────
        const btn = document.getElementById("menuBtn");
        const menu = document.getElementById("mobileMenu");
        const iconOpen = document.getElementById("iconOpen");
        const iconClose = document.getElementById("iconClose");

        if (btn && menu && iconOpen && iconClose) {
            btn.addEventListener("click", function() {
                const isOpen = !menu.classList.contains("hidden");

                menu.classList.toggle("hidden", isOpen);
                iconOpen.classList.toggle("hidden", !isOpen);
                iconClose.classList.toggle("hidden", isOpen);
            });
        }


        // ─────────────────────────────
        // STICKY SHADOW HEADER
        // ─────────────────────────────
        const header = document.getElementById("mainHeader");

        if (header) {
            window.addEventListener("scroll", function() {
                header.style.boxShadow =
                    window.scrollY > 8 ?
                    "0 4px 32px rgba(0,0,0,0.5)" :
                    "none";
            });
        }


        // ─────────────────────────────
        // REVEAL ON SCROLL
        // ─────────────────────────────
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add("active");
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll(".reveal").forEach(function(el) {
            observer.observe(el);
        });


        // ─────────────────────────────
        // MOBILE SUBMENU ACCORDION
        // ─────────────────────────────
        function mobToggle(btn) {
            const sub = btn.nextElementSibling;
            if (!sub) return;

            const isOpen = sub.classList.contains("open");

            document.querySelectorAll(".mob-submenu.open")
                .forEach(function(s) {
                    s.classList.remove("open");
                });

            document.querySelectorAll(".mob-toggle.open")
                .forEach(function(b) {
                    b.classList.remove("open");
                });

            if (!isOpen) {
                sub.classList.add("open");
                btn.classList.add("open");
            }
        }


        // ─────────────────────────────
        // FETCH CONTACT DATA
        // ─────────────────────────────
        contact();
        short_history();

        function contact() {

            console.log("CONTACT FUNCTION JALAN");

            fetch('{{ route('contact.profile.json') }}')
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error("HTTP error " + response.status);
                    }
                    return response.json();
                })
                .then(function(data) {

                    console.log("DATA DARI API:", data);

                    const email = document.querySelector('.textEmailInner');
                    const address = document.querySelector('.textAddressInner');
                    const officeHours = document.querySelector('.textOfficeHoursInner');
                    const phone = document.querySelector('.textPhoneInner');

                    if (email) email.textContent = data?.email ?? '-';
                    if (address) address.textContent = data?.address ?? '-';
                    if (officeHours) officeHours.textContent = data?.office_hours ?? '-';
                    if (phone) phone.textContent = data?.phone ?? '-';

                })
                .catch(function(error) {
                    console.error("FETCH ERROR:", error);
                });
        }

        function short_history() {
            fetch('{{ route('home.setting.json') }}')
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error("HTTP error " + response.status);
                    }
                    return response.json();
                })
                .then((data) => {
                    document.getElementById('short_his').innerHTML = data?.history
                })
        }
    </script>

    @yield('morejs')
    {{-- ═══ FAB BELL ═══ --}}
    <a href="{{ route('beranda') }}#notif-section" class="notif-fab" id="notif-fab"
        title="Notifikasi & Pengumuman">
        <svg viewBox="0 0 24 24">
            <path
                d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5S10.5 3.17 10.5 4v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" />
        </svg>
        <span class="notif-fab-badge" id="notif-fab-badge">0</span>
    </a>

    {{-- ═══ TOAST CONTAINER ═══ --}}
    <div class="toast-container" id="toast-container"></div>

    <script>
        (function() {
            // ── Fetch jumlah unread untuk badge ──
            function loadUnreadCount() {
                fetch('/notifications/unread-count')
                    .then(r => r.json())
                    .then(data => {
                        const badge = document.getElementById('notif-fab-badge');
                        if (!badge) return;
                        const count = data.count || 0;
                        badge.textContent = count;
                        badge.style.display = count > 0 ? 'block' : 'none';
                    })
                    .catch(() => {});
            }

            // ── Toast ──
            window.showToast = function(icon, title, msg, onClick) {
                const container = document.getElementById('toast-container');
                if (!container) return;

                const id = 'toast-' + Date.now();
                const el = document.createElement('div');
                el.className = 'toast-item';
                el.id = id;
                el.innerHTML = `
            <div class="toast-icon">${icon}</div>
            <div class="toast-body">
                <div class="toast-title">${title}</div>
                <div class="toast-msg">${msg}</div>
            </div>
            <button class="toast-close" onclick="removeToast('${id}')">✕</button>
            <div class="toast-progress"></div>
        `;

                if (onClick) {
                    el.style.cursor = 'pointer';
                    el.addEventListener('click', function(e) {
                        if (!e.target.classList.contains('toast-close')) onClick();
                    });
                }

                container.appendChild(el);
                const timer = setTimeout(() => removeToast(id), 5000);
                el._timer = timer;
            };

            window.removeToast = function(id) {
                const el = document.getElementById(id);
                if (!el) return;
                clearTimeout(el._timer);
                el.classList.add('removing');
                setTimeout(() => el?.remove(), 300);
            };

            // ── Polling setiap 60 detik ──
            loadUnreadCount();
            setInterval(loadUnreadCount, 60000);

            // ── Tampilkan toast dari notif terbaru (opsional) ──
            // Uncomment jika ingin auto-toast saat halaman load:
            // fetch('/notifications/latest-unread')
            //     .then(r => r.json())
            //     .then(data => {
            //         if (data.notification) {
            //             const n = data.notification;
            //             showToast(n.icon, n.title, n.excerpt, () => {
            //                 window.location.href = '{{ route('beranda') }}#notif-section';
            //             });
            //         }
            //     });
        })();
    </script>
</body>

</html>
