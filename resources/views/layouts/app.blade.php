<!DOCTYPE html>
<html lang="{{ app()->getLoacle() }} ">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- CSRF Token  --}}
  <meta name="csrf-token" content="{{ crsf_token() }} ">

  <title>@yield('title', 'KLCMS') - 酷龙内容管理系统 </title>

  {{-- Style  --}}
  <link rel="stylesheet" href="{{ mix('css/app.css') }}  ">
</head>
<body>
  <div id="app" class="{{ route_class() }}-page ">
    @include('layouts._header')

    <div class="container">

      @include('shared._messages')

      @yield('content')

    </div>

    @include('layouts._footer')
  </div>

  {{-- Script  --}}
  <script src="{{ mix('js/app.js')}} "></script>
</body>

</html>
