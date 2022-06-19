@extends('home')
@section('title', 'AdSpace | RETINAAD')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div
                    class="create-compaigns mange-compaigns navbar navbar-expand d-flex justify-content-between mb-4 mb-lg-5">
                    <h3 class="h3">Edit Screen Type</h3>
                </div>

                <form class="form adspot-form" id="screen-type-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" class="form-control" value="{{ $screenType->id }}">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <p class="mb-2 fs-16 fw-bold mb-0">Screen Type</p>

                                <div class="col-xl-4">
                                    <div class="form-group mb-md-0">
                                        <input type="text" name="name" placeholder="Enter Screen Name"
                                               class="form-control" value="{{ $screenType->name }}">
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group mb-md-0">
                                        <input type="text" name="price" placeholder="Enter Price"
                                               class="form-control" value="{{ $screenType->price }}"
                                               oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group mb-md-0">
                                        <input type="text" name="size" placeholder="Enter Screen Size in Inches"
                                               class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="{{ $screenType->size }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-regular bg-blue h-100 text-center w-100"><i
                                    class="fas fa-plus fa-5x"></i> <span>Update</span></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $token = '{{ csrf_token() }}';
        $screenType = '{{ url('screen-type') }}';
        $(document).ready(function () {

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
                        swal("Success!", response.message, "success");
                        setTimeout(function () {
                            window.location.href = '{{ url('screen-type') }}';
                        }, 2000);
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
    </script>

@endsection
