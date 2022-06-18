 <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light header-container">
                <div class="container">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{asset('assets/front/images/retinaad-login-logo.png')}}" alt="" class="img-fluid">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('front.home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown01" role="button" data-bs-toggle="dropdown" aria-expanded="false">Product</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown01">
                                    <li><a class="dropdown-item" href="#">Product 1</a></li>
                                    <li><a class="dropdown-item" href="#">Product 2</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown02" role="button" data-bs-toggle="dropdown" aria-expanded="false">Solution</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown02">
                                    <li><a class="dropdown-item" href="#">Solution 1</a></li>
                                    <li><a class="dropdown-item" href="#">Solution 2</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <a href="{{ route('front.register') }}" class="btn btn-regular bg-blue text-center fw-bold me-3">Register</a>
                            <a href="{{ route('front.login') }}" class="btn btn-regular bg-blue text-center fw-bold me-3">Login</a>
                            <a href="#searchSection" class="btn btn-regular bg-red text-uppercase d-flex justify-content-center align-items-center text-white text-center fw-bold">Marketing insights</a>
                        </form>
                    </div>
                </div>
            </nav>
        </header>