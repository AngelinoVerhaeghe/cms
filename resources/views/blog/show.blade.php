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
                    <span class="text-gray-900 italic">{{ $post->published_at }}</span>
                </div>
            </div>
        </div>
        <div class="border-b-2 border-gray-200 py-5">
            @foreach ($post->tags as $tag)
                <a href=""
                    class="bg-fuchsia-900 font-bold text-white rounded-full shadow-md py-0.5 px-2 hover:bg-fuchsia-700 transition duration-300 ease-in-out m-3 mb-3 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-fuchsia-400">#{{ $tag->name }}
                </a>
                @if (!$loop->last)
                    <div class="before:border-r-2 before:border-fuchsia-900"></div>
                @endif
            @endforeach
        </div>
        <div class="flex py-10 justify-start lg:justify-end">
            <a href="{{ route('blogs-overview') }}"
                class="bg-gray-900 text-white font-bold rounded-full shadow-md py-2 px-5 lg:px-7 hover:bg-gray-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">Back</a>
        </div>
    </section>

    <section class="container mx-auto px-2 lg:px-0 my-15">
        <div id="disqus_thread"></div>
        <script>
            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

            var disqus_config = function() {
                this.page.url =
                    "{{ config('app.url') }}/posts/{{ $post->slug }}"; // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier =
                    {{ $post->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };

            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document,
                    s = d.createElement('script');
                s.src = 'https://blog-nevsrf7ygr.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
    </section>

@endsection
