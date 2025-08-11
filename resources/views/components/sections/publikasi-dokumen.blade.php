@props(['documents'])

{{-- Publikasi Dokumen --}}
<section class="w-full bg-white py-20">
  <div class="max-w-screen-lg px-2 bg-white mx-auto grid gap-10">
    <p class="text-5xl font-medium text-slate-700">Publikasi Dokumen</p>

    <div class="grid w-full grid-cols-[1fr_auto] md:grid-cols-[auto_auto_1fr_auto]">
      <!-- Header Row -->
      <div class="text-slate-700 hidden bg-slate-100 pr-8 py-3 text-sm font-bold md:block pl-1">TAHUN</div>
      <div class="text-slate-700 hidden bg-slate-100 pr-8 py-3 text-sm font-bold md:block">HARI BULAN</div>
      <div class="text-slate-700 bg-slate-100 pr-8 py-3 text-sm font-bold">JUDUL</div>
      <div class="text-slate-700 bg-slate-100 pr-8 py-3 text-sm font-bold">AUTHOR</div>
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
            class="hidden pr-8 md:flex items-center text-slate-700 group-hover:text-orange-600 pl-1
      @if ($prevYear !== $year) border-t border-slate-300 @endif">
            @if ($prevYear !== $year)
              {{ $year }}
              @php $prevYear = $year; @endphp
            @endif
          </div>

          {{-- HARI BULAN --}}
          <div
            class="hidden pr-8 md:flex items-center text-slate-700 group-hover:text-orange-600
      @if ($prevDate !== $date) border-t border-slate-300 @endif">
            @if ($prevDate !== $date)
              {{ $date }}
              @php $prevDate = $date; @endphp
            @endif
          </div>

          {{-- JUDUL --}}
          <div class="border-t border-slate-300 pr-8 text-slate-700 group-hover:text-orange-600 flex items-center py-3">
            {{ $doc->title }}
          </div>

          {{-- AUTHOR --}}
          <div class="border-t border-slate-300 text-slate-700 group-hover:text-orange-600 flex items-center pr-2">
            <div class="flex items-center gap-4 h-fit">
              <p>{{ $doc->author->name ?? '-' }}</p>
              <a href="{{ asset('storage/' . $doc->file) }}" download="">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round" class="h-auto w-6">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                  <path d="M7 11l5 5l5 -5" />
                  <path d="M12 4l0 12" />
                </svg>
              </a>
              {{-- Disabled until preview page ready --}}
              {{-- <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-fit">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
              </svg> --}}
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div
      class="flex items-center gap-4 before:h-px before:flex-1 before:bg-gray-300  before:content-[''] after:h-px after:flex-1 after:bg-gray-300  after:content-['']">
      <a href="/arsip-dokumen"
        class="text-slate-600 hover:text-white hover:bg-orange-600 cursor-pointer border border-slate-300 w-fit mx-auto px-3 py-1 rounded-full">Lihat
        Selengkapnya</a>
    </div>
  </div>
</section>
