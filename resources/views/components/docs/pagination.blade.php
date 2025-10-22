@props(['documents'])

@if ($documents->hasPages())
  <div class="flex border-t border-slate-200 py-6 px-4 justify-between items-center">
    <ul class="flex items-center gap-4 text-base font-medium">
      @php
        $start = max(1, $documents->currentPage() - 2);
        $end = min($documents->lastPage(), $documents->currentPage() + 2);
      @endphp
      @if ($start > 1)
        <li>
          <a href="{{ $documents->url(1) }}"
            class="bg-white rounded py-1 px-2 ring-1 ring-slate-200 text-slate-500 hover:bg-slate-200">1</a>
        </li>
        @if ($start > 2)
          <li class="text-slate-400">...</li>
        @endif
      @endif
      @for ($i = $start; $i <= $end; $i++)
        @if ($i == $documents->currentPage())
          <li>
            <a href="javascript:void(0)" class="bg-orange-600 rounded py-1 px-2 ring-1 ring-slate-200 text-white">
              {{ $i }}
            </a>
          </li>
        @else
          <li>
            <a href="{{ $documents->url($i) }}"
              class="bg-white rounded py-1 px-2 ring-1 ring-slate-200 text-slate-500 hover:bg-slate-200">
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
            class="bg-white rounded py-1 px-2 ring-1 ring-slate-200 text-slate-500 hover:bg-slate-200">
            {{ $documents->lastPage() }}
          </a>
        </li>
      @endif
    </ul>
    <div class="flex gap-2">
      <a href="{{ $documents->previousPageUrl() }}"
        class="{{ $documents->onFirstPage() ? 'pointer-events-none text-slate-300' : 'hover:text-slate-600 text-slate-500' }} bg-white hover:bg-slate-200 rounded p-1 ring-1 ring-slate-300">
        <x-icons.chevron-left class="h-6 w-6 stroke-[1.5]" />
      </a>
      <a href="{{ $documents->nextPageUrl() }}"
        class="{{ $documents->hasMorePages() ? 'hover:text-slate-600 text-slate-500' : 'pointer-events-none text-slate-300' }} bg-white hover:bg-slate-200 rounded p-1 ring-1 ring-slate-300">
        <x-icons.chevron-right class="h-6 w-6 stroke-[1.5]" />
      </a>
    </div>
  </div>
@endif
