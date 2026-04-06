{{-- resources/views/components/panel-content.blade.php --}}
@props([
    'title' => '',
    'cardStyle' => '',
    'icon' => '',
])

<section class="panel-section my-12 relative">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <div class="panel-card" style="{{ $cardStyle }}">

            {{-- Decorative accent line --}}
            <div class="panel-accent-bar"></div>

            <div class="panel-inner">
                {{-- Header --}}
                @if ($title)
                    <div class="panel-header">
                        @if ($icon)
                            <span class="panel-icon">{{ $icon }}</span>
                        @endif
                        <div>
                            <span class="panel-eyebrow">Informasi</span>
                            <h2 class="panel-title">{{ $title }}</h2>
                        </div>
                    </div>
                    <div class="panel-divider"></div>
                @endif

                {{-- Body --}}
                <div class="panel-body">
                    {!! $slot !!}
                </div>
            </div>
        </div>

    </div>
</section>

@once
    @push('panel-styles')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap');

            :root {
                --gold: #C9A84C;
                --gold-light: #E8C96D;
                --gold-pale: #FBF4E3;
                --navy: #0B1F3A;
                --navy-mid: #12305C;
                --text-dark: #1E293B;
                --text-muted: #64748B;
                --border: #E2E8F0;
            }

            .panel-card {
                position: relative;
                background: #fff;
                border-radius: 20px;
                box-shadow:
                    0 1px 3px rgba(0, 0, 0, 0.04),
                    0 8px 24px rgba(11, 31, 58, 0.08),
                    0 32px 64px rgba(11, 31, 58, 0.04);
                overflow: hidden;
                transition: box-shadow 0.4s ease, transform 0.4s ease;
            }

            .panel-card:hover {
                box-shadow:
                    0 1px 3px rgba(0, 0, 0, 0.04),
                    0 12px 36px rgba(11, 31, 58, 0.12),
                    0 40px 80px rgba(11, 31, 58, 0.08);
                transform: translateY(-2px);
            }

            .panel-accent-bar {
                height: 4px;
                background: linear-gradient(90deg, var(--navy) 0%, var(--gold) 50%, var(--gold-light) 100%);
            }

            .panel-inner {
                padding: clamp(1.5rem, 4vw, 2.5rem);
            }

            .panel-header {
                display: flex;
                align-items: flex-start;
                gap: 1rem;
                margin-bottom: 1.25rem;
            }

            .panel-icon {
                font-size: 2rem;
                line-height: 1;
                flex-shrink: 0;
                margin-top: 2px;
            }

            .panel-eyebrow {
                display: block;
                font-family: 'Plus Jakarta Sans', sans-serif;
                font-size: 0.65rem;
                font-weight: 600;
                letter-spacing: 0.18em;
                text-transform: uppercase;
                color: var(--gold);
                margin-bottom: 4px;
            }

            .panel-title {
                font-family: 'Playfair Display', serif;
                font-size: clamp(1.2rem, 3vw, 1.6rem);
                font-weight: 700;
                color: var(--navy);
                line-height: 1.25;
            }

            .panel-divider {
                height: 1px;
                background: linear-gradient(90deg, var(--gold-light) 0%, transparent 80%);
                margin-bottom: 1.5rem;
            }

            .panel-body {
                font-family: 'Plus Jakarta Sans', sans-serif;
                font-size: 0.95rem;
                line-height: 1.85;
                color: var(--text-dark);
            }

            .panel-body p {
                margin-bottom: 0.75rem;
            }

            .panel-body ul,
            .panel-body ol {
                padding-left: 1.25rem;
                margin-bottom: 0.75rem;
            }

            .panel-body li {
                margin-bottom: 0.4rem;
            }
        </style>
    @endpush
@endonce
