{{-- resources/views/faq.blade.php --}}
@extends('base')

@section('css')
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet">

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
                    rgba(10, 18, 38, 0.60) 50%,
                    rgba(10, 18, 38, 0.86) 100%);
        }

        .hero__overlay::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(118deg, transparent 38%, rgba(201, 168, 76, .06) 52%, transparent 64%);
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

        /* Floating question marks decoration */
        .hero__deco {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .hero__deco span {
            position: absolute;
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(4rem, 10vw, 9rem);
            font-weight: 700;
            font-style: italic;
            color: rgba(232, 201, 109, .05);
            user-select: none;
            line-height: 1;
        }

        .hero__deco span:nth-child(1) {
            top: 10%;
            right: 12%;
        }

        .hero__deco span:nth-child(2) {
            bottom: 20%;
            left: 6%;
            font-size: clamp(3rem, 7vw, 6rem);
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
            font-size: clamp(2.2rem, 6.5vw, 4.2rem);
            font-weight: 700;
            line-height: 1.08;
            color: #fff;
            margin: 0 0 1rem;
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
            max-width: 560px;
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
            max-width: 900px;
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
            max-width: 900px;
            margin: 0 auto;
            padding: 3.5rem 1.5rem 5.5rem;
        }

        /* ── SECTION INTRO ────────────────────────────────── */
        .section-intro {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-intro__tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.62rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 0.85rem;
        }

        .section-intro__tag::before,
        .section-intro__tag::after {
            content: '';
            display: block;
            width: 24px;
            height: 1.5px;
            background: var(--gold);
            opacity: 0.6;
        }

        .section-intro__title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.8rem, 4.5vw, 2.8rem);
            font-weight: 700;
            color: var(--navy);
            line-height: 1.15;
            margin: 0 0 0.9rem;
        }

        .section-intro__title em {
            font-style: italic;
            color: var(--gold);
        }

        .section-intro__desc {
            font-size: 0.88rem;
            color: var(--muted);
            line-height: 1.8;
            max-width: 520px;
            margin: 0 auto;
        }

        /* ── SEARCH ───────────────────────────────────────── */
        .faq-search-wrap {
            position: relative;
            max-width: 480px;
            margin: 0 auto 2.5rem;
        }

        .faq-search-wrap svg {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 17px;
            height: 17px;
            color: var(--muted);
            pointer-events: none;
        }

        .faq-search {
            width: 100%;
            padding: 13px 18px 13px 44px;
            border: 1.5px solid var(--border);
            border-radius: 14px;
            background: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.88rem;
            color: var(--ink);
            outline: none;
            box-shadow: 0 2px 12px rgba(11, 31, 58, .06);
            transition: border-color .2s, box-shadow .2s;
        }

        .faq-search:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 4px rgba(201, 168, 76, .12);
        }

        .faq-search::placeholder {
            color: var(--muted);
        }

        /* ── ACCORDION ────────────────────────────────────── */
        .faq-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .faq-item {
            background: #fff;
            border-radius: 18px;
            border: 1.5px solid var(--border);
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(11, 31, 58, .05);
            transition: border-color .3s, box-shadow .3s;
            animation: faqIn .5s cubic-bezier(.22, 1, .36, 1) both;
        }

        @keyframes faqIn {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .faq-item.is-open {
            border-color: var(--gold);
            box-shadow:
                0 2px 4px rgba(0, 0, 0, 0.04),
                0 8px 28px rgba(11, 31, 58, .10);
        }

        .faq-item.hidden-faq {
            display: none;
        }

        /* Question button */
        .faq-btn {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.2rem 1.5rem;
            background: none;
            border: none;
            cursor: pointer;
            text-align: left;
            font-family: 'DM Sans', sans-serif;
            transition: background .2s;
        }

        .faq-btn:hover {
            background: var(--gold-pale);
        }

        .faq-item.is-open .faq-btn {
            background: var(--gold-pale);
        }

        /* Number badge */
        .faq-num {
            flex-shrink: 0;
            width: 32px;
            height: 32px;
            border-radius: 9px;
            background: var(--warm-white);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.68rem;
            font-weight: 700;
            color: var(--muted);
            transition: background .25s, color .25s, border-color .25s;
        }

        .faq-item.is-open .faq-num {
            background: var(--navy);
            color: #fff;
            border-color: var(--navy);
        }

        /* Question text */
        .faq-question {
            flex: 1;
            font-size: clamp(0.88rem, 1.8vw, 0.97rem);
            font-weight: 600;
            color: var(--navy);
            line-height: 1.5;
        }

        /* Chevron icon */
        .faq-chevron {
            flex-shrink: 0;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--warm-white);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .25s, border-color .25s, transform .35s cubic-bezier(.22, 1, .36, 1);
        }

        .faq-chevron svg {
            width: 13px;
            height: 13px;
            color: var(--muted);
            transition: color .25s;
        }

        .faq-item.is-open .faq-chevron {
            background: var(--gold);
            border-color: var(--gold);
            transform: rotate(180deg);
        }

        .faq-item.is-open .faq-chevron svg {
            color: var(--navy);
        }

        /* Answer panel */
        .faq-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height .4s cubic-bezier(.22, 1, .36, 1);
        }

        .faq-body.is-open {
            max-height: 600px;
        }

        .faq-answer {
            padding: 0 1.5rem 1.4rem 4.2rem;
            font-size: 0.88rem;
            line-height: 1.9;
            color: #4B5563;
            border-top: 1px solid var(--border);
            padding-top: 1.1rem;
        }

        /* Gold left bar on answer */
        .faq-answer-inner {
            position: relative;
            padding-left: 1rem;
        }

        .faq-answer-inner::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            border-radius: 2px;
            background: linear-gradient(to bottom, var(--gold), var(--gold-light));
        }

        /* ── NO RESULTS ───────────────────────────────────── */
        #faq-no-results {
            display: none;
            text-align: center;
            padding: 3rem 2rem;
            color: var(--muted);
            font-size: 0.88rem;
        }

        #faq-no-results .material-symbols-outlined {
            font-size: 2.8rem;
            opacity: .3;
            display: block;
            margin-bottom: 0.75rem;
        }

        /* ── CONTACT CTA ──────────────────────────────────── */
        .contact-cta {
            margin-top: 3rem;
            padding: 2rem 2rem;
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .contact-cta__left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .contact-cta__icon {
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: rgba(255, 255, 255, .1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact-cta__icon .material-symbols-outlined {
            font-size: 24px;
            color: var(--gold-light);
            font-variation-settings: 'FILL' 1, 'wght' 400;
        }

        .contact-cta__text h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: #fff;
            margin: 0 0 4px;
        }

        .contact-cta__text p {
            font-size: 0.78rem;
            color: rgba(255, 255, 255, .65);
            margin: 0;
            line-height: 1.55;
        }

        .contact-cta__btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 24px;
            background: var(--gold);
            color: var(--navy);
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            transition: background .2s, transform .2s;
        }

        .contact-cta__btn:hover {
            background: var(--gold-light);
            transform: scale(1.03);
        }

        /* ── RESPONSIVE ───────────────────────────────────── */
        @media (max-width: 640px) {
            .faq-answer {
                padding-left: 1.5rem;
            }

            .hero__corner,
            .hero__deco {
                display: none;
            }

            .contact-cta {
                flex-direction: column;
            }

            .contact-cta__btn {
                width: 100%;
                justify-content: center;
            }

            .faq-btn {
                padding: 1rem 1.1rem;
                gap: 0.75rem;
            }
        }
    </style>
@endsection

@section('content')
    {{-- ── HERO ──────────────────────────────────────────── --}}
    <section class="hero">
        <img class="hero__bg" src="{{ asset('assets/local/faq.png') }}" alt="FAQ">
        <div class="hero__overlay"></div>
        <div class="hero__corner"></div>
        <div class="hero__deco" aria-hidden="true">
            <span>?</span>
            <span>?</span>
        </div>
        <div class="hero__content">
            <div class="hero__eyebrow">PPID &mdash; BPKAD &mdash; Layanan Informasi</div>
            <h1 class="hero__title">Tanya <em>Jawab</em> Umum</h1>
            <p class="hero__desc">
                Temukan jawaban atas pertanyaan yang paling sering diajukan seputar
                layanan dan informasi BPKAD.
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
            <a href="#">Layanan</a>
            <span class="sep">›</span>
            <span class="active">FAQ</span>
        </div>
    </div>

    {{-- ── MAIN ──────────────────────────────────────────── --}}
    <div class="page-outer">

        {{-- Section intro --}}
        <div class="section-intro">
            <div class="section-intro__tag">Pertanyaan Umum</div>
            <h2 class="section-intro__title">Ada yang ingin <em>Ditanyakan?</em></h2>
            <p class="section-intro__desc">
                Kami menjawab pertanyaan yang paling sering disampaikan. Gunakan kolom pencarian
                untuk menemukan jawaban dengan cepat.
            </p>
        </div>

        {{-- Search --}}
        <div class="faq-search-wrap">
            <svg viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd" />
            </svg>
            <input type="text" class="faq-search" id="faq-search" placeholder="Cari pertanyaan..." autocomplete="off">
        </div>

        {{-- Accordion --}}
        <div class="faq-list" id="faq-list">
            @forelse ($data as $key => $d)
                <div class="faq-item {{ $key === 0 ? 'is-open' : '' }}" data-question="{{ strtolower($d->question) }}"
                    data-answer="{{ strtolower($d->answer) }}" style="animation-delay: {{ $key * 60 }}ms">

                    <button class="faq-btn" onclick="toggleFaq(this)" type="button">
                        <span class="faq-num">{{ $key + 1 }}</span>
                        <span class="faq-question">{{ $d->question }}</span>
                        <span class="faq-chevron">
                            <svg viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5 5 1 1 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>

                    <div class="faq-body {{ $key === 0 ? 'is-open' : '' }}">
                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                {{ $d->answer }}
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div style="text-align:center;padding:4rem 2rem;color:var(--muted);">
                    <span class="material-symbols-outlined"
                        style="font-size:3rem;opacity:.3;display:block;margin-bottom:.75rem;">quiz</span>
                    <p>Belum ada FAQ tersedia.</p>
                </div>
            @endforelse
        </div>

        {{-- No results --}}
        <div id="faq-no-results">
            <span class="material-symbols-outlined">search_off</span>
            Tidak ditemukan pertanyaan yang sesuai.
        </div>

        {{-- Contact CTA --}}
        <div class="contact-cta">
            <div class="contact-cta__left">
                <div class="contact-cta__icon">
                    <span class="material-symbols-outlined">contact_support</span>
                </div>
                <div class="contact-cta__text">
                    <h3>Pertanyaan Anda Belum Terjawab?</h3>
                    <p>Hubungi kami langsung melalui layanan pengaduan atau kontak resmi BPKAD.</p>
                </div>
            </div>
            <a href="/kontak" class="contact-cta__btn">
                Hubungi Kami
                <svg width="14" height="14" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12.293 4.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L15.586 11H3a1 1 0 110-2h12.586l-3.293-3.293a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>

    </div>
@endsection

@section('morejs')
    <script>
        // ── Toggle accordion ──────────────────────────────
        function toggleFaq(btn) {
            const item = btn.closest('.faq-item');
            const body = item.querySelector('.faq-body');
            const isOpen = item.classList.contains('is-open');

            // Close all
            document.querySelectorAll('.faq-item.is-open').forEach(el => {
                el.classList.remove('is-open');
                el.querySelector('.faq-body').classList.remove('is-open');
            });

            // Open clicked (unless it was already open)
            if (!isOpen) {
                item.classList.add('is-open');
                body.classList.add('is-open');
            }
        }

        // ── Live search ───────────────────────────────────
        (function() {
            const input = document.getElementById('faq-search');
            const items = document.querySelectorAll('.faq-item');
            const noResults = document.getElementById('faq-no-results');

            if (!input) return;

            input.addEventListener('input', function() {
                const q = this.value.trim().toLowerCase();
                let visible = 0;

                items.forEach(item => {
                    const q_text = (item.dataset.question || '') + ' ' + (item.dataset.answer || '');
                    const match = !q || q_text.includes(q);
                    item.classList.toggle('hidden-faq', !match);
                    if (match) visible++;
                });

                noResults.style.display = visible === 0 ? 'block' : 'none';
            });
        })();
    </script>
@endsection
