@props(['years', 'activeSlug' => null])

@php
  $currentYear = request()->segment(2);
  $latestYear = $years->max('year');
  $activeYear = $currentYear ?? $latestYear;
@endphp

<div
  class="w-full md:w-1/4 border-r border-slate-200 bg-white
         md:static absolute inset-y-0 left-0 z-20
         transform md:transform-none transition-transform duration-300 ease-in-out
         md:h-auto h-auto overflow-y-auto"
  :class="{ '-translate-x-full': !open }">

  <div
    class="border-b border-slate-200 p-4 bg-zinc-50 rounded-tl-lg flex items-center justify-between sticky top-0 z-10">
    <p class="text-base line-clamp-1 font-semibold text-slate-600">Tahun</p>
    <button @click="open = false"
      class="rounded-md block md:hidden bg-slate-100 ring-1.5 hover:bg-slate-200 active:scale-95 ring-slate-300 p-1 group cursor-pointer">
      <x-icons.sidebar-collapse class="h-6 w-auto text-slate-400 stroke-[1.7] group-hover:text-slate-500" />
    </button>
  </div>

  <div class="p-2 space-y-1 text-slate-600 font-light">
    @foreach ($years as $year)
      <a href="/ipkd/{{ $year->year }}"
        class="block px-3 py-2 rounded-l-md transition-colors
          {{ (string) $activeYear === (string) $year->year
              ? 'bg-gradient-to-r from-orange-400 to-white text-slate-50 font-medium'
              : 'hover:bg-orange-50 hover:text-orange-600' }}">
        {{ $year->year }}
      </a>
    @endforeach
  </div>
</div>
