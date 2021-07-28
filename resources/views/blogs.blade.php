@extends('layouts.frontend')

@section('title')

    Blog | Overview

@endsection

@section('content')

    <section class="background-image-2 flex items-center">
        <div class="grid grid-cols-1 text-center mx-auto">
            <div class="bg-white/20 backdrop-blur-md rounded-lg shadow-md p-4">
                <h1 class="text-gray-900 text-2xl md:text-4xl lg:text-6xl uppercase font-bold">blogs overview
                </h1>
                <h3 class="text-gray-800 italic lowercase text-1xl md:text-3xl lg:text-5xl my-3 md:my-5">
                    bring all the good things...
                </h3>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-6 lg:px-0 my-15">
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-6 lg:gap-20">
            <p>Here comes the blogsoverview</p>
        </div>
    </section>

@endsection
