@props(['documents'])

{{-- Publikasi Dokumen --}}
<section class="w-full bg-white py-20">
  <div class="max-w-screen-lg px-2 lg:px-0 bg-white mx-auto grid gap-10">
    <x-commons.section-header title="Publikasi Dokumen" link="/publikasi-dokumen" buttonText="Lihat Semua" />

    <div class="grid w-full grid-cols-[1fr_auto] md:grid-cols-[auto_auto_1fr_auto]">
      <!-- Header Row -->
      <div class="text-slate-700 hidden bg-slate-100 pr-8 py-3 text-sm font-bold md:block pl-1">TAHUN</div>
      <div class="text-slate-700 hidden bg-slate-100 pr-8 py-3 text-sm font-bold md:block">HARI BULAN</div>
      <div class="text-slate-700 bg-slate-100 pr-8 py-3 text-sm font-bold pl-1 md:pl-0">
        DOKUMEN
      </div>
      <div class="text-slate-700 py-3 text-sm font-bold text-center w-full bg-slate-100 px-1">
        <p class="block md:hidden">DETAIL</p>
        <p class="hidden md:block">AUTHOR</p>
      </div>
      @php
        $prevYear = null;
        $prevDate = null;
      @endphp

      @foreach ($documents as $doc)
        @php
          $year = $doc->published_at?->year;
          $date = $doc->published_at?->translatedFormat('d F');
        @endphp

        <div class="contents group">
          {{-- TAHUN --}}
          <div
            class="hidden pr-8 md:flex items-start py-3 text-slate-700 pl-1
      @if ($prevYear !== $year) border-t border-slate-300 @endif">
            @if ($prevYear !== $year)
              {{ $year }}
              @php $prevYear = $year; @endphp
            @endif
          </div>

          {{-- HARI BULAN --}}
          <div
            class="hidden pr-8 md:flex items-start py-3 text-slate-700
      @if ($prevDate !== $date) border-t border-slate-300 @endif">
            @if ($prevDate !== $date)
              {{ $date }}
              @php $prevDate = $date; @endphp
            @endif
          </div>

          {{-- JUDUL --}}
          <div class="border-t border-slate-300 pl-1 md:pl-0 pr-8 text-slate-700 flex items-start py-3 grid">
            <span class="block md:hidden font-medium flex whitespace-nowrap items-center gap-2 text-sm text-slate-500">
              <p>
                <span class="hidden md:block">{{ $doc->published_at?->isoFormat('D MMMM Y') ?? '-' }}</span>
                <span class="block md:hidden">{{ $doc->published_at?->translatedFormat('d M Y') ?? '-' }}</span>
              </p>
            </span>
            <span class="text-base font-medium line-clamp-2">
              {{ $doc->title }}
            </span>
          </div>

          {{-- AUTHOR --}}
          {{-- <div
            class="flex w-full items-center justify-between gap-2 border-t border-slate-300 px-1 py-3 text-slate-600 md:items-start">
            <button data-file="{{ asset('storage/' . $doc->file) }}" onclick="openPDF(this)"
              class="group mx-auto flex cursor-pointer items-center gap-1 rounded-md bg-slate-50 p-1 ring ring-slate-200 hover:bg-slate-100 hover:text-orange-400 focus:outline-none active:scale-95 md:mx-0">
              <span class="text-xs md:text-sm font-medium">{{ $doc->institute->alias ?? '-' }}</span>
            </button>
          </div> --}}
          {{-- TestButtonGroup --}}
          <div x-data="{ open: false }"
            class="flex w-full items-center justify-end gap-2 border-t border-slate-300 px-1 py-3 text-slate-600">
            <div class="relative inline-flex w-fit text-sm text-slate-500">
              <!-- Tombol utama (instansi) -->
              <a href="/publikasi-dokumen/skpd/{{ $doc->institute->slug }}" target="_blank"
                class="cursor-pointer rounded-s-md border-t border-b border-l border-gray-200 bg-white px-1.5 py-1 text-sm font-medium hover:bg-gray-100 hover:text-orange-600 focus:z-10 focus:text-orange-600 focus:ring-1 focus:ring-orange-600 md:px-2">
                {{ $doc->institute->alias ?? '-' }}
              </a>

              <!-- Tombol More -->
              <button @click="open = !open"
                class="cursor-pointer rounded-e-md border border-gray-200 bg-white p-1 font-medium hover:bg-gray-100 hover:text-orange-600 focus:z-10 focus:text-orange-600 focus:ring-1 focus:ring-orange-600">
                <x-icons.dots-vertical class="h-4 w-auto stroke-1" />
              </button>

              <!-- Overlay (klik di luar akan menutup dropdown) -->
              <div x-show="open" x-cloak @click="open = false" class="fixed inset-0 z-10 bg-slate-800/5"></div>

              <!-- Dropdown menu -->
              <div x-show="open" x-cloak @click.outside="open = false"
                x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1"
                x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1"
                class="absolute top-full right-0 z-20 mt-1 w-fit rounded-md bg-white ring-1 ring-slate-200 shadow-lg">
                <div class="grid p-0.5 text-sm text-slate-700">
                  <a href="/publikasi-dokumen/{{ $doc->slug }}"
                    class="flex items-center gap-1 rounded-md p-2 hover:bg-slate-100 hover:text-orange-600">
                    <x-icons.file-dots class="h-auto w-4 stroke-1" />
                    <span>Selengkapnya</span>
                  </a>

                  <button data-file="{{ asset('storage/' . $doc->file) }}" onclick="openPDF(this)"
                    class="flex items-center gap-1 rounded-md p-2 hover:bg-slate-100 hover:text-orange-600">
                    <x-icons.scan-dots class="h-auto w-4 stroke-2 md:h-5" />
                    <span>Preview</span>
                  </button>

                  <a href="{{ asset('storage/' . $doc->file) }}" download
                    class="flex items-center gap-1 rounded-md p-2 hover:bg-slate-100 hover:text-orange-600">
                    <x-icons.cloud-download class="h-auto w-4 stroke-2" />
                    <span>Unduh</span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          {{-- TestButtonGroup --}}
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
<x-docs.modal />


@push('scripts')
  @vite(['resources/js/pdf.js'])
@endpush
