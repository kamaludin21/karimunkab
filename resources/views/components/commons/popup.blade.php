@props(['popup'])

@if ($popup && $popup->count())
  @push('popup')
    <div x-data="popupSlider()" x-show="open"
      x-effect="
        if (open) {
          document.body.classList.add('overflow-hidden');
        } else {
          document.body.classList.remove('overflow-hidden');
        }
      "
      x-trap.noscroll="open" x-on:keydown.escape.window="open = false"
      class="fixed inset-0 z-[55] flex items-center justify-center bg-black/70" style="display: none;">
      <div @click.away="open = false" class="bg-white rounded-lg shadow-lg max-w-md w-full mx-4 relative overflow-hidden">
        <div class="py-2 pl-4 pr-2 flex justify-between items-center border-b border-slate-300">
          <h2 class="text-xl font-medium text-slate-700" x-text="items[currentIndex].title"></h2>
          <button @click="open = false" aria-label="Close popup"
            class="active:scale-95 p-2 rounded-md bg-slate-200 text-slate-600 hover:text-orange-600">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="h-6 w-6">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M18 6l-12 12" />
              <path d="M6 6l12 12" />
            </svg>
          </button>
        </div>
        <img :src="resolveImageUrl(items[currentIndex].image)" alt="" class="w-full h-auto" />


        <div class="flex justify-between items-center p-4 border-t border-slate-300" x-show="items.length > 1">
          <button @click="prev()" :disabled="currentIndex === 0"
            class="px-3 py-1 rounded bg-slate-200 text-slate-700 disabled:opacity-50 disabled:cursor-not-allowed">
            Prev
          </button>

          <div class="text-sm text-slate-500" x-text="`${currentIndex + 1} / ${items.length}`"></div>

          <button @click="next()" :disabled="currentIndex === items.length - 1"
            class="px-3 py-1 rounded bg-slate-200 text-slate-700 disabled:opacity-50 disabled:cursor-not-allowed">
            Next
          </button>
        </div>
      </div>
    </div>

    @php
      $popupItems = $popup->map(function ($item) {
          return [
              'title' => $item->title,
              'description' => $item->description,
              'image' => asset('storage/' . $item->image),
          ];
      });
    @endphp

    <script>
      function popupSlider() {
        return {
          open: true,
          currentIndex: 0,
          items: {!! $popupItems->toJson() !!},
          resolveImageUrl(url) {
            if (!url) return '';
            if (url.startsWith('http://') || url.startsWith('https://')) return url;
            return '{{ url('') }}' + url;
          },
          next() {
            if (this.currentIndex < this.items.length - 1) this.currentIndex++;
          },
          prev() {
            if (this.currentIndex > 0) this.currentIndex--;
          }
        }
      }
    </script>
  @endpush
@endif
