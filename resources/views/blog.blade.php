@extends('layouts.main')
@section('title', 'Блог')

@section('content')
    <main class="container mx-auto px-5 flex flex-grow">
        <div class="w-full grid grid-cols-4 gap-10">
            <div class="md:col-span-3 col-span-4">
                <div id="posts" class=" px-3 lg:px-7 py-6">

                    <div class="flex justify-between items-center border-b border-gray-100">
                        <div id="filter-selector" class="flex items-center space-x-4 font-light ">
                            <button class="text-gray-500 py-4">Latest</button>
                            <button class="text-gray-900 py-4 border-b border-gray-700">Oldest</button>
                        </div>
                    </div>

                    <div class="py-4">
                        @foreach ($latest_posts as $post)
                            
                        
                        <article class="[&:not(:last-child)]:border-b border-gray-100 pb-10">
                            <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
                                <div class="article-thumbnail col-span-4 flex items-center">
                                    @if ($post->image != null)    
                                        <a href="" >
                                            <img class="mw-100 mx-auto rounded-xl"
                                                src=""
                                                alt="thumbnail">
                                        </a>
                                    @endif
                                </div>
                                <div class="col-span-8">
                                    <div class="article-meta flex py-1 text-sm items-center">

                                        <img class="w-7 h-7 rounded-full mr-3"
                                            src=
                                            alt="avatar">

                                        <span class="mr-1 text-xs">{{ $post->user->name }}</span>
                                        <span class="text-gray-500 text-xs">{{ $post->created_at }}</span>{{-- Как давно сделан --}}
                                    </div>
                                    <h2 class="text-xl font-bold text-gray-900">
                                        <a href="http://127.0.0.1:8000/blog/first%20post" >
                                            {{ $post->title }}
                                        </a>
                                    </h2>
                        
                                    <p class="mt-2 text-base text-gray-700 font-light">
                                        {{ $post->content }}
                                    </p>
                                    <div class="article-actions-bar mt-6 flex items-center justify-between">
                                        <div class="flex items-center space-x-4">
                                            <span class="text-gray-500 text-sm">{{ $post->views }}</span>
                                        </div>
                                        <div>
                                            <a class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6 text-gray-600 hover:text-gray-900">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                                </svg>
                                                <span class="text-gray-600 ml-2">
                                                    {{ $post->likes }}
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>

            <div id="side-bar" class="border-t border-t-gray-100 md:border-t-none col-span-4 md:col-span-1 px-3 md:px-6  space-y-10 py-6 pt-10 md:border-l border-gray-100 h-screen sticky top-0">
                
                <div id="search-box">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Search</h3>
                        <div class="w-52 flex rounded-2xl bg-gray-100 py-2 px-3 mb-3 items-center">
                            <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </span>
                            <input
                                class="w-40 ml-1 bg-transparent focus:outline-none focus:border-none focus:ring-0 outline-none border-none text-xs text-gray-800 placeholder:text-gray-400"
                                type="text" placeholder="Search Yelo">
                        </div>
                    </div>
                </div>

                <div id="recommended-topics-box">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Recommended Topics</h3>
                    {{-- Recommended Category --}}
                    <div class="topics flex flex-wrap justify-start">
                        <a href="#" class="bg-red-600 
                                        text-white 
                                        rounded-xl px-3 py-1 text-base">
                            Tailwind</a>
                    </div>
                    {{-- Recommended Category --}}
                </div>
            </div>

        </div>
    </main>
@endsection