@extends('layouts.app')

@section('title')

    {{ isset($tag) ? 'CMS | Edit Tag' : 'CMS | Add Tag' }}

@endsection

@section('content')
    <section class="bg-white rounded-lg shadow-md overflow-hidden w-full">

        <div class="bg-gray-800 shadow p-4">
            <h1 class="text-xl text-white font-bold">
                {{-- if there is a tag already set title to Edit else to Create Tag --}}
                {{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}
            </h1>
        </div>

        @include('partials.errors')

        <div class="px-8 py-4">
            <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
                @csrf

                @if (isset($tag))
                    @method('PUT')
                @endif

                <div>
                    <label for="name" class="block font-bold text-gray-600">Name</label>
                    <input type="text" name="name" id="name" value="{{ isset($tag) ? $tag->name : '' }}"
                        class="mt-1 {{ isset($tag) ? 'focus:ring-indigo-500 focus:border-indigo-500' : 'focus:ring-yellow-500 focus:border-yellow-500' }} block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') is-invalid @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <span class="text-red-500 text-sm italic mt-4">{{ $message }}</span>
                    @enderror
                </div>
                <div class="px-4 py-3 border-t-2 border-gray-200 text-right space-x-3 mt-4">
                    <a href="{{ route('categories.index') }}"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-bold rounded-lg text-white bg-gray-600 transition duration-300 ease-in-out hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Cancel</a>
                    @if (isset($tag))
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
