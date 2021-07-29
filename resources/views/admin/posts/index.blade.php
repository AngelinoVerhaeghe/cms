@extends('layouts.app')

@section('title')

    CMS | Posts

@endsection

@section('content')

    <section class="rounded-lg shadow-md overflow-hidden">

        <div class="bg-gray-300 flex items-center justify-between px-6 lg:px-8 py-4">
            <h1 class="text-xl text-gray-500 font-medium">Posts</h1>
            <div>
                <a href="{{ route('posts.create') }}"
                    class="bg-green-500 text-sm font-bold uppercase text-gray-200 py-3 px-5 rounded-lg shadow-sm hover:bg-green-600 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-gray-300">Create
                </a>
            </div>
        </div>

        @include('partials.success')

        <div class="flex flex-col mt-5 mb-10">
            <div class="overflow-x-auto">
                @if (count($posts) > 0)
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
                                    @foreach ($posts as $post)
                                        <tr class="hover:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <img src="{{ asset('/storage/' . $post->image) }}"
                                                    alt="{{ $post->title }}" class="h-32 w-full">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-bold text-gray-900">
                                                    {{ $post->title }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-bold text-gray-900">
                                                    {{ $post->category->name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-bold text-gray-900">
                                                    {{ $post->published_at }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <!-- If post is softdeleted show Not Active -->
                                                @if ($post->deleted_at != null)
                                                    <span
                                                        class="text-xs inline-flex leading-5 font-bold bg-red-100 text-red-800 text-center rounded-full shadow px-2">
                                                        Not Active
                                                    </span>
                                                @else
                                                    <span
                                                        class="text-xs inline-flex leading-5 font-bold bg-green-100 text-green-500 text-center rounded-full shadow px-2">
                                                        Active
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-left text-sm px-6 py-4 whitespace-nowrap">
                                                <div class="flex space-x-4">
                                                    <!-- If post has been trashed hide the edit button -->
                                                    @if ($post->trashed())
                                                        <form action="{{ route('restore-post', $post->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                href="{{ route('posts.edit', $post->id) }}"
                                                                class="text-yellow-500 hover:text-yellow-900">
                                                                Restore
                                                            </button>
                                                        </form>

                                                    @else
                                                        <a href="{{ route('posts.edit', $post->id) }}"
                                                            class="text-indigo-500 hover:text-indigo-900">Edit</a>
                                                    @endif
                                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <!-- Swith button text to delete or trash -->
                                                        <button type="submit"
                                                            class="text-sm text-red-500 hover:text-red-900">
                                                            {{ $post->trashed() ? 'Delete' : 'Trash' }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="sm:px-6 lg:px-8 mt-10">
                        <p>No posts found!</p>
                    </div>
                @endif
            </div>
        </div>

    </section>

@endsection
