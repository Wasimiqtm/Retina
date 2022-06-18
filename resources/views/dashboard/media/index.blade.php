@extends('dashboard.layout.index')
@section('content')
<div class="row">
                        <div class="col-xl-12">
                            <div class="create-compaigns mange-compaigns navbar navbar-expand d-flex justify-content-between mb-5">
                                <h3 class="h3">Your AD Media</h3>

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

                            <div class="compaigns-notific">
                                <ul>
                                    @foreach($Media as $value)
                                    <li class="notification">
                                        <div class="campaign-row ad-media-row">
                                            <div class="campaign-col-1">
                                                <span class="text-muted">{{$value->created_at}}</span>
                                            </div>
                                            <div class="campaign-col-2 d-flex align-items-center">
                                                <div class="me-3">
                                                    @if($value->type == 'video')
                                                    <img src="{{asset('assets/dashboard/images/video.jpg')}}" class="img-fluid">
                                                    @endif
                                                    @if($value->type == 'audio_image')
                                                    <img src="{{asset('assets/dashboard/images/podcast.jpg')}}" class="img-fluid">
                                                    @endif
                                                    @if($value->type == 'image')
                                                    <img src="{{asset('assets/dashboard/images/image.jpg')}}" class="img-fluid">
                                                    @endif
                                                </div>
                                                <div class="">
                                                    <h4 class="text-muted h6 fw-bold">AD Name</h4>
                                                    <p class="text-muted mb-0">{{$value->name}} <br> Pickup AD</p>
                                                </div>
                                            </div>
                                            <div class="campaign-col-3">
                                                @if($value->status == 'Running')
                                                <p class="price fs-16 text-muted">Status: Active</p>
                                                @endif
                                                @if($value->status == 'Stoped')
                                                <p class="price fs-16 text-muted">Status: Completed</p>
                                                @endif
                                                <div class="campaign-btn">
                                                    <button type="button" class="btn btn-link">Edit</button>
                                                </div>
                                                <div class="campaign-btn">
                                                    <a href="{{asset('assets/dashboard/images/campaign')}}/{{$value->file}}" class="btn btn-link" download="" >Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                             <div class="notific-review-pages">
                                    <nav aria-label="Page navigation example">
                                      {!! $Media->links('vendor.pagination.custom') !!}
                                    </nav>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
@endsection