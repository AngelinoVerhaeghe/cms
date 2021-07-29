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
        <div class="text-gray-700 rounded-lg shadow-lg">
            <div class="p-6">
                <span
                    class="bg-yellow-100 text-yellow-900 font-bold rounded-full shadow-md py-0.5 px-2">{{ $post->category->name }}</span>
                <div class="my-5">
                    <p>{!! $post->content !!}</p>
                </div>
                <div class="flex items-center justify-end text-xs font-bold">
                    <span class="text-gray-900 italic">{{ $post->published_at }}</span>
                </div>
            </div>
        </div>
        <div class="flex pt-15 pb-10 justify-start lg:justify-end">
            <a href="{{ route('blogs-overview') }}"
                class="bg-gray-900 text-white font-bold rounded-full shadow-md py-2 px-5 lg:px-7 hover:bg-gray-700 transition duration-300 ease-in-out">Back</a>
        </div>
    </section>

@endsection
