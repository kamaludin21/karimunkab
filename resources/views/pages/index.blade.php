@extends('layouts.app', ['activePage' => 'beranda'])

@section('content')
  {{-- Header --}}
  <section class="py-32 w-full bg-gradient-to-t from-slate-50 to-slate-200">
    <div class="flex items-center justify-between max-w-screen-lg mx-auto w-full">
      <div class="flex-1">
        <p
          class="text-[9rem] font-extrabold bg-clip-text text-transparent bg-[linear-gradient(to_right,theme(colors.orange.600),theme(colors.orange.200),theme(colors.orange.600),theme(colors.amber.600),theme(colors.orange.600),theme(colors.orange.200),theme(colors.orange.600))] bg-[length:200%_auto] animate-gradient tracking-wider flex items-center">
          KARIMUN
        </p>
      </div>
      <div class="pl-8 flex-0 text-4xl grid gap-2 font-medium text-slate-800 border-l-2 border-orange-600">
        <p>Maju</p>
        <p>Sejahtera</p>
        <p>Berbudaya</p>
      </div>
    </div>
  </section>
  {{-- LINK --}}
  <div class="w-full border-t border-slate-200 py-10">
    <section class="max-w-screen-lg mx-auto grid gap-16">
      <div class="flex flex-wrap justify-center gap-8 w-full">

        <div class="border border-slate-300 rounded-3xl grid grid-cols-none content-end p-1 w-1/4 relative">
          <button
            class="absolute right-1 top-1 bg-slate-200 duration-200 cursor-pointer rounded-full p-2 w-fit justify-items-end hover:bg-orange-600 group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
              class="h-8 w-8 text-slate-500 group-hover:text-white rotate-45 group-hover:rotate-90 duration-200">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M12 5l0 14" />
              <path d="M18 11l-6 -6" />
              <path d="M6 11l6 -6" />
            </svg>
          </button>
          <div class="px-3 pb-3 pt-3 grid gap-2">
            <img src="{{ asset('assets/images/url/ppid.png') }}" class="h-auto w-16" alt="">
            <div class="h-0.5 w-6 bg-slate-400"></div>
            <p class="text-sm font-medium">Pejabat Pengelola Informasi dan Dokumentasi</p>
          </div>
        </div>

        <div class="border border-slate-300 rounded-3xl grid grid-cols-none content-end p-1 w-1/4 relative">
          <button
            class="absolute right-1 top-1 bg-slate-200 duration-200 cursor-pointer rounded-full p-2 w-fit justify-items-end hover:bg-orange-600 group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
              class="h-8 w-8 text-slate-500 group-hover:text-white rotate-45 group-hover:rotate-90 duration-200">
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

        <div class="border border-slate-300 rounded-3xl grid grid-cols-none content-end p-1 w-1/4 relative">
          <button
            class="absolute right-1 top-1 bg-slate-200 duration-200 cursor-pointer rounded-full p-2 w-fit justify-items-end hover:bg-orange-600 group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
              class="h-8 w-8 text-slate-500 group-hover:text-white rotate-45 group-hover:rotate-90 duration-200">
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

        <div class="border border-slate-300 rounded-3xl grid grid-cols-none content-end p-1 w-1/4 relative">
          <button
            class="absolute right-1 top-1 bg-slate-200 duration-200 cursor-pointer rounded-full p-2 w-fit justify-items-end hover:bg-orange-600 group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
              class="h-8 w-8 text-slate-500 group-hover:text-white rotate-45 group-hover:rotate-90 duration-200">
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
        <div class="border border-slate-300 rounded-3xl grid grid-cols-none content-end p-1 w-1/4 relative">
          <button
            class="absolute right-1 top-1 bg-slate-200 duration-200 cursor-pointer rounded-full p-2 w-fit justify-items-end hover:bg-orange-600 group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
              class="h-8 w-8 text-slate-500 group-hover:text-white rotate-45 group-hover:rotate-90 duration-200">
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
        </div>
      </div>
    </section>
  </div>

  {{-- Berita --}}
  <section class="w-full bg-white py-20">
    <div class="max-w-screen-lg bg-white mx-auto grid gap-6">
      <p class="text-4xl font-medium text-slate-800">Berita Karimun</p>
      <div class="grid grid-cols-2 gap-4">
        <div
          class="h-96 bg-[url(https://images.unsplash.com/photo-1750232453488-f6a40815126d?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D)] bg-cover grid items-end">
          <div class="bg-slate-800/50 p-4 h-full flex flex-col w-full justify-between">
            <div>
              <div class="w-fit whitespace-nowrap p-0.5 rounded-md text-slate-100 text-sm">
                <p>12 Januari 2025 | Politik</p>
              </div>
              <a href="/slug"
                class="hover:underline underline-offset-2 text-3xl leading-[1.2] font-medium hover:text-white text-slate-100 line-clamp-3">Lorem
                ipsum dolor sit amet consect with etur adipisicing elit. Laudantium voluptate officiis possimus?</a>
            </div>

            <div class="flex justify-end">
              <a href="/berita/slug"
                class="ring-2 hover:bg-white ring-white p-2 rounded-full group duration-200 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
                  stroke="currentColor"
                  class="h-6 w-6 text-white group-hover:text-slate-800 group-hover:rotate-45 duration-200">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="h-full w-full grid grid-cols-2 gap-4 auto-rows-fr">
          <div class="bg-slate-800 col-span-2 h-full w-full flex">
            <div
              class="w-1/2 bg-cover h-full bg-[url(https://images.unsplash.com/photo-1747134392051-5e112c58ce1e?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D)]">
            </div>
            <div class="w-1/2 h-full flex flex-col justify-between p-4">
              <div>
                <div class="w-fit whitespace-nowrap p-0.5 rounded-md text-slate-100 text-sm">
                  <p>12 Januari 2025 | Politik</p>
                </div>
                <a href="/slug"
                  class="hover:underline underline-offset-2 text-xl leading-[1.2] font-light hover:text-white text-slate-100 line-clamp-3">Lorem
                  ipsum dolor sit amet consect with etur adipisicing elit. Laudantium voluptate officiis possimus?</a>
              </div>

              <div class="flex justify-end">
                <a href="/berita/slug"
                  class="ring-1 hover:bg-white ring-white p-1.5 rounded-full group duration-200 cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                    stroke="currentColor"
                    class="h-5 w-5 text-white group-hover:text-slate-800 group-hover:rotate-45 duration-200">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div
            class="h-full w-full bg-[url(https://images.unsplash.com/photo-1749906891532-2ab9f9aeef74?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHwxN3x8fGVufDB8fHx8fA%3D%3D)] bg-cover grid items-end">
            <div class="bg-slate-800/50 p-4 h-full flex flex-col w-full justify-between">
              <div>
                <div class="w-fit whitespace-nowrap p-0.5 rounded-md text-slate-100 text-sm">
                  <p>12 Januari 2025 | Politik</p>
                </div>
                <a href="/slug"
                  class="hover:underline underline-offset-2 text-xl leading-[1.2] font-light hover:text-white text-slate-100 line-clamp-2">Lorem
                  ipsum dolor sit amet consect with etur adipisicing elit. Laudantium voluptate officiis possimus?</a>
              </div>

              <div class="flex justify-end">
                <a href="/berita/slug"
                  class="ring-1 hover:bg-white ring-white p-1.5 rounded-full group duration-200 cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                    stroke="currentColor"
                    class="h-5 w-5 text-white group-hover:text-slate-800 group-hover:rotate-45 duration-200">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div
            class="h-full w-full bg-[url(https://images.unsplash.com/photo-1749741331500-04c330bc53a9?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDF8MHxmZWF0dXJlZC1waG90b3MtZmVlZHwxMXx8fGVufDB8fHx8fA%3D%3D)] bg-cover grid items-end">
            <div class="bg-slate-800/50 p-4 h-full flex flex-col w-full justify-between">
              <div>
                <div class="w-fit whitespace-nowrap p-0.5 rounded-md text-slate-100 text-sm">
                  <p>12 Januari 2025 | Politik</p>
                </div>
                <a href="/slug"
                  class="hover:underline underline-offset-2 text-xl leading-[1.2] font-light hover:text-white text-slate-100 line-clamp-2">Lorem
                  ipsum dolor sit amet consect with etur adipisicing elit. Laudantium voluptate officiis possimus?</a>
              </div>

              <div class="flex justify-end">
                <a href="/berita/slug"
                  class="ring-1 hover:bg-white ring-white p-1.5 rounded-full group duration-200 cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                    stroke="currentColor"
                    class="h-5 w-5 text-white group-hover:text-slate-800 group-hover:rotate-45 duration-200">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  {{-- Publikasi Dokumen --}}
  <section class="w-full border-b border-slate-200 bg-white py-20">
    <div class="max-w-screen-lg bg-white mx-auto grid gap-10">
      <p class="text-4xl font-medium text-slate-800">Publikasi Dokumen</p>
      <table class="text-lg">
        <thead>
          <tr class="text-left text-sm uppercase text-slate-800 border-slate-200 border-b">
            <th class="pb-2 font-bold pr-4">Tahun</th>
            <th class="pb-2 font-bold pr-4">Tanggal</th>
            <th class="pb-2 font-bold pr-4">Judul</th>
            <th class="pb-2 font-bold pr-4">Pemilik</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-slate-700 hover:text-orange-600 duration-200">
            <td class="py-3">2025</td>
            <td class="py-3 border-slate-300 border-b">1 Januari</td>
            <td class="py-3 border-slate-300 border-b">
              LAMPIRAN 1 APBD 1
            </td>
            <td class="py-3 border-slate-300 border-b">
              BPKAD
            </td>
            <td class="py-3 border-slate-300 border-b flex justify-end cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 hover:scale-110 duration-200">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
              </svg>
            </td>
          </tr>
          <tr class="text-slate-700 hover:text-orange-600 duration-200">
            <td class="py-3"></td>
            <td class="py-3">8 Januari</td>
            <td class="py-3 border-slate-300 border-b">
              DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU 91-94
            </td>
            <td class="py-3 border-slate-300 border-b">
              DPMPTSP
            </td>
            <td class="py-3 border-slate-300 border-b flex justify-end">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
              </svg>
            </td>
          </tr>
          <tr class="text-slate-700 hover:text-orange-600 duration-200">
            <td class="py-3 border-slate-300 border-b"></td>
            <td class="py-3 border-slate-300 border-b"></td>
            <td class="py-3 border-slate-300 border-b">
              LAMPIRAN 1 APBD 1
            </td>
            <td class="py-3 border-slate-300 border-b">
              BPKAD
            </td>
            <td class="py-3 border-slate-300 border-b flex justify-end">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
              </svg>
            </td>
          </tr>
          <tr class="text-slate-700 hover:text-orange-600 duration-200">
            <td class="">2024</td>
            <td class="py-3 border-slate-300 border-b">21 Januari</td>
            <td class="py-3 border-slate-300 border-b">
              BATANG TUBUH PERDA APBD T.A. 2023
            </td>
            <td class="py-3 border-slate-300 border-b">
              BPKAD
            </td>
            <td class="py-3 border-slate-300 border-b flex justify-end">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
              </svg>
            </td>
          </tr>
          <tr class="text-slate-700 hover:text-orange-600 duration-200">
            <td class="py-3 border-slate-300 border-b"></td>
            <td class="py-3 border-slate-300 border-b">20 Januari</td>
            <td class="py-3 border-slate-300 border-b">
              RINGKASAN APBD T.A 2023
            </td>
            <td class="py-3 border-slate-300 border-b">
              BPKAD
            </td>
            <td class="py-3 border-slate-300 border-b flex justify-end">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
              </svg>

            </td>
          </tr>
        </tbody>
      </table>
      <button
        class="text-slate-600 hover:text-white hover:bg-orange-600 cursor-pointer border border-slate-300 w-fit mx-auto px-3 py-1 rounded-full">Lihat
        Selengkapnya</button>
    </div>
  </section>

  {{-- Kabar OPD --}}
  <section class="w-full bg-white py-20">
    <div class="max-w-screen-lg bg-white mx-auto grid gap-10">
      <p class="text-4xl font-medium text-slate-800">Kabar OPD</p>
      <div class="flex overflow-x-auto gap-6 pb-4 scroll-smooth no-scrollbar">
        <div class="w-1/4 flex-none bg-gray-200 rounded-lg shadow-sm p-4">
          <div class="h-44 bg-gray-300 rounded-md mb-4"></div>
          <div class="h-4 bg-gray-300 rounded w-3/4 mb-2"></div>
          <div class="h-4 bg-gray-300 rounded w-1/2"></div>
        </div>
        <div class="w-1/4 flex-none bg-gray-200 rounded-lg shadow-md p-4">
          <div class="h-44 bg-gray-300 rounded-md mb-4"></div>
          <div class="h-4 bg-gray-300 rounded w-3/4 mb-2"></div>
          <div class="h-4 bg-gray-300 rounded w-1/2"></div>
        </div>
        <div class="w-1/4 flex-none bg-gray-200 rounded-lg shadow-md p-4">
          <div class="h-44 bg-gray-300 rounded-md mb-4"></div>
          <div class="h-4 bg-gray-300 rounded w-3/4 mb-2"></div>
          <div class="h-4 bg-gray-300 rounded w-1/2"></div>
        </div>
        <div class="w-1/4 flex-none bg-gray-200 rounded-lg shadow-md p-4">
          <div class="h-44 bg-gray-300 rounded-md mb-4"></div>
          <div class="h-4 bg-gray-300 rounded w-3/4 mb-2"></div>
          <div class="h-4 bg-gray-300 rounded w-1/2"></div>
        </div>
      </div>
    </div>
  </section>

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

  {{-- Kontak Karimun --}}
  <section class="w-full bg-white py-20">
    <div class="max-w-screen-lg bg-white mx-auto grid gap-2">
      {{-- <div class="pb-8">
        <p class="text-4xl font-medium text-slate-800">Koneksi</p>
      </div> --}}

      {{-- Kontak, Sosmed, Survei --}}
      <div class="grid grid-cols-3 gap-2">
        <div class="flex items-center bg-slate-100 border border-slate-300 gap-2 p-2 rounded-xl">
          <div class="bg-orange-600 rounded-lg w-fit p-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="w-6 h-6 text-white">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M3 7l6 -3l6 3l6 -3v13l-6 3l-6 -3l-6 3v-13" />
              <path d="M9 12v.01" />
              <path d="M6 13v.01" />
              <path d="M17 15l-4 -4" />
              <path d="M13 15l4 -4" />
            </svg>
          </div>
          <p class="text-lg font-medium">Alamat</p>
        </div>
        <div class="flex items-center bg-slate-100 gap-2 p-2 rounded-xl">
          <div class="bg-sky-600 rounded-lg w-fit p-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="h-6 w-6 text-white">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M12 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
              <path d="M5 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
              <path d="M19 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
              <path d="M12 14m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
              <path d="M12 7l0 4" />
              <path d="M6.7 17.8l2.8 -2" />
              <path d="M17.3 17.8l-2.8 -2" />
            </svg>
          </div>
          <p class="text-base font-medium">Sosial Media</p>
        </div>
        <div class="flex items-center bg-slate-100 gap-2 p-2 rounded-xl">
          <div class="bg-amber-600 rounded-lg w-fit p-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="h-6 w-6 text-white">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M8 9h8" />
              <path d="M8 13h6" />
              <path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" />
            </svg>
          </div>
          <p class="text-base font-medium">Survey & Umpan Balik</p>
        </div>
      </div>

      <div class="border border-slate-200 bg-slate-100 w-full h-96 rounded-xl flex">
        <div class="p-6 space-y-2 w-1/2">
          <div class="mb-4">
            <p class="text-xl font-medium">Alamat</p>
            <p class="text-lg font-light">
              Jalan Jenderla Sudirman, Poros, Nomor 371-372, Kelurahan Darussalam, Kecamatan Meral Barat, Kabupaten
              Karimun,
              29666
            </p>
          </div>
          <div class="flex justify-between items-center bg-white border border-slate-300 p-1 rounded-lg">
            <div class="pl-2">
              <p class="text-lg font-medium text-slate-700">Kantor Bupati</p>
            </div>
            <button
              class="border border-sky-600 hover:bg-sky-600 text-sky-600 hover:text-white duration-200 p-2 h-full w-fit rounded-md cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="h-5 w-5 ">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 18l-2 -4l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5l-2.901 8.034" />
                <path
                  d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" />
                <path d="M19 18v.01" />
              </svg>
            </button>
          </div>
          <div class="flex justify-between items-center bg-white border border-slate-300 p-1 rounded-lg">
            <div class="pl-2">
              <p class="text-lg font-medium text-slate-700">Kantor Diskominfostaper</p>
            </div>
            <button
              class="border border-sky-600 hover:bg-sky-600 text-sky-600 hover:text-white duration-200 p-2 h-full w-fit rounded-md cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="h-5 w-5 ">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 18l-2 -4l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5l-2.901 8.034" />
                <path
                  d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" />
                <path d="M19 18v.01" />
              </svg>
            </button>
          </div>
        </div>
        <div class="w-1/2">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d490697.263595916!2d103.30220041051754!3d0.8210764104654463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d9dea304b7f557%3A0x3039d80b220cab0!2sKarimun%20Regency%2C%20Riau%20Islands!5e1!3m2!1sen!2sid!4v1750295890338!5m2!1sen!2sid"
            width="100%" height="100%" class="rounded-r-xl" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

    </div>
  </section>
@endsection
