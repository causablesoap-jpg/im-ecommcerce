<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <section class="py-10 bg-neutral-800 font-poppins rounded-lg">
    <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
      <div class="flex flex-wrap mb-24 -mx-3">
        <div class="w-full pr-2 lg:w-1/4 lg:block">
          <div class="p-4 mb-5 bg-neutral-700 border border-neutral-200 dark:border-neutral-900 dark:bg-neutral-900">
            <h2 class="text-2xl font-bold dark:text-neutral-400"> Categories</h2>

            <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-neutral-400"></div>
            <ul>
              @foreach($categories as $category)
                <li class="mb-4" wire:key="{{$category->id }}">
                  <label for="{{ $category->slug }}" class="flex items-center dark:text-neutral-400 ">
                    <input type="checkbox" wire:model.live="selected_categories" id="{{ $category->slug }}"
                      value="{{ $category->id }}" class="w-4 h-4 mr-2">
                    <span class="text-lg">{{$category->name}}</span>
                  </label>
                </li>
              @endforeach
            </ul>

          </div>
          <div class="p-4 mb-5 bg-neutral-700 border border-neutral-200 dark:bg-neutral-900 dark:border-neutral-900">
            <h2 class="text-2xl font-bold dark:text-neutral-400">Brand</h2>
            <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-neutral-400"></div>
            <ul>
              @foreach($brands as $brand)
                <li class="mb-4" wire:key="{{ $brand->id }}">
                  <label for="{{ $brand->slug }}" class="flex items-center dark:text-neutral-300">
                    <input type="checkbox" wire:model.live="selected_brands" id="{{ $brand->slug }}"
                      value="{{ $brand->id }}" class="w-4 h-4 mr-2">
                    <span class="text-lg dark:text-neutral-400">{{$brand->name}}</span>
                  </label>

                </li>
              @endforeach
            </ul>
          </div>
          <div class="p-4 mb-5 bg-neutral-700 border border-neutral-200 dark:bg-neutral-900 dark:border-neutral-900">
            <h2 class="text-2xl font-bold dark:text-neutral-400">Product Status</h2>
            <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-neutral-400"></div>
            <ul>
              <li class="mb-4">
                <label for="featured" class="flex items-center dark:text-neutral-300">
                  <input type="checkbox" id="featured" wire:model.live="featured" value="1" class="w-4 h-4 mr-2">
                  <span class="text-lg dark:text-neutral-400">Featured Products</span>
                </label>
              </li>
              <li class="mb-4">
                <label for="on_sale" class="flex items-center dark:text-neutral-300">
                  <input type="checkbox" wire:model.live="on_sale" id="on_sale " value="1" class="w-4 h-4 mr-2">
                  <span class="text-lg dark:text-neutral-400">On Sale</span>
                </label>
              </li>
            </ul>
          </div>

          <div class="p-4 mb-5 bg-neutral-700 border border-neutral-200 dark:bg-neutral-900 dark:border-neutral-900">
            <h2 class="text-2xl font-bold dark:text-neutral-400">Price</h2>
            <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-neutral-400"></div>
            <div>
              <div class="font-semibold">{{ Number::currency($price_range, 'INR') }}</div>
              <input type="range" wire:model.live='price_range'
                class="w-full h-1 mb-4 bg-brand-100 rounded appearance-none cursor-pointer" max="500000" value="300000"
                step="1000">
              <div class="flex justify-between ">
                <span class="inline-block text-lg font-bold text-brand-400 ">{{Number::currency(1000, 'INR')}}</span>
                <span class="inline-block text-lg font-bold text-brand-400 ">{{Number::currency(500000, 'INR')}}</span>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full px-3 lg:w-3/4">
          <div class="px-3 mb-4">
            <div class="items-center justify-between hidden px-3 py-2 bg-neutral-100 md:flex dark:bg-neutral-900 ">
              <div class="flex items-center justify-between">
                <select wire:model.live="sort"
                  class="block w-40 text-base bg-neutral-100 cursor-pointer dark:text-neutral-400 dark:bg-neutral-900">
                  <option value="latest">Sort by latest</option>
                  <option value="price">Sort by Price</option>
                </select>
              </div>
            </div>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($products as $product)
              <div wire:key="{{ $product->id }}" class="group">
                <div class="bg-neutral-800 border border-neutral-700 rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-all transform group-hover:-translate-y-1 h-full flex flex-col">
                  <!-- Product Image -->
                  <a href="/products/{{ $product->slug }}" class="block overflow-hidden">
                    <div class="relative bg-neutral-900 h-56 flex items-center justify-center overflow-hidden">
                      @if(!empty($product->images) && is_array($product->images) && isset($product->images[0]))
                        <img src="{{ url('storage', $product->images[0]) }}" 
                             alt="{{ $product->name }}"
                             class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-300">
                      @else
                        <div class="w-full h-full bg-gradient-to-br from-neutral-700 to-neutral-800 flex items-center justify-center">
                          <svg class="w-12 h-12 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                          </svg>
                        </div>
                      @endif
                    </div>
                  </a>

                  <!-- Product Info -->
                  <div class="flex-1 p-4 flex flex-col">
                    <h3 class="text-lg font-semibold text-white mb-2 line-clamp-2 group-hover:text-brand-400 transition">
                      {{ $product->name }}
                    </h3>
                    
                    <!-- Category & Brand -->
                    @if($product->category)
                      <p class="text-xs text-neutral-400 mb-2">{{ $product->category->name }}</p>
                    @endif

                    <!-- Description -->
                    <p class="text-sm text-neutral-300 mb-3 line-clamp-2 flex-1">
                      {{ Str::limit(strip_tags($product->description), 80) }}
                    </p>

                    <!-- Price & Stock -->
                    <div class="flex items-baseline gap-2 mb-3">
                      <span class="text-xl font-bold text-brand-400">
                        {{ Number::currency($product->price, 'INR') }}
                      </span>
                    </div>

                    <!-- Stock Status -->
                    <div class="text-xs mb-4 flex items-center gap-2">
                      @if($product->in_stock > 0)
                        <span class="inline-block w-2 h-2 rounded-full bg-green-400"></span>
                        <span class="text-green-400">{{ $product->in_stock }} in stock</span>
                      @else
                        <span class="inline-block w-2 h-2 rounded-full bg-red-400"></span>
                        <span class="text-red-400">Out of stock</span>
                      @endif
                    </div>
                  </div>

                  <!-- Add to Cart Button -->
                  <div class="p-4 border-t border-neutral-700">
                    @if($product->in_stock > 0)
                      <button wire:click.prevent="addToCart({{ $product->id }})"
                        class="w-full inline-flex items-center justify-center gap-x-2 px-4 py-2 text-sm font-semibold rounded-lg bg-brand-600 text-white hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-400 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4" viewBox="0 0 16 16">
                          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                        </svg>
                        <span wire:loading.remove wire:target='addToCart({{ $product->id }})'>Add to Cart</span>
                        <span wire:loading wire:target='addToCart({{ $product->id }})'>Adding...</span>
                      </button>
                    @else
                      <button disabled class="w-full inline-flex items-center justify-center gap-x-2 px-4 py-2 text-sm font-semibold rounded-lg bg-neutral-700 text-neutral-400 cursor-not-allowed">
                        Out of Stock
                      </button>
                    @endif
                  </div>
                </div>
              </div>
            @empty
              <div class="col-span-full">
                <div class="text-center py-16 rounded-lg border border-dashed border-neutral-700">
                  <svg class="w-16 h-16 text-neutral-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m0 0l8 4m-8-4v10l8 4m0-10l8 4m-8-4v10"></path>
                  </svg>
                  <p class="text-neutral-400 text-lg font-medium mb-2">No Products Found</p>
                  <p class="text-neutral-500 text-sm">Try adjusting your filters or browse other categories</p>
                </div>
              </div>
            @endempty
          </div>
          <!-- pagination start -->
          <div class="flex justify-end mt-6">
            {{ $products->links()}}
          </div>
          <!-- pagination end -->
        </div>
      </div>
    </div>
  </section>

</div>