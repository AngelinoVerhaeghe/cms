@extends('layouts.frontend')

@section('title')

    Home

@endsection

@section('content')

    <section class="background-image flex items-center">
        <div class="grid grid-cols-1 text-center mx-auto">
            <div class="bg-white/20 backdrop-blur-md rounded-lg shadow-md p-4">
                <h1 class="text-gray-900 text-2xl md:text-4xl lg:text-6xl uppercase font-bold">Welkom op mijn blog
                </h1>
                <h3 class="text-gray-800 italic lowercase text-1xl md:text-3xl lg:text-5xl my-3 md:my-5">
                    project in laravel!
                </h3>
            </div>

            <div class="mt-10 mb-5">
                <a href="/blogs"
                    class="text-lg font-bold uppercase bg-gray-50 text-gray-700 rounded-lg shadow-md py-2 px-4 md:px-8 hover:bg-gray-300 hover:text-gray-800 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Read
                    More...</a>
            </div>
        </div>
    </section>
    <div>



        <section class="container mx-auto px-6 lg:px-0 my-15">
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-6 lg:gap-20">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('storage/images/about_image.jpg') }}" class="object-cover md:h-full shadow-md"
                        alt="">
                </div>
                <div class="flex flex-col mt-5 md:mt-0 2xl:justify-center">
                    <h2 class="text-2xl lg:text-3xl xl:text-4xl text-gray-600 font-bold ">
                        About
                    </h2>
                    <p class="text-lg lg:text-xl text-gray-500 italic font-semibold py-4">
                        Full Stack Developer
                    </p>
                    <p class="text-base xl:w-9/12 text-gray-600 font-light pb-4">
                        Hallo, ik ben Angelino Verhaeghe uit Geluwe - Belgie.
                        Opzoek naar een #job in #development, mijn LinkedIn kun je via deze <a
                            href="https://www.linkedin.com/in/angelino-verhaeghe/" target="_blank"
                            class="italic font-medium text-blue-500">link</a> bekijken.</p>
                    <p class="text-lg lg:text-xl text-gray-500 italic font-semibold py-4">
                        Verder...
                    </p>
                    <p class="text-base xl:w-9/12 text-gray-600 font-light pb-4"> Opleiding gevolgd bij <a
                            href="https://syntrawest.be/campussen/campus/syntra-west-roeselare" target="_blank"
                            class="italic font-medium text-blue-500">Syntra West
                            Roeselare</a> als Full Stack Developer. Technologieën aangeleerd zoals <a
                            href="https://laravel.com/" target="_blank"
                            class="italic font-medium text-blue-500">Laravel</a>,
                        waaruit dit project
                        ook is uitgebouwd. De opmaak van dit project is met het <a href="https://tailwindcss.com/"
                            target="_blank" class="italic font-medium text-blue-500">Tailwindcss</a> framework. Probeer mijn
                        blog project even uit, registreer maak een blog post en vooral welkom!
                    </p>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-6 lg:px-0 my-15">

            <h2 class="text-3xl text-gray-700 md:text-center font-bold uppercase mb-5 md:mb-10">Latest blog posts</h2>
            @if (count($recentPosts) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 md:gap-6 xl:gap-10">
                    @foreach ($recentPosts as $recentPost)
                        <div class="bg-gray-800 text-gray-100 rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('/storage/' . $recentPost->image) }}" alt="{{ $recentPost->title }}"
                                class="object-cover">
                            <div class="p-4">
                                <h2 class="text-xl font-bold">{{ $recentPost->title }}</h2>
                                <div class="line-clamp-4 my-5">
                                    <p>{!! $recentPost->content !!}</p>
                                </div>
                                <div class="flex items-center justify-between text-xs font-bold">
                                    <span
                                        class="bg-yellow-200 text-yellow-900 rounded-full shadow-md py-1 px-3">{{ $recentPost->category->name }}</span>
                                    <span class="text-gray-300 italic">{{ $recentPost->published_at }}</span>
                                </div>
                                <div class="flex mt-5">
                                    <a href="/blogs/{{ $recentPost->slug }}"
                                        class="bg-gray-500 text-gray-100 text-md font-bold rounded-lg shadow-md py-2 px-4">Read
                                        More</a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div>
                    <p class="text-gray-700 text-left md:text-center font-bold">There are blog posts at this moment.</p>
                </div>
            @endif

        </section>

    @endsection
