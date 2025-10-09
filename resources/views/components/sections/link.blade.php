@props(['links'])

<section class="bg-slate-100 py-0 md:py-10">
  <div class="mx-auto flex max-w-screen-lg flex-wrap justify-center gap-0 px-0 text-slate-600 md:gap-8 lg:px-2">
    @forelse ($links as $link)
      <div
        class="relative grid min-w-40 flex-1 grid-cols-none content-end rounded-none border border-slate-300 bg-white p-1 md:w-1/4 md:min-w-0 md:flex-none md:rounded-3xl">
        <a href="{{ $link->url }}" target="_blank"
          class="group absolute top-1 right-1 w-fit cursor-pointer justify-items-end rounded-lg bg-slate-200 p-1.5 duration-200 hover:bg-orange-600 md:rounded-full md:p-2">
          <x-icons.arrow-up
            class="h-6 w-auto rotate-45 stroke-1 duration-200 group-hover:rotate-90 group-hover:text-white md:h-8 md:stroke-2" />
        </a>
        <div class="grid gap-2 p-2 md:p-3">
          <img src="{{ asset('storage/' . $link->thumbnail) }}" class="h-auto w-16" alt="{{ $link->description }}" />
          <div class="h-0.5 w-6 bg-slate-400"></div>
          <p class="text-sm font-medium">{{ $link->description }}</p>
        </div>
      </div>
    @empty
      <p class="text-center w-full">Belum ada tautan tersedia</p>
    @endforelse
  </div>
</section>
