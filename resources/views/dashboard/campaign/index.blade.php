@push('style')

@endpush
@extends('dashboard.layout.index')
@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="create-compaigns navbar navbar-expand d-flex justify-content-between">
                <h3 class="h3">Create Place AD <br> In 4 Simple Steps</h3>
                <ul class="navbar-nav v2 v3">
                    {{-- <li class="nav-item">
                        <a href="page18.html" class="nav-link">Saved</a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ route('dashboard.campaign') }}" class="nav-link">New</a>
                    </li>
                    {{-- <li class="nav-item save-btn-link" style="display: none;">
                        <a role="a" class="nav-link">Save >></a>
                    </li> --}}
                </ul>
            </div>
            <form action="{{ route('dashboard.campaign') }}" method="post" enctype="multipart/form-data">
                @CSRF
                <div id="compaigns_wrapper" class="compaigns-wrapper">
                    <div class="compaigns-detail d-flex justify-content-between align-items-start">
                        <div class="compaigns-number">
                            <p>1</p>
                        </div>
                        <div class="compaigns-content">
                            <a class="btn p-0" data-bs-toggle="collapse" data-bs-target="#collapse1" data-bs-parent="#compaigns_wrapper">
                                <h3>Place AD Information</h3>
                                <p class="mb-0">Provide information such as campaign name, description, and objectives of your campaign</p>
                            </a>
                            <div class="collapse" id="collapse1">
                                <div class="mt-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="text" name="name" placeholder="Name Your Campaign">
                                        <input type="textarea"  class="form-control" rows="5" name="description" placeholder="Describe Your Campaign" >
                                    </div>
                                    <div class="check-head">
                                        <h4 class="h4">Select Your Place AD Objectives</h4>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="btn-check" name="objectives[]" id="btn-check-1" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btn-check-1">Brand Awareness</label>
                                    </div>
                                    <!--  -->
                                    <div class="form-check">
                                        <input type="checkbox" class="btn-check" name="objectives[]" id="btn-check-2" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btn-check-2">Sell a Product or Service</label>
                                    </div>
                                    <!--  -->
                                    <div class="form-check">
                                        <input type="checkbox" class="btn-check" name="objectives[]" id="btn-check-3" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btn-check-3">Promote a Cause</label>
                                    </div>
                                    <!--  -->
                                    <div class="form-check">
                                        <input type="radio" class="btn-check" name="objectives[]" id="btn-check-4" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btn-check-4">Political Campaign</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="compaigns-detail d-flex justify-content-between align-items-start">
                        <div class="compaigns-number">
                            <p>2</p>
                        </div>
                        <div class="compaigns-content">
                            <a class="btn p-0" data-bs-toggle="collapse" data-bs-target="#collapse2" data-bs-parent="#compaigns_wrapper">
                                <h3>Place AD Target Selection</h3>
                                <p class="mb-0">Provide information such as target region, local government and specific ares you will like to show your ADs,</p>
                            </a>
                            <div class="collapse" id="collapse2">
                                <div class="mt-4">
                                    <div class="form-select-wrapper">
                                        <select class="form-select Check-Number" id="country" name="country">
                                            <option selected disabled>Select Country</option>
                                            @foreach($Country as $value)
                                                <option value="{{$value->id}}" {{$value->status == 'active' ? '' : 'disabled' }}>{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                        <p class="form-select-msg"  style="display: none;"> <span id="country-msg"></span> Outdoor AD Space Available Here</p>
                                    </div>
                                    <div class="form-select-wrapper">
                                        <select class="form-select Check-Number" id="state" name="state">
                                            <option selected disabled>Select State</option>
                                        </select>
                                        <p class="form-select-msg"  style="display: none;"> <span id="state-msg"></span> Outdoor AD Space Available Here</p>
                                    </div>
                                    <div class="form-select-wrapper">
                                        <select class="form-select Check-Number" id="government" name="government">
                                            <option selected disabled>Select From Available Areas</option>
                                        </select>
                                        <p class="form-select-msg"  style="display: none;"><span id="government-msg"></span> Outdoor AD Space Available Here</p>
                                        <input type="hidden" name="adspot" id="adspot-ids" value="" />
                                    </div>

                                    <div class="form-group">
                                        <a class="btn btn-regular bg-blue w-100 btn-lg text-center"  onclick="CheckAdSpot()">Preview Available AD Space</a>
                                    </div>
                                    <div id="SelectedAdSpace">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="compaigns-detail d-flex justify-content-between align-items-start">
                        <div class="compaigns-number">
                            <p>3</p>
                        </div>
                        <div class="compaigns-content">
                            <a class="btn p-0" data-bs-toggle="collapse" data-bs-target="#collapse3" data-bs-parent="#compaigns_wrapper">
                                <h3>Place AD Media Upload</h3>
                                <p class="mb-0">See media specification and upload your campaign media based on your target selection</p>
                            </a>
                            <div class="collapse" id="collapse3">
                                <div class="mt-4">
                                    <div class="form-select-wrapper">
                                        <select class="form-select" name="type">
                                            <option selected disabled>Select Media Format</option>
                                            <option value="image">Image</option>
                                            <option value="audio_image">Audio Image</option>
                                            <option value="video">Video</option>
                                        </select>
                                        <p class="form-select-msg">NOTE: Only media format that supports your target selection are available</p>
                                    </div>
                                    <div class="form-group inputDnD">
                                        <input type="file" class="form-control-file text-danger font-weight-bold" name="file"   data-title="Drag and Drop your Media Here">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="compaigns-detail d-flex justify-content-between align-items-start">
                        <div class="compaigns-number">
                            <p>4</p>
                        </div>
                        <div class="compaigns-content">
                            <a class="btn p-0" data-bs-toggle="collapse" data-bs-target="#collapse4" data-bs-parent="#compaigns_wrapper">
                                <h3>Make Payment</h3>
                                <p class="mb-0">Make payment and enjoy the power of Retina ADs</p>
                            </a>
                            <div class="collapse" id="collapse4">
                                <div class="mt-4">
                                    <div class="form-group">
                                        <div class="duration-group campaign-duration-date">
                                            <label>AD Duration:</label>
                                            <input type="text" id="FromDate" name="from" onclick="this.type='date';$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#FromDate').attr('min', maxDate);
});" class="form-select" placeholder="From">
                                            <input type="text" id="ToDate" name="to" onclick="this.type='date';$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#ToDate').attr('min', maxDate);
});" class="form-select" placeholder="To">
                                        </div>
                                        <input style="margin-top: 20px" type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
                                    </div>
                                    <div class="form-group my-3 campaign-price hidden">
                                        <label class="form-select-msg">Thank You Fo the Place Ad</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-regular bg-blue w-100 btn-lg text-center" value="Proceed to Checkout">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade adSpotsModal"  id="adSpotsModal" tabindex="-1" aria-labelledby="adSpotsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h2 class="h2 text-blue fw-bold mb-4 d-flex justify-content-between align-items-center"><span>AD Space Preview  |  Select Your Preferrence</span> <a class="btn-close fs-14 text-dark w-auto d-none" data-bs-dismiss="modal" aria-label="Close">Continue</a> <a class="btn-link text-blue fs-14 text-dark w-auto" data-bs-target="#adSpotsMapModal" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer">View on Map</a></h2>
                                <div class="owl-carousel adspots-carousel">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xl-6 mt-5 mt-xl-0">
            <div class="create-compaigns mange-compaigns navbar navbar-expand d-flex justify-content-between">
                <h3 class="h3">Manage Your <br> Existing Campaigns</h3>
                <div class="search-box notific-dropdown px-0">
                    <input id="dropdownMenu02" class="form-control px-4 form-select" type="button" value="Filter">
                    <div class="input-modal dropdownMenu02 p-0">
                        <ul class="list-unstyled mb-0">
                            <li><button type="button" value="Individual"><a href="{{url('/dashboard/campaign?days=7')}}">Last 7 Days</a></button></li>
                            <li><button type="button" value="Business"><a href="{{url('/dashboard/campaign?days=30')}}">Last One Month</a></button></li>
                            {{--<li><button type="button" value="Business">Custom Calendar</button></li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <!-- notific -->
            <div class="compaigns-notific">
                <ul>
                    @if(count($Campaign) > 0)
                        @foreach($Campaign as $value)
                            <li class="notification">
                                <div class="campaign-row">
                                    <div class="campaign-col-1">
                                        <span class="text-muted">{{$value->created_at}}</span>
                                    </div>
                                    <div class="campaign-col-2">
                                        <h4 class="text-muted h4 fw-bold">{{$value->name}}</h4>
                                        <p class="text-muted">{{$value->country_name}}  |  {{$value->state_name}}  |  {{$value->government_name}} | Image AD</p>
                                        <div class="campaign-btn">
                                            <a href="{{url('dashboard/campaign/'.$value->id)}}" class="btn-link">View Details</a>
                                            <span role="a" class="text-red ms-4">Status: {{$value->status}}</span>
                                        </div>
                                    </div>
                                    <div class="campaign-col-3">
                                        <h4 class="text-muted h4 fw-bold">Price</h4>
                                        <p class="price text-muted">{{$value->amount}}
                                        @if($value->status == 'In Review')
                                            <div class="campaign-btn">
                                                <a class="btn btn-link extend-button" data-bs-toggle="modal" data-bs-target="#ExtendDate" data-id='{{$value->id}}' >Extend</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @else
                        @for ($i = 0; $i <= 4; $i++)
                            <li class="notification">
                                <div class="campaign-row">
                                    <div class="campaign-col-1">
                                        <span class="text-muted"></span>
                                    </div>
                                    <div class="campaign-col-2">
                                        <h4 class="text-muted h4 fw-bold"></h4>
                                        <p class="text-muted"></p>
                                        <div class="campaign-btn">
                                            <a class="btn-link"></a>
                                            <span role="a" class="text-red ms-4"></span>
                                        </div>
                                    </div>
                                    <div class="campaign-col-3">
                                        <h4 class="text-muted h4 fw-bold"></h4>
                                        <p class="price text-muted"></p>
                                        <div class="campaign-btn">
                                            <a class="btn btn-link extend-button" data-bs-toggle="modal" data-bs-target="#ExtendDate" data-id='' ></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endfor
                    @endif
                </ul>
                <div class="notific-review-pages">
                    <nav aria-label="Page navigation example">
                        {!! $Campaign->links('vendor.pagination.custom') !!}
                    </nav>

                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        #map {
            height: 500px;
        }
    </style>
    <div class="modal fade adSpotsModal" id="adSpotsMapModal" tabindex="-1" aria-labelledby="adSpotsMapModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <h2 class="h2 text-blue fw-bold mb-4 d-flex justify-content-between align-items-center" style="cursor: pointer"><span>AD Space Preview  |  Select Your Preferrence</span> <a class="btn-link text-blue fs-14 text-dark w-auto" data-bs-toggle="modal" data-bs-target="#adSpotsModal" data-bs-dismiss="modal" aria-label="Close">Preview AD Space</a></h2>

                    {{--  <div class="adspacemap d-flex justify-content-center align-items-center" > --}}
                    <div id="map"></div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal v2 fade" id="ExtendDate" tabindex="-1" aria-labelledby="changeBankModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form class="form login-form profile-form px-5 py-3" method="post" action="{{ route('dashboard.extend/campaign') }}">
                        @csrf
                        <p class="mb-2 fs-14 fw-bold mb-4 text-uppercase">Extend Your Compaign Time</p>
                        <div class="form-group">
                            <div class="duration-group campaign-duration-date">
                                <input type="hidden" id="compaign-id" name="id">
                                <input required type="text" class="form-control" id="ExtDate" name="date" onclick="this.type='date';$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#ExtDate').attr('min', maxDate);
});" class="form-select" placeholder="To">

                            </div>
                        </div>
                        <div class="form-group mb-md-0">
                            <input type="submit" class="btn btn-success mt-3" value="Extend">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHH2WyrHbuChuvGc1zkbY3LwiODEF8zGI&callback=initMap">
    </script>
    <script type="text/javascript">
        $('.extend-button').click(function() {
            var value = $(this).attr("data-id");
            $('#compaign-id').val(value);
        })
        function AdSelectedData() {
            var valdata = $("input[type='radio'][name='adspot']:checked").val();
            var url = '{{ url('/') }}/dashboard/compain/selected/adspot/'+valdata;
            $.ajax({
                url:url,
                success:function(data)
                {
                    if (data) {
                        var html = '<div class="form-select-msg" > <h5 >'+data.name+'</h5><tr><td >Dimentions</td> : <td>'+data.dimension+' Metres</td></tr><br> <tr><td>Hight</td> : <td>'+data.hight+'</td>  </tr><br> <tr><td>Price</td> : <td>N'+data.price+'</td></tr><br> <tr> <td>Lightning</td> : <td>'+data.lightning+'</td> </tr><br> <tr> <td>Brand</td> : <td>'+data.brand+'</td> </tr><br> <tr>  <td>Medium</td> : <td>'+data.medium+'</td> </tr><br>  <tr>  <td>Side of Road</td> : <td>'+data.side_road+'</td>  </tr><br> <tr> <td>Orientation</td> : <td>'+data.orientation+'</td> </tr><br>  <tr>  <td>Clutter</td> : <td>'+data.clutter+'</td></tr><br> <tr> <td>Site Run Up</td> : <td>'+data.runup+'</td>  </tr><br> <tr> <td>Faces</td> : <td>'+data.faces+'</td> </tr><br> <tr> <td>Address</td> : <td>'+data.address+'</td> </tr><br> </div>';
                        $("#SelectedAdSpace").html(html);
                    }

                }
            });
        }
        function CheckAdSpot()
        {
            var country = $('#country').val();
            var state = $('#state').val();
            var government = $('#government').val();
            if (!country == '' && !state == '' && !government == '') {

                var url = '{{ url('/') }}/dashboard/campaign/check/adspot/'+country+'/'+state+'/'+government;
                $.ajax({
                    url:url,
                    success:function(data)
                    {
                        // console.log(data)
                        if (data) {
                            // alert(data['Government'].latitude)
                            var html ='<div class="owl-carousel adspots-carousel">';
                            var img ='';
                            $.each( data['AdSpace'], function( key, value ) {

                                img = '{{asset('assets/dashboard/images/media')}}/'+value.file;
                                html +=' <div class="item form-check form-image-check p-0"> <input type="radio" value="'+value.id+'" name="adspot" id="adSpot'+key+'" class="btn-check" onclick="AdSelectedData()"> <label class="carousel-btn-check" for="adSpot'+key+'"> <img src="'+img+'" alt="" class="img-fluid"> <i class="fas fa-check"></i></label><ul class="mt-4 fs-20 fw-normal lh-1-2 list-unstyled"><li>Dimensions '+value.dimension+' Metres</li><li>Hight: '+value.hight+'</li><li>Price: N'+value.price+'</li> <li>Lighting: '+value.lightning+'</li> <li>Brand: '+value.brand+'</li> <li>Medium: '+value.medium+'</li><li>Side of Road: '+value.side_road+'</li><li>Orientation: '+value.orientation+'</li> <li>Clutter: '+value.clutter+'</li> <li>Site Run Up: '+value.runup+'m</li><li>Faces: '+value.faces+'</li> <li>Address: '+value.address+'</li> </ul></div>'
                            });
                            // html +='</div>';
                            $(".adspots-carousel").html(html);
                            $('.adspots-carousel').owlCarousel({
                                loop: false,
                                margin: 30,
                                nav: true,
                                responsiveClass: true,
                                responsive: {
                                    0: {
                                        items: 1
                                    },
                                    600: {
                                        items: 2
                                    },
                                    1000: {
                                        items: 3
                                    }
                                }
                            });
                            $('#adspots-data').append(html);
                        }
                        $('#adSpotsModal').modal('show');
// alert(data['Government'].latitude)

                        initMap(data['AdSpace'],data['Government'])

                        window.initMap = initMap;
                        $(function() {
                            $('#adSpotsMapModal').on('shown', function () {
                                google.maps.event.trigger(map, "resize");
                            });
                        });

                    }
                });

            }else{
                notify('error', 'Fill All Target Selection.');
            }

        }

        $('.Check-Number').on('change',function(argument) {
            var value = $(this).val();
            var colunm =   $(this).attr("id");
            var url = '{{ url('/') }}/dashboard/campaign/number/check/adspot/'+value+'/'+colunm;
            $.ajax({
                url:url,
                success:function(data)
                {
                    if (data) {
                        if (colunm == 'country') {
                            $('#country-msg').html(data.count);
                        }
                        if (colunm == 'state') {
                            $('#state-msg').html(data.count);
                        }
                        if (colunm == 'government') {
                            $('#government-msg').html(data.count);
                            $('#adspot-ids').val(data.adSpotIds.join(', '));
                        }
                    }

                }
            });
        });
        $('#country').on('change',function() {
            var country = $(this).val();
            var url = '{{ url('/') }}/dashboard/adspace/state/'+country;
            $.ajax({
                url:url,
                success:function(data)
                {
                    if (data) {
                        var html = '<option selected disabled>Select State</option>';
                        $.each( data, function( key, value ) {
                            html +='<option value="'+value.id+'">'+value.name+'</option>'
                        });
                        $("#state").html(html);
                        html = '<option selected disabled>Select From Available Areas</option>'
                        $("#government").html(html);
                    }

                }
            });
        })

        $('#state').on('change',function() {
            var state = $(this).val();
            var url = '{{ url('/') }}/dashboard/adspace/government/'+state;
            $.ajax({
                url:url,
                success:function(data)
                {
                    if (data) {
                        var html = '<option selected disabled>Select From Available Areas</option>';
                        $.each( data, function( key, value ) {
                            html +='<option value="'+value.id+'">'+value.name+'</option>'
                        });
                        $("#government").html(html);
                    }

                }
            });
        })

        $('.campaign-duration-date input').on('change', function() {
            if( $(this).siblings('input').val() && $(this).val() ) {

                $('.campaign-price').removeClass('hidden');
            }
        });

        let map;

        function initMap(AdSpace,Government) {
            var lat = 0;
            var log = 0;
            $.each( AdSpace, function( key, value ) {

                /*load google map*/
                lat = parseFloat(value.latitude)
                log = parseFloat(value.longitude)

                const myLatLng = { lat: lat, lng: log };
                const map = new google.maps.Map(
                    document.getElementById("map"),
                    {
                        zoom: 8,
                        center: myLatLng,
                    }
                );

                /*show marker on map*/
                const marker = new google.maps.Marker({
                    position: myLatLng,
                    map,
                    title: "Hello World!",
                });

                /*info window*/
                const contentString =
                    '<div id="content">' +
                    '<div id="siteNotice">' +
                    "</div>" +
                    '<h3 id="firstHeading" class="firstHeading">'+value.name+'</h3>' +
                    '<div><img style="max-width: 20%;" src="{{asset('/assets/dashboard/images/media')}}'+"/"+value.file+'" /></div>' +
                    '<div id="bodyContent">' +
                    '<p style="margin-top:1rem"><b>Address: </b>'+value.address+'</p>' +
                    "</div>" +
                    "</div>";

                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                });

                marker.addListener("mouseover", () => {
                    infowindow.open({
                        anchor: marker,
                        map,
                        shouldFocus: false,
                    });
                });

                // assuming you also want to hide the infowindow when user mouses-out
                marker.addListener('mouseout', function() {
                    infowindow.close();
                });
            })

            const svgMarker = {
                path: "M10.453 14.016l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
                fillColor: "red",
                fillOpacity: 10,
                strokeWeight: 0,
                rotation: 0,
                scale: 2,
                anchor: new google.maps.Point(15, 30),
            };
            var latlog = new Array();
            $.each( AdSpace, function( key, value ) {
                latlog = { lat: parseFloat(value.latitude) , lng: parseFloat(value.longitude) }
                var marker = new google.maps.Marker({
                    position:latlog,
                    map:map,
                    icon: svgMarker,
                    content:'<h1>Hellow Qordl</h1>'

                })
            });
        }
    </script>
@endpush
