@props(['documents'])

{{-- Publikasi Dokumen --}}
<section class="w-full bg-white py-20">
  <div class="max-w-screen-lg px-2 bg-white mx-auto grid gap-10">
    <x-commons.section-header title="Publikasi Dokumen" link="/publikasi-dokumen" buttonText="Lihat Semua" />

    <div class="grid w-full grid-cols-[1fr_auto] md:grid-cols-[auto_auto_1fr_auto]">
      <!-- Header Row -->
      <div class="text-slate-700 hidden bg-slate-100 pr-8 py-3 text-sm font-bold md:block pl-1">TAHUN</div>
      <div class="text-slate-700 hidden bg-slate-100 pr-8 py-3 text-sm font-bold md:block">HARI BULAN</div>
      <div class="text-slate-700 bg-slate-100 pr-8 py-3 text-sm font-bold pl-1 md:pl-0">
        DOKUMEN
      </div>
      <div class="text-slate-700 py-3 text-sm font-bold text-center md:text-left w-full bg-slate-100 px-1">
        <p class="block md:hidden">UNDUH</p>
        <p class="hidden md:block">AUTHOR</p>
      </div>
      @php
        $prevYear = null;
        $prevDate = null;
      @endphp

      @foreach ($documents as $doc)
        @php
          $year = $doc->published_at?->year;
          $date = $doc->published_at?->translatedFormat('j F');
        @endphp

        <div class="contents group">
          {{-- TAHUN --}}
          <div
            class="hidden pr-8 md:flex items-center text-slate-700 pl-1
      @if ($prevYear !== $year) border-t border-slate-300 @endif">
            @if ($prevYear !== $year)
              {{ $year }}
              @php $prevYear = $year; @endphp
            @endif
          </div>

          {{-- HARI BULAN --}}
          <div
            class="hidden pr-8 md:flex items-center text-slate-700
      @if ($prevDate !== $date) border-t border-slate-300 @endif">
            @if ($prevDate !== $date)
              {{ $date }}
              @php $prevDate = $date; @endphp
            @endif
          </div>

          {{-- JUDUL --}}
          <div class="border-t border-slate-300 pr-8 text-slate-700 flex items-center py-3 grid">
            <span class="block md:hidden font-medium flex items-center gap-2 text-sm text-slate-500">
              <p>{{ \Carbon\Carbon::parse($doc->published_at)->isoFormat('D MMMM Y') }}</p>
              <x-icons.dot class="w-1 h-1" />
              <p>{{ $doc->author->name ?? 'Admin' }}</p>
            </span>
            <span class="text-base font-medium line-clamp-2">
              {{ $doc->title }}
            </span>
          </div>

          {{-- AUTHOR --}}
          <div class="border-t border-slate-300 text-slate-700 flex gap-2 items-center justify-between w-full px-1">
            <p class="hidden md:block line-clamp-1">{{ $doc->author->name ?? '-' }}</p>
            <a href="/publikasi-dokumen/{{ $doc->slug }}"
              class="text-center hover:bg-slate-100 rounded-sm px-1.5 cursor-pointer hover:scale-105 hover:text-orange-600 duration-200 mx-auto md:mx-0">
              <svg fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor"
                class="w-8 h-fit mx-auto">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
              </svg>
            </a>
          </div>
        </div>
      @endforeach
    </div>
    <div
      class="flex md:hidden items-center before:h-px before:flex-1 before:bg-gray-300  before:content-[''] after:h-px after:flex-1 after:bg-gray-300  after:content-['']">
      <a href="/publikasi-dokumen"
        class="text-slate-600 hover:text-white hover:bg-orange-600 cursor-pointer border border-slate-300 w-fit mx-auto px-3 py-1 rounded-full">
        Dokumen Lainnya
      </a>
    </div>
  </div>
</section>
