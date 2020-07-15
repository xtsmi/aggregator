<!doctype html>
<html lang="{{ app()->getLocale() }}" data-controller="html-load">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Твоё СМИ - Новостной агрегатор. Самые последний и свежие новости в России, в сети, в мире. Узнавайте новости первыми.')</title>
    <meta name="description"
          content="@yield('description','Самые горячие новости в России, в США, в мире. Последние события в мире новостей.')">
    <meta name="keywords"
          content="@yield('keywords','Новости, вести, события, последние, горячее, в мире, в России, в США.')">
    <link rel="stylesheet" type="text/css" href="{{mix('/css/app.css')}}">

    {{-- Open Graph --}}
    <meta property="og:title"
          content="@yield('title','Твоё СМИ - Новостной агрегатор. Самые последний и свежие новости в России, в сети, в мире. Узнавайте новости первыми.')"/>
    <meta property="og:description"
          content="@yield('description','Самые горячие новости в России, в США, в мире. Последние события в мире новостей.')"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="@yield('title',asset('/img/cover.jpg'))"/>
    <meta property="og:url" content="{{ url()->current() }}">
    {{-- /Open Graph --}}

    {{-- favicon --}}
    <link rel="icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#83c600">
    <meta name="msapplication-TileColor" content="#83c600">
    <meta name="theme-color" content="#ffffff">
    {{-- /favicon --}}


    @include('feed::links')

    <meta name="turbolinks-root" content="/">
    <meta http-equiv="X-DNS-Prefetch-Control" content="on"/>
    <link rel="dns-prefetch" href="{{ config('app.url') }}"/>
    <script src="{{ mix('/js/app.js')}}" type="text/javascript"></script>
    {{-- <script type="text/javascript">
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('sw.js')
            .then(function(registration) {
                console.log('sw activated!');
            })
            .catch(function(error) {
                console.error('sw failed:', error);
            });
        }
    </script> --}}
</head>
<body data-controller="main">

@include('particles.navigation')

<div class="container">

    <main id="app" class="py-md-4 py-3">
        <div class="row" data-controller="main">
            @yield('left-column')
            @yield('right-column')
        </div>
    </main>

    @include('particles.footer')
</div>

@env('production')
    @include('particles.analytics')
@endenv


<script id="news-template" type="text/x-handlebars-template">
    @includeVerbatim('components.news')
</script>

<script id="story-template" type="text/x-handlebars-template">
    @includeVerbatim('components.story')
</script>

<script id="article-template" type="text/x-handlebars-template">
    @verbatim
        <article class="bg-white pt-3 px-3 mb-4 rounded shadow-sm" data-target="main.groupsItem">
            {{ $story }}

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                {{ $news }}
            </div>
        </article>
    @endverbatim
</script>

</body>
</html>
