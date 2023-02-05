@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-right">Daily</span>
                        <h5 class="card-title mb-0">Cost per Unit</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                $17.21
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span class="text-muted">12.5% <i class="mdi mdi-arrow-up text-success"></i></span>
                        </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 57%;">
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-right">Per Week</span>
                        <h5 class="card-title mb-0">Market Revenue</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                $1875.54
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span class="text-muted">18.71% <i class="mdi mdi-arrow-down text-danger"></i></span>
                        </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 57%;">
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-right">Per Month</span>
                        <h5 class="card-title mb-0">Expenses</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                $784.62
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span class="text-muted">57% <i class="mdi mdi-arrow-up text-success"></i></span>
                        </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 57%;">
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div>
            <!--end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-right">All Time</span>
                        <h5 class="card-title mb-0">Daily Visits</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                1,15,187
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span class="text-muted">17.8% <i class="mdi mdi-arrow-down text-danger"></i></span>
                        </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 57%;">
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->


    <div class="row">
        <div class="col-lg-9">

            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-8">
                            <h4 class="card-title">Sales Analytics</h4>
                            <p class="card-subtitle mb-4">From date of 1st Jan 2020 to continue</p>
                            <div id="morris-bar-example" class="morris-chart"></div>
                        </div>

                        <div class="col-lg-4">

                            <h4 class="card-title">Stock</h4>
                            <p class="card-subtitle mb-4">Recent Stock</p>

                            <div class="text-center">
                                <input data-plugin="knob" data-width="165" data-height="165" data-linecap=round
                                    data-fgColor="#7a08c2" value="95" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".15" />
                                <h5 class="text-muted mt-3">Total sales made today</h5>


                                <p class="text-muted w-75 mx-auto sp-line-2">Traditional heading
                                    elements are
                                    designed to work best in the meat of your page content.</p>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                        <h4><i class="fas fa-arrow-up text-success mr-1"></i>$7.8k</h4>

                                    </div>
                                    <div class="col-6">
                                        <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                        <h4><i class="fas fa-arrow-down text-danger mr-1"></i>$1.4k
                                        </h4>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-lg-3">

            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Account Transactions</h4>
                            <p class="card-subtitle mb-4">Transaction period from 21 July to
                                25 Aug</p>
                            <h3>$7841.12 <span class="badge badge-soft-success float-right">+7.5%</span></h3>
                        </div>
                    </div> <!-- end row -->

                    <div id="sparkline1" class="mt-3"></div>
                </div>
                <!--end card body-->
            </div>
            <!--end card-->

        </div><!-- end col -->

    </div>
    <!--end row-->
@endsection
