<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel & jwPlayer</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src="https://cdn.jwplayer.com/libraries/Lqiwnnku.js"></script>


    </head>
    <body class="antialiased">
    <div class="h-1/2 pt-4 px-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div  class="h-full" id="player"></div>

    </div>

    </div>
  



    <script type="text/JavaScript">
     const player = jwplayer("player").setup({ 
        playlist: 'https://cdn.jwplayer.com/v2/media/uWMat0sa?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2NDY2NDYwMjEwMDAsInJlc291cmNlIjoiL3YyL21lZGlhL3VXTWF0MHNhIiwiaWF0IjoxNjQ2NjQ2MDE3fQ.h1hiZ1ZSqauZhoWEr2xP7ZwH3A0NRI7vMdCs1_dOo-Y',
        autostart: true,
        floating: true,

    });

     player.on('pause', (event) => {
        alert('Why did you pause my dear?')
     })


    </script>

 

    </body>
</html>
