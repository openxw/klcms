<!DOCTYPE html>
<html lang="{{ app()->getLocale() }} ">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- CSRF Token  --}}
  <meta name="csrf-token" content="{{ csrf_token() }} ">

  <title>@yield('title', 'LaraBBS') - {{ setting('site_name', '酷龙CMS') }}</title>
  <meta name="description" content="@yield('description', setting('seo_description', '酷龙CMS'))" />
  <meta name="keywords" content="@yield('keyword', setting('seo_keyword', '酷龙CMS,地产,CIO,开发'))" />

  {{-- Style  --}}
  <link rel="stylesheet" href="{{ mix('css/app.css') }}  ">
</head>
<body>
  <div id="app" class="{{ route_class() }}-page">
    @include('layouts._header')

    <div class="container">

      @include('shared._messages')

      @yield('content')

    </div>

    @include('layouts._footer')
  </div>

  {{-- Script  --}}
  <script src="{{ mix('js/app.js')}} "></script>

  @yield('scripts')
</body>

</html>
