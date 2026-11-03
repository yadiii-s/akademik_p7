<div>
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Akademik') - Sistem Akademik</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body>
        @include('partials.navbar')
        <main class="container">
            @yield('content')
        </main>
        @include('partials.footer', ['tahun' => 2026])
    </body>

    </html>
</div>
