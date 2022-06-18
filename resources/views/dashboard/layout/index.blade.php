<!DOCTYPE html>
<html>
@include('dashboard.includes.head')
@stack('style-lib')

@stack('style')

    <body class="bg-lite-grey">
        <div class="preloader"></div>
        @include('dashboard.includes.topnav')
        <div class="wrapper">
        	@include('dashboard.includes.sidebar')
        	<div class="main-content comet-grey px-xl-4">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
       
    @include('dashboard.includes.scripts')

    @stack('script-lib')

    @include('dashboard.includes.notify')

    @stack('script')
    </body>
</html>









































