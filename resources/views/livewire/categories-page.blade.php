<div
  class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto bg-gradient-to-br from-gray-950 via-green-950 to-gray-950 min-h-screen">
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <h1 class="text-4xl font-bold text-gray-100 mb-10">Browse <span class="text-brand-400">Categories</span></h1>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

      @foreach($categories as $category)
        <a class="group flex flex-col bg-gray-900 border border-brand-600 shadow-sm rounded-xl hover:shadow-lg hover:border-brand-400 transition"
          href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}">
          <div class="p-4 md:p-5">
            <div class="flex justify-between items-center">
              <div class="flex items-center">
                @if($category->image)
                  <img class="h-[5rem] w-[5rem] rounded-lg" src="{{ url('storage', $category->image) }}"
                    alt="{{ $category->name }}">
                @else
                  <div
                    class="h-[5rem] w-[5rem] rounded-lg bg-gradient-to-br from-brand-600 to-brand-400 flex items-center justify-center text-white font-bold text-xl">
                    {{ strtoupper(substr($category->name, 0, 1)) }}
                  </div>
                @endif
                <div class="ms-3">
                  <h3 class="group-hover:text-brand-300 text-2xl font-semibold text-brand-400 transition">
                    {{ $category->name }}
                  </h3>
                </div>
              </div>
              <div class="ps-3">
                <svg class="flex-shrink-0 w-5 h-5 text-brand-400 group-hover:text-brand-300 transition"
                  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="m9 18 6-6-6-6" />
                </svg>
              </div>
            </div>
          </div>
        </a>
      @endforeach




    </div>
  </div>
</div>