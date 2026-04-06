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
        }

        .page-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(105deg,
                    rgba(11, 31, 58, .92) 0%,
                    rgba(18, 48, 92, .85) 50%,
                    rgba(11, 31, 58, .65) 100%);
        }

        .page-hero-content {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
        }

        .page-hero-eyebrow {
            font-size: .75rem;
            letter-spacing: .2em;
            text-transform: uppercase;
            color: #E8C96D;
            margin-bottom: 12px;
        }

        .page-hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.2rem);
            font-weight: 700;
        }

        .page-hero-title span {
            color: #E8C96D;
        }

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
        .aduan-section {
            background: #F8F5EE;
            padding: 110px 0;
        }

        .aduan-container {
            max-width: 1200px;
            margin: auto;
            padding: 0 24px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: #0B1F3A;
        }

        .divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #C8A84B, #E8C96D);
            margin: 16px auto 0;
        }

        /* Layout */
        .aduan-grid {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 40px;
        }

        /* Card */
        .aduan-card {
            background: #fff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 14px 40px rgba(11, 31, 58, .08);
            border: 1px solid rgba(200, 168, 75, .15);
            transition: .3s ease;
        }

        .aduan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(11, 31, 58, .15);
        }

        /* Table */
        .aduan-table {
            width: 100%;
            border-collapse: collapse;
        }

        .aduan-table th,
        .aduan-table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        .aduan-table th {
            background: #f3efe4;
            color: #0B1F3A;
            font-weight: 600;
        }

        /* Responsive */
        @media(max-width: 992px) {
            .aduan-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Reveal */
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
        <img class="hero-bg" src="{{ asset('assets/local/aduan.png') }}" alt="Grafik Pengelolaan Aduan">
        <div class="page-hero-overlay"></div>

        <div class="page-hero-content">
            <p class="page-hero-eyebrow">Layanan BPKAD Kabupaten Serdang Bedagai</p>
            <h1 class="page-hero-title">
                Grafik <span>Pengelolaan Aduan</span>
            </h1>
        </div>

        <div class="breadcrumb-bar">
            <div class="breadcrumb-inner">
                <a href="/">Beranda</a>
                <span>›</span>
                <a href="/aduan/grafikaduan">Aduan</a>
                <span>›</span>
                <span style="color:rgba(255,255,255,.85)">
                    Grafik Pengelolaan Aduan
                </span>
            </div>
        </div>
    </section>



    {{-- SECTION --}}
    <section class="aduan-section">
        <div class="aduan-container">

            <div class="section-header reveal">
                <h2>Data Statistik Aduan</h2>
                <div class="divider"></div>
            </div>

            <div class="aduan-grid">

                {{-- TABLE --}}
                <div class="aduan-card reveal">
                    <table class="aduan-table">
                        <thead>
                            <tr>
                                <th>Tahun</th>
                                <th>Total</th>
                                <th>Diproses</th>
                                <th>Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $d)
                                <tr>
                                    <td>{{ $d->year }}</td>
                                    <td>{{ $d->total }}</td>
                                    <td>{{ $d->process }}</td>
                                    <td>{{ $d->finish }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align:center;padding:20px;">
                                        Data tidak tersedia
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- CHART --}}
                <div class="aduan-card reveal">
                    <form style="margin-bottom:30px;">
                        <label style="font-weight:600;color:#0B1F3A;">Pilih Tahun</label>
                        <select id="year"
                            style="width:100%;padding:10px;margin-top:8px;border-radius:10px;border:1px solid #ddd;">
                            @foreach ($years as $year)
                                <option {{ $loop->first ? 'selected' : '' }} value="{{ $year }}">
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                    <canvas id="myChart"></canvas>
                </div>

            </div>
        </div>
    </section>
@endsection



@section('morejs')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("scroll", function() {
            document.querySelectorAll(".reveal").forEach(function(el) {
                if (el.getBoundingClientRect().top < window.innerHeight - 100) {
                    el.classList.add("active");
                }
            });
        });

        var path = '/{{ request()->path() }}';
        const ctx = document.getElementById('myChart');
        var chartEl;

        function generateChart() {
            chartEl = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Belum diproses', 'Sedang diproses', 'Selesai'],
                    datasets: [{
                        label: 'Jumlah',
                        data: [0, 0, 0],
                        borderWidth: 1
                    }]
                }
            });
        }

        async function changeYearHandler() {
            let year = $('#year').val();
            let response = await $.get(path + '?year=' + year);
            let data = response.data;

            chartEl.data.datasets[0].data = data;
            chartEl.update();
        }

        $('#year').on('change', changeYearHandler);

        $(document).ready(function() {
            generateChart();
            changeYearHandler();
        });
    </script>
@endsection
