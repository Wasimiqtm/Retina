<div class="dashboard-head d-flex">
            <div class="container-fluid px-0 px-lg-2">
                <div class="row align-items-center">
                    <div class="col-md-8 header-left">
                        <div class="d-flex align-items-center">
                            <button class="sidebar-toggle no-btn d-lg-none me-3"><i class="hamburger align-self-center"></i></button>
                            <div class="dashboard-thumb">
                                <img src="{{asset('assets/dashboard/images/retinaad-login-logo.png')}}" class="img-fluid">
                            </div>
                            <div class="search-top">
                                <form class="form search-form">
                                    <input type="search" id="form1" class="form-control" placeholder="Search" aria-label="Search" />
                                    <button type="submit" class="btn-search"><i class="far fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 header-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="dashboard-thumb-icon">
                                <a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a>
                            </div>
                            <div class="thumb-person">
                                <div class="dropdown-box notific-dropdown">
                                    <a role="button" id="dropdownMenu01" class="">
                                        @if(Auth::user()->avatar)
                                            <img src="{{asset('assets/dashboard/images/avatars')}}/{{Auth::user()->avatar}}" class="img-fluid" alt="">
                                            @else
                                            <img src="{{asset('assets/dashboard/images/profile.png')}}" class="img-fluid" alt="">
                                            @endif
                                    </a>
                                    <div class="input-modal dropdownMenu01">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="{{ route('dashboard.setting') }}">Manage Profile</a></li>
                                            <li><a href="{{ route('front.logout') }}">Log Out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>