@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-neutral-900 p-8">
        <div class="max-w-2xl mx-auto">
            <!-- HEADER -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">
                    @if(isset($brand))
                        ✏️ Edit Brand
                    @else
                        ➕ Create New Brand
                    @endif
                </h1>
                <p class="text-neutral-400">
                    {{ isset($brand) ? 'Update brand details' : 'Add a new brand' }}
                </p>
            </div>

            <!-- FORM -->
            <div class="bg-neutral-800 rounded-xl border border-neutral-700 p-8">
                <form action="{{ isset($brand) ? route('admin.brands.update', $brand->id) : route('admin.brands.store') }}"
                    method="POST" class="space-y-6">
                    @csrf
                    @if(isset($brand))
                        @method('PUT')
                    @endif

                    <!-- SUCCESS MESSAGE -->
                    @if(session('success'))
                        <div class="p-4 bg-green-900 border border-green-700 text-green-200 rounded-lg">
                            ✓ {{ session('success') }}
                        </div>
                    @endif

                    <!-- ERROR MESSAGES -->
                    @if($errors->any())
                        <div class="p-4 bg-red-900 border border-red-700 text-red-200 rounded-lg">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- BRAND NAME -->
                    <div>
                        <label class="block text-white font-semibold mb-2">Brand Name *</label>
                        <input type="text" name="name" value="{{ isset($brand) ? $brand->name : old('name') }}"
                            placeholder="e.g., Acme, Samsung"
                            class="w-full px-4 py-2 bg-neutral-700 border {{ $errors->has('name') ? 'border-red-500' : 'border-neutral-600' }} rounded-lg text-white placeholder-neutral-500 focus:outline-none focus:border-brand-500"
                            required>
                        @if($errors->has('name'))
                            <p class="text-red-400 text-sm mt-1">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <!-- IMAGE URL -->
                    <div>
                        <label class="block text-white font-semibold mb-2">Image URL</label>
                        <input type="text" name="image" value="{{ isset($brand) ? $brand->image : old('image') }}"
                            placeholder="https://example.com/logo.png"
                            class="w-full px-4 py-2 bg-neutral-700 border {{ $errors->has('image') ? 'border-red-500' : 'border-neutral-600' }} rounded-lg text-white placeholder-neutral-500 focus:outline-none focus:border-brand-500">
                        @if($errors->has('image'))
                            <p class="text-red-400 text-sm mt-1">{{ $errors->first('image') }}</p>
                        @endif
                    </div>

                    <!-- ACTIVE -->
                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ isset($brand) && $brand->is_active ? 'checked' : '' }} class="h-4 w-4">
                        <label for="is_active" class="text-white font-medium">Mark as active</label>
                    </div>

                    <!-- SLUG (Auto-generated) -->
                    @if(isset($brand))
                        <div>
                            <label class="block text-neutral-400 font-semibold mb-2">URL Slug (Auto-generated)</label>
                            <input type="text" value="{{ $brand->slug }}" disabled
                                class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-neutral-400 cursor-not-allowed">
                        </div>
                    @endif

                    <!-- BUTTONS -->
                    <div class="flex gap-4 pt-4">
                        <button type="submit"
                            class="px-6 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-lg transition font-semibold">
                            @if(isset($brand))
                                Update Brand
                            @else
                                Create Brand
                            @endif
                        </button>
                        <a href="{{ route('admin.brands.index') }}"
                            class="px-6 py-2 bg-neutral-700 hover:bg-neutral-600 text-white rounded-lg transition font-semibold">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection