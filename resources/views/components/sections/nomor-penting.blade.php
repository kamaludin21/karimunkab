@props(['phones'])

<section class="w-full bg-white py-10 md:py-20">
  <div class="max-w-screen-lg dot-pattern mx-auto grid gap-6 rounded-xl pt-16 pb-2 md:pb-4 px-2 md:px-4">
    <p class="text-5xl font-medium text-slate-50 text-center">Nomor Penting</p>
    <p class="text-xl font-light text-white w-2/3 mx-auto text-center">
      Informasi kontak berikut disediakan untuk layanan penting. Pastikan penggunaannya tepat dan bertanggung jawab.
    </p>

    <div
      class="flex items-center gap-4 before:h-px before:flex-1 before:bg-slate-700 after:h-px after:flex-1 after:bg-slate-700">
      <a href="/nomor-penting"
        class="text-slate-300 hover:text-white hover:bg-slate-600 cursor-pointer border border-slate-300 w-fit mx-auto px-3 py-1 rounded-full flex gap-1 items-center">
        <span>Nomor Lainnya</span>
        <svg viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="h-5 w-5">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path
            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
        </svg>
      </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-4 mt-4 md:mt-8">
      @foreach ($phones as $phone)
        <div class="p-2 md:p-4 rounded-lg bg-white space-y-1">
          <p class="text-lg font-medium text-slate-800 leading-5">{{ $phone->service_name }}</p>
          <p class="text-base font-light text-slate-600 leading-5">{{ $phone->contact_name }}</p>
          <div class="flex flex-col md:flex-row gap-2 mt-4 font-medium">
            <a href="tel:{{ $phone->phone_number }}"
              class="text-center text-slate-700 gap-1 border border-slate-400 py-1 md:py-2 px-2 flex-1 rounded-lg active:scale-95">
              Telepon
            </a>
            {{-- if is_whatsapp true --}}
            @if ($phone->is_whatsapp)
              <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $phone->phone_number) }}" target="_blank"
                class="flex items-center justify-center gap-1 bg-emerald-700 text-white py-1 px-2 md:py-2 flex-1 rounded-lg active:scale-95">
                <span>Whatsapp</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round" class="h-6 w-6">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                  <path
                    d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                </svg>
              </a>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
