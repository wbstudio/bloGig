<html>
    <head>
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ mix('css/common.css') }}">
        @yield('css')
        @yield('js')
        @FilemanagerScript
    </head>
    <body>
        <header>
            bloGig  管理画面
        </header>

        <main>
            @include('admin.partical.sidenavi')
            <div id="content">
                @yield('content')
            </div>
        </main>

        <footer>
            bloGig  管理画面
        </footer>
    </body>
</html>