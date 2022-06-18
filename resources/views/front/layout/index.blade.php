<!DOCTYPE html>

<html>

@include('front.includes.head')

@stack('style-lib')

@stack('style')

<body class="">

<div class="preloader"></div>

        @include('front.includes.topnav')

         @yield('content')

        @include('front.includes.footer')
       
        @include('front.includes.scripts')
        
    @stack('script-lib')

    @include('front.includes.notify')

    @stack('script')
        
    </body>

</html>


