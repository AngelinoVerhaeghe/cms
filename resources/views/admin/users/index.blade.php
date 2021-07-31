@extends('layouts.app')

@section('title')

    CMS | Users

@endsection

@section('content')

    <section class="rounded-lg shadow-md overflow-hidden">

        <div class="bg-gray-300 px-6 lg:px-8 py-4">
            <h1 class="text-xl text-gray-500 font-medium">Users</h1>
        </div>

        @include('partials.success')

        <div class="flex flex-col mt-5 mb-10">
            <div class="overflow-x-auto">
                @if (count($users) > 0)
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
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($users as $user)
                                        <tr class="hover:bg-gray-100">
                                            <td class="px-6 py-4">
                                                <img src="{{ Gravatar::src($user->email) }}" alt="{{ $user->name }}"
                                                    class="h-10 border border-gray-300 rounded-full shadow">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-bold text-gray-900">
                                                    {{ $user->name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-bold text-gray-900">
                                                    {{ $user->email }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($user->role === 'Administrator')
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $user->role }}
                                                    </span>
                                                @else
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        {{ $user->role }}
                                                    </span>
                                                @endif

                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if (!$user->isAdmin())
                                                    <form action="{{ route('users.make-admin', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="text-sm font-bold text-green-100 bg-green-500 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-300 ease-in-out hover:bg-green-700 py-2 px-4">
                                                            Make Administrator
                                                        </button>
                                                    </form>

                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="sm:px-6 lg:px-8 mt-10">
                        <p>No users found!</p>
                    </div>
                @endif
            </div>
        </div>

    </section>

    <section class="container mx-auto px-2 lg:px-0 my-5">

        {{ $users->links('vendor.pagination.tailwind') }}

    </section>


@endsection
