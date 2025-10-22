<x-commons.modal id="preview-pdf" title="Show PDF" :show="false">
  <div class="min-w-sm md:min-w-md w-full h-[85dvh] rounded-lg overflow-hidden flex flex-col">
    <div class="absolute inset-0 w-full h-full">
      <iframe id="pdf-frame" src="" class="w-full h-[85vh]" frameborder="0"></iframe>
    </div>
  </div>
</x-commons.modal>
