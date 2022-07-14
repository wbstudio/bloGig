<html>
    <head>
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <link rel="stylesheet" href="{{ mix('css/front/pc/common.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="{{ mix('js/front/pc/common.js') }}"></script>
        @yield('css')
        @yield('js')
    </head>
    <body>
        <header>
            @include('front.pc.particle.header')
        </header>


        <main>
            <!--topページのみの画像-->
            @if (isset($pageName) && $pageName == 'TOP_PAGE')
                <div id="header_image">
                    <a><img src="{{ mix('img/front/pc/head_pc_2.png') }}"></a>
                </div>
                {{--@if(isset($pickupList) && is_countable($pickupList))--}}
                    @include('front.pc.particle.pickUp')
                {{--@endif--}}
            @endif
            <!--topページのみの画像-->

            <div id="main">
                <div id="content">
                    @yield('content')
                </div>
                @include('front.pc.particle.sidenavi')
            </div>

        </main>

        <footer>
            @include('front.pc.particle.footer')
        </footer>
    </body>
</html> 