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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 lg:gap-20">
            <div class="bg-teal-100 rounded-lg shadow-md overflow-hidden p-6">
                <h3 class="font-bold text-xl text-gray-700 mb-5">Categories</h3>
                <div class="-m-3 flex items-center">
                    @forelse ($categories as $category )
                        <a href=""
                            class="bg-teal-900 font-bold text-white rounded-lg shadow-md py-2 px-4 hover:bg-teal-700 transition duration-300 ease-in-out m-3 mb-3">{{ $category->name }}

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
                        <a href=""
                            class="bg-fuchsia-900 font-bold text-white rounded-full shadow-md py-0.5 px-2 hover:bg-fuchsia-700 transition duration-300 ease-in-out m-3 mb-3">#{{ $tag->name }}
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

        @if (count($posts) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 gap-4 md:gap-6 2xl:gap-10 my-15">

                @foreach ($posts as $post)
                    <div class="relative bg-orange-300 rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('/storage/' . $post->image) }}" alt="{{ $post->title }}"
                            class="object-cover md:h-60 md:w-full">
                        <div class="p-6">
                            <span
                                class="absolute top-4 left-4 bg-yellow-100 text-yellow-900 font-bold rounded-full shadow-md py-0.5 px-2">{{ $post->category->name }}</span>
                            <h2 class="text-xl font-bold text-orange-800">{{ $post->title }}</h2>
                            <div class="line-clamp-4 my-5">
                                <p>{!! $post->content !!}</p>
                            </div>
                            <div class="flex items-center justify-end text-xs font-bold">
                                <span class="text-orange-700 italic">{{ $post->published_at }}</span>
                            </div>
                            <div class="flex mt-5">
                                <a href="{{ route('blog.show', $post->slug) }}"
                                    class="bg-orange-900 text-white text-md font-bold rounded-lg shadow-md py-2 px-4 hover:bg-orange-700 transition duration-300 ease-in-out">Read
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

@endsection
