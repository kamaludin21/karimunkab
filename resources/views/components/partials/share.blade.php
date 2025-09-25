@props([
    'url' => url()->current(),
    'title' => config('app.name'),
])

<div x-data class="space-y-2 p-6">
  <div x-show="$store.clipboard.copied" x-transition:enter="transition ease-out duration-300 transform"
    x-transition:enter-start="-translate-y-4 opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
    x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="translate-y-0 opacity-100"
    x-transition:leave-end="-translate-y-4 opacity-0" class="absolute top-2 inset-x-0 flex justify-center z-[60]">
    <div class="bg-green-100 ring-1 ring-green-300 text-green-700 px-2 py-1 rounded-md">
      URL berhasil disalin!
    </div>
  </div>
  <p class="text-base font-medium text-slate-500">Bagikan:</p>
  <p class="text-lg font-semibold text-slate-600">{{ $title }}</p>

  <div class="flex gap-4 justify-center">
    <button type="button" onclick="share.facebook('{{ $url }}')"
      class="p-1.5 rounded-md bg-blue-500 active:scale-95">
      <x-icons.facebook class="w-7 h-auto text-white" />
    </button>
    <button type="button" onclick="share.x('{{ $url }}', '{{ $title }}')"
      class="p-1.5 rounded-md bg-sky-500 active:scale-95">
      <x-icons.twitter class="w-7 h-auto text-white stroke-[1.5]" />
    </button>
    <button type="button" onclick="share.whatsapp('{{ $url }}', '{{ $title }}')"
      class="p-1.5 rounded-md bg-green-500 active:scale-95">
      <x-icons.whatsapp class="w-7 h-auto text-white stroke-[1.5]" />
    </button>
    <button type="button" @click="copyToClipboard('{{ $url }}')"
      class="p-1.5 rounded-md bg-gray-500 active:scale-95">
      <x-icons.copy class="w-7 h-auto text-white stroke-[1.5]" />
    </button>
  </div>
</div>
