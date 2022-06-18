<!DOCTYPE html>
<html>
@include('front.includes.head')
    <body class="login-page h-100">
        <div class="preloader"></div>
        <!-- body-area -->
        <main>
            <section class="login-section black-color d-flex justify-content-end text-center">
                <div class="login-main">
                    <div class="login-form-wrapper">
                        <a href="index.html"><img src="{{asset('assets/front/images/retinaad-login-logo.png')}}" class="img-fluid login-logo"></a>
                   @yield('content')
          <footer class="login-copy-right d-flex align-content-end">
                            <p>© Copyright 2022  |  Retina AD</p>
                        </footer>
                    </div>
                </div>
                <div class="owl-carousel hero-carousel">
                    <div class="item">
                        <img src="{{asset('assets/front/images/Slider 1.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <div class="item">
                        <img src="{{asset('assets/front/images/Slider 2.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <div class="item">
                        <img src="{{asset('assets/front/images/Slider 3.jpg')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </section>
            <div class="stickey-icon-bar">
              <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a> 
              <a href="#" class="linkedin"><i class="fab fa-linkedin-in "></i></a> 
              <a href="#" class="twitter"><i class="fab fa-twitter"></i></a> 
            </div>
        </main>
        <!-- owl-carosel-min.js -->
       @include('front.includes.scripts')
       @include('front.includes.notify')
    </body>
</html>