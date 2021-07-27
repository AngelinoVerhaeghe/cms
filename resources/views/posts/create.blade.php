@extends('layouts.app')

@section('title')

    {{ isset($post) ? 'CMS | Edit Post' : 'CMS | Add Post' }}

@endsection

@section('content')
    <section class="bg-white rounded-lg shadow-md overflow-hidden w-full">

        <div class="{{ isset($post) ? 'bg-indigo-500' : 'bg-yellow-500' }} shadow p-4">
            <h1 class="text-xl text-white font-bold">
                {{-- if there is a category already set title to Edit else to Create Category --}}
                {{ isset($post) ? 'Edit Post' : 'Create Post' }}
            </h1>
        </div>

        @include('partials.errors')

        <div class="p-4">
            <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                @if (isset($post))
                    @method('PUT')
                @endif

                <div class="space-y-4">
                    <div>
                        <label for="title" class="block font-bold text-gray-600">Title</label>
                        <input type="text" name="title" id="title" value="{{ isset($post) ? $post->title : '' }}"
                            class="mt-1 {{ isset($post) ? 'focus:ring-indigo-500 focus:border-indigo-500' : 'focus:ring-yellow-500 focus:border-yellow-500' }} block w-full shadow-sm text-sm border-gray-300 rounded-md @error('title') is-invalid @enderror"
                            value="{{ old('title') }}">
                        @error('title')
                            <span class="text-red-500 text-sm italic mt-4">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="published_at" class="block font-bold text-gray-600">Published At</label>
                        <input type="text" name="published_at" id="published_at"
                            value="{{ isset($post) ? $post->published_at : '' }}"
                            class="mt-1 {{ isset($post) ? 'focus:ring-indigo-500 focus:border-indigo-500' : 'focus:ring-yellow-500 focus:border-yellow-500' }} block w-full shadow-sm text-sm border-gray-300 rounded-md @error('published_at') is-invalid @enderror"
                            value="{{ old('published_at') }}" placeholder="Click to set a date...">
                        @error('published_at')
                            <span class="text-red-500 text-sm italic mt-4">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block font-bold text-gray-600">
                            Description
                        </label>
                        <div class="mt-1">
                            <textarea id="description" name="description" cols="5" rows="5"
                                class="shadow-sm {{ isset($post) ? 'focus:ring-indigo-500 focus:border-indigo-500' : 'focus:ring-yellow-500 focus:border-yellow-500' }} mt-1 block w-full text-sm border border-gray-300 rounded-md @error('description') is-invalid @enderror"
                                value="{{ old('description') }}">{{ isset($post) ? $post->description : '' }}</textarea>
                            @error('description')
                                <span class="text-red-500 text-sm italic mt-4">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="content" class="block font-bold text-gray-600">
                            Content
                        </label>
                        <div class="mt-1">
                            <!-- Trix Text Editor -->
                            <input id="content" type="hidden" name="content"
                                value="{{ isset($post) ? $post->content : '' }}">
                            <trix-editor input="content"
                                class="shadow-sm {{ isset($post) ? 'focus:ring-indigo-500 focus:border-indigo-500' : 'focus:ring-yellow-500 focus:border-yellow-500' }} mt-1 block w-full text-sm border border-gray-300 rounded-md @error('content') is-invalid @enderror">
                            </trix-editor>
                            <!-- Trix Text Editor Ends -->
                            @error('content')
                                <span class="text-red-500 text-sm italic mt-4">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="category_id" class="block font-bold text-gray-600">Category</label>
                        <select name="category_id" id="category_id"
                            class="{{ isset($post) ? 'focus:ring-indigo-500 focus:border-indigo-500' : 'focus:ring-yellow-500 focus:border-yellow-500' }} block w-full rounded-md shadow-sm text-sm border-gray-300">
                            @if (isset($post))
                                <option value="{{ $post->category->id }}">{{ $post->category->name }}</option>
                            @else
                                <option value="">Select Category</option>
                            @endif

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if (isset($post->image))
                        <div>
                            <img src="{{ asset('/storage/' . $post->image) }}" alt="{{ $post->title }}"
                                class="h-64 object-cover">
                        </div>
                    @endif
                    <div>
                        <label for="image" class="block font-bold text-gray-600">Image</label>
                        <input type="file" name="image" id="image">
                    </div>
                </div>
                <div class="px-4 py-3 border-t-2 border-gray-200 text-right space-x-3 mt-4">
                    <a href="{{ route('posts.index') }}"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-bold rounded-lg text-white bg-gray-600 transition duration-300 ease-in-out hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Cancel</a>
                    @if (isset($post))
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-5 border border-transparent shadow-sm text-sm font-bold rounded-lg text-white bg-indigo-500 transition duration-300 ease-in-out hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Update
                        </button>
                    @else
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-5 border border-transparent shadow-sm text-sm font-bold rounded-lg text-white bg-yellow-500 transition duration-300 ease-in-out hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            Save
                        </button>
                    @endif

                </div>
            </form>
        </div>

    </section>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <!-- Datepicker -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at', {
            dateFormat: "d-m-Y",
        })
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
