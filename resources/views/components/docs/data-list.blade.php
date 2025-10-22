@props(['documents', 'showInstitute' => false])

<ul class="py-4 px-2 grid divide-y divide-slate-200 divide-dashed">
  @forelse ($documents as $doc)
    <div class="flex items-center justify-between hover:bg-slate-50 py-2 px-2">
      <div class="py-2 w-2/3">
        <div class="flex gap-1 whitespace-nowrap items-center">
          <p class="text-xs font-medium text-slate-400">
            <span class="hidden md:block">{{ $doc->published_at?->isoFormat('D MMMM Y') ?? '-' }}</span>
            <span class="block md:hidden">{{ $doc->published_at?->translatedFormat('d M Y') ?? '-' }}</span>
          </p>
          @if ($showInstitute)
            <x-icons.dot class="h-1 w-1 text-slate-300" />
            <p class="text-xs font-medium text-slate-400">
              {{ $doc->institute->alias ?? 'Tidak diketahui' }}
            </p>
          @endif
        </div>
        <p class="text-lg font-medium text-slate-600 line-clamp-1">
          {{ $doc->title }}
        </p>
      </div>
      {{-- <div class="flex flex-0 gap-1">
        <button data-file="{{ asset('storage/' . $doc->file) }}" onclick="openPDF(this)"
          class="active:scale-95 p-2 bg-slate-200 rounded-full focus:outline-none group">
          <x-icons.text-scan class="h-5 w-auto stroke-2 group-hover:text-orange-400 text-slate-600" />
        </button>
        <a href="{{ asset('storage/' . $doc->file) }}" download
          class="bg-white ring-blue-500 ring ring-inset hover:bg-blue-500 rounded-full px-3 md:px-4 flex items-center cursor-pointer active:scale-95 group text-blue-500"
          target="_blank">
          <span class="hidden md:block text-sm font-medium group-hover:text-slate-50">UNDUH</span>
          <x-icons.cloud-download class="block md:hidden stroke-2 h-6 w-auto group-hover:text-slate-50" />
        </a>
      </div> --}}
      <div x-data="{ open: false }" class="flex w-full items-center justify-end gap-2 px-1 py-3 text-slate-600">
        <div class="relative inline-flex w-fit text-sm text-slate-500">

          <!-- Tombol More -->
          <button @click="open = !open"
            class="cursor-pointer rounded-md border border-gray-200 bg-white p-1.5 shadow hover:shadow-lg font-medium hover:bg-gray-100 hover:text-orange-600 focus:z-10 focus:text-orange-600 focus:ring-1 focus:ring-orange-600">
            <x-icons.dots-vertical class="h-5 w-auto stroke-2" />
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
    </div>
  @empty
    <div class="flex flex-col items-center justify-center gap-4 py-16 px-4 text-center text-slate-500">
      <x-icons.file-sad class="h-12 w-auto text-slate-400" />
      <p class="text-base font-medium">Belum ada dokumen</p>
    </div>
  @endforelse
</ul>
