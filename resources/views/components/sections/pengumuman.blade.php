  <section class="w-full bg-white py-10 md:py-20">
    <div class="max-w-screen-lg px-2 bg-white mx-auto gap-2 grid grid-cols-1 lg:grid-cols-2 gap-8">
      <div class="space-y-2">
        <p class="text-5xl font-medium text-slate-700">Pengumuman</p>
        <a href=""
          class="text-lg hover:text-orange-600 font-medium text-slate-700 flex items-center gap-1 hover:gap-2 duration-200">
          <span class="group-hover:text-white">Lihat lainnya</span>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
            stroke="currentColor" class="w-7 h-auto group-hover:text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
          </svg>

        </a>
      </div>
      <div class="grid grid-cols-1 divide-y border-y border-slate-400 divide-slate-400">
        @for ($i = 0; $i < 3; $i++)
          <div class="grid py-4 gap-2 hover:bg-slate-100 group hover:pl-2 duration-300 cursor-pointer">
            <div class="flex gap-2 items-center text-sm font-medium text-slate-600">
              <p>12 Januari 2024 </p>
              <x-icons.dot class="w-1 h-1" />
              <p>BKPSDM</p>
            </div>
            <p class="text-3xl leading-8 font-bold line-clamp-2 text-slate-700">Lorem ipsum dolor
              sit amet marque consectetur.</p>
            <a href="/slug-operator"
              class="text-sm font-medium text-slate-700 flex gap-1 w-fit group-hover:px-1.5  duration-200 group-hover:bg-orange-400 hover:scale-105 items-center">
              <span class="group-hover:text-white">Selengkapnya</span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
                stroke="currentColor" class="w-6 h-auto group-hover:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
              </svg>

            </a>
          </div>
        @endfor
      </div>
    </div>
  </section>
