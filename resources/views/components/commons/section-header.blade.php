<div class="flex items-center justify-between border-b border-slate-400">
  <div class="relative inline-block py-3">
    <p class="text-3xl md:text-4xl font-semibold font-heading text-slate-700 relative z-10">
      {{ $title }}
    </p>
    <div class="absolute bottom-0 left-0 h-1 w-full rounded-t-lg bg-slate-400"></div>
  </div>

  @if (!empty($link))
    <a href="{{ $link }}" class="hidden md:block bg-orange-600 px-3 py-1.5 rounded-lg group">
      <span class="text-sm font-medium text-slate-50 group-hover:text-white duration-200">
        {{ $buttonText ?? 'Selengkapnya' }}
      </span>
    </a>
  @endif
</div>
