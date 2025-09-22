@props([
    'id',
    'title' => 'Modal',
    'show' => false,
])

<div
    x-data
    x-init="@if($show) $store.modal.open('{{ $id }}') @endif"
    x-show="$store.modal.isOpen('{{ $id }}')"
    @keydown.escape.window="$store.modal.close()"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
    x-cloak
>
    <div
        class="bg-white rounded-lg shadow-lg w-full max-w-md p-6"
        @click.away="$store.modal.close()"
    >
        {{-- Header --}}
        <div class="flex justify-between items-center border-b pb-2 mb-4">
            <h2 class="text-lg font-semibold">{{ $title }}</h2>
            <button @click="$store.modal.close()" class="text-gray-500 hover:text-black">✕</button>
        </div>

        {{-- Content --}}
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
