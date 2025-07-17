@extends('layouts.app', ['activePage' => 'pariwisata'])

@section('content')
  <section class="relative w-full h-auto h-[100vh] overflow-hidden">
    <!-- Parallax Background Image -->
    <div class="absolute inset-0 bg-fixed bg-center bg-cover z-0 w-full h-full object-cover z-0 blur-sm brightness-50"
      style="background-image: url('https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/332/2023/10/11/pexels-sevenstorm-juhaszimrus-833413-3510577368.jpg');">
    </div>


    <!-- Foreground Content -->
    <div class="relative z-10 w-full max-w-screen-lg mx-auto py-28 space-y-20">
      <h1 class="text-8xl font-bold text-center text-slate-100">
        Jelajahi Pariwisata Karimun
      </h1>

      <div class="grid grid-cols-4 gap-8">
        <div class="h-full w-full space-y-2">
          <img class="w-full h-full rounded-lg hover:scale-105 duration-200"
            src="https://images.unsplash.com/photo-1748392029321-58793571f850?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="">
          <p class="text-xl font-semibold text-white drop-shadow-lg">Gurun Pasir Sahara</p>
        </div>
        <div class="h-full w-full space-y-2">
          <img class="w-full h-full rounded-lg"
            src="https://plus.unsplash.com/premium_photo-1675629118861-dc8aa2acea74?q=80&w=734&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="">
          <p class="text-xl font-semibold text-white drop-shadow-lg">Gunung Jantan</p>
        </div>
        <div class="h-full w-full space-y-2">
          <img class="w-full h-full rounded-lg"
            src="https://images.unsplash.com/photo-1557456170-0cf4f4d0d362?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="">
          <p class="text-xl font-semibold text-white drop-shadow-lg">Danau Pongkar</p>
        </div>
        <div class="h-full w-full space-y-2">
          <img class="w-full h-full rounded-lg"
            src="https://images.unsplash.com/photo-1511081692775-05d0f180a065?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Y2FmZXxlbnwwfHwwfHx8MA%3D%3D"
            alt="">
          <p class="text-xl font-semibold text-white drop-shadow-lg">Kedai Kopi Botan</p>
        </div>
      </div>
    </div>
  </section>

  <section class="px-2">

  </section>

  <section class="w-full max-w-screen-lg mx-auto py-32 flex items-start justify-between ">
    <div class="w-full flex border border-zinc-300 p-2">
      <div class="w-2/3 p-10">
        <div class="bg-orange-600 flex gap-2 items-center rounded-full py-1 w-fit pr-4 pl-1 text-white">
          <div class="rounded-full border p-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path
                d="M6.18 10.95l2.54 3.175l.084 .093a1 1 0 0 0 1.403 -.01l1.637 -1.638l1.324 1.985a1 1 0 0 0 1.457 .226l3.632 -2.906l3.647 7.697a1 1 0 0 1 -.904 1.428h-18a1 1 0 0 1 -.904 -1.428zm5.82 -7.878a3.3 3.3 0 0 1 2.983 1.888l2.394 5.057l-3.15 2.52l-1.395 -2.092l-.075 -.099a1 1 0 0 0 -1.464 -.053l-1.711 1.709l-1.301 -1.627l-1.151 -1.435l1.888 -3.98a3.3 3.3 0 0 1 2.982 -1.888" />
            </svg>
          </div>
          <p class="text-base font-medium">Alam</p>
        </div>
        <p class="text-4xl font-medium text-slate-700">Danau Pongkar</p>
        <p class="text-lg font-light text-slate-600">Danau Pongkar merupakan salah satu destinasi wisata alam yang menawan
          di Pulau Karimun Besar, Kabupaten Karimun, Provinsi Kepulauan Riau. Danau ini terbentuk dari bekas area
          pertambangan bauksit yang kini telah berubah menjadi danau alami dengan air berwarna biru kehijauan yang jernih.
        </p>
      </div>

      <div class="w-1/3 ">  
        <img class="w-full h-44 bg-cover"
          src="https://images.unsplash.com/photo-1557456170-0cf4f4d0d362?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          alt="">
      </div>


    </div>

    {{-- <div class="w-fit border border-zinc-300 flex gap-4 p-2">

      <button>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M15 6l-6 6l6 6" />
        </svg>
      </button>
      <p>
        1/2
      </p>
      <button>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M9 6l6 6l-6 6" />
        </svg>
      </button>
    </div> --}}

  </section>
@endsection
