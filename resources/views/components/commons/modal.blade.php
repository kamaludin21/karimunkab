@props(['id', 'title' => 'Modal', 'show' => false])

<div x-data x-init="@if ($show) $store.modal.open('{{ $id }}') @endif" x-show="$store.modal.isOpen('{{ $id }}')"
  @keydown.escape.window="$store.modal.close()" class="px-4 md:px-0 fixed inset-0 z-50 flex items-center justify-center bg-black/50"
  x-cloak>
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md max-h-dvh relative" @click.away="$store.modal.close()">
    <div class="absolute -right-4 -top-4">
      <button @click="$store.modal.close()" type="button" class="shadow-md bg-red-500 border-2 border-white rounded-full p-1 active:scale-95">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor" class="h-6 w-auto text-white">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    {{ $slot }}
  </div>
</div>
