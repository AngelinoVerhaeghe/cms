<div class="container mx-auto flex justify-between items-center px-6 lg:px-0">
    <div>
        <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
        <ul class="flex items-center space-x-3">
            <div>
                <a href=""></a>
            </div>
            @guest
                <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <div class="flex items-center space-x-3">
                    <img src="{{ Gravatar::src(Auth::user()->email) }}" alt="{{ Auth::user()->name }}"
                        class="h-8 border border-gray-300 rounded-full shadow">
                    <span>{{ Auth::user()->name }}</span>
                </div>

            @endguest
        </ul>

    </nav>
</div>
