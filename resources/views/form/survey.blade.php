@extends('layouts.app')

@section('content')
  <div class="max-w-screen-lg mx-auto w-full mb-16">
    <div class="px-2 md:px-6 rounded-none md:rounded-lg my-0 md:my-6 py-4 md:py-8 dot-pattern text-center">
      <p class="text-xl md:text-2xl font-semibold text-slate-100 font-header">
        Survey Pengelolaan Domain Aplikasi di Lingkungan PEMDA
      </p>
    </div>

    <div class="bg-white p-2 md:p-6 rounded-lg ring-1 ring-slate-200">
      <div class="bg-slate-100 border-l-4 border-slate-300 p-2">
        <p class="text-base text-slate-600">
          Survey ini bertujuan untuk mengumpulkan data-data aplikasi yang digunakan
          di lingkungan Pemda Karimun, yang kemudian akan dilakukan pengelolaan domain oleh DISKOMINFO
          sesuai PERMEN KOMDIGI Nomor 5 Tahun 2025
        </p>
      </div>

      <hr class="my-4 border-slate-200">

      <div x-data="formApp()" class="space-y-6">
        {{-- Info OPD --}}
        <div class="space-y-2">
          <p class="text-sm font-medium text-slate-500">Satuan Kerja</p>
          <div class="flex gap-1 items-center">
            <button class="p-1 hover:bg-slate-200 text-slate-400 rounded-sm hover:text-blue-800 cursor-pointer">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="w-5 h-auto">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                <path d="M16 5l3 3" />
              </svg>
            </button>
            <p class="text-xl font-medium text-blue-800">Dinas PUPR</p>
          </div>
        </div>

        {{-- Form Dinamis --}}
        <template x-for="(row, index) in rows" :key="index">
          <div class="space-y-4 border border-slate-300 p-3 rounded-md">
            <div class="flex justify-between items-center">
              <p class="text-lg font-medium text-slate-700">Aplikasi <span x-text="index + 1"></span></p>
              <button type="button" class="text-red-600 hover:text-red-800 text-sm" @click="removeRow(index)">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="w-5 h-auto">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M4 7l16 0" />
                  <path d="M10 11l0 6" />
                  <path d="M14 11l0 6" />
                  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                </svg>
              </button>
            </div>

            {{-- Jenis Distribusi Aplikasi --}}
            <div class="space-y-2">
              <p class="text-sm font-medium text-slate-500">Jenis Distribusi Aplikasi</p>
              <div class="flex gap-4">
                <label class="flex flex-1 items-center px-2 border border-slate-200 rounded-sm hover:bg-slate-100">
                  <input type="radio" x-model="row.distribusi" value="Daerah"
                    class="w-6 h-auto text-blue-600 bg-slate-100 border-slate-300 focus:ring-blue-800">
                  <span class="py-4 ms-2 text-sm font-medium text-slate-700">Daerah</span>
                </label>
                <label class="flex flex-1 items-center px-2 border border-slate-200 rounded-sm hover:bg-slate-100">
                  <input type="radio" x-model="row.distribusi" value="Nasional"
                    class="w-6 h-auto text-blue-600 bg-slate-100 border-slate-300 focus:ring-blue-800">
                  <span class="py-4 ms-2 text-sm font-medium text-slate-700">Nasional</span>
                </label>
              </div>
            </div>

            {{-- Nama Aplikasi --}}
            <div class="space-y-2">
              <p class="text-sm font-medium text-slate-500">Nama Aplikasi</p>
              <textarea x-model="row.nama" rows="1"
                class="block p-2.5 w-full text-sm text-slate-700 ring focus:ring-2 rounded-sm ring-slate-200 focus:ring-blue-800 focus:outline-none"
                placeholder="Nama Aplikasi"></textarea>
            </div>

            {{-- Alamat Website --}}
            <div class="space-y-2">
              <p class="text-sm font-medium text-slate-500">Alamat Website Aplikasi</p>
              <textarea x-model="row.url" rows="1"
                class="block p-2.5 w-full text-sm text-slate-700 ring focus:ring-2 rounded-sm ring-slate-200 focus:ring-blue-800 focus:outline-none"
                placeholder="https://..."></textarea>
            </div>

            {{-- Estimasi Pengguna --}}
            <div class="space-y-2">
              <p class="text-sm font-medium text-slate-500">Estimasi Pengguna Aplikasi</p>
              <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                <label class="flex items-center px-2 border border-slate-200 rounded-sm hover:bg-slate-100">
                  <input type="radio" x-model="row.pengguna" value="0 - 100"
                    class="w-6 h-auto text-blue-600 bg-slate-100 border-slate-300 focus:ring-blue-800">
                  <span class="py-2 ms-2 text-sm font-medium text-slate-700">0 - 100</span>
                </label>
                <label class="flex items-center px-2 border border-slate-200 rounded-sm hover:bg-slate-100">
                  <input type="radio" x-model="row.pengguna" value="100 - 500"
                    class="w-6 h-auto text-blue-600 bg-slate-100 border-slate-300 focus:ring-blue-800">
                  <span class="py-2 ms-2 text-sm font-medium text-slate-700">100 - 500</span>
                </label>
                <label class="flex items-center px-2 border border-slate-200 rounded-sm hover:bg-slate-100">
                  <input type="radio" x-model="row.pengguna" value="> 500"
                    class="w-6 h-auto text-blue-600 bg-slate-100 border-slate-300 focus:ring-blue-800">
                  <span class="py-2 ms-2 text-sm font-medium text-slate-700">Di atas 500</span>
                </label>
                <label class="flex items-center px-2 border border-slate-200 rounded-sm hover:bg-slate-100">
                  <input type="radio" x-model="row.pengguna" value="Tidak tahu"
                    class="w-6 h-auto text-blue-600 bg-slate-100 border-slate-300 focus:ring-blue-800">
                  <span class="py-2 ms-2 text-sm font-medium text-slate-700">Tidak Tahu</span>
                </label>
              </div>
            </div>
          </div>
        </template>

        {{-- Tombol Tambah --}}
        <button @click="addRow" type="button"
          class="bg-blue-500 text-white rounded-md px-4 py-2 flex gap-1 mx-auto active:scale-95">
          <span>Tambah Baris</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" class="w-6 h-auto">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 5v14" />
            <path d="M5 12h14" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <script>
    function formApp() {
      return {
        rows: [{
          distribusi: 'Nasional',
          nama: '',
          url: '',
          pengguna: '100 - 500'
        }],
        addRow() {
          this.rows.push({
            distribusi: '',
            nama: '',
            url: '',
            pengguna: ''
          });
        },
        removeRow(index) {
          this.rows.splice(index, 1);
        }
      }
    }
  </script>
@endsection
