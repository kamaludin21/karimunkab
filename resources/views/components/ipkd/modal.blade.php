<x-commons.modal id="preview-pdf" title="Show PDF" :show="false">
  <div class="min-w-sm md:min-w-md w-full h-[85dvh] rounded-lg overflow-hidden flex flex-col relative">
    <div class="w-full h-full">
      <iframe id="pdf-frame" src="" class="w-full h-full z-10" frameborder="0"></iframe>
    </div>
    <object id="pdf-frame" class="pdf" data="{{ asset('storage/' . $doc->file) }}" width="100%" height="100%">
    </object>
  </div>
</x-commons.modal>
