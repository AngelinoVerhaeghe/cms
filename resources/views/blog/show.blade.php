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


    <section>
        <div class="flex justify-center w-8/12 mx-auto">
            @include('partials.success')
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

    @if (auth()->check())
        <section class="container mx-auto px-2 lg:px-0 my-15">
            <div class="flex items-center justifiy-start md:justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3 text-teal-700" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                <h2
                    class="text-2xl text-gray-700 md:text
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         -center font-bold uppercase">
                    Leave
                    a
                    comment...
                </h2>
            </div>
            <div class="bg-white/50 text-gray-700 md:w-8/12 rounded-lg shadow-lg mt-10 mx-auto">
                <div class="p-6">
                    {{-- User must be registrated to add a comment --}}

                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div>
                            <label for="comment" class="block text-sm font-medium text-gray-700"></label>
                            <textarea name="comment" id="comment" rows="3"
                                class="shadow-sm focus:ring-gray-500 focus:border-gray-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md @error('comment') is-invalid @enderror"
                                placeholder="Comment..." value="{{ old('comment') }}"></textarea>
                            @error('comment')
                                <span class="text-red-500 text-sm italic mt-4">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-bold rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-300 ease-in-out">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @else
        <section class="container mx-auto px-2 lg:px-0 my-15">
            <div class="flex items-center justifiy-start md:justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3 text-teal-700" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                <h2 class="text-2xl text-gray-700 md:text-center font-bold">
                    Want to leave
                    a
                    comment or reply...
                </h2>
            </div>
            <div class="space-y-4">
                <p class="text-xl text-gray-700 md:text-center font-bold">Please login or register, today.</p>
                <div class="flex justify-center space-x-3 pb-10">
                    <a class="bg-rose-500 text-white rounded-full shadow-md py-2 px-8 hover:bg-rose-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400"
                        href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="border-2 border-rose-500 shadow-mdtext-base rounded-full shadow-md py-2 px-5 hover:bg-white hover:text-rose-500 hover:border-white transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400"
                            href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </div>

            </div>
        </section>
    @endif

    <section class="container mx-auto px-2 lg:px-0 my-15">
        @if (count($post->comments) > 0)

            <div class="flex items-center justifiy-start md:justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3 text-orange-700" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                </svg>
                <h2
                    class="text-2xl text-gray-700 md:text
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         -center font-bold uppercase">
                    Comments
                </h2>
            </div>

            @forelse ($post->comments as $comment)
                <div class="bg-white/50 text-gray-700 md:w-8/12 rounded-lg shadow-lg mt-10 mx-auto">
                    <div class="p-6">
                        <p class="mb-5 font-light text-gray-600">{{ $comment->comment }}</p>
                        <div class="flex justify-between border-t border-gray-400">
                            <p class="text-xs font-bold italic text-gray-500 mt-5">by
                                {{ $comment->author }}
                            </p>
                            <p class="text-xs font-bold text-gray-400 mt-5">
                                {{ $comment->created_at->diffForHumans() }}
                            </p>
                        </div>
                        @if (auth()->check())
                            <div x-data="{ open: false }" class="mt-5">
                                <button x-on:click="open = ! open"
                                    class="bg-gray-500 text-gray-100 text-sm font-bold rounded-lg shadow-md py-1 px-3 hover:bg-gray-900 transition duration-300 ease-in-out">Reply</button>

                                <div x-show="open" class="bg-white shadow-md rounded-lg my-5 p-6">
                                    <form action="{{ route('commentreplies.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="comment_id" value="{{ $post->id }}">
                                        <div>
                                            <label for="reply" class="block text-sm font-medium text-gray-700"></label>
                                            <textarea name="reply" id="reply" rows="3"
                                                class="shadow-sm focus:ring-gray-500 focus:border-gray-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md @error('comment') is-invalid @enderror"
                                                placeholder="Reply..." value="{{ old('reply') }}"></textarea>
                                            @error('reply')
                                                <span class="text-red-500 text-sm italic mt-4">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mt-5">
                                            <button type="submit"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-bold rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-300 ease-in-out">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif

                        @if (count($replies) > 0)
                            <div x-data="{ open: false }" class="my-5">
                                <button x-on:click="open = ! open"
                                    class="bg-orange-600 text-orange-100 text-sm font-bold rounded-lg shadow-md py-2 px-4 hover:bg-orange-800 transition duration-300 ease-in-out">({{ count($replies) }})
                                    {{ count($replies) == 1 ? 'Reply' : 'Replies' }}</button>

                                <div x-show="open">
                                    @foreach ($replies as $reply)
                                        <div class="p-6">
                                            <div class="bg-white/50 rounded-lg shadow-md p-4">
                                                <p class="mb-5 font-light text-gray-600">{{ $reply->reply }}</p>
                                                <div class="flex justify-between border-t border-gray-400">
                                                    <p class="text-xs font-bold italic text-gray-500 mt-5">by
                                                        {{ $reply->author }}
                                                    </p>
                                                    <p class="text-xs font-bold text-gray-400 mt-5">
                                                        {{ $reply->created_at->diffForHumans() }}
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>


                        @else
                            <div>
                                <p>There are no replies at this moment...</p>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div>
                    <p>There are no comments at this moment...</p>
                </div>
            @endforelse

        @endif
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
