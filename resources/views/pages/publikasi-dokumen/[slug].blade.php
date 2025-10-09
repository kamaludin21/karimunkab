@php
  use App\Models\Institute;
  use App\Models\Document;

  $institutes = Institute::orderBy('name')->get();
  $institute = Institute::where('slug', $slug)->firstOrFail();
  $documents = Document::where('institute_id', $institute->id)
      ->with('institute')
      ->orderByDesc('published_at')
      ->paginate(10);
@endphp

@extends('layouts.app', ['activePage' => 'informasi-publik'])

@section('content')
  <section class="max-w-screen-lg mx-auto w-full py-0 lg:py-6 space-y-6 ">
    <div class="px-2 md:px-6 rounded-none lg:rounded-lg py-4 md:py-8 dot-pattern">
      <p class="text-3xl md:text-5xl font-semibold text-slate-100 font-header">Publikasi Dokumen</p>
    </div>
    <div x-data="{
        open: window.innerWidth >= 768, // open by default on desktop
        handleResize() {
            this.open = window.innerWidth >= 768;
        }
    }" x-init="window.addEventListener('resize', () => handleResize())"
      class="rounded-none md:rounded-lg bg-white ring-1 ring-slate-200 flex relative overflow-hidden
    ">
      <div
        class="w-full md:w-1/4 border-r border-slate-200 bg-white absolute md:static inset-y-0 left-0 transform md:transform-none transition-transform duration-300 ease-in-out z-20"
        :class="{ '-translate-x-full': !open }">
        <div class="border-b border-slate-200 p-4 bg-zinc-50 rounded-tl-lg flex items-center justify-between">
          <p class="text-base line-clamp-1 font-semibold text-slate-600">Organisasi/Lembaga</p>
          <button @click="open = false"
            class="rounded-md block md:hidden bg-slate-100 ring-1.5 hover:bg-slate-200 active:scale-95 ring-slate-300 p-1 group cursor-pointer">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
              class="h-6 w-auto text-slate-400 stroke-[1.7] group-hover:text-slate-500">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
              <path d="M9 4v16" />
              <path d="M15 10l-2 2l2 2" />
            </svg>
          </button>
        </div>
        <div class="p-2 space-y-1 text-slate-600 font-light">
          <a href="/publikasi-dokumen"
            class="block px-3 py-2 rounded-l-md transition-colors
     {{ request()->is('publikasi-dokumen') ? 'bg-gradient-to-r from-orange-400 to-white text-slate-50 font-medium' : 'hover:bg-orange-50 hover:text-orange-600' }}">
            Semua
          </a>

          @foreach ($institutes as $org)
            <a href="/publikasi-dokumen/{{ $org->slug }}"
              class="block px-3 py-2 rounded-l-md transition-colors
       {{ request()->is('publikasi-dokumen/' . $org->slug) ? 'bg-gradient-to-r from-orange-400 to-white text-slate-50 font-medium' : 'hover:bg-orange-50 hover:text-orange-600' }}">
              {{ $org->alias }}
            </a>
          @endforeach
        </div>
      </div>
      <div class="w-full md:w-3/4 min-h-96">
        <div class="px-4 py-5 border-b border-slate-200 flex items-center gap-2">
          <button @click="open = true"
            class="rounded-md block md:hidden bg-slate-100 ring-1.5 hover:bg-slate-200 active:scale-95 ring-slate-300 p-1 group cursor-pointer">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
              class="h-6 w-auto text-slate-400 stroke-[1.7] group-hover:text-slate-500">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
              <path d="M9 4v16" />
              <path d="M14 10l2 2l-2 2" />
            </svg>
          </button>
          <p class="text-2xl font-medium line-clamp-1 text-slate-700">
            {{ $institute->name }}
          </p>
        </div>

        <ul x-data="{
            pdfUrl: null,
            async open(url) {
                this.pdfUrl = url;
                openModal('preview-pdf');
                const viewer = await initPDFViewer();
                viewer.UI.loadDocument(url);
            }
        }" class ="py-4 px-2 grid divide-y divide-slate-200 divide-dashed">
          @forelse ($documents as $doc)
            <div class="flex items-center justify-between hover:bg-slate-50 py-2 px-2">
              <div class="py-2 w-2/3">
                <div class="flex gap-1 whitespace-nowrap items-center">
                  <p class="text-xs font-medium text-slate-400">
                    <span class="hidden md:block">{{ $doc->published_at?->isoFormat('D MMMM Y') ?? '-' }}</span>
                    <span class="block md:hidden">{{ $doc->published_at?->translatedFormat('d M Y') ?? '-' }}</span>
                  </p>
                </div>

                <p class="text-lg font-medium text-slate-600 line-clamp-1">
                  {{ $doc->title }}
                </p>
              </div>

              <div class="flex flex-0 gap-1">
                <button data-file="{{ asset('storage/' . $doc->file) }}" data-title="{{ $doc->title }}"
                  data-org="{{ $doc->institute->name ?? 'Tidak diketahui' }}"
                  data-date="{{ $doc->published_at?->isoFormat('D MMMM Y') ?? '-' }}"
                  data-size="{{ $doc->size ?? 'Tidak ditemukan' }}" onclick="openPDF(this)"
                  class="active:scale-95 p-2 bg-slate-200 rounded-full focus:outline-none group">
                  <x-icons.text-scan class="h-5 w-auto stroke-2 group-hover:text-orange-400 text-slate-600" />
                </button>

                <a href="{{ asset('storage/' . $doc->file) }}" download
                  class="bg-white ring-blue-500 ring ring-inset hover:bg-blue-500 rounded-full px-3 md:px-4 flex items-center cursor-pointer active:scale-95 group text-blue-500"
                  target="_blank">
                  <span class="hidden md:block text-sm font-medium  group-hover:text-slate-50">UNDUH</span>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" class="block md:hidden stroke-2 h-6 w-auto group-hover:text-slate-50">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                      d="M12 18.004h-5.343c-2.572 -.004 -4.657 -2.011 -4.657 -4.487c0 -2.475 2.085 -4.482 4.657 -4.482c.393 -1.762 1.794 -3.2 3.675 -3.773c1.88 -.572 3.956 -.193 5.444 1c1.488 1.19 2.162 3.007 1.77 4.769h.99c1.38 0 2.573 .813 3.13 1.99" />
                    <path d="M19 16v6" />
                    <path d="M22 19l-3 3l-3 -3" />
                  </svg>
                </a>
              </div>
            </div>

          @empty
            <div class="p-4 text-center text-slate-400 text-sm">
              Belum ada dokumen yang dipublikasikan.
            </div>
          @endforelse
          @if ($documents->hasPages())
            <div class="flex border-t border-slate-200 pt-6 justify-between items-center">
              <ul class="flex items-center gap-4 text-lg font-medium">
                @php
                  $start = max(1, $documents->currentPage() - 2);
                  $end = min($documents->lastPage(), $documents->currentPage() + 2);
                @endphp

                @if ($start > 1)
                  <li>
                    <a href="{{ $documents->url(1) }}"
                      class="bg-white rounded py-1 px-2 ring-1 ring-zinc-200 text-slate-600 hover:bg-slate-200">1</a>
                  </li>
                  @if ($start > 2)
                    <li class="text-slate-400">...</li>
                  @endif
                @endif

                @for ($i = $start; $i <= $end; $i++)
                  @if ($i == $documents->currentPage())
                    <li>
                      <a href="javascript:void(0)"
                        class="bg-orange-600 rounded py-1 px-2 ring-1 ring-zinc-200 text-white">
                        {{ $i }}
                      </a>
                    </li>
                  @else
                    <li>
                      <a href="{{ $documents->url($i) }}"
                        class="bg-white rounded py-1 px-2 ring-1 ring-zinc-200 text-slate-600 hover:bg-slate-200">
                        {{ $i }}
                      </a>
                    </li>
                  @endif
                @endfor

                @if ($end < $documents->lastPage())
                  @if ($end < $documents->lastPage() - 1)
                    <li class="text-slate-400">...</li>
                  @endif
                  <li>
                    <a href="{{ $documents->url($documents->lastPage()) }}"
                      class="bg-white rounded py-1 px-2 ring-1 ring-zinc-200 text-slate-600 hover:bg-slate-200">
                      {{ $documents->lastPage() }}
                    </a>
                  </li>
                @endif
              </ul>
              <div class="flex gap-2">
                <a href="{{ $documents->previousPageUrl() }}"
                  class="{{ $documents->onFirstPage() ? 'pointer-events-none text-slate-300' : 'hover:text-slate-600 text-slate-500' }} bg-white hover:bg-slate-200 rounded p-1 ring-1 ring-zinc-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-2" fill="none" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 6l-6 6l6 6" />
                  </svg>
                </a>
                <a href="{{ $documents->nextPageUrl() }}"
                  class="{{ $documents->hasMorePages() ? 'hover:text-slate-600 text-slate-500' : 'pointer-events-none text-slate-300' }} bg-white hover:bg-slate-200 rounded p-1 ring-1 ring-zinc-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-2" fill="none" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 6l6 6l-6 6" />
                  </svg>
                </a>
              </div>
            </div>
          @endif

        </ul>
      </div>
    </div>
  </section>
  <x-commons.modal id="preview-pdf" title="Show PDF" :show="false">
    <div x-data="{ tab: 'preview' }" class="min-w-sm md:min-w-md w-full h-[85dvh] rounded-lg overflow-hidden flex flex-col">
      <div class="flex-1 relative w-full h-full overflow-hidden bg-white">
        <div x-show="tab === 'preview'" x-transition.opacity x-cloak class="absolute inset-0 w-full h-full"
          id="viewer"></div>
        <div x-show="tab === 'info'" x-transition.opacity x-cloak
          class="absolute inset-0 w-full h-full p-4 overflow-y-auto text-slate-700 bg-white" id="info">
          <div class="space-y-3 flex-1">
            <p class="text-lg text-slate-600">Informasi Dokumen</p>
            <hr class="border-t border-slate-200">

            <div>
              <p class="text-slate-400 text-sm font-medium">Judul</p>
              <p id="info-title" class="text-base font-medium text-slate-700 leading-6">–</p>
            </div>

            <div>
              <p class="text-slate-400 text-sm font-medium">Pemilik</p>
              <p id="info-org" class="text-base font-medium text-slate-700 leading-6">–</p>
            </div>

            <div>
              <p class="text-slate-400 text-sm font-medium">Tanggal Publikasi</p>
              <p id="info-date" class="text-base font-medium text-slate-700 leading-6">–</p>
            </div>

            <div>
              <p class="text-slate-400 text-sm font-medium">Ukuran File</p>
              <p id="info-size" class="text-base font-medium text-slate-700 leading-6">–</p>
            </div>

          </div>
        </div>
      </div>

      {{-- === TAB BUTTONS === --}}
      <div class="min-w-sm md:min-w-md w-full h-fit rounded-b-lg flex p-1 gap-1 border-t border-slate-200 bg-white">
        <button @click="tab = 'info'" :class="tab === 'info' ? 'bg-orange-600 text-white' : 'border text-slate-600'"
          class="flex-1 p-2 rounded-md border-slate-300 duration-150">
          Informasi Dokumen
        </button>
        <button @click="tab = 'preview'"
          :class="tab === 'preview' ? 'bg-orange-600 text-white' : 'border text-slate-600'"
          class="flex-1 p-2 rounded-md border-slate-300 duration-150">
          Preview
        </button>
      </div>
    </div>
  </x-commons.modal>
@endsection

@push('scripts')
  @vite(['resources/js/pdf.js', 'resources/js/previewPdf.js'])
@endpush
