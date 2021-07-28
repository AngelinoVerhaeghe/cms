@extends('layouts.app')

@section('title')

    CMS | Edit {{ auth()->user()->name }} profile

@endsection

@section('content')
    <section class="bg-white rounded-lg shadow-md overflow-hidden w-full">

        <div class="bg-gray-800 shadow p-4">
            <h1 class="text-xl text-white font-bold">
                My profile
            </h1>
        </div>

        @include('partials.errors')

        <div class="p-4">
            <form action="{{ route('users.update-profile') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block font-bold text-gray-600">Name</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') is-invalid @enderror"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-red-500 text-sm italic mt-4">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="about" class="block font-bold text-gray-600">
                            About me
                        </label>
                        <div class="mt-1">
                            <textarea id="about" name="about" cols="5" rows="5"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full text-sm border border-gray-300 rounded-md @error('about') is-invalid @enderror"
                                value="{{ old('about') }}">{{ $user->about }}</textarea>
                            @error('description')
                                <span class="text-red-500 text-sm italic mt-4">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 border-t-2 border-gray-200 text-right space-x-3 mt-4">
                    <a href="{{ route('users.index') }}"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-bold rounded-lg text-white bg-gray-600 transition duration-300 ease-in-out hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-5 border border-transparent shadow-sm text-sm font-bold rounded-lg text-white bg-indigo-500 transition duration-300 ease-in-out hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
