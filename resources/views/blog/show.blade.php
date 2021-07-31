@extends('layouts.frontend')

@section('title')

    Blog | {{ $post->title }}

@endsection

@section('content')

    <section class="relative flex items-center justify-center">
        <img src="{{ asset('/storage/' . $post->image) }}" alt="{{ $post->title }}"
            class="object-cover h-[400px] w-full">
        <div class="absolute grid grid-cols-1 text-center mx-auto">
            <div class="bg-white/20 backdrop-blur-md rounded-lg shadow-md p-4">
                <h1 class="text-gray-900 text-2xl md:text-4xl lg:text-6xl uppercase font-bold">{{ $post->title }}
                </h1>
                <h3 class="text-gray-800 italic lowercase text-1xl md:text-3xl lg:text-5xl my-3 md:my-5">
                    {{ $post->description }}
                </h3>
            </div>
        </div>
    </section>


    <section class="container mx-auto px-2 lg:px-0 my-15">
        <div class="bg-gray-400 text-gray-700 rounded-lg shadow-lg">
            <div class="p-6">
                <span
                    class="bg-teal-100 text-teal-900 font-bold rounded-full shadow-md py-0.5 px-2">{{ $post->category->name }}</span>
                <div class="my-5">
                    <p>{!! $post->content !!}</p>
                </div>
                <div class="flex items-center justify-between text-xs font-bold">
                    <div class="flex items-center space-x-3">
                        <img src="{{ Gravatar::src($post->user->email) }}"
                            class="border border-orange-500 rounded-full h-5 w-5 shadow" alt="{{ $post->title }}">
                        <span class="text-orange-700">by {{ $post->user->name }}</span>
                    </div>
                    <span class="text-gray-900 italic">{{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>

        <div class="border-t-2 border-gray-200 mt-5">
            @foreach ($post->tags as $tag)
                <div class="flex flex-wrap items-center">
                    <a href="{{ route('blog.tag', $tag->slug) }}"
                        class="bg-fuchsia-900 font-bold text-white rounded-full shadow-md py-0.5 px-2 hover:bg-fuchsia-700 transition duration-300 ease-in-out m-3 mb-3 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-fuchsia-400">#{{ $tag->name }}
                    </a>
                </div>

                @if (!$loop->last)
                    <div class="before:border-r-2 before:border-fuchsia-900"></div>
                @endif
            @endforeach
        </div>
        <div class="flex pt-10 justify-start lg:justify-end">
            <a href="{{ route('blogs-overview') }}"
                class="bg-gray-900 text-white font-bold rounded-full shadow-md py-2 px-5 lg:px-7 hover:bg-gray-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">Back</a>
        </div>
    </section>

    <section class="container mx-auto px-2 lg:px-0">
        <h2 class="text-3xl text-gray-700 md:text-center font-bold uppercase mb-5 md:mb-10">Related Posts</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 gap-4 md:gap-6 2xl:gap-10 my-15">
            @forelse ($relatedPosts as $relatedPost)
                <div class="relative bg-gray-800 text-gray-100 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('/storage/' . $relatedPost->image) }}" alt="{{ $relatedPost->title }}"
                        class="object-cover md:h-60 md:w-full">
                    <div class="p-6">
                        <span
                            class="absolute top-4 left-4 bg-teal-100 text-teal-900 font-bold rounded-full shadow-md py-0.5 px-2">{{ $relatedPost->category->name }}</span>
                        <h2 class="text-xl font-bold">{{ $relatedPost->title }}</h2>
                        <div class="line-clamp-4 my-5">
                            <p>{!! $relatedPost->content !!}</p>
                        </div>
                        <div class="flex items-center justify-between text-xs font-bold">
                            <span class="font-bold text-sm text-gray-300">by {{ $relatedPost->user->name }}</span>
                            <span class="text-gray-300 italic">{{ $relatedPost->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex mt-5">
                            <a href="{{ route('blog.show', $relatedPost->slug) }}"
                                class="bg-gray-500 text-gray-100 text-md font-bold rounded-lg shadow-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">Read
                                More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div>
                    <p class="font-bold text-gray-700">There are no related posts at this
                        moment...
                    </p>
                </div>
            @endforelse
        </div>

    </section>

@endsection
