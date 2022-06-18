@extends('dashboard.layout.index')
@section('content')
 <div class="row">
                        <div class="col-12-6">
                            <div class="create-compaigns navbar navbar-expand d-flex justify-content-between">
                                <h3 class="h3">Settings</h3>
                            </div>

                            <form class="form login-form profile-form" action="{{ route('dashboard.setting') }}" method="POST" enctype="multipart/form-data">
                                @CSRF
                                <div class="row align-items-center">

                                    <div class="profile-pic-box text-center col-lg-12 mb-3">
                                        <div class="profile-pic">
                                            <label class="-label" for="file">
                                                <span>Change</span>
                                            </label>
                                            <input id="file" type="file" name="file"  onchange="loadFile(event)">
                                            
                                            @if($user->avatar)
                                            <img src="{{asset('assets/dashboard/images/avatars')}}/{{$user->avatar}}" id="output" alt="">
                                            @else
                                            <img src="{{asset('assets/dashboard/images/profile.png')}}" id="output" alt="">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group mb-md-3">
                                            <input type="text" class="form-control border-0" id="date" value="{{$user->first_name}}" name="first_name" placeholder="Tobechukwu">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group mb-md-3">
                                            <input type="text" class="form-control border-0" id="date" value="{{$user->last_name}}" name="last_name" placeholder="Okafor">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group mb-md-3">
                                            <input type="email" class="form-control border-0" id="email" value="{{$user->email}}" name="email" placeholder="Tobeoka@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group mb-md-3">
                                            <input type="tel" class="form-control border-0" id="number" value="{{$user->phone}}" name="phone" placeholder="08062930384">
                                        </div>
                                    </div>
                                    {{-- <div class="col-12"><hr class="my-5"></div> --}}

                                    <p class="mb-2 fs-16 fw-bold mb-0 text-uppercase">YOUR PAYOUT ACCOUNT</p>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group mb-md-0">
                                            <input type="text" class="form-control border-0" id="bank" value="{{$user->bank_name}}" name="bank_name" placeholder="UBA">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group mb-md-0">
                                            <input type="text" class="form-control border-0" id="bankAccount" value="{{$user->account_number}}" name="account_number" placeholder="030303030303">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group mb-md-0">
                                            <a class="btn btn-regular bg-blue btn-lg w-100" data-bs-toggle="modal" data-bs-target="#changeBankModal">Change Password</a>
                                        </div>
                                    </div>

                                   {{--  <p class="mb-2 fs-16 fw-bold mb-0 text-uppercase">RESET YOUR PASSWORD</p>

                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group mb-md-0">
                                            <input type="password" class="form-control border-0" id="password" placeholder="Current Password">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group mb-md-0">
                                            <input type="password" class="form-control border-0" id="password" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group mb-md-0">
                                            <input type="password" class="form-control border-0" id="password" placeholder="Confirm Password">
                                        </div>
                                    </div> --}}
                                   <div class="col-12 mt-4">
                                    <center>
                                       <input type="submit" value="Save Information" class="btn btn-regular" name="" style="background-color:#e85897 ; color: white ;">
                                       </center>
                                   </div>

                                </div>

                            </form>
                        </div>
                    </div>

 <div class="modal v2 fade" id="changeBankModal" tabindex="-1" aria-labelledby="changeBankModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <form class="form login-form profile-form px-5 py-3" action="">
                            <p class="mb-2 fs-14 fw-bold mb-4 text-uppercase">RESET YOUR PASSWORD</p>
                            <div class="form-group mb-4">
                                <input type="text" class="form-control border-0 text-center" id="bank" placeholder="ENTER OLD PASSWORD">
                            </div>
                            <div class="form-group mb-md-4">
                                <input type="text" class="form-control border-0 text-center" id="bankAccount" placeholder="ENTER NEW PASSWORD">
                            </div>
                            <div class="form-group mb-md-2">
                                <input type="text" class="form-control border-0 text-center" id="bankAccount" placeholder="ENTER CONFIRM PASSWORD">
                            </div>
                            <div class="form-group mb-md-0">
                                <input type="submit" class="btn" id="bankAccount" style="background-color:#e85897 ; color: white ;" value="Save Password">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection