<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel & Vimeo</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="antialiased relative bg-gray-50 ">
    <div class="">
        <x-nav />

        <main>
            <div class="max-w-7xl pt-4 mx-auto sm:px-6 lg:px-8">
                <!-- Hero  -->
                <div>


                    <div class="relative pt-6 pb-16 sm:pb-24">

                        <main class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24">
                            <div class="text-center">
                                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                                    <span class="block xl:inline">Data to enrich your</span>
                                    <!-- space -->
                                    <span class="block text-indigo-600 xl:inline">online business</span>
                                </h1>
                                <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                                    Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.
                                </p>
                                <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                                    <div class="rounded-md shadow">
                                        <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                            Get started
                                        </a>
                                    </div>
                                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                                        <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                                            Live demo
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
                <!--/ End Hero  -->
                <div>
                    <section class="py-12">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="md:flex md:items-center md:justify-between">
                                <div class="flex-1 min-w-0">
                                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Recent videos</h2>
                                </div>
                                <div class="mt-4 flex md:mt-0 md:ml-4">
                                    <a href="{{ route('videos.create') }}" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Add Video</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Replace with your content -->
                <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">

                    @for($i = 0; $i < 9; $i++) <li class="relative">
                        <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=512&amp;q=80" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                            <button type="button" class="absolute inset-0 focus:outline-none">
                                <span class="sr-only">View details for IMG_4985.HEIC</span>
                            </button>
                        </div>
                        <p class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none">IMG_4985.HEIC</p>
                        <p class="block text-sm font-medium text-gray-500 pointer-events-none">3.9 MB</p>
                        </li>

                        @endfor


                </ul>
                <!-- /End replace -->
            </div>
        </main>
    </div>
</body>
<x-footer />

</html>