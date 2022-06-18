@extends('front.layout.index')
@section('content')
        <section class="hero-section black-color d-flex justify-content-end text-center">
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

        <section class="search-section">
            <div class="container">
                <div class="tabs-search-box">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Out-Of-Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-ad-space-tab" data-bs-toggle="pill" data-bs-target="#pills-ad-space" type="button" role="tab" aria-controls="pills-ad-space" aria-selected="false">Buy AD Space</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-sale-tab" data-bs-toggle="pill" data-bs-target="#pills-sale" type="button" role="tab" aria-controls="pills-sale" aria-selected="false">For Sale</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane search-tab-1 fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <form class="form form-inline d-flex justify-content-between align-items-center">
                                <select class="form-select">
                                    <option selected="" disabled="">Select Target Country</option>
                                    <option value="1">Lagos</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="form-select">
                                    <option selected="" disabled="">Select Target State</option>
                                    <option value="1">Lagos</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="form-select">
                                    <option selected="" disabled="">Select Target LGA</option>
                                    <option value="1">Lagos</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="form-select">
                                    <option selected="" disabled="">Select Available Area</option>
                                    <option value="1">Lagos</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <div class="btn-bottom">
                                    <button type="button" class="btn btn-regular v3 bg-blue w-100" data-bs-toggle="modal" data-bs-target="#adSpotsModal">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane search-tab-2 fade" id="pills-ad-space" role="tabpanel" aria-labelledby="pills-ad-space-tab">
                            <form class="form form-inline d-flex justify-content-between align-items-center">
                                <select class="form-select">
                                    <option selected="" disabled="">Select Location</option>
                                    <option value="1">Lagos</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="form-select">
                                    <option selected="" disabled="">Select Media Type</option>
                                    <option value="1">Lagos</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <input type="text" name="" class="form-control form-control-lg" placeholder="Enter Your Budget">
                                <div class="btn-bottom">
                                    <button type="button" class="btn btn-regular v3 bg-blue w-100" data-bs-toggle="modal" data-bs-target="#adSpotsModal">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane search-tab-3 fade" id="pills-sale" role="tabpanel" aria-labelledby="pills-sale-tab">
                            <form class="form form-inline d-flex justify-content-between align-items-center">
                                <select class="form-select">
                                    <option selected="" disabled="">Select Location</option>
                                    <option value="1">Lagos</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="form-select">
                                    <option selected="" disabled="">Select Media Type</option>
                                    <option value="1">Lagos</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <input type="text" name="" class="form-control form-control-lg" placeholder="Price Per Month">
                                <div class="btn-bottom">
                                    <input type="file" id="uploadAdImage" class="d-none">
                                    <label class="btn btn-regular v3 bg-blue w-100" for="uploadAdImage">
                                        Upload AD Space Image
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

 <section class="section">
            <h2 class="h2 text-center mb-0">View Our AD Spots</h2>
        </section>
        <section class="bg-lightpink py-4 home-adspots-section">
            <div class="container">
                <div class="owl-carousel adspots-carousel">
                    @foreach($Spot as $value)
                    <div class="item">
                        <div class="image">
                            <img src="{{asset('assets/dashboard/images/media')}}/{{$value->file}}" alt="" class="img-fluid">
                        </div>
                        <div class="caption">
                            <p class="btn btn-regular bg-secondary w-100">Featured AD Spot</p>
                            <p>{{$value->country_name}}, {{$value->state_name}}, {{$value->government_name}}</p>
                            <a href="#" class="btn btn-regular bg-white text-black">Book Now</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="home-art-section section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 home-art-block-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <h2 class="title-big text-blue">Lorem Ipsum Title Goes Here</h2>
                                <h4 class="title-sub">Sub-Title Goes Here</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</p>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <img src="{{asset('assets/front/images/Home Vertical.jpg')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 home-art-block-2">
                        <img src="{{asset('assets/front/images/2.jpg')}}" alt="" class="img-fluid">
                        <img src="{{asset('assets/front/images/Home Portrait.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-4 col-md-6 home-art-block-3">
                        <img src="{{asset('assets/front/images/3.jpg')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
        @endsection