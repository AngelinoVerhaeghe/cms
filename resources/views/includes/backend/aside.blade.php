<aside class="p-6">
    <div class="flex items-center space-x-3 text-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
        </svg>
        <a href="{{ url('admin') }}" class="text-2xl font-bold">Dashboard</a>
    </div>

    <nav>
        <ul class="space-y-3 py-5">
            {{-- Show users only if user is Administrator --}}
            @if (auth()->user()->isAdmin())
                <div>
                    <a href="{{ route('users.index') }}">
                        <span
                            class="flex items-center text-gray-700 space-x-2 font-medium px-2 py-2 hover:bg-teal-400 rounded-xl transition duration-300 ease-in-out hover:shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Users
                        </span>
                    </a>
                </div>
            @endif
            <div>
                <a href="{{ route('posts.index') }}">
                    <span
                        class="flex items-center text-gray-700 space-x-2 font-medium px-2 py-2 hover:bg-teal-400 rounded-xl transition duration-300 ease-in-out hover:shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Posts
                    </span>
                </a>
            </div>
            <div>
                <a href="{{ route('categories.index') }}">
                    <span
                        class="flex items-center text-gray-700 space-x-2 font-medium px-2 py-2 hover:bg-teal-400 rounded-xl transition duration-300 ease-in-out hover:shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                        Categories
                    </span>
                </a>
            </div>
            <div>
                <a href="{{ route('tags.index') }}">
                    <span
                        class="flex items-center text-gray-700 space-x-2 font-medium px-2 py-2 hover:bg-teal-400 rounded-xl transition duration-300 ease-in-out hover:shadow-md">
                        <i class="ri-bookmark-3-line text-xl mr-3"></i>
                        Tags
                    </span>
                </a>
            </div>
        </ul>

        <ul class="border-t-2 border-gray-3 space-y-3 py-5">
            <div>
                <a href="{{ route('trashed-posts.index') }}">
                    <span
                        class="flex items-center text-gray-700 space-x-2 font-medium px-2 py-2 hover:bg-teal-400 rounded-xl transition duration-300 ease-in-out hover:shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Trashed Posts
                    </span>
                </a>
            </div>
        </ul>
        <div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <span
                    class="flex items-center text-red-900 space-x-2 font-bold px-2 py-2 bg-red-300 rounded-xl transition duration-300 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    {{ __('Logout') }}
                </span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
        </div>

    </nav>

</aside>
