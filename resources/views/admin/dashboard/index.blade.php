@extends('home')
@section('title', 'Dashboard | RETINAAD')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="create-compaigns mange-compaigns navbar navbar-expand d-flex justify-content-between mb-3">
                    <h3 class="h3">Dashboard</h3>

                    <div class="search-box notific-dropdown px-0">
                        <input type="button" id="dropdownMenu02" class="form-control px-4 form-select" value="Filter">
                        <div class="input-modal dropdownMenu02 p-0">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <button type="button" value="Individual">Last 7 Days</button>
                                </li>
                                <li>
                                    <button type="button" value="Business">Last One Month</button>
                                </li>
                                <li>
                                    <button type="button" value="Business">Custom Calendar</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="piechart-box card-box">
                    <div id="PieChart1"></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="piechart-box card-box">
                    <div id="PieChart2"></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="piechart-box card-box">
                    <div id="PieChart3"></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-box px-5">
                    <p class="mb-0">23</p>
                    <p class="mb-0">Total Campaigns</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box px-5">
                    <p class="mb-0">23</p>
                    <p class="mb-0">Total AD Spaces</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box px-5">
                    <p class="mb-0">23</p>
                    <p class="mb-0">Total Media Upload</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-box v2 px-5">
                    <p class="mb-0">N230,500</p>
                    <p class="mb-0">Total Commissions</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-box v2 px-5">
                    <p class="mb-0">N120,300</p>
                    <p class="mb-0">Total Withdrawals</p>
                </div>
            </div>

            <div class="col-md-12">
                <div id="barchart_material"></div>
            </div>
        </div>

         <div class="create-compaigns mange-compaigns navbar navbar-expand d-flex justify-content-between mt-4 mb-4">
                <h3 class="h3">User's List</h3>

                <div class="search-box notific-dropdown px-0">
                    <input type="button" id="dropdownMenu02" class="form-control px-4 form-select" value="Filter">
                    <div class="input-modal dropdownMenu02 p-0">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <button type="button" value="Individual">Last 7 Days</button>
                            </li>
                            <li>
                                <button type="button" value="Business">Last One Month</button>
                            </li>
                            <li>
                                <button type="button" value="Business">Custom Calendar</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                        </thead>
                        <tbody id="body-data"></tbody>
                    </table>
                </div>
                <div class="paq-pager m-1"></div>
            </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        $token = '{{ csrf_token() }}';
        $getUsers = '{{ url('get/users') }}';
        $deleteUser = '{{ url('delete') }}';
        $page = 1;
        $perPage = 10;
        $(document).ready(function () {
            getUsers();
            pieChart1();
            pieChart2();
            pieChart3();
            barChart();
        });

        $(document).on("click", '.paq-pager ul.pagination a', function (e) {
            e.preventDefault();
            $page = $(this).attr('href').split('page=')[1];
            getUsers();
        });

        function getUsers() {
            $formData = {
                '_token': $token,
                per_page:$perPage,
                page:$page,
            };
            $.ajax({
                url: $getUsers,
                type: 'GET',
                data: $formData,
                success: function (response) {
                    $('#body-data').html('');
                    var html = '';
                    if (response.users.data) {
                        $.each(response.users.data, function (i, v) {
                            html += '<tr>' +
                                        '<td>'+v.name+'</td> \n' +
                                        '<td>'+v.email+'</td>\n' +
                                        '<td><a href="javascript:void(0)" class="text-danger delete_user" id="user_' + v.id + '"><i class="fas fa-trash-alt"></i></a></td>\n' +
                                    '</tr>';
                            $('#body-data').html(html);
                        });
                        if (response.pager !== 'undefined') {
                            $('.paq-pager').html(response.pager);
                        }
                    }
                }
            })
        }

        $('body').on('click', '.delete_user', function () {
           var id = $(this).attr('id');
           id = id.split('_')[1];
           var result = confirm(('Are you sure to delete?'));
           if (result) {
               $.ajax({
                   url: $deleteUser + '/' + id + '/user',
                   type:'DELETE',
                   data:$formData,
                   success:function (response) {
                       if (response.success == true) {
                           getUsers();
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

        google.charts.load('current', {packages: ['corechart']});

        google.charts.setOnLoadCallback(pieChart1);
        google.charts.setOnLoadCallback(pieChart2);
        google.charts.setOnLoadCallback(pieChart3);

        function pieChart1() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Element');
            data.addColumn('number', 'Decimal');
            data.addRows([
                ['Active Vs', 600],
                ['Completed Campaigns', 500]
            ]);

            var options = {
                legend: 'bottom',
                width: '100%',
                height: '85%',
                colors: ['#00E396', '#008FFB'],
                chartArea: {left: 0, top: 0, width: '100%', height: '85%'}
            };

            // Instantiate and draw the chart.
            var chart = new google.visualization.PieChart(document.getElementById('PieChart1'));
            chart.draw(data, options);
        }

        function pieChart2() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Element');
            data.addColumn('number', 'Decimal');
            data.addRows([
                ['Successful Vs', 600],
                ['Failed Payments', 200]
            ]);

            var options = {
                legend: 'bottom',
                width: '100%',
                height: '85%',
                colors: ['#00E396', '#008FFB'],
                chartArea: {left: 0, top: 0, width: '100%', height: '85%'}
            };

            // Instantiate and draw the chart.
            var chart = new google.visualization.PieChart(document.getElementById('PieChart2'));
            chart.draw(data, options);
        }

        function pieChart3() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Element');
            data.addColumn('number', 'Decimal');
            data.addRows([
                ['Commissions Vs', 600],
                ['Withdrawal', 300]
            ]);

            var options = {
                legend: 'bottom',
                width: '100%',
                height: '85%',
                colors: ['#00E396', '#008FFB'],
                chartArea: {left: 0, top: 0, width: '100%', height: '85%'}
            };

            // Instantiate and draw the chart.
            var chart = new google.visualization.PieChart(document.getElementById('PieChart3'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages': ['bar']});
        google.charts.setOnLoadCallback(barChart);

        function barChart() {
            var data = google.visualization.arrayToDataTable([
                ['', ''],
                ['1', 1400],
                ['2', 1170],
                ['3', 660],
                ['4', 1430],
                ['5', 1230],
                ['6', 1130],
                ['7', 1280],
                ['8', 1100],
                ['9', 980],
                ['10', 1140],
                ['11', 1070],
                ['12', 1060],
                ['13', 1130],
                ['14', 1230],
                ['15', 1330],
                ['16', 1330],
                ['17', 1330],
                ['18', 1330],
                ['19', 1330],
                ['20', 1030]
            ]);

            var options = {
                bars: 'vertical',
                colors: ['#124a95'],
                legend: {position: 'none'}
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, options);
        }
    </script>
@endsection