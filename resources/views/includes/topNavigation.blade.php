<div class="container mx-auto flex justify-between items-center px-2 lg:px-0">
    <div>
        <a href="{{ url('/') }}"
            class="text-lg font-bold uppercase text-gray-100 no-underline px-4 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400">
            Blog
        </a>
    </div>
    <nav class="space-x-4 text-white font-bold">
        <ul class="flex items-center space-x-3 xl:space-x-8">
            @guest
                <a class="border-2 border-transparent rounded-full hover:border-rose-500 block px-4 py-2 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400"
                    href="{{ route('index') }}">Home</a>
                <a class="border-2 border-transparent rounded-full hover:border-rose-500 block px-4 py-2 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400"
                    href="{{ route('blogs-overview') }}">Blogs</a>
                <a class="bg-rose-500 text-white rounded-full shadow-md py-2 px-5 hover:bg-rose-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400"
                    href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a class="border-2 border-rose-500 shadow-mdtext-base rounded-full shadow-md py-2 px-5 hover:bg-white hover:text-rose-500 hover:border-white transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400"
                        href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <a class="border-2 border-transparent rounded-full hover:border-rose-500 block px-4 py-2 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400"
                    href="{{ route('index') }}">Home</a>
                <a class="border-2 border-transparent rounded-full hover:border-rose-500 block px-4 py-2 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400"
                    href="{{ route('blogs-overview') }}">Blogs</a>
                <!-- Profile dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <div class="flex items-center space-x-3">
                        <span class="text-base font-bold">
                            {{ Auth()->user()->name }}
                        </span>
                        <button type="button" x-on:click="open = ! open"
                            class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img src="{{ Gravatar::src(Auth::user()->email) }}" alt="{{ Auth::user()->name }}"
                                class="h-8 w-8 rounded-full">
                        </button>
                    </div>
                    <div x-show="open" @click.away="open = false"
                        class="p-2 origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="{{ route('admin.index') }}"
                            class="block px-4 py-2 text-sm text-gray-700 rounded-xl transition duration-300 ease-in-out hover:bg-gray-300"
                            role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
                        <a href="{{ route('users.edit-profile') }}"
                            class="block px-4 py-2 text-sm text-gray-700 rounded-xl transition duration-300 ease-in-out hover:bg-gray-300"
                            role="menuitem" tabindex="-1" id="user-menu-item-1">My Profile</a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                    document.getElementById('logout-form').submit();"
                            class="block px-4 py-2 text-sm text-gray-700 rounded-xl transition duration-300 ease-in-out hover:bg-gray-300"
                            role="menuitem" tabindex="-1" id="user-menu-item-2">
                            {{ __('Sign out') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endguest
        </ul>

    </nav>
</div>
