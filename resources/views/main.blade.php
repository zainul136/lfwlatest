<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta content="" name="description" />
    <meta content="greenbrier" name="keywords" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Main Page</title>
{{--    <img src="{{ asset('storage/assets') }}/images/logosvg1.svg" alt="logo"/>--}}
    <link rel="stylesheet" href="{{ asset('storage/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('storage/assets/build/css/countrySelect.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link src="{{ asset('storage/assets') }}/images/logosvg1.svg" alt="logo"/>
    <link rel="icon" type="image/x-icon" href="{{asset('storage/assets') }}/images/logosvg1.svg" />

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Link to the file hosted on your server, -->
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
      <style>
        .container {
            max-width: 1637px !important;
        }
    </style>
    <link href="{{ asset('storage/assets/posts/pt-style.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Include your header -->
    @yield('header')

    <div class="content">
        <!-- The main content of your page -->
        @yield('content')
    </div>

    <!-- Include your footer -->
    @yield('footer')

    <!-- Include your JavaScript files -->
</body>

</html>
