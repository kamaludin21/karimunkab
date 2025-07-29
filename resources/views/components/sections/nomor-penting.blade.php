  <section class="w-full bg-white py-10 md:py-20">
    <div class="max-w-screen-lg grid-pattern mx-auto grid gap-6 rounded-xl pt-16 pb-2 md:pb-4 px-2 md:px-4">
      <p class="text-5xl font-medium text-slate-50 text-center">Nomor Penting</p>
      <p class="text-xl font-light text-white w-2/3 mx-auto text-center">Informasi kontak berikut disediakan untuk
        layanan penting. Pastikan penggunaannya tepat dan bertanggung jawab.</p>

      {{-- <div
        class="flex items-center gap-4 before:h-px before:flex-1 before:bg-orange-100  before:content-[''] after:h-px after:flex-1 after:bg-orange-100  after:content-['']">
        <button
          class="text-slate-50 hover:text-white hover:bg-orange-600 cursor-pointer border border-slate-300 w-fit mx-auto px-3 py-1 rounded-full">Nomor
          Lainnya</button>
      </div> --}}

      <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-4 mt-4 md:mt-8">

        @for ($i = 0; $i < 6; $i++)
          <div class="p-2 md:p-4 rounded-lg bg-white space-y-1">
            <p class="text-lg font-medium text-slate-800 leading-5">UPT PKM MERAL BARAT</p>
            <p class="text-base font-light text-slate-600 leading-5">MOHAMAD RIDWAN</p>
            <div class="flex flex-col md:flex-row gap-2 mt-4 font-medium">
              <button
                class="text-center text-slate-700 gap-1 border-1 border-slate-400 py-2 flex-1 rounded-xl active:scale-95">
                Telepon
              </button>

              <button
                class="flex items-center justify-center gap-1 bg-emerald-700 text-white py-2 flex-1 rounded-xl active:scale-95">
                <span>Whatsapp</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                  <path
                    d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                </svg>
              </button>

            </div>
          </div>
        @endfor

      </div>

    </div>
  </section>
