@extends('home')
@section('title', 'AdSpace | RETINAAD')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div
                    class="create-compaigns mange-compaigns navbar navbar-expand d-flex justify-content-between mb-4 mb-lg-5">
                    <h3 class="h3">List a New Screen Size</h3>
                </div>

                <form class="form adspot-form" id="screen-type-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <p class="mb-2 fs-16 fw-bold mb-0">Screen Type</p>

                                <div class="col-xl-4">
                                    <div class="form-group mb-md-0">
                                        <input type="text" name="name" placeholder="Enter Screen Name"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group mb-md-0">
                                        <input type="text" name="price" placeholder="Enter Price"
                                               class="form-control"
                                               oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group mb-md-0">
                                        <input type="number" name="size" placeholder="Enter Screen Size in Inches"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-regular bg-blue h-100 text-center w-100"><i
                                    class="fas fa-plus fa-5x"></i> <span>Add</span></button>
                        </div>
                    </div>
                </form>

                <div
                    class="create-compaigns mange-compaigns navbar navbar-expand d-flex justify-content-between mt-4 mb-4">
                    <h3 class="h3">Your Listed Screen Sizes</h3>

                    <div class="search-box notific-dropdown px-0">
                        <input type="button" id="dropdownMenu02" class="form-control px-4 form-select" value="Filter">
                        <div class="input-modal dropdownMenu02 p-0">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <button type="button" class="filters" id="filter_all">All</button>
                                </li>
                                <li>
                                    <button type="button" class="filters" id="filter_last-week">Last 7 Days</button>
                                </li>
                                <li>
                                    <button type="button" class="filters" id="filters_last-month">Last One Month
                                    </button>
                                </li>
                                <li>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#custom-calendar">
                                        Custom Calendar
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="compaigns-notific adspot-list" id="body-data"></div>
                <div class="paq-pager m-3"></div>
            </div>
        </div>
    </div>

    <div class="modal v2 v3 fade" id="custom-calendar" tabindex="-1">
        @include('modals._custom-calendar')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $token = '{{ csrf_token() }}';
        $show = '{{ url('show/screen-type/data') }}';
        $screenType = '{{ url('screen-type') }}';
        $page = 1;
        $perPage = 10;
        $customDate = '';
        $filterType = 'all';
        $(document).ready(function () {
            showData();
        });

        $(".flat-picker").flatpickr({
            dateFormat: 'd-m-Y',
            autoclose: true,
        });

        $('body').on("click", '#custom_date_filter', function (e) {
            $customDate = $('.flat-picker').val();
            $filterType = 'by-calendar';
            showData();
        });

        $('body').on("click", '.filters', function (e) {
            var id = $(this).attr('id');
            $filterType = id.split('_')[1];
            $customDate = '';
            showData();
        });

        $(document).on("click", '.paq-pager ul.pagination a', function (e) {
            e.preventDefault();
            $page = $(this).attr('href').split('page=')[1];
            showData();
        });

        $('#screen-type-form').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: $screenType,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success == true) {
                        var form = $('#screen-type-form')[0];
                        form.reset();
                        showData();
                        swal("Success!", response.message, "success");
                    } else {
                        swal("Error!", response.message, "error");
                    }
                },
                error: function (error) {
                    $message = '';
                    $message = '';
                    $.each(error.responseJSON.errors, function (i, v) {
                        $message += v + "\n";
                    });
                    swal("Error!", $message, "error");
                }
            })
        });

        function showData() {
            $formData = {
                '_token': $token,
                per_page: $perPage,
                page: $page,
                date: $customDate,
                filter_type: $filterType,
            };
            $.ajax({
                url: $show,
                type: 'GET',
                data: $formData,
                success: function (response) {
                    $('#body-data').html('');
                    var html = '<li class="notification" style="background: #d6dadf !important;">\n' +
                        '          <div class="adspot-row d-flex align-items-center">\n' +
                        '              <div class="adspot-col-1">\n' +
                        '                  <span class="text-muted">Name</span>\n' +
                        '              </div>\n' +
                        '              <div class="adspot-col-2 nav">\n' +
                        '                  <p class="text-muted">Price</p>\n' +
                        '                  <p class="text-muted">Screen Size</p>\n' +
                        '              </div>\n' +
                        '              <div class="adspot-col-3 mange-compaigns">\n' +
                        '                  <div class="search-box notific-dropdown px-0">\n' +
                        '                        <span class="text-muted">Name</span>\n' +
                        '                  </div>\n' +
                        '              </div>\n' +
                        '          </div>\n' +
                        '      </li>\n';
                    if (response.data.data) {
                        $.each(response.data.data, function (i, v) {
                            html += '<ul>\n' +
                                '      <li class="notification" id="screen-type_' + v.id + '">\n' +
                                '          <div class="adspot-row d-flex align-items-center">\n' +
                                '              <div class="adspot-col-1">\n' +
                                '                  <span class="text-muted">' + v.name + '</span>\n' +
                                '              </div>\n' +
                                '              <div class="adspot-col-2 nav">\n' +
                                '                  <p class="text-muted">' + v.price + '</p>\n' +
                                '                  <p class="text-muted">' + v.size + '</p>\n' +
                                '              </div>\n' +
                                '              <div class="adspot-col-3 mange-compaigns">\n' +
                                '                  <div class="search-box notific-dropdown px-0">\n' +
                                '                      <input type="button" id="dropdownMenu_' + v.id + '"\n' +
                                '                             class="form-control dropdown-act screen-type-action px-4 form-select" value="">\n' +
                                '                      <div class="input-modal dropdownMenu03 adspot-act-dropdown-menu p-0" id="screen-type-action_' + v.id + '">\n' +
                                '                          <ul class="list-unstyled mb-0">\n' +
                                '                              <li>\n' +
                                '                                  <button type="button" class="edit_screen_type" id="edit_' + v.id + '">Edit</button>\n' +
                                '                              </li>\n' +
                                '                              <li>\n' +
                                '                                  <button type="button" class="delete_screen_type" id="delete_' + v.id + '">Delete</button>\n' +
                                '                              </li>\n' +
                                '                          </ul>\n' +
                                '                      </div>\n' +
                                '                  </div>\n' +
                                '              </div>\n' +
                                '          </div>\n' +
                                '      </li>\n' +
                                '   </ul>';
                        });
                        $('#body-data').html(html);
                        if (response.pager !== 'undefined') {
                            $('.paq-pager').html(response.pager);
                        }
                    } else {
                        swal("Error!", response.message, "error");
                    }
                },
                error: function (error) {
                    $message = '';
                    $message = '';
                    $.each(error.responseJSON.errors, function (i, v) {
                        $message += v + "\n";
                    });
                    swal("Error!", $message, "error");
                }
            })
        }

        $('body').on('click', '.screen-type-action', function () {
            var id = $(this).attr('id');
            id = id.split('_')[1];
            $('.adspot-act-dropdown-menu').hide();
            $('#screen-type-action_' + id).toggleClass('d-block');
        });

        $('body').on('click', '.edit_screen_type', function () {
            var id = $(this).attr('id');
            id = id.split('_')[1];
            $editUrl = $screenType + '/' + id + '/edit';
            window.location.href = $editUrl;
        });

        $('body').on('click', '.delete_screen_type', function () {
            var result = confirm('Are you sure to delete?');
            if (result) {
                var id = $(this).attr('id');
                id = id.split('_')[1];
                $.ajax({
                    url: $screenType + '/' + id,
                    type: 'DELETE',
                    data: {'_token': $token},
                    success: function (response) {
                        if (response.success == true) {
                            showData();
                            swal('Success', response.message, 'success');
                        }
                    },
                    error: function (error) {
                        $message = '';
                        $message = '';
                        $.each(error.responseJSON.errors, function (i, v) {
                            $message += v + "\n";
                        });
                        swal("Error!", $message, "error");
                    }
                })
            }
        });

    </script>

@endsection
