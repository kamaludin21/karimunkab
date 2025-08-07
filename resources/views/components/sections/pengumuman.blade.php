@props(['announcements'])

<section class="w-full bg-white py-10 md:py-20">
  <div class="max-w-screen-lg px-2 bg-white mx-auto gap-2 grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="space-y-2">
      <p class="text-5xl font-medium text-slate-700">Pengumuman</p>
      <a href="/pengumuman"
        class="text-lg hover:text-orange-600 font-medium text-slate-700 flex items-center gap-1 hover:gap-2 duration-200">
        <span class="group-hover:text-white">Lihat lainnya</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor"
          class="w-7 h-auto group-hover:text-white">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
        </svg>
      </a>
    </div>
    <div class="grid grid-cols-1 divide-y border-y border-slate-400 divide-slate-400">
      @forelse ($announcements as $announcement)
        <div class="grid py-4 gap-2 hover:bg-slate-100 group hover:pl-2 duration-300 cursor-pointer">
          <div class="flex gap-2 items-center text-sm font-medium text-slate-600">
            <p>{{ \Carbon\Carbon::parse($announcement->published_at)->translatedFormat('d F Y') }}</p>
            <x-icons.dot class="w-1 h-1" />
            <p>{{ $announcement->author->name ?? 'Admin' }}</p>
          </div>
          <p class="text-2xl leading-8 font-bold line-clamp-3 text-slate-700 select-none">
            {{ $announcement->title }}
          </p>
          <a href="{{ url('/pengumuman/' . $announcement->slug) }}"
            class="text-sm font-medium text-slate-700 flex gap-1 w-fit group-hover:px-1.5 duration-200 group-hover:bg-orange-400 hover:scale-105 items-center">
            <span class="group-hover:text-white">Selengkapnya</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
              stroke="currentColor" class="w-6 h-auto group-hover:text-white">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
          </a>
        </div>
      @empty
        <div class="flex flex-col items-center w-full py-4  text-slate-600">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" class="h-16 w-auto">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
            <path d="M9 10l.01 0" />
            <path d="M15 10l.01 0" />
            <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" />
          </svg>
          <div class="text-xl font-medium">Belum ada pengumuman.</div>
        </div>
      @endforelse
    </div>
  </div>
</section>
