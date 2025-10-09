@php
  $popupItems = $popup->map(function ($item) {
      return [
          'title' => $item->title,
          'image' => asset('storage/' . $item->image),
      ];
  });
@endphp
<div x-data="popupSlider()" data-items='@json($popupItems)' class="overflow-hidden rounded-lg relative">
  <img :src="resolveImageUrl(items[currentIndex].image)" :alt="items[currentIndex].title"
    class="w-full h-full object-contain max-h-[80dvh] grid-pattern" />

  <div class="w-full bottom-2 absolute flex justify-between px-2 gap-4" x-show="items.length > 1">
    <button @click="prev()" :disabled="currentIndex === 0" type="button"
      class="p-1 bg-white rounded-md background-blur-md cursor-pointer shadow-md hover:bg-orange-600 group duration-200 active:scale-95">
      <x-icons.arrow-narrow-left class="text-slate-600 group-hover:text-white stroke-[1.5] h-6 w-auto" />
    </button>

    <button @click="next()" :disabled="currentIndex === items.length - 1" type="button"
      class="p-1 bg-white rounded-md background-blur-md cursor-pointer shadow-md hover:bg-orange-600 group duration-200 active:scale-95">
      <x-icons.arrow-narrow-right class="text-slate-600 group-hover:text-white stroke-[1.5] h-6 w-auto" />
    </button>
  </div>
</div>
