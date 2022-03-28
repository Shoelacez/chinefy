<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel & jwPlayer</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@livewireStyles
</head>
<body class="antialiased">
<div class="py-10">
    <header>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Create Video</h2>
                </div>
            </div>
        </div>

    </header>

    <main>
        <div class="max-w-7xl pt-4 mx-auto sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">

            <livewire:upload-video-with-preview />

            </div>
            <!-- /End replace -->
        </div>
    </main>
</div>

@livewireScripts
</body>
</html>
