@extends('dashboard.layout.index')
@section('content')
<div class="row">
                        <div class="col-xl-6">
                            <div class="create-compaigns navbar navbar-expand d-flex justify-content-between">
                                <h3 class="h3">Billing Information </h3>
                                <ul class="navbar-nav v2 v3">
                                    <li class="nav-item">
                                        <a href="page7.html" class="nav-link">Fund</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#withdrawModal" role="button" data-bs-toggle="modal" data-bs-target="#withdrawModal" class="nav-link"> Withdraw</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="billing-info-jumbotron">
                                <div class="owl-carousel billing-info-carousel">
                                    <div class="item total-bal-content" data-pill_content="total-bal-pill">
                                        <p class="bal-desc">Your Retina Total Balance</p>
                                        <p class="price">₦350,000</p>
                                        <p class="date">Last Activity: Credit  |  7th Feb, 2022</p>
                                    </div>
                                    <div class="item commission-bal-content" data-pill_content="commission-bal-pill">
                                        <p class="bal-desc">Your Retina Commission Balance</p>
                                        <p class="price">₦50,000</p>
                                        <p class="date">Last Activity: Credit  |  7th Feb, 2022</p>
                                    </div>
                                    <div class="item funded-bal-content" data-pill_content="funded-bal-pill">
                                        <p class="bal-desc">Your Retina Funded Balance</p>
                                        <p class="price">₦300,000</p>
                                        <p class="date">Last Activity: Credit  |  7th Feb, 2022</p>
                                    </div>
                                </div>
                                <div class="bi-nav-pills">
                                    <button type="button" class="btn-link total-bal-pill active" data-pill="total-bal-pill">Total Balance</button>
                                    <button type="button" class="btn-link commission-bal-pill" data-pill="commission-bal-pill">Commission Balance</button>
                                    <button type="button" class="btn-link funded-bal-pill" data-pill="funded-bal-pill">Funded Balance</button>
                                </div>
                            </div>

                            <div class="create-compaigns mange-compaigns navbar navbar-expand d-flex justify-content-between">
                                <h3 class="h3 mb-0">Retina Balance Activities</h3>
                                <div class="search-box notific-dropdown px-0">
                                    <input type="button" id="dropdownMenu03" class="form-control px-4 form-select" value="Filter">
                                    <div class="input-modal dropdownMenu03 v2 p-0">
                                        <ul class="list-unstyled mb-0">
                                            <li><button type="button" value="Individual">Earned Commission</button></li>
                                            <li><button type="button" value="Business">Self Funded</button></li>
                                            <li><button type="button" value="Business">Self Withdrawal</button></li>
                                            <li><button type="button" value="Business">AD Payment</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="compaigns-notific v3 mt-1">
                                <ul>
                                    <li class="notification">
                                        <div class="campaign-row">
                                            <div class="campaign-col-1">
                                                <span class="text-muted">6th Mar 2022</span>
                                            </div>
                                            <div class="campaign-col-2">
                                                <h4 class="text-muted h4 fw-bold">Credit: Earned Commission</h4>
                                                <p class="text-muted price">N45,000</p>
                                                <div class="campaign-btn">
                                                    <button type="button" class="btn-link">Transaction ID: 38294820</button>
                                                </div>
                                            </div>
                                            <div class="campaign-col-3">
                                                <div class="campaign-btn">
                                                    <button type="button" class="btn btn-regular bg-blue text-center fw-bold" data-bs-toggle="modal" data-bs-target="#campaignInfoModal">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="notification">
                                        <div class="campaign-row">
                                            <div class="campaign-col-1">
                                                <span class="text-muted">6th Mar 2022</span>
                                            </div>
                                            <div class="campaign-col-2">
                                                <h4 class="text-muted h4 fw-bold">Credit: Earned Commission</h4>
                                                <p class="text-muted price">N45,000</p>
                                                <div class="campaign-btn">
                                                    <button type="button" class="btn-link">Transaction ID: 38294820</button>
                                                </div>
                                            </div>
                                            <div class="campaign-col-3">
                                                <div class="campaign-btn">
                                                    <button type="button" class="btn btn-regular bg-blue text-center fw-bold" data-bs-toggle="modal" data-bs-target="#commissionInfoModal">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="notification">
                                        <div class="campaign-row">
                                            <div class="campaign-col-1">
                                                <span class="text-muted">6th Mar 2022</span>
                                            </div>
                                            <div class="campaign-col-2">
                                                <h4 class="text-muted h4 fw-bold">Credit: Self Funded</h4>
                                                <p class="text-muted price">N45,000</p>
                                                <div class="campaign-btn">
                                                    <button type="button" class="btn-link">Transaction ID: 38294820</button>
                                                </div>
                                            </div>
                                            <div class="campaign-col-3">
                                                <div class="campaign-btn">
                                                    <button type="button" class="btn btn-regular bg-blue text-center fw-bold" data-bs-toggle="modal" data-bs-target="#fundingInfoModal">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="notification">
                                        <div class="campaign-row">
                                            <div class="campaign-col-1">
                                                <span class="text-muted">6th Mar 2022</span>
                                            </div>
                                            <div class="campaign-col-2">
                                                <h4 class="text-muted h4 fw-bold">Debit: Self Withdrawal</h4>
                                                <p class="text-muted price">N45,000</p>
                                                <div class="campaign-btn">
                                                    <button type="button" class="btn-link">Transaction ID: 38294820</button>
                                                </div>
                                            </div>
                                            <div class="campaign-col-3">
                                                <div class="campaign-btn">
                                                    <button type="button" class="btn btn-regular bg-blue text-center fw-bold" data-bs-toggle="modal" data-bs-target="#selfWithdrawModal">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="notification">
                                        <div class="campaign-row">
                                            <div class="campaign-col-1">
                                                <span class="text-muted">6th Mar 2022</span>
                                            </div>
                                            <div class="campaign-col-2">
                                                <h4 class="text-muted h4 fw-bold">Debit: Payment</h4>
                                                <p class="text-muted price">N45,000</p>
                                                <div class="campaign-btn">
                                                    <button type="button" class="btn-link">Transaction ID: 38294820</button>
                                                </div>
                                            </div>
                                            <div class="campaign-col-3">
                                                <div class="campaign-btn">
                                                    <button type="button" class="btn btn-regular bg-blue text-center fw-bold">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                
                            </div>

                            <div class="notific-review-pages">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination nav justify-content-end">
                                        <li>
                                          <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true"><<</span>
                                            <span class="sr-only">Previous</span>
                                          </a>
                                        </li>
                                        <li><a class="page-link active" href="#">1</a></li>
                                        <li><a class="page-link" href="#">2</a></li>
                                        <li><a class="page-link" href="#">3</a></li>
                                        <li><a class="page-link" href="#">4</a></li>
                                        <li><a class="page-link" href="#">5</a></li>
                                        <li><a class="page-link" href="#">6</a></li>
                                        <li>
                                          <a class="page-link active" href="#" aria-label="Previous">
                                            <span aria-hidden="true">>></span>
                                            <span class="sr-only">next</span>
                                          </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-6 mt-5 mt-xl-0">
                            <div class="create-compaigns mange-compaigns navbar navbar-expand d-flex justify-content-between">
                                <h3 class="h3">Manage Your <br> Existing Campaigns</h3>
                                <div class="search-box notific-dropdown px-0">
                                    <input type="button" id="dropdownMenu02" class="form-control px-4 form-select" value="Filter">
                                    <div class="input-modal dropdownMenu02 v2 p-0">
                                        <ul class="list-unstyled mb-0">
                                            <li><button type="button" value="Individual">Successful Payments</button></li>
                                            <li><button type="button" value="Business">Aborted Payments</button></li>
                                            <li><button type="button" value="Business">Failed Payments</button></li>
                                            <li><button type="button" value="Business">Custom Calendar</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                            <!-- notific -->
                            <div class="compaigns-notific mt-3">
                                <ul>
                                    @foreach($Billing as $value)
                                    <li class="notification">
                                        <div class="campaign-row">
                                            <div class="campaign-col-1">
                                                <span class="text-muted">{{$value->created_at}}</span>
                                            </div>
                                            <div class="campaign-col-2">
                                                <h4 class="text-muted h4 fw-bold">Receipt No. {{$value->id}}</h4>
                                                <p class="text-muted">Payment for {{$value->name}} </p>
                                                <div class="campaign-btn">
                                                    <button type="button" class="btn-link">View Details</button>
                                                    <span role="button" class="text-red ms-4">Status: {{$value->status}}</span>
                                                </div>
                                            </div>
                                            <div class="campaign-col-3">
                                                <h4 class="text-muted h4 fw-bold">Amount</h4>
                                                <p class="price text-muted">N{{$value->amount}}</p>
                                                <div class="campaign-btn">
                                                    <button type="button" class="btn btn-link">Download</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                                <div class="notific-review-pages">
                                    <nav aria-label="Page navigation example">
                                      {!! $Billing->links('vendor.pagination.custom') !!}
                                    </nav>
                                  
                                </div>
                            </div>
                        </div>
                    </div>


        <div class="modal fade" id="adSpotsModal" tabindex="-1" aria-labelledby="adSpotsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="h2 text-blue fw-bold mb-4 text-center">AD Spot Preview  |  Select Your Preferrence</h2>
                        <div class="owl-carousel adspots-carousel">
                            <div class="item form-check form-image-check p-0">
                                <input type="checkbox" name="adSpot" id="adSpot1" class="btn-check">
                                <label class="carousel-btn-check" for="adSpot1">
                                    <img src="images/1.jpg" alt="" class="img-fluid">
                                    <i class="fas fa-check"></i>
                                </label>
                            </div>
                            <div class="item form-check form-image-check p-0">
                                <input type="checkbox" name="adSpot" id="adSpot2" class="btn-check">
                                <label class="carousel-btn-check" for="adSpot2">
                                    <img src="images/2.jpg" alt="" class="img-fluid">
                                    <i class="fas fa-check"></i>
                                </label>
                            </div>
                            <div class="item form-check form-image-check p-0">
                                <input type="checkbox" name="adSpot" id="adSpot3" class="btn-check">
                                <label class="carousel-btn-check" for="adSpot3">
                                    <img src="images/1.jpg" alt="" class="img-fluid">
                                    <i class="fas fa-check"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal v2 fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h4 class="h4 modal-title text-blue fw-bold">Withdraw From Retina Balance</h4>
                        <form class="form" method="post">
                            <div class="form-group">
                                <input type="text" name="" class="form-control form-control-lg text-center" placeholder="₦ 000,000,000">
                            </div>
                            <p class="">Withdrawal is Paid Into Your Payout Account</p>
                            <button type="button" class="btn btn-regular v2 bg-blue text-center" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#withdrawSuccessModal">Submit Request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal v2 v6 fade" id="withdrawSuccessModal" tabindex="-1" aria-labelledby="withdrawSuccessModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content py-3">
                    <div class="modal-body text-center">
                        <h4 class="h4 modal-title lh-1 text-blue fw-bold">Request Received</h4>

                        <p class="my-3"><i class="fas fa-check-circle fa-10x text-blue"></i></p>

                        <h4 class="h4 modal-sub text-blue fw-bold lh-1">Your Payout Account will be Credited Within 48hours</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal v2 v3 fade" id="campaignInfoModal" tabindex="-1" aria-labelledby="campaignInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content py-3">
                    <div class="modal-body text-start">
                        <h4 class="h4 modal-title lh-1 text-blue fs-20 fw-bold">Retina Balance Activity Details</h4>
                        <p class="text-muted fw-normal mt-1 mb-3 fs-14">6th Mar 2022  |  Debit  |  For Campaign 23872</p>
                        <p class="price text-muted">N45,000</p>

                        <h4 class="h4 modal-title text-blue fw-bold lh-1 mt-3 mb-1 fs-20">Campaign Information</h4>
                        <p class="text-muted v2 fw-normal lh-1 mb-0 fs-14">Lagos  |  Ikeja  |  Allen Avenue  | Video AD</p>
                        <span class="text-blue">View Campaign</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal v2 v3 fade" id="commissionInfoModal" tabindex="-1" aria-labelledby="commissionInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content py-3">
                    <div class="modal-body text-start">
                        <h4 class="h4 modal-title lh-1 text-blue fs-20 fw-bold">Retina Balance Activity Details</h4>
                        <p class="text-muted fw-normal mt-1 mb-3 fs-14">6th Mar 2022  |  Debit  |  For Commission 23872</p>
                        <p class="price text-muted">N45,000</p>

                        <h4 class="h4 modal-title text-blue fw-bold lh-1 mt-3 mb-1 fs-20">Commission Information</h4>
                        <p class="text-muted v2 fw-normal lh-1 mb-0 fs-14">Your AD Spot in Ikeja</p>
                        <span class="text-blue">View AD Spot</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal v2 v3 fade" id="fundingInfoModal" tabindex="-1" aria-labelledby="fundingInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content py-3">
                    <div class="modal-body text-start">
                        <h4 class="h4 modal-title lh-1 text-blue fs-20 fw-bold">Retina Balance Activity Details</h4>
                        <p class="text-muted fw-normal mt-1 mb-3 fs-14">6th Mar 2022  |  Debit  |  For Self Funded</p>
                        <p class="price text-muted">N45,000</p>

                        <h4 class="h4 modal-title text-blue fw-bold lh-1 mt-3 mb-1 fs-20">Funding Information</h4>
                        <p class="text-muted v2 fw-normal lh-1 fs-14 mb-0">Credited from your Mastercard</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal v2 v3 fade" id="selfWithdrawModal" tabindex="-1" aria-labelledby="selfWithdrawModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content py-3">
                    <div class="modal-body text-start">
                        <h4 class="h4 modal-title lh-1 text-blue fs-20 fw-bold">Retina Balance Activity Details</h4>
                        <p class="text-muted fw-normal mt-1 mb-3 fs-14">6th Mar 2022  |  Debit  |  Withdrawal by You</p>
                        <p class="price text-muted">N45,000</p>

                        <h4 class="h4 modal-title text-blue fw-bold lh-1 mt-3 mb-1 fs-20">Withdrawal Information</h4>
                        <p class="text-muted v2 fw-normal lh-1 fs-14 mb-0">Successfully Credited to your Payout Account</p>
                    </div>
                </div>
            </div>
        </div>
@endsection