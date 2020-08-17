@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-content">
            <div class="m-portlet  m-portlet--unair">
                <div class="m-portlet__body  m-portlet__body--no-padding">
                    <div class="row m-row--no-padding m-row--col-separator-xl">
                        <div class="col-md-12 col-lg-6 col-xl-3">
                            <!--begin::Total Profit-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Total Sales
                                    </h4><br>
                                    <span class="m-widget24__desc ">Sales</span>
                                    <span class="m-widget24__stats m--font-brand">L.E {{$totalSales}}</span>
                                    <div class="m--space-10"></div>
                                </div>
                            </div>
                            <!--end::Total Profit-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">
                            <!--begin::New Feedbacks-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Total Customers
                                    </h4><br>
                                    <span class="m-widget24__desc">
				            Customer Review
				        </span>

				            <a href="{{route('customer.index')}}">
                                <span class="m-widget24__stats m--font-info">
                                {{$customers->count()}}
                                </span>
                            </a>

                                    <div class="m--space-10"></div>
                                </div>
                            </div>
                            <!--end::New Feedbacks-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">
                            <!--begin::New Orders-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Total Orders
                                    </h4><br>
                                    <span class="m-widget24__desc">
                                        Order Amount
				        </span>

				            <a href="{{route('order.index')}}">
                                <span class="m-widget24__stats m--font-danger">
                                    {{$orders->count()}}
                                </span>
                            </a>

                                    <div class="m--space-10"></div>
                                </div>
                            </div>
                            <!--end::New Orders-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">
                            <!--begin::New Users-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Total Messages
                                    </h4><br>
                                    <span class="m-widget24__desc">
				            Messages
				        </span>
                                    <a href="#">
                                    <span class="m-widget24__stats m--font-success">
                                            {{$messages->count()}}
                                        </span>
                                    </a>
                                    <div class="m--space-10"></div>
                                </div>
                            </div>
                            <!--end::New Users-->
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div style="padding: 20px; background: #fff; " >
                    <a class="btn btn-danger" href="{{route('admin.daily')}}">Daily</a>
                    <a class="btn btn-success" href="{{route('admin.monthlyChart')}}">Monthly</a>
                    <a class="btn btn-primary" href="{{route('admin.yearlyChart')}}">Yearly</a>
                </div>
                <div class="clearfix"></div>
                <div id="curve_chart" data style="width: 100%; height: 500px"></div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

    var test = <?php echo $output ?> ;
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            var data = google.visualization.arrayToDataTable(test);

            var options = {
                title: 'Company Performance',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
@endsection