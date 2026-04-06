@extends('base')

@section('css')
    <style>
        /* ═══════════════ HERO ═══════════════ */
        .hero-section {
            position: relative;
            height: 100vh;
            min-height: 600px;
            max-height: 860px;
            overflow: hidden;
        }

        .hero-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(105deg,
                    rgba(11, 31, 58, 0.93) 0%,
                    rgba(18, 48, 92, 0.82) 45%,
                    rgba(11, 31, 58, 0.55) 100%);
        }

        .hero-content {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(200, 168, 75, 0.15);
            border: 1px solid rgba(200, 168, 75, 0.4);
            color: #E8C96D;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 6px 16px;
            border-radius: 99px;
            margin-bottom: 24px;
        }

        .hero-badge::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            background: #C8A84B;
            border-radius: 50%;
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .5;
                transform: scale(1.6);
            }
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.6rem);
            font-weight: 700;
            color: white;
            line-height: 1.15;
            margin-bottom: 16px;
        }

        .hero-title span {
            color: #E8C96D;
        }

        .hero-subtitle {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.72);
            margin-bottom: 40px;
            max-width: 480px;
            line-height: 1.7;
        }

        .hero-cta-primary {
            display: inline-block;
            background: linear-gradient(135deg, #C8A84B, #E8C96D);
            color: var(--navy);
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 14px 32px;
            border-radius: 6px;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 8px 32px rgba(200, 168, 75, 0.35);
        }

        .hero-cta-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(200, 168, 75, 0.5);
        }

        .hero-cta-secondary {
            display: inline-block;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.05em;
            padding: 14px 28px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 6px;
            margin-left: 14px;
            transition: all 0.2s;
        }

        .hero-cta-secondary:hover {
            border-color: rgba(200, 168, 75, 0.6);
            color: #E8C96D;
        }

        .scroll-indicator {
            position: absolute;
            bottom: 36px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            color: rgba(255, 255, 255, 0.45);
            font-size: 0.7rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            animation: bounce-slow 2.5s ease-in-out infinite;
        }

        @keyframes bounce-slow {

            0%,
            100% {
                transform: translateX(-50%) translateY(0);
            }

            50% {
                transform: translateX(-50%) translateY(8px);
            }
        }

        .hero-lines {
            position: absolute;
            right: 0;
            top: 0;
            width: 55%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .hero-lines::before {
            content: '';
            position: absolute;
            top: -10%;
            right: -5%;
            width: 500px;
            height: 500px;
            border: 1px solid rgba(200, 168, 75, 0.12);
            border-radius: 50%;
        }

        .hero-lines::after {
            content: '';
            position: absolute;
            top: 5%;
            right: 10%;
            width: 320px;
            height: 320px;
            border: 1px solid rgba(200, 168, 75, 0.08);
            border-radius: 50%;
        }

        /* ═══════════════ QUICK INFO ═══════════════ */
        .info-card {
            background: white;
            border-radius: 16px;
            padding: 32px 24px;
            text-align: center;
            box-shadow: 0 4px 32px rgba(11, 31, 58, 0.07);
            border: 1px solid rgba(200, 168, 75, 0.12);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .info-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 48px rgba(11, 31, 58, 0.12);
        }

        .info-icon {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, var(--navy), var(--navy-mid));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin: 0 auto 16px;
            box-shadow: 0 6px 18px rgba(11, 31, 58, 0.25);
            color: #fff;
        }

        /* ═══════════════ NEWS ═══════════════ */
        .news-featured-img {
            border-radius: 16px;
            overflow: hidden;
            position: relative;
        }

        .news-featured-img::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(11, 31, 58, 0.4) 0%, transparent 60%);
        }

        .article-card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid rgba(200, 168, 75, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 2px 16px rgba(11, 31, 58, 0.05);
        }

        .article-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 48px rgba(11, 31, 58, 0.12);
        }

        .article-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .article-card:hover img {
            transform: scale(1.05);
        }

        /* ═══════════════ VIDEO ═══════════════ */
        .video-section {
            background: var(--navy);
            background-image:
                radial-gradient(ellipse at 0% 50%, rgba(200, 168, 75, 0.07) 0%, transparent 50%),
                radial-gradient(ellipse at 100% 50%, rgba(200, 168, 75, 0.05) 0%, transparent 50%),
                url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23C8A84B' fill-opacity='0.04'%3E%3Cpath d='M0 0h20v20H0zM20 20h20v20H20z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* ═══════════════ APPS ═══════════════ */
        .app-card {
            background: white;
            border-radius: 16px;
            padding: 32px 20px 28px;
            text-align: center;
            border: 1px solid rgba(200, 168, 75, 0.1);
            box-shadow: 0 2px 16px rgba(11, 31, 58, 0.05);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .app-card::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            transform: scaleX(0);
            transition: transform 0.3s;
        }

        .app-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 48px rgba(11, 31, 58, 0.12);
        }

        .app-card:hover::before {
            transform: scaleX(1);
        }

        /* ═══════════════ SLIDER ═══════════════ */
        .slider-header {
            height: 100%;
        }

        .slider-header>div {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }

        /* ═══════════════ HERO ANIM ═══════════════ */
        @keyframes heroIn {
            from {
                opacity: 0;
                transform: translateY(28px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .hero-badge {
            animation: heroIn 0.8s 0.2s ease-out both;
        }

        .hero-title {
            animation: heroIn 0.8s 0.4s ease-out both;
        }

        .hero-subtitle {
            animation: heroIn 0.8s 0.55s ease-out both;
        }

        .hero-btns {
            animation: heroIn 0.8s 0.7s ease-out both;
        }

        /* ═══════════════ NOTIFIKASI ═══════════════ */
        @keyframes modal-in {
            from {
                opacity: 0;
                transform: scale(0.92) translateY(20px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        @keyframes card-reveal {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        /* Tab — di atas background cream jadi pakai warna navy */
        .notif-tab {
            padding: 7px 18px;
            border-radius: 99px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            border: 1.5px solid rgba(11, 31, 58, 0.2);
            background: transparent;
            color: var(--slate);
            transition: all 0.2s;
        }

        .notif-tab:hover {
            border-color: var(--gold);
            color: var(--gold);
        }

        .notif-tab.active {
            background: var(--navy);
            color: var(--gold-light);
            border-color: var(--navy);
            font-weight: 700;
        }

        /* Card — di atas cream, pakai warna navy/putih bukan transparan */
        .notif-card {
            background: white;
            border-radius: 16px;
            padding: 20px 24px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            border: 1px solid rgba(200, 168, 75, 0.15);
            box-shadow: 0 2px 16px rgba(11, 31, 58, 0.05);
            transition: all 0.25s;
            position: relative;
            overflow: hidden;
            animation: card-reveal 0.4s ease-out both;
        }

        .notif-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(180deg, var(--gold), var(--gold-light));
            opacity: 0;
            transition: opacity 0.2s;
        }

        .notif-card.unread {
            background: #FFFDF7;
            border-color: rgba(200, 168, 75, 0.3);
        }

        .notif-card.unread::before {
            opacity: 1;
        }

        .notif-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(11, 31, 58, 0.10);
            border-color: rgba(200, 168, 75, 0.4);
        }

        .notif-icon-wrap {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            position: relative;
            background: rgba(200, 168, 75, 0.12);
        }

        .unread-dot {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 10px;
            height: 10px;
            background: var(--gold);
            border-radius: 50%;
            border: 2px solid white;
            /* putih karena card putih */
        }

        /* Badge kategori — teks gelap karena background terang */
        .notif-cat {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 2px 8px;
            border-radius: 6px;
        }

        .notif-cat.gold {
            background: rgba(200, 168, 75, 0.15);
            color: #8a6a1a;
        }

        .notif-cat.info {
            background: #DBEAFE;
            color: #1E40AF;
        }

        .notif-cat.success {
            background: #D1FAE5;
            color: #065F46;
        }

        .notif-cat.warning {
            background: #FEF3C7;
            color: #92400E;
        }

        /* Teks card — navy karena background putih */
        .notif-card-title {
            font-size: 14px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 5px;
            line-height: 1.4;
        }

        .notif-card-excerpt {
            font-size: 13px;
            color: var(--slate);
            line-height: 1.65;
        }

        .notif-card-time {
            font-size: 11px;
            color: #9CA3AF;
            margin-left: auto;
        }

        .btn-notif-detail {
            padding: 7px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            background: linear-gradient(135deg, var(--navy), var(--navy-mid));
            color: var(--gold-light);
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-notif-detail:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(11, 31, 58, 0.25);
        }

        .btn-notif-dismiss {
            padding: 7px 14px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            background: none;
            color: #9CA3AF;
            border: 1px solid #E5E7EB;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-notif-dismiss:hover {
            border-color: var(--gold);
            color: var(--gold);
        }
    </style>
@endsection


@section('content')

    {{-- ══════════════════════════════════════════
         HERO
    ══════════════════════════════════════════ --}}
    <section class="hero-section">

        <div class="slider-header w-full h-full absolute inset-0">
            @foreach ($slider as $slide)
                <div class="w-full h-full absolute inset-0">
                    <img src="{{ asset($slide->image) }}" class="w-full h-full object-cover" loading="lazy">
                </div>
            @endforeach
        </div>

        <div class="hero-overlay"></div>
        <div class="hero-lines"></div>

        <div class="hero-content">
            <div class="max-w-7xl mx-auto px-6 w-full">
                <div class="max-w-2xl">
                    <div class="hero-badge">Kabupaten Serdang Bedagai</div>
                    <h1 class="hero-title">
                        Badan Pengelolaan<br>
                        Keuangan dan <span>Aset Daerah</span>
                    </h1>
                    <p class="hero-subtitle">
                        Melayani dengan integritas, mengelola aset daerah secara transparan dan bertanggung jawab untuk
                        kemakmuran masyarakat Serdang Bedagai.
                    </p>
                    <div class="hero-btns flex flex-wrap items-center gap-3">
                        <a href="/profil/visimisi" class="hero-cta-primary">Tentang Kami</a>
                        <a href="/layanan" class="hero-cta-secondary">Layanan →</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-indicator">
            <span>Scroll</span>
            <svg width="14" height="20" viewBox="0 0 14 20" fill="none">
                <rect x="1" y="1" width="12" height="18" rx="6" stroke="currentColor" stroke-opacity=".5"
                    stroke-width="1.5" />
                <circle cx="7" cy="6" r="2" fill="currentColor" opacity=".6">
                    <animate attributeName="cy" values="6;12;6" dur="1.8s" repeatCount="indefinite" />
                </circle>
            </svg>
        </div>
    </section>


    {{-- ══════════════════════════════════════════
         QUICK INFO CARDS
    ══════════════════════════════════════════ --}}
    <section class="relative -mt-16 z-20 px-4 sm:px-6 mb-0">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                <div class="info-card reveal">
                    <div class="info-icon">✉</div>
                    <p class="font-semibold text-sm mb-1" style="color:var(--navy)">Email</p>
                    <p class="text-xs text-gray-500 textEmailH leading-relaxed"></p>
                </div>

                <div class="info-card reveal">
                    <div class="info-icon">📍</div>
                    <p class="font-semibold text-sm mb-1" style="color:var(--navy)">Alamat</p>
                    <p class="text-xs text-gray-500 textAddressH leading-relaxed"></p>
                </div>

                <div class="info-card reveal">
                    <div class="info-icon">☎</div>
                    <p class="font-semibold text-sm mb-1" style="color:var(--navy)">Telepon</p>
                    <p class="text-xs text-gray-500 textPhoneH leading-relaxed"></p>
                </div>

                <div class="info-card reveal">
                    <div class="info-icon">⏰</div>
                    <p class="font-semibold text-sm mb-1" style="color:var(--navy)">Jam Kerja</p>
                    <p class="text-xs text-gray-500 textOfficeHoursH whitespace-pre-wrap leading-relaxed"></p>
                </div>

            </div>
        </div>
    </section>


    {{-- ══════════════════════════════════════════
         BERITA & INFORMASI
    ══════════════════════════════════════════ --}}
    <section class="py-28" style="background: var(--cream)">
        <div class="max-w-7xl mx-auto px-6">

            <div class="mb-16 reveal">
                <p class="text-xs font-semibold tracking-widest uppercase mb-3" style="color:var(--gold)">Terkini</p>
                <h2 class="section-title text-4xl md:text-5xl font-bold mb-4">Berita & Informasi</h2>
                <div class="gold-divider"></div>
            </div>

            @if ($firstarticle)
                <div class="grid md:grid-cols-2 gap-14 items-center mb-24 reveal">
                    <div class="news-featured-img shadow-2xl">
                        <img src="{{ asset($firstarticle->cover) }}" class="w-full h-[380px] object-cover"
                            alt="{{ $firstarticle->title }}">
                    </div>
                    <div>
                        <span
                            class="inline-block text-xs font-semibold tracking-widest uppercase px-3 py-1 rounded-full mb-6"
                            style="background:rgba(200,168,75,0.12); color:var(--gold)">
                            Berita Utama
                        </span>
                        <h3 class="section-title text-2xl md:text-3xl font-bold mb-5 leading-tight"
                            style="color:var(--navy)">
                            {{ $firstarticle->title }}
                        </h3>
                        <div class="text-gray-500 leading-relaxed line-clamp-4 text-sm mb-8">
                            {!! strip_tags($firstarticle->description) !!}
                        </div>
                        <a href="{{ route('article.detail', [$firstarticle->slug]) }}"
                            class="inline-flex items-center gap-2 font-semibold text-sm uppercase tracking-wider transition-all"
                            style="color:var(--navy)">
                            <span>Baca Selengkapnya</span>
                            <span class="inline-block w-8 h-px transition-all duration-300"
                                style="background:var(--gold)"></span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endif

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($articles as $article)
                    <a href="{{ route('article.detail', [$article->slug]) }}" class="article-card group reveal block">
                        <div class="overflow-hidden">
                            <img src="{{ asset($article->cover) }}" alt="{{ $article->title }}">
                        </div>
                        <div class="p-6">
                            <h4 class="font-semibold line-clamp-2 leading-snug text-sm transition-colors duration-200"
                                style="color:var(--navy)" onmouseover="this.style.color='var(--gold)'"
                                onmouseout="this.style.color='var(--navy)'">
                                {{ $article->title }}
                            </h4>
                            <div class="mt-4 flex items-center gap-2 text-xs font-medium" style="color:var(--gold)">
                                <span>Baca</span>
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2.5">
                                    <path d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-16 reveal">
                <a href="{{ route('artikel.index') }}"
                    class="inline-block px-10 py-4 text-sm font-semibold uppercase tracking-wider border-2 rounded-lg transition-all duration-300"
                    style="border-color:var(--navy); color:var(--navy)"
                    onmouseover="this.style.background='var(--navy)'; this.style.color='white'"
                    onmouseout="this.style.background='transparent'; this.style.color='var(--navy)'">
                    Lihat Semua Berita
                </a>
            </div>

        </div>
    </section>


    {{-- ══════════════════════════════════════════
         VIDEO PUBLIKASI
    ══════════════════════════════════════════ --}}
    @if ($youtube && count($youtube) > 0)
        <section class="video-section py-28">
            <div class="max-w-7xl mx-auto px-6">
                <div class="mb-16 reveal text-center">
                    <p class="text-xs font-semibold tracking-widest uppercase mb-3" style="color:var(--gold)">Media</p>
                    <h2 class="section-title text-4xl font-bold text-white mb-4">Video Publikasi</h2>
                    <div class="gold-divider mx-auto"></div>
                </div>
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach ($youtube as $yt)
                        <div class="reveal rounded-2xl overflow-hidden shadow-2xl"
                            style="aspect-ratio:16/9; border: 1px solid rgba(200,168,75,0.2)">
                            <iframe class="w-full h-full" src="{{ $yt->url }}" allowfullscreen
                                loading="lazy"></iframe>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    {{-- ══════════════════════════════════════════
         APLIKASI ONLINE
    ══════════════════════════════════════════ --}}
    <section class="py-28 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-16 reveal">
                <p class="text-xs font-semibold tracking-widest uppercase mb-3" style="color:var(--gold)">Digital</p>
                <h2 class="section-title text-4xl md:text-5xl font-bold mb-4" style="color:var(--navy)">Aplikasi Online
                </h2>
                <div class="gold-divider"></div>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-7">
                @forelse($application as $ap)
                    <a href="{{ $ap->url }}" target="_blank" class="app-card group reveal block">
                        <img src="{{ asset($ap->image) }}"
                            class="mx-auto h-18 w-auto mb-5 transition-transform duration-300 group-hover:scale-110"
                            style="height:72px" alt="{{ $ap->name }}">
                        <h4 class="font-semibold text-sm mb-2" style="color:var(--navy)">{{ $ap->name }}</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">{{ $ap->short_description }}</p>
                        <span class="mt-5 inline-block text-xs font-semibold tracking-wider uppercase"
                            style="color:var(--gold)">
                            Buka →
                        </span>
                    </a>
                @empty
                    <p class="col-span-full text-center text-gray-400 py-12">Tidak ada aplikasi online saat ini.</p>
                @endforelse
            </div>
        </div>
    </section>


    {{-- ══════════════════════════════════════════
         NOTIFIKASI & PENGUMUMAN
    ══════════════════════════════════════════ --}}
    <section class="py-28" style="background: var(--cream)" id="notif-section">
        <div class="max-w-6xl mx-auto px-6">

            {{-- Heading --}}
            <div class="mb-12 reveal">
                <p class="text-xs font-semibold tracking-widest uppercase mb-3" style="color:var(--gold)">
                    Transparansi
                </p>
                <h2 class="section-title text-4xl md:text-5xl font-bold mb-4" style="color:var(--navy)">
                    Notifikasi & <span style="color:var(--gold)">Pengumuman</span>
                </h2>
                <div class="gold-divider"></div>
            </div>

            {{-- Filter bar --}}
            <div class="flex flex-wrap items-center justify-between gap-3 mb-8 reveal">
                <div class="flex gap-2 flex-wrap" id="notif-filter-tabs">
                    <button class="notif-tab active" data-filter="all">Semua</button>
                    <button class="notif-tab" data-filter="unread">
                        Belum Dibaca <span id="unread-count-tab"></span>
                    </button>
                    <button class="notif-tab" data-filter="pengumuman">Pengumuman</button>
                    <button class="notif-tab" data-filter="regulasi">Regulasi</button>
                    <button class="notif-tab" data-filter="kegiatan">Kegiatan</button>
                </div>
                <button onclick="markAllNotifRead()" class="text-xs font-semibold underline transition-colors"
                    style="color:var(--gold); background:none; border:none; cursor:pointer;">
                    Tandai semua dibaca
                </button>
            </div>

            {{-- List --}}
            <div id="notif-list" class="flex flex-col gap-4"></div>

            {{-- Empty State --}}
            <div id="notif-empty" class="hidden text-center py-16">
                <div style="font-size:48px; opacity:.3; margin-bottom:16px">🔕</div>
                <p class="text-sm" style="color:var(--slate)">Tidak ada notifikasi saat ini.</p>
            </div>

        </div>
    </section>


    {{-- ══════════════════════════════════════════
         MODAL DETAIL NOTIFIKASI
    ══════════════════════════════════════════ --}}
    <div id="notif-modal"
        style="display:none; position:fixed; inset:0; background:rgba(11,31,58,0.6);
               backdrop-filter:blur(4px); z-index:20000; align-items:center;
               justify-content:center; padding:20px;">

        <div
            style="background:white; border-radius:20px; max-width:520px; width:100%;
                    box-shadow:0 32px 80px rgba(11,31,58,0.3); overflow:hidden;
                    animation:modal-in .3s cubic-bezier(0.34,1.56,0.64,1) both;">

            {{-- Header --}}
            <div
                style="background:linear-gradient(135deg, var(--navy), var(--navy-mid));
                        padding:24px 28px; display:flex; align-items:flex-start; gap:14px;">
                <div style="font-size:32px; line-height:1" id="nmodal-icon"></div>
                <div style="flex:1">
                    <h3 id="nmodal-title"
                        style="color:var(--gold-light); font-family:'Playfair Display',serif;
                               font-size:17px; font-weight:700; margin-bottom:5px; line-height:1.4">
                    </h3>
                    <p id="nmodal-meta" style="color:rgba(255,255,255,0.55); font-size:12px;"></p>
                </div>
                <button onclick="closeNotifModal()"
                    style="background:rgba(255,255,255,0.1); border:none; width:32px; height:32px;
                           border-radius:8px; cursor:pointer; color:rgba(255,255,255,0.7); font-size:16px;
                           display:flex; align-items:center; justify-content:center; flex-shrink:0;"
                    onmouseover="this.style.background='rgba(255,255,255,0.2)'"
                    onmouseout="this.style.background='rgba(255,255,255,0.1)'">✕</button>
            </div>

            {{-- Body --}}
            <div id="nmodal-body" style="padding:24px 28px;"></div>

            {{-- Footer --}}
            <div
                style="padding:16px 28px; background:#F9FAFB; display:flex; gap:10px;
                        justify-content:flex-end; border-top:1px solid #F3F4F6;">
                <button onclick="closeNotifModal()"
                    style="padding:10px 18px; border-radius:10px; font-size:13px; font-weight:600;
                           background:none; border:1.5px solid #E5E7EB; cursor:pointer; color:#6B7280;"
                    onmouseover="this.style.borderColor='#C8A84B'; this.style.color='#C8A84B'"
                    onmouseout="this.style.borderColor='#E5E7EB'; this.style.color='#6B7280'">
                    Tutup
                </button>
                <a id="nmodal-link" href="#" class="hero-cta-primary"
                    style="font-size:12px; padding:10px 22px; display:inline-block; text-decoration:none;">
                    Lihat Lengkap →
                </a>
            </div>
        </div>
    </div>

@endsection


@section('morejs')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script>
        // ─── SLIDER ───────────────────────────────────────────
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.slider-header > div');
            if (slides.length > 1) {
                let cur = 0;
                slides.forEach((s, i) => {
                    s.style.display = 'block';
                    s.style.position = 'absolute';
                    s.style.inset = '0';
                    s.style.transition = 'opacity 1.2s ease';
                    s.style.opacity = i === 0 ? '1' : '0';
                });
                setInterval(() => {
                    slides[cur].style.opacity = '0';
                    cur = (cur + 1) % slides.length;
                    slides[cur].style.opacity = '1';
                }, 5000);
            }
        });

        // ─── CONTACT INFO ─────────────────────────────────────
        $(document).ready(function() {
            contact();
        });

        function contact() {
            fetch('{{ route('contact.profile.json') }}')
                .then(r => r.json())
                .then(data => {
                    document.querySelector('.textEmailH').innerHTML = data?.email ?? '';
                    document.querySelector('.textAddressH').innerHTML = data?.address ?? '';
                    document.querySelector('.textOfficeHoursH').innerHTML = data?.office_hours ?? '';
                    document.querySelector('.textPhoneH').innerHTML = data?.phone ?? '';
                });
        }

        // ─── NOTIFIKASI ───────────────────────────────────────
        const notifItems = {!! json_encode($notifications) !!};
        let notifFilter = 'all';

        function renderNotifList() {
            const list = document.getElementById('notif-list');
            const empty = document.getElementById('notif-empty');
            if (!list) return;

            // Filter data
            const data = notifFilter === 'all' ? notifItems :
                notifFilter === 'unread' ? notifItems.filter(n => !n.is_read) :
                notifItems.filter(n => n.category === notifFilter);

            // Sinkron badge unread
            const unreadCount = notifItems.filter(n => !n.is_read).length;

            const tabBadge = document.getElementById('unread-count-tab');
            if (tabBadge) tabBadge.textContent = unreadCount > 0 ? `(${unreadCount})` : '';

            // FAB badge di base.blade.php
            const fabBadge = document.getElementById('notif-fab-badge');
            if (fabBadge) {
                fabBadge.textContent = unreadCount;
                fabBadge.style.display = unreadCount > 0 ? 'block' : 'none';
            }

            // Empty state
            if (data.length === 0) {
                list.innerHTML = '';
                empty.classList.remove('hidden');
                return;
            }
            empty.classList.add('hidden');

            // Render cards
            list.innerHTML = data.map((n, i) => `
                <div class="notif-card ${!n.is_read ? 'unread' : ''}"
                     id="notif-card-${n.id}"
                     style="animation-delay:${i * 0.07}s">

                    <div class="notif-icon-wrap">
                        ${n.icon || '🔔'}
                        ${!n.is_read ? '<div class="unread-dot"></div>' : ''}
                    </div>

                    <div style="flex:1; min-width:0;">
                        <div style="display:flex; align-items:center; gap:8px; margin-bottom:6px; flex-wrap:wrap;">
                            <span class="notif-cat ${n.cat_class || 'gold'}">${n.category_label || 'Notifikasi'}</span>
                            <span class="notif-card-time">${n.created_at_human || ''}</span>
                        </div>
                        <div class="notif-card-title">${n.title}</div>
                        <div class="notif-card-excerpt">${n.excerpt || ''}</div>
                        <div style="display:flex; gap:8px; margin-top:14px; flex-wrap:wrap;">
                            <button class="btn-notif-detail" onclick="openNotifModal(${n.id})">
                                Detail Selengkapnya
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2.5">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </button>
                            <button class="btn-notif-dismiss" onclick="dismissNotif(${n.id})">Tutup</button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // ── Filter tabs ──
        document.querySelectorAll('.notif-tab').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.notif-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                notifFilter = this.dataset.filter;
                renderNotifList();
            });
        });

        // ── Dismiss ──
        function dismissNotif(id) {
            const card = document.getElementById('notif-card-' + id);
            if (card) {
                card.style.opacity = '0';
                card.style.transform = 'translateX(40px)';
                card.style.transition = 'all .3s';
            }
            fetch(`/notifications/${id}/dismiss`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            });
            setTimeout(() => {
                const idx = notifItems.findIndex(n => n.id === id);
                if (idx > -1) notifItems.splice(idx, 1);
                renderNotifList();
            }, 320);
        }

        // ── Tandai semua dibaca ──
        function markAllNotifRead() {
            notifItems.forEach(n => n.is_read = true);
            fetch('/notifications/mark-all-read', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            });
            renderNotifList();
        }

        // ── Buka modal ──
        function openNotifModal(id) {
            const n = notifItems.find(x => x.id === id);
            if (!n) return;

            n.is_read = true;
            fetch(`/notifications/${id}/read`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            });

            document.getElementById('nmodal-icon').textContent = n.icon || '🔔';
            document.getElementById('nmodal-title').textContent = n.title;
            document.getElementById('nmodal-meta').textContent = (n.category_label || '') + ' · ' + (n.created_at_human ||
                '');
            document.getElementById('nmodal-link').href = n.url || '#';

            document.getElementById('nmodal-body').innerHTML = `
                <div style="margin-bottom:14px;">
                    <div style="font-size:11px; font-weight:700; letter-spacing:.1em; text-transform:uppercase; color:#9CA3AF; margin-bottom:4px;">
                        Nomor Dokumen
                    </div>
                    <div style="font-size:14px; color:#0B1F3A; font-weight:600;">${n.nomor || '-'}</div>
                </div>
                <div style="margin-bottom:14px;">
                    <div style="font-size:11px; font-weight:700; letter-spacing:.1em; text-transform:uppercase; color:#9CA3AF; margin-bottom:4px;">
                        Tanggal
                    </div>
                    <div style="font-size:14px; color:#0B1F3A;">${n.tanggal || '-'}</div>
                </div>
                <hr style="border:none; border-top:1px solid #F3F4F6; margin:16px 0;">
                <div>
                    <div style="font-size:11px; font-weight:700; letter-spacing:.1em; text-transform:uppercase; color:#9CA3AF; margin-bottom:6px;">
                        Keterangan Lengkap
                    </div>
                    <div style="font-size:14px; color:#374151; line-height:1.75;">${n.body || n.excerpt || '-'}</div>
                </div>
            `;

            document.getElementById('notif-modal').style.display = 'flex';
            renderNotifList();
        }

        // ── Tutup modal ──
        function closeNotifModal() {
            document.getElementById('notif-modal').style.display = 'none';
        }

        document.getElementById('notif-modal').addEventListener('click', function(e) {
            if (e.target === this) closeNotifModal();
        });

        // ── Init ──
        renderNotifList();

        // ── Auto scroll jika URL mengandung #notif-section ──
        if (window.location.hash === '#notif-section') {
            setTimeout(() => {
                document.getElementById('notif-section')?.scrollIntoView({
                    behavior: 'smooth'
                });
            }, 500);
        }
    </script>
@endsection
