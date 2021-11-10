@extends('layouts.frontend')

@section('title')

    Blog | Overview

@endsection

@section('content')

    <section class="background-image-2 flex items-center">
        <div class="grid grid-cols-1 text-center mx-auto">
            <div class="bg-white/20 backdrop-blur-md rounded-lg shadow-md p-4">
                <h1 class="text-gray-900 text-2xl md:text-4xl lg:text-6xl uppercase font-bold">Latest Blog Posts
                </h1>
                <h3 class="text-gray-800 italic lowercase text-1xl md:text-3xl lg:text-5xl my-3 md:my-5">
                    bring all the good things...
                </h3>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-2 lg:px-0 my-15">

        <div>
            <form action="" method="GET">
                @csrf
                <div class="space-y-3 pb-10">
                    <label for="search" class="font-bold text-gray-800">Search</label>
                    <div class="relative flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-2 left-0 text-gray-700 h-6 w-6 mx-3"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" name="search" id="search" placeholder="Search for blog post..."
                            value="{{ request()->query('search') }}"
                            class="bg-transparent focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md pl-12">

                    </div>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 lg:gap-20">
            <div class="bg-teal-100 rounded-lg shadow-md overflow-hidden p-6">
                <h3 class="font-bold text-xl text-gray-700 mb-5">Categories</h3>
                <div class="-m-3 flex flex-wrap items-center">
                    @forelse ($categories as $category )
                        <a href="{{ route('blog.category', $category->slug) }}"
                            class="bg-teal-900 font-bold text-white rounded-lg shadow-md py-2 px-4 hover:bg-teal-700 transition duration-300 ease-in-out m-3 mb-3 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-400">{{ $category->name }}

                        </a>
                        @if (!$loop->last)
                            <div class="before:border-r-2 before:border-teal-900"></div>
                        @endif
                    @empty
                        <p class="text-left lg:text-center font-bold text-gray-700 px-3">There are no categories at this
                            moment...
                        </p>
                    @endforelse
                </div>
            </div>
            <div class="bg-fuchsia-100 rounded-lg shadow-md overflow-hidden p-6">
                <h3 class="font-bold text-xl text-gray-700 mb-5">Tags</h3>
                <div class="-m-3 flex flex-wrap items-center">
                    @forelse ($tags as $tag )
                        <a href="{{ route('blog.tag', $tag->slug) }}"
                            class="bg-fuchsia-900 font-bold text-white rounded-full shadow-md py-0.5 px-2 hover:bg-fuchsia-700 transition duration-300 ease-in-out m-3 mb-3 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-fuchsia-400">#{{ $tag->name }}
                        </a>
                        @if (!$loop->last)
                            <div class="before:border-r-2 before:border-fuchsia-900"></div>
                        @endif
                    @empty
                        <p class="text-left lg:text-center font-bold text-gray-700 px-3">There are no tags at this
                            moment...
                        </p>
                    @endforelse
                </div>
            </div>
        </div>

        <h2 class="text-3xl text-gray-700 md:text-center font-bold uppercase mb-5 md:mb-10 my-15">Latest Blog Posts</h2>

        @if (isset($posts))
            <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 gap-4 md:gap-6 2xl:gap-10 my-15">
                @foreach ($posts as $post)
                    <div class="relative bg-orange-300 rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('/storage/' . $post->image) }}" alt="{{ $post->title }}"
                            class="object-cover md:h-60 md:w-full">
                        <div class="p-6">
                            <span
                                class="absolute top-4 left-4 bg-teal-100 text-teal-900 font-bold rounded-full shadow-md py-0.5 px-2">{{ $post->category->name }}</span>
                            <h2 class="text-xl font-bold text-orange-800">{{ $post->title }}</h2>
                            <div class="line-clamp-4 my-5">
                                <p>{!! $post->content !!}</p>
                            </div>
                            <div class="flex items-center justify-between text-xs font-bold">
                                <span class="font-bold text-orange-700">by {{ $post->user->name }}</span>
                                <span class="text-orange-700 italic">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="flex mt-5">
                                <a href="{{ route('blog.show', $post->slug) }}"
                                    class="bg-orange-900 text-white text-md font-bold rounded-lg shadow-md py-2 px-4 hover:bg-orange-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-400">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div>
                    <p class="text-left lg:text-center font-bold text-gray-700">There are no posts at this
                        moment...
                    </p>
                </div>
        @endif



    </section>

    <section class="container mx-auto px-2 lg:px-0 my-5">

        {{-- Appends([]) get the search value in the url even on the other pages with pagination search=title&page=2 --}}
        {{ $posts->appends(['search' => request()->query('search')])->links('vendor.pagination.tailwind') }}

    </section>

@endsection
