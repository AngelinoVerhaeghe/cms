<div class="container mx-auto text-gray-100 px-2 lg:px-0 text-center lg:text-left">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4 xl:gap-8">
        <div class="mb-10">
            <h3 class="text-2xl font-bold">Pages</h3>
            <ul class="space-y-4 mt-5">
                <li>
                    <a href="{{ route('index') }}"
                        class="hover:text-yellow-500 transition duration-300 ease-in-out">Home</a>
                </li>
                <li>
                    <a href="{{ route('blogs-overview') }}"
                        class="hover:text-yellow-500 transition duration-300 ease-in-out">Blogs</a>
                </li>
                @guest
                    <li>
                        <a href="{{ route('login') }}"
                            class="hover:text-yellow-500 transition duration-300 ease-in-out">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}"
                            class="hover:text-yellow-500 transition duration-300 ease-in-out">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
        <div class="mb-10">
            <h3 class="text-2xl font-bold">Latest Blog Posts</h3>
            <ul class="space-y-4 mt-5">
                @forelse ($posts as $post)
                    <li>
                        <a href="{{ route('blog.show', $post->slug) }}"
                            class="hover:text-yellow-500 transition duration-300 ease-in-out">{{ $post->title }}</a>
                    </li>
                @empty
                    <p>There are no posts at this time...</p>
                @endforelse
            </ul>
        </div>
        <div class="mb-10">
            <h3 class="text-2xl font-bold">Follow Us</h3>
            <ul class="flex items-center justify-center lg:justify-start space-x-4 mt-5">
                <li>
                    <a href="{{ url('https://www.linkedin.com/in/angelino-verhaeghe/') }}" target="_blank">
                        <i
                            class="ri-linkedin-box-fill text-3xl hover:text-yellow-500 transition duration-300 ease-in-out"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ url('https://github.com/AngelinoVerhaeghe') }}" target="_blank">
                        <i
                            class="ri-github-fill text-3xl hover:text-yellow-500 transition duration-300 ease-in-out"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="mb-10">
            <h3 class="text-xl font-bold mb-5">Sign in for our newsletter.</h3>
            <div class="relative border-2 border-yellow-500 p-2 rounded-full">
                <input type="email" name="email" id="email" class="rounded-full w-full">
                <button type="submit"
                    class="absolute right-2 bottom-2 bg-gray-700 py-[9px] px-4 rounded-full">Signup</button>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-between border-t-2 border-gray-200 py-5">
        <p>Angelino Verhaeghe - BLOG</p>
        <p>&copy; All Rights Reserved - 2021</p>
    </div>
</div>
