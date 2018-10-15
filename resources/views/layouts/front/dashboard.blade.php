<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('pageTitle')</title>
        
        <!-- stylesheets -->
        <link href="{{ url('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ url('css/ionicons.css') }}" rel="stylesheet">
        <link href="{{ url('css/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ url('css/style.css') }}" rel="stylesheet">
        <link href="{{ url('css/dashboard.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200i,300,300i,400,600,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700&amp;subset=latin-ext" rel="stylesheet">

        <!--Select2-->
        <link href="{{ url('css/select2/select2.css') }}" rel="stylesheet">

        @yield('styles')
    </head>
    <body>
        @include('layouts.front.header')

        <div class="container-fluid">
            <div class="row m-t-90 profile">
                @include('layouts.front.sidebar')
                <div class="col-xs-8 col-md-10">
                    <div class="dashboard-content">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('home') }}">Home</a></li>
                            @yield('breadcrumbList')
                            
                        </ol>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.front.footer')
        <!-- javascript -->
        <script src="{{ url('js/jquery-v1.11.3.js') }}"></script>
		<script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ url('js/owl.carousel.js') }}"></script>
        <script src="{{ url('js/custom.js') }}"></script>

        <!--Select2-->
		<script src="{{ url('js/select2/select2.js') }}"></script>
        

        @yield('scripts')
    </body>
</html>    