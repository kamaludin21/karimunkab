{{-- Objek Wisata --}}
  <section class="w-full bg-slate-200 py-20">
    <div class="max-w-screen-lg mx-auto grid gap-10">
      <p class="text-4xl font-medium text-slate-800"></p>
      <div class="flex justify-between">
        <div class="w-1/2 grid">
          <p class="text-5xl font-bold text-slate-800">Destinasi Wisata Karimun</p>
          <p class="text-lg font-light text-slate-700 leading-7">Kabupaten Karimun menyuguhkan keindahan pantai,
            pegunungan, air terjun, serta kuliner khas yang menggoda. Destinasi sempurna untuk liburan alam dan budaya.
          </p>
        </div>
        <div class="w-1/2 flex flex-col items-end">
          {{-- Video --}}
          <iframe class="w-3/4 h-56" src="https://www.youtube.com/embed/1MffQdo2vjo?si=eVEwrWuVTrFPWJud"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
      </div>

      {{-- Collase Image --}}
      <div class="flex h-56">
        <div class="w-1/5 h-full bg-red-200">
          <img class="h-full w-full object-cover hover:scale-110 duration-300"
            src="https://images.unsplash.com/photo-1749253894957-e95b399aa381?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="">
        </div>
        <div class="w-1/5 h-full bg-red-500">
          <img class="h-1/2 w-full object-cover hover:scale-110 duration-300"
            src="https://images.unsplash.com/photo-1750112938913-a174d739469c?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="">
          <img class="h-1/2 w-full object-cover hover:scale-110 duration-300"
            src="https://images.unsplash.com/photo-1746730406177-f8562813b938?q=80&w=1172&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="">
        </div>
        <div class="w-1/5 h-full bg-blue-200">
          <img class="h-1/2 w-full object-cover hover:scale-110 duration-300"
            src="https://plus.unsplash.com/premium_photo-1673240367277-e1d394465b56?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="">
          <img class="h-1/2 w-full object-cover hover:scale-110 duration-300"
            src="https://plus.unsplash.com/premium_photo-1661883809211-eb59f508b3d9?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="">
        </div>
        <div class="w-1/5 bg-sky-200">
          <img class="h-full w-full object-cover hover:scale-110 duration-300"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5_icG3Qb7xex8hdK6NLb_g8xgRm-rkctQtA&s"
            alt="">
        </div>
        <div class="w-1/5 p-4 bg-white flex flex-col justify-between">
          <p class="text-4xl font-bold text-orange-600">Wisata Karimun</p>
          <div class="w-full flex justify-between items-center">
            <p class="text-base font-medium text-slate-600">Selengkapnya</p>
            <button
              class="bg-slate-200 duration-200 cursor-pointer rounded-full p-2 w-fit justify-items-end hover:bg-orange-600 group">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
                class="h-6 w-6 text-slate-500 group-hover:text-white rotate-45 group-hover:rotate-90 duration-200">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M18 11l-6 -6" />
                <path d="M6 11l6 -6" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
