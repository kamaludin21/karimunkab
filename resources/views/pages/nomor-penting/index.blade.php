@php
  $phones = App\Models\ImportantNumber::get();
@endphp

@extends('layouts.app', ['activePage' => 'informasi-publik'])

@section('content')
  <section class="max-w-screen-lg px-2 mx-auto w-full pb-16">
    <div class="pt-10">
      <p class="text-4xl font-medium text-slate-800">Nomor Penting</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-4 mt-4 md:mt-8">
      @foreach ($phones as $phone)
        <div class="p-2 md:p-4 rounded-lg bg-white border-1 border-slate-400 space-y-1">
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

  </section>
@endsection
