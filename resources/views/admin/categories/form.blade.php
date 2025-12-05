@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-neutral-900 p-8">
        <div class="max-w-2xl mx-auto">
            <!-- HEADER -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">
                    @if(isset($category))
                        ✏️ Edit Category
                    @else
                        ➕ Create New Category
                    @endif
                </h1>
                <p class="text-neutral-400">
                    {{ isset($category) ? 'Update category details' : 'Add a new product category' }}</p>
            </div>

            <!-- FORM -->
            <div class="bg-neutral-800 rounded-xl border border-neutral-700 p-8">
                <form
                    action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}"
                    method="POST" class="space-y-6">
                    @csrf
                    @if(isset($category))
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

                    <!-- CATEGORY NAME -->
                    <div>
                        <label class="block text-white font-semibold mb-2">Category Name *</label>
                        <input type="text" name="name" value="{{ isset($category) ? $category->name : old('name') }}"
                            placeholder="e.g., Processors, Graphics Cards, RAM"
                            class="w-full px-4 py-2 bg-neutral-700 border {{ $errors->has('name') ? 'border-red-500' : 'border-neutral-600' }} rounded-lg text-white placeholder-neutral-500 focus:outline-none focus:border-brand-500"
                            required>
                        @if($errors->has('name'))
                            <p class="text-red-400 text-sm mt-1">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <!-- DESCRIPTION -->
                    <div>
                        <label class="block text-white font-semibold mb-2">Description</label>
                        <textarea name="description" placeholder="Brief description of this category..." rows="5"
                            class="w-full px-4 py-2 bg-neutral-700 border {{ $errors->has('description') ? 'border-red-500' : 'border-neutral-600' }} rounded-lg text-white placeholder-neutral-500 focus:outline-none focus:border-brand-500">{{ isset($category) ? $category->description : old('description') }}</textarea>
                        @if($errors->has('description'))
                            <p class="text-red-400 text-sm mt-1">{{ $errors->first('description') }}</p>
                        @endif
                    </div>

                    <!-- SLUG (Auto-generated) -->
                    @if(isset($category))
                        <div>
                            <label class="block text-neutral-400 font-semibold mb-2">URL Slug (Auto-generated)</label>
                            <input type="text" value="{{ $category->slug }}" disabled
                                class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-neutral-400 cursor-not-allowed">
                        </div>
                    @endif

                    <!-- BUTTONS -->
                    <div class="flex gap-4 pt-4">
                        <button type="submit"
                            class="px-6 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-lg transition font-semibold">
                            @if(isset($category))
                                Update Category
                            @else
                                Create Category
                            @endif
                        </button>
                        <a href="{{ route('admin.categories.index') }}"
                            class="px-6 py-2 bg-neutral-700 hover:bg-neutral-600 text-white rounded-lg transition font-semibold">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection