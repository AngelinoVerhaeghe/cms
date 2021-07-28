@extends('layouts.app')

@section('title')
    CMS | Tags
@endsection

@section('content')
    <section class="rounded-lg shadow-md overflow-hidden">

        <div class="bg-gray-300 flex items-center justify-between px-6 lg:px-8 py-4">
            <h1 class="text-xl text-gray-500 font-medium">Tags</h1>
            <div>
                <a href="{{ route('tags.create') }}"
                    class="bg-green-500 text-sm font-bold uppercase text-gray-200 py-3 px-5 rounded-lg shadow-sm hover:bg-green-600 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-gray-300">Create
                </a>
            </div>
        </div>

        @include('partials.success')

        <div class="flex flex-col mt-5 mb-10">
            <div class="overflow-x-auto">
                @if (count($tags) > 0)
                    <div class="py-2 align-middle inline-block min-w-full px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Posts Count
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($tags as $tag)
                                        <tr class="hover:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-bold text-gray-900">
                                                    {{ $tag->name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-bold text-gray-900">
                                                    {{ $tag->posts->count() }}
                                                </div>
                                            </td>
                                            <td x-data="{ open: false }"
                                                class="px-6 py-4 whitespace-nowrap text-left text-sm font-bold space-x-3">
                                                <a href="{{ route('tags.edit', $tag->id) }}"
                                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <button type="button" x-on:click="open = !open"
                                                    class="text-red-600 hover:text-red-900" aria-controls="modal"
                                                    aria-expanded="false">Delete</button>
                                                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- Show delete Modal on click with animated transitions -->
                                                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                                                        x-transition:enter-start="transform opacity-0"
                                                        x-transition:enter-end="transform opacity-100"
                                                        x-transition:leave="transition ease-in duration-200"
                                                        x-transition:leave-start="transform opacity-100"
                                                        x-transition:leave-end="transform opacity-0"
                                                        class="fixed z-10 inset-0 overflow-y-auto"
                                                        aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                        <div
                                                            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                                                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                                                aria-hidden="true"></div>

                                                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                                aria-hidden="true">&#8203;</span>

                                                            <!-- @click.away sets if u click outside the modal, everything closes -->
                                                            <div @click.away="open = false"
                                                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                    <div class="sm:flex sm:items-start">
                                                                        <div
                                                                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                            <svg class="h-6 w-6 text-red-600"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke="currentColor" aria-hidden="true">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                                            </svg>
                                                                        </div>
                                                                        <div
                                                                            class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                            <h3 class="text-lg leading-6 font-bold text-gray-900"
                                                                                id="modal-title">
                                                                                Delete Tag?
                                                                            </h3>
                                                                            <div class="mt-2">
                                                                                <p class="text-sm text-gray-500">
                                                                                    Are you sure you want to delete
                                                                                    <span
                                                                                        class="text-gray-600 font-bold">{{ $tag->name }}</span>
                                                                                    as
                                                                                    tag? <br>
                                                                                    All of
                                                                                    your data will be permanently removed.
                                                                                    <br>
                                                                                    This
                                                                                    action cannot be
                                                                                    undone.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="bg-gray-50 px-4 py-3 sm:px-6 flex justify-end space-x-3">
                                                                    <a href="{{ route('tags.index') }}"
                                                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-bold rounded-lg text-white bg-gray-600 transition duration-300 ease-in-out hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                                                        Cancel
                                                                    </a>
                                                                    <button type="submit"
                                                                        class="inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-red-600 text-sm font-bold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                                        Delete
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="sm:px-6 lg:px-8 mt-10">
                        <p>No tags found!</p>
                    </div>
                @endif
            </div>
        </div>

    </section>
@endsection
