@extends('layouts.app', ['activePage' => 'berita'])

@section('content')
    <div class="max-w-screen-lg mx-auto w-full bg-white">

        <div class="max-w-screen-md mx-auto w-full space-y-6 py-16">
            {{-- Breadcrumbs --}}
            <ul class="text-center flex gap-2 justify-center">
                <li class="text-xl font-medium text-slate-600">Berita</li>
                <li class="text-xl font-medium text-slate-600">/</li>
                <li class="text-xl font-medium text-orange-600">Pemerintahan</li>
            </ul>
            {{-- Breadcrumbs --}}

            <div class="grid gap-4 place-content-center">
                <h1 class="text-center text-5xl leading-16 font-medium text-slate-700">Metrics That Matter: Financial
                    Efficiency KPIs for CFOs</h1>

                <div class="flex items-center justify-center gap-2 text-slate-600 h-fit text-lg">
                    <p>21 Mei 2025</p>
                    <x-icons.dot class="w-2 h-2" />
                    <p>Pemerintahan</p>
                </div>
            </div>

            <div class="grid gap-4">
                <img class="w-full h-auto bg-cover ring-1 ring-zinc-300"
                    src="https://medusajs.com/_next/image/?url=https%3A%2F%2Fcdn.sanity.io%2Fimages%2F5a711ubd%2Fproduction%2F3c78bea161801c5a471a5a1098a2adb676cae3b3-3200x1672.jpg%3Fw%3D1280%26fm%3Dpng&w=3840&q=75"
                    alt="">

                <div class="flex gap-2 overflow-auto no-scrollbar">
                    @for ($i = 0; $i < 6; $i++)
                        <img class="w-1/4 h-28 object-cover saturate-100  {{ $i !== 0 ? 'contrast-50 grayscale' : '' }}"
                            src="https://medusajs.com/_next/image/?url=https%3A%2F%2Fcdn.sanity.io%2Fimages%2F5a711ubd%2Fproduction%2F8cc4fc064087bb7539d41e7847b3fe8fd893a5e4-3200x1672.jpg%3Fw%3D600&w=3840&q=75"
                            alt="">
                    @endfor
                </div>
            </div>


            {{-- html tags --}}
            <div class="text-xl leading-8 space-y-2 text-slate-700">
                <p>Financial efficiency is more than just tracking money coming in and going out. It's about how well your
                    company turns expenses into revenue and gets the most from every dollar spent. Companies that do this
                    well can run longer on their current funds, make better investments, and support stronger business
                    growth.</p>
                <p>CFOs who track the right financial metrics gain valuable, data-driven insights that help create
                    sustainable growth. Let's look at which ratio measurements really matter to financial leaders and how
                    improving them can boost your company's performance for the long term.</p>

                <p>Advanced efficiency metrics show you opportunities hidden in your financial data that basic reports won't
                    reveal. While we know you’re always keeping your eye on revenue and expenses, you can take your
                    financial strategies to the next level by digging deeper into efficiency ratios. The efficiency metrics
                    will show you exactly where each dollar works hardest. This turns financial leadership from just
                    reporting to actively shaping strategy.</p>

                <p>By understanding efficiency, you can make better decisions about capital allocations. Knowing which parts
                    of your business turn capital into growth allows you to direct resources more effectively. This becomes
                    especially important during uncertain economic times, when maximizing the impact of every investment
                    dollar creates real advantages.</p>

                <p>While things like profit margins and annual recurring revenue (ARR) still matter, newer measures give
                    better insights into performance. Metrics like LTV-CAC ratio, asset turnover ratio, and speed to deploy
                    capital give better insights into financial sustainability.</p>
            </div>
            {{-- html tags --}}

            {{-- Share --}}
            <div>
                <p>Bagikan:</p>
                <div class="flex">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-link">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 15l6 -6" />
                            <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                            <path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
                        </svg>
                    </button>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                        </svg>
                    </button>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-x">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                            <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>

    </div>
@endsection
