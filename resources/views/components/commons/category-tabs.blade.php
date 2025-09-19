<div class="border-b-2 border-slate-400 flex gap-2 overflow-x-auto whitespace-nowrap no-scrollbar scroll-smooth">
  {{-- Semua Berita --}}
  <a href="/berita"
    class="relative inline-block pb-2 pt-3 px-1 {{ request()->is('berita') ? 'text-slate-600 font-semibold' : 'text-slate-500' }}">
    <p class="font-heading font-medium relative z-10">
      Semua Berita
    </p>
    @if (request()->is('berita'))
      <div class="absolute bottom-0 left-0 h-1 w-full rounded-t-md bg-slate-400"></div>
    @endif
  </a>

  {{-- Daftar Kategori --}}
  @foreach ($categories as $item)
    <a href="/berita/{{ $item->slug }}"
      class="relative inline-block pb-2 pt-3 px-2 hover:bg-slate-200 cursor-pointer w-fit {{ request()->is('berita/' . $item->slug) ? 'text-slate-600 font-semibold' : 'text-slate-500' }}">
      <p class="font-heading font-medium relative z-10">
        {{ $item->title }}
      </p>
      @if (request()->is('berita/' . $item->slug))
        <div class="absolute bottom-0 left-0 h-1 w-full rounded-t-md bg-slate-400"></div>
      @endif
    </a>
  @endforeach
</div>
