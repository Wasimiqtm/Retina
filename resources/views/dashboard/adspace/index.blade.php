@extends('dashboard.layout.index')
@section('content')
<div class="row">
                        <div class="col-xl-12">
                            <div class="create-compaigns mange-compaigns navbar navbar-expand d-flex justify-content-between mb-4 mb-lg-5">
                                <h3 class="h3">List a New AD Space</h3>
                            </div>

                            <form class="form adspot-form" action="{{ route('dashboard.adspace') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                            <input type="text" required name="spot_name" placeholder="Enter your AD Spot Name" class="form-control">
                                        </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                            <input type="text" required name="price" placeholder="Enter your AD Spot Price" class="form-control">
                                        </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <p class="mb-2 fs-16 fw-bold mb-0">Location</p>

                                            <div class="col-xl-4">
                                                <div class="form-group mb-md-0">
                                                    <select class="form-select form-control" name="country" id="Country" required>
                                                        <option value="" selected disabled>Select Country</option>
                                                        @foreach($Country as $value)
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="form-group mb-md-0">
                                                    <select class="form-select form-control" name="state" id="State" required>
                                                        <option selected disabled>Select State</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="form-group mb-md-0">
                                                    <select class="form-select form-control" name="gov_area" id="Government" required>
                                                        <option selected disabled>Select Local Government Area</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <p class="mb-2 fs-16 fw-bold mb-0">Select Media Type</p>
                                            </div>
                                            <div class="col-xl-6 mt-4">
                                                <div class="px-2 mb-3 mb-xl-0">
                                                    <div class="row select-media-type gx-5">
                                                        <div class="form-check form-image-check p-0 col-4">
                                                            <input type="radio" value="image" name="media_type" id="adSpot1" class="btn-check form-check-input">
                                                            <label class="adspot-btn-check form-check-label" for="adSpot1">
                                                                <img src="{{asset('assets/dashboard/images/image.jpg')}}" alt="" class="img-fluid">
                                                                Image
                                                                <i class="fas fa-check"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-image-check p-0 col-4">
                                                            <input type="radio" value="audio_image" name="media_type" id="adSpot2" class="btn-check form-check-input">
                                                            <label class="adspot-btn-check form-check-label" for="adSpot2">
                                                                <img src="{{asset('assets/dashboard/images/podcast.jpg')}}" alt="" class="img-fluid">
                                                                Image With Audio
                                                                <i class="fas fa-check"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-image-check p-0 col-4">
                                                            <input type="radio" value="video" name="media_type" id="adSpot3" class="btn-check form-check-input">
                                                            <label class="adspot-btn-check form-check-label" for="adSpot3">
                                                                <img src="{{asset('assets/dashboard/images/video.jpg')}}" alt="" class="img-fluid">
                                                                Video
                                                                <i class="fas fa-check"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group mb-3">
                                                    <input id="searchTextField" type="text" required name="address" placeholder="Enter the Area (Street Name, Area, etc)" class="form-control">
                                                </div>
                                                <div class="form-group inputDnD mb-3 mb-md-0">
                                                    <input type="file" name="file" class="form-control-file text-danger font-weight-bold" id="inputFile" onchange="readUrl(this)" data-title="Click to Upload Your AD Spot Photo">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-xl-4">
                                                <div class="row">
                                                     <p class="mb-2 fs-16 fw-bold mb-0">Dimentions</p>
                                                    <div class="col-md-5">
                                                       <div class="form-group mb-md-0">
                                                    <input type="text" required name="dimention1" class="form-control">
                                                </div>
                                                    </div>*
                                                    <div class="col-md-5">
                                                         <div class="form-group mb-md-0">
                                                    <input type="text" required name="dimention2" class="form-control">
                                                </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-4">
                                                <p class="mb-2 fs-16 fw-bold mb-0">Hight</p>
                                                <div class="form-group mb-md-0">
                                                    <select class="form-select form-control" name="hight" id="State">
                                                        <option value="" selected disabled>Select Hight</option>
                                                        <option value="Moderate" >Moderate</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <p class="mb-2 fs-16 fw-bold mb-0">Lighting</p>
                                                <div class="form-group mb-md-0">
                                                    <input type="text" required placeholder="Enter Lightning" name="lightning" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <p class="mb-2 fs-16 fw-bold mb-0">Brand</p>
                                                 <div class="form-group mb-md-0">
                                                    <input type="text" required placeholder="Enter Brand Name" name="brand" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <p class="mb-2 fs-16 fw-bold mb-0">Medium</p>
                                                 <div class="form-group mb-md-0">
                                                    <input type="text" required placeholder="Enter Medium " name="medium" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <p class="mb-2 fs-16 fw-bold mb-0">Side of road</p>
                                                <div class="form-group mb-md-0">
                                                    <select class="form-select form-control" name="road" >
                                                        <option value="" selected disabled>Select Road Side</option>
                                                        <option value="Left" >Left</option>
                                                        <option value="Right" >Right</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-xl-4">
                                                <p class="mb-2 fs-16 fw-bold mb-0">Orientation</p>
                                                 <div class="form-group mb-md-0">
                                                    <input type="text" required placeholder="Enter Orientation" name="orientation" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <p class="mb-2 fs-16 fw-bold mb-0">Clutter</p>
                                                 <div class="form-group mb-md-0">
                                                    <input type="text" required placeholder="Enter Clutter " name="clutter" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                <p class="mb-2 fs-16 fw-bold mb-0">Site Run Up</p>
                                                <div class="form-group mb-md-0">
                                                     <input type="text" required placeholder="Enter Site Run Up " name="runup" class="form-control">
                                                </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                <p class="mb-2 fs-16 fw-bold mb-0">Faces</p>
                                                <div class="form-group mb-md-0">
                                                     <input type="text" required placeholder="Enter Faces " name="faces" class="form-control">
                                                </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-regular bg-blue h-100 text-center w-100"><i class="fas fa-plus fa-5x"></i> <span>Add</span></button>
                                    </div>
                                </div>
                            </form>


                            <div class="create-compaigns mange-compaigns navbar navbar-expand d-flex justify-content-between mt-4 mb-4">
                                <h3 class="h3">Your Listed AD Spaces</h3>

                                <div class="search-box notific-dropdown px-0">
                                    <input type="button" id="dropdownMenu02" class="form-control px-4 form-select" value="Filter">
                                    <div class="input-modal dropdownMenu02 p-0">
                                        <ul class="list-unstyled mb-0">
                                            <li><button type="button" value="Individual">Last 7 Days</button></li>
                                            <li><button type="button" value="Business">Last One Month</button></li>
                                            <li><button type="button" value="Business">Custom Calendar</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="compaigns-notific adspot-list">
                                <ul>
                                    @if(count($AdSpace) > 0)
                                    @foreach($AdSpace as $value)
                                    <li class="notification">
                                        <div class="adspot-row d-flex align-items-center">
                                            <div class="adspot-col-1">
                                                <span class="text-muted">{{$value->ad_name}}</span>
                                            </div>
                                            <div class="adspot-col-2 nav">
                                                <p class="text-muted">{{$value->country_name}}</p>
                                                <p class="text-muted">{{$value->state_name}}</p>
                                                <p class="text-muted">{{$value->government_name}}</p>
                                                <p class="text-muted">
                                                @if($value->media_type == 'image')
                                                Image AD
                                                @else
                                                Video AD
                                                @endif
                                                </p>
                                                <p class="text-muted">{{$value->created_at}}</p>
                                            </div>
                                            <div class="adspot-col-3 mange-compaigns">
                                                <div class="search-box notific-dropdown px-0">
                                                    <input type="button" id="dropdownMenu03" class="form-control dropdown-act px-4 form-select" value="">
                                                    <div class="input-modal dropdownMenu03 adspot-act-dropdown-menu p-0">
                                                        <ul class="list-unstyled mb-0">
                                                            <li><button type="button" value="Individual">View Details</button></li>
                                                            <li><button type="button" onclick="deleteAd({{$value->id}})" value="Business">Delete AD Space</button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    @else
                                    <li class="notification">
                                        <a class="text-muted">You have no listed AD Spot Here</a>
                                    </li>
                                    @endif
                                </ul>
                                <div class="notific-review-pages">
                                    <nav aria-label="Page navigation example">
                                      {!! $AdSpace->links('vendor.pagination.custom') !!}
                                    </nav>

                                </div>
                            </div>


                        </div>
                    </div>
@endsection
@push('script')

{{--google map key script--}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHH2WyrHbuChuvGc1zkbY3LwiODEF8zGI&libraries=places"></script>

<script type="text/javascript">

    /*places autocomplete starts*/
    function init() {
        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);
    }
    google.maps.event.addDomListener(window, 'load', init);
    /*places autocomplete ends*/

    /*prevent form submit on enter starts*/
    $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });
    /*prevent form submit on enter ends*/

    $('#Country').on('change',function() {
    var country = $(this).val();
    var url = '{{ url('/') }}/dashboard/adspace/state/'+country;
  $.ajax({
   url:url,
   success:function(data)
   {
    if (data) {
                var html = '<option value="" selected disabled>Select State</option>';
                $.each( data, function( key, value ) {
         html +='<option value="'+value.id+'">'+value.name+'</option>'
          });
                $("#State").html(html);
                html = '<option value="" selected disabled>Select Local Government Area</option>'
                $("#Government").html(html);
            }

   }
  });
})

$('#State').on('change',function() {
    var state = $(this).val();
    var url = '{{ url('/') }}/dashboard/adspace/government/'+state;
  $.ajax({
   url:url,
   success:function(data)
   {
    if (data) {
                var html = '<option selected disabled>Select Local Government Area</option>';
                $.each( data, function( key, value ) {
         html +='<option value="'+value.id+'">'+value.name+'</option>'
          });
                $("#Government").html(html);
            }

   }
  });
})

function deleteAd(id)
{
    $token = '{{ csrf_token() }}';
    var result = confirm('Are you sure to delete?');
    var url = '{{ url('/') }}/dashboard/adspace/delete/'+id;
    if (result) {
        $.ajax({
            url: url,
            success: function (response) {
                console.log(response.result.success);
                if (response.result.success) {
                    iziToast.success({
                        title: 'Ok',
                        position: 'topRight',
                        message: response.result.success
                    });
                    location.reload();
                }
            }
        })
    }
}
</script>
@endpush
