<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('website/dist/assets/images/menu/logo/now/1.png') }}">

    @include('layouts.css')
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="sidebar-fixed">
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
@include('layouts.header')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
    @include('layouts.side')
    <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
        @include('layouts.footer')
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@include('layouts.js')
<script>
    var sessionStatus = localStorage.getItem('vendor');
    console.log(sessionStatus);

    if(sessionStatus == null){


        $('.man_nav').css('display', 'block');
        $('.man_nav').attr('style','display:block !important');
        $('.vendor_nav').attr('style','display:none !important');
        $('.sessionStatus').attr('style','display:none !important');
        setTimeout(function() {
            $('.circle-loader').hide();
        }, 1000);
    }else{

        $('.vendor_nav').attr('style','display:block !important');
        $('.man_nav').css('display', 'none');
        setTimeout(function() {
            $('.circle-loader').hide();
        }, 1000);
    }

    // const resetSession=()=>{
    //     setTimeout(function() {
    //         $('.circle-loader').hide();
    //     }, 1000);
    //     @php

    //             @endphp
    //     localStorage.removeItem('vendor');
    //     showSuccessToast('success','Successfully reset session Reloading in 2 seconds..');
    //     setTimeout(function() {
        
    //         window.location.replace("{{env('APP_URL')}}");
    //     }, 3000);

    
    // }
    const resetSession=()=>{

$.ajax({
    type: 'post',
    url: '{{route("deletesession")}}',
    data: {
        _token: "{{ csrf_token() }}"
    },
    success: function (services) {

    }
});

setTimeout(function() {
    $('.circle-loader').hide();
}, 1000);
@php

        @endphp
localStorage.removeItem('vendor');
showSuccessToast('success','Successfully reset session Reloading in 2 seconds..');
setTimeout(function() {
    window.location.replace("{{env('APP_URL')}}");
}, 3000);
}

</script>
@yield('js')
</body>



</html>