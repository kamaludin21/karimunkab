{{-- Kabar OPD --}}
<section class="w-full grid-pattern py-28">
  <div class="max-w-screen-lg px-2 mx-auto grid gap-10">
    <p class="text-5xl font-medium text-slate-50">Kabar OPD</p>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-8">
      @for ($i = 0; $i < 6; $i++)
        <div class="w-full space-y-2 bg-gray-50 hover:bg-white cursor-pointer rounded-lg p-4 text-slate-600">
          <p class="text-xl font-medium line-clamp-3 text-slate-700 hover:underline hover:text-orange-600">Lorem ipsum
            dolor sit, amet consectetur adipisicing elit.
            Asperiores
            obcaecati doloribus nesciunt omnis vero! Harum ipsa libero omnis. Mollitia in optio temporibus rerum iure,
            quibusdam unde dolore placeat repudiandae assumenda?</p>
          <hr class="border-t border-slate-300">
          <div class="flex items-center gap-1 ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
              <path d="M16 3l0 4" />
              <path d="M8 3l0 4" />
              <path d="M4 11l16 0" />
              <path d="M8 15h2v2h-2z" />
            </svg>
            <p>2 Januari 2024</p>
          </div>
          <div class="flex items-center gap-1 ">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
              <path d="M3.6 9h16.8" />
              <path d="M3.6 15h16.8" />
              <path d="M11.5 3a17 17 0 0 0 0 18" />
              <path d="M12.5 3a17 17 0 0 1 0 18" />
            </svg>
            <a href="#" class="hover:underline">
              DPRD
            </a>
          </div>
        </div>
      @endfor
    </div>
  </div>
</section>
