@props([
    'title' => 'Publikasi Dokumen',
    'institutes',
    'documents',
    'headerTitle' => 'Semua Dokumen',
    'showInstitute'
])
<section class="max-w-screen-lg mx-auto w-full py-0 lg:py-6 space-y-6 min-h-[60vh] mb-16">
  <div class="px-2 md:px-6 rounded-none lg:rounded-lg py-4 md:py-8 dot-pattern">
    <p class="text-3xl md:text-5xl font-semibold text-slate-100 font-header">
      {{ $title }}
    </p>
  </div>

  {{-- Container Utama --}}
  <div x-data="{
      open: window.innerWidth >= 768,
      handleResize() { this.open = window.innerWidth >= 768 }
  }" x-init="window.addEventListener('resize', () => handleResize())"
    class="rounded-none md:rounded-lg bg-white ring-1 ring-slate-200 flex flex-col md:flex-row relative overflow-hidden min-h-[24rem]">
    {{-- Sidebar --}}
    <x-docs.sidebar :institutes="$institutes" />

    {{-- Konten utama --}}
    <div class="w-full md:w-3/4 flex-1">
      <div class="px-4 py-5 border-b border-slate-200 flex items-center gap-2">
        <button @click="open = true"
          class="rounded-md block md:hidden bg-slate-100 ring-1.5 hover:bg-slate-200 active:scale-95 ring-slate-300 p-1 group cursor-pointer">
          <x-icons.sidebar-expand class="h-6 w-auto text-slate-400 stroke-[1.7] group-hover:text-slate-500" />
        </button>
        <p class="text-2xl font-medium text-slate-700 line-clamp-1">
          {{ $headerTitle }}
        </p>
      </div>
      <x-docs.data-list :documents="$documents" :show-institute="$showInstitute" />
      <x-docs.pagination :documents="$documents" />
    </div>
  </div>
</section>

<x-docs.modal />
