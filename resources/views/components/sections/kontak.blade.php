 {{-- Kontak Karimun --}}
 <section class="w-full bg-white py-20">
   <div class="max-w-screen-lg bg-white mx-auto grid gap-2 px-2">
     <div class="pb-8">
       <p class="text-4xl font-medium text-slate-800">Kontak & Lokasi</p>
     </div>

     {{-- Kontak, Sosmed, Survei --}}
     {{-- <div class="grid grid-cols-3 gap-2">
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
      </div> --}}

     <div class="border border-slate-200 bg-slate-100 w-full h-auto md:h-96 rounded-xl flex flex-col md:flex-row">
       <div class="p-4 md:p-6 space-y-2 w-full md:w-1/2">
         <div class="mb-4">
           <p class="text-xl font-medium text-slate-800">Alamat</p>
           <p class="text-lg font-light text-slate-600">
             Jalan Jenderal Sudirman, Poros, Nomor 371-372, Kelurahan Darussalam, Kecamatan Meral Barat, Kabupaten
             Karimun,
             29666
           </p>
         </div>
         <div class="mb-4 space-y-2">
           <p class="text-xl font-medium text-slate-800">Sosial Media</p>
           <div class="flex flex-grow gap-4 items-center text-slate-700">
             <a href="" class="p-2 border-2 border-slate-600 hover:bg-slate-800 hover:text-white duration-200 rounded-lg">
               <x-icons.facebook class="w-5 h-5" />
             </a>
             <a href="" class="p-2 border-2 border-slate-600 hover:bg-slate-800 hover:text-white duration-200 rounded-lg">
               <x-icons.instagram class="w-5 h-5" />
             </a>
             <a href="" class="p-2 border-2 border-slate-600 hover:bg-slate-800 hover:text-white duration-200 rounded-lg">
               <x-icons.twitter class="w-5 h-5" />
             </a>
             <a href="" class="p-2 border-2 border-slate-600 hover:bg-slate-800 hover:text-white duration-200 rounded-lg">
               <x-icons.youtube class="w-5 h-5" />
             </a>
           </div>
         </div>
         {{-- <div class="flex justify-between items-center bg-white border border-slate-300 p-1 rounded-lg">
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
          </div> --}}
       </div>
       <div class="w-full md:w-1/2 h-96 md:h-auto">
         <iframe
           src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d490697.263595916!2d103.30220041051754!3d0.8210764104654463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d9dea304b7f557%3A0x3039d80b220cab0!2sKarimun%20Regency%2C%20Riau%20Islands!5e1!3m2!1sen!2sid!4v1750295890338!5m2!1sen!2sid"
           width="100%" height="100%" class="rounded-b-xl md:rounded-b-none rounded-r-none md:rounded-r-xl " style="border:0;" allowfullscreen="" loading="lazy"
           referrerpolicy="no-referrer-when-downgrade"></iframe>
       </div>
     </div>

   </div>
 </section>
