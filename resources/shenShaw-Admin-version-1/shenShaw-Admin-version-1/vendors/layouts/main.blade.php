<!doctype html>
<html lang="en">
<head>
    <title>website</title>

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('website/dist/assets/images/menu/logo/now/1.png') }}">

    @include('vendors.layouts.css')
</head>


<body class="template-color-1">
<div class="main-wrapper">
    @include('vendors.layouts.header')

    @yield('content')
    @include('vendors.layouts.footer')



</div>
@include('vendors.layouts.js')

</body>
</html>

