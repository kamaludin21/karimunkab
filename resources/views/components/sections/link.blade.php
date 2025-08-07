@props(['links'])

<div class="w-full border-t border-slate-200 py-10 bg-slate-100">
  <section class="max-w-screen-lg mx-auto grid px-2">
    <div class="flex flex-wrap justify-center gap-2 md:gap-8 w-full text-slate-700">
      @forelse ($links as $link)
        <div
          class="border border-slate-300 rounded-3xl grid grid-cols-none content-end p-1 flex-1 md:flex-none w-2/5 md:w-1/4 relative bg-white">
          <a href="{{ $link->url }}" target="_blank">
          <button
            class="absolute right-1 top-1 bg-slate-200 duration-200 cursor-pointer rounded-full p-2 w-fit justify-items-end hover:bg-orange-600 group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
              class="h-8 w-8 group-hover:text-white rotate-45 group-hover:rotate-90 duration-200">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M12 5l0 14" />
              <path d="M18 11l-6 -6" />
              <path d="M6 11l6 -6" />
            </svg>
          </button>
          </a>
          <div class="px-3 pb-3 pt-3 grid gap-2">
            <img src="{{ asset('storage/' . $link->thumbnail) }}" class="h-auto w-16" alt="{{ $link->description }}">
            <div class="h-0.5 w-6 bg-slate-400"></div>
            <p class="text-sm font-medium">{{ $link->description }}</p>
          </div>
        </div>
      @empty
        <p class="text-center w-full">Belum ada tautan tersedia.</p>
      @endforelse
    </div>
  </section>
</div>


{{-- <div class="border border-slate-300 rounded-3xl grid grid-cols-none content-end p-1 flex-1 md:flex-none w-2/5 md:w-1/4 relative bg-white">
        <button
          class="absolute right-1 top-1 bg-slate-200 duration-200 cursor-pointer rounded-full p-2 w-fit justify-items-end hover:bg-orange-600 group">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
            class="h-8 w-8 group-hover:text-white rotate-45 group-hover:rotate-90 duration-200">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 5l0 14" />
            <path d="M18 11l-6 -6" />
            <path d="M6 11l6 -6" />
          </svg>
        </button>
        <div class="p-4 grid gap-2">
          <img src="{{ asset('assets/images/url/jdih.jpg') }}" class="h-auto w-16" alt="">
          <div class="h-0.5 w-6 bg-slate-400"></div>
          <p class="text-sm font-medium">Jaringan Dokumentasi dan Informasi Hukum</p>
        </div>
      </div>

      <div class="border border-slate-300 rounded-3xl grid grid-cols-none content-end p-1 flex-1 md:flex-none w-2/5 md:w-1/4 relative bg-white">
        <button
          class="absolute right-1 top-1 bg-slate-200 duration-200 cursor-pointer rounded-full p-2 w-fit justify-items-end hover:bg-orange-600 group">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
            class="h-8 w-8 group-hover:text-white rotate-45 group-hover:rotate-90 duration-200">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 5l0 14" />
            <path d="M18 11l-6 -6" />
            <path d="M6 11l6 -6" />
          </svg>
        </button>
        <div class="p-4 grid gap-2">
          <img src="{{ asset('assets/images/url/ipkd.png') }}" class="h-auto w-16" alt="">
          <div class="h-0.5 w-6 bg-slate-400"></div>
          <p class="text-sm font-medium">Indeks Pengelolaan Keuangan Daerah</p>
        </div>
      </div>

      <div class="border border-slate-300 rounded-3xl grid grid-cols-none content-end p-1 flex-1 md:flex-none w-2/5 md:w-1/4 relative bg-white">
        <button
          class="absolute right-1 top-1 bg-slate-200 duration-200 cursor-pointer rounded-full p-2 w-fit justify-items-end hover:bg-orange-600 group">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
            class="h-8 w-8 group-hover:text-white rotate-45 group-hover:rotate-90 duration-200">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 5l0 14" />
            <path d="M18 11l-6 -6" />
            <path d="M6 11l6 -6" />
          </svg>
        </button>
        <div class="p-4 grid gap-2">
          <img src="{{ asset('assets/images/url/prov.png') }}" class="h-auto w-16" alt="">
          <div class="h-0.5 w-6 bg-slate-400"></div>
          <p class="text-sm font-medium">Situs resmi Pemerintahan Provinsi Kepulauan Riau</p>
        </div>
      </div>

      <div class="border border-slate-300 rounded-3xl grid grid-cols-none content-end p-1 flex-1 md:flex-none w-2/5 md:w-1/4 relative bg-white">
        <button
          class="absolute right-1 top-1 bg-slate-200 duration-200 cursor-pointer rounded-full p-2 w-fit justify-items-end hover:bg-orange-600 group">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
            class="h-8 w-8 group-hover:text-white rotate-45 group-hover:rotate-90 duration-200">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 5l0 14" />
            <path d="M18 11l-6 -6" />
            <path d="M6 11l6 -6" />
          </svg>
        </button>
        <div class="p-4 grid gap-2">
          <img src="{{ asset('assets/images/url/lapor.png') }}" class="h-auto w-16" alt="">
          <div class="h-0.5 w-6 bg-slate-400"></div>
          <p class="text-sm font-medium">Sistem Pengelolaan Pengaduan Pelayanan Publik Nasional</p>
        </div>
      </div> --}}
