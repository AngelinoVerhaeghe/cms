@extends('layouts.app')

@section('title')

    CMS | Comments

@endsection

@section('content')

    <section class="rounded-lg shadow-md overflow-hidden">

        <div class="bg-gray-300 flex items-center justify-between px-6 lg:px-8 py-4">
            <h1 class="text-xl text-gray-500 font-medium">Comments</h1>
        </div>

        <div class="flex flex-col mt-5 mb-10">
            <div class="overflow-x-auto">
                @if (count($comments) > 0)
                    <div class="py-2 align-middle inline-block min-w-full px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Image
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Category
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Published at
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Online
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    {{-- @foreach ($posts as $post) --}}
                                    <a href="" target="_blank">
                                        <tr class="hover:bg-gray-100 cursor-pointer">

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <img src="{{-- {{ asset('/storage/' . $post->image) }} --}}" alt="{{-- {{ $post->title }} --}}"
                                                    class="h-32 w-full">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{-- {{ route('blog.show', $post->slug) }} --}}" target="_blank">
                                                    <div class="text-sm font-bold text-blue-700">
                                                        {{-- {{ $post->title }} --}}
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-bold text-gray-900">
                                                    {{-- {{ $post->category->name }} --}}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-bold text-gray-900">
                                                    {{-- {{ $post->published_at }} --}}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <!-- If post is softdeleted show Not Active -->
                                                {{-- @if ($post->deleted_at != null) --}}
                                                <span
                                                    class="text-xs inline-flex leading-5 font-bold bg-red-100 text-red-800 text-center rounded-full shadow px-2">
                                                    Not Active
                                                </span>
                                                {{-- @else --}}
                                                <span
                                                    class="text-xs inline-flex leading-5 font-bold bg-green-100 text-green-500 text-center rounded-full shadow px-2">
                                                    Active
                                                </span>
                                                {{-- @endif --}}
                                            </td>
                                            {{-- @if (auth()->user()->id == $post->user->id) --}}
                                            <td class="text-left text-sm px-6 py-4 whitespace-nowrap">
                                                <div class="flex space-x-4">
                                                    <!-- If post has been trashed hide the edit button -->
                                                    {{-- @if ($post->trashed()) --}}
                                                    <form action="{{-- {{ route('restore-post', $post->id) }} --}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" href="{{-- {{ route('posts.edit', $post->id) }} --}}"
                                                            class="text-yellow-500 hover:text-yellow-900">
                                                            Restore
                                                        </button>
                                                    </form>

                                                    {{-- @else --}}
                                                    <a href="{{-- {{ route('posts.edit', $post->id) }} --}}"
                                                        class="text-indigo-500 hover:text-indigo-900">Edit</a>
                                                    {{-- @endif --}}
                                                    <form action="{{-- {{ route('posts.destroy', $post->id) } --}}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <!-- Swith button text to delete or trash -->
                                                        <button type="submit"
                                                            class="text-sm text-red-500 hover:text-red-900">
                                                            {{-- {{ $post->trashed() ? 'Delete' : 'Trash' }} --}}
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            {{-- @else --}}
                                            <td class="px-6 py-4 whitespace-nowrap"></td>
                                            {{-- @endif --}}

                                        </tr>

                                        {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="sm:px-6 lg:px-8 mt-10">
                        <p>No comments found!</p>
                    </div>
                @endif
            </div>
        </div>

    </section>


    <section class="container mx-auto px-2 lg:px-0 my-5">

        {{-- {{ $posts->links('vendor.pagination.tailwind') }} --}}

    </section>

@endsection
