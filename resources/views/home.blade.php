@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-success float-right">Daily</span>
                        <h5 class="card-title mb-0">Transaction</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h5 class="d-flex align-items-center mb-0">
                                {{ number_format($data['now']['total'], 2, ',', '.') }}
                            </h5>
                        </div>
                        {{-- <div class="col-4 text-right">
                            <span class="text-muted">20% <i class="mdi mdi-arrow-up text-success"></i></span>
                        </div> --}}
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
                        <span class="badge badge-soft-danger float-right">Tomorrow</span>
                        <h5 class="card-title mb-0">Transaction</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h5 class="d-flex align-items-center mb-0">
                                {{ number_format($data['tomorrow']['total'], 2, ',', '.') }}
                            </h5>
                        </div>
                        {{-- <div class="col-4 text-right">
                            <span class="text-muted">18.71% <i class="mdi mdi-arrow-down text-danger"></i></span>
                        </div> --}}
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
                        <span class="badge badge-soft-warning float-right">Week</span>
                        <h5 class="card-title mb-0">Transaction</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h5 class="d-flex align-items-center mb-0">
                                {{ number_format($data['week']['total'], 2, ',', '.') }}
                            </h5>
                        </div>
                        {{-- <div class="col-4 text-right">
                            <span class="text-muted">57% <i class="mdi mdi-arrow-up text-success"></i></span>
                        </div> --}}
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
                        <span class="badge badge-soft-info float-right">Month</span>
                        <h5 class="card-title mb-0">Transaction</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h5 class="d-flex align-items-center mb-0">
                                {{ number_format($data['month']['total'], 2, ',', '.') }}
                            </h5>
                        </div>
                        {{-- <div class="col-4 text-right">
                            <span class="text-muted">17.8% <i class="mdi mdi-arrow-down text-danger"></i></span>
                        </div> --}}
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

    <div class="row mb-5 mt-3">
        <div class="col-6">
            <input type="date" name="from" class="form-control" value="{{ date('Y-m-d') }}">
        </div>
        <div class="col-6">
            <input type="date" name="to" class="form-control" value="{{ date('Y-m-d') }}" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title">Transaction Analytics</h4>
                            <p class="card-subtitle mb-4" id="sub-title-cart">From date of 1st Jan 2020 to continue</p>
                            <div id="morris-bar-example" class="morris-chart"></div>
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

    </div>
    <!--end row-->
@endsection


@push('customjs')
    <script>
        let G = Morris.Bar({
            element: 'morris-bar-example',
            barColors: ['#609EA2', '#C92C6D'],
            data: [],
            xkey: 'y',
            ykeys: ['a', 'b'],
            hideHover: 'auto',
            gridLineColor: '#eef0f2',
            resize: true,
            barSizeRatio: 0.4,
            labels: ['Total Transaction', 'Profit']
        });

        // var DrawSparkline = function() {
        //     $("#sparkline1").sparkline([25], {
        //         type: "line",
        //         width: "100%",
        //         height: "297",
        //         chartRangeMax: 35,
        //         lineColor: "#1991eb",
        //         fillColor: "rgba(25,118,210,0.18)",
        //         highlightLineColor: "rgba(0,0,0,.1)",
        //         highlightSpotColor: "rgba(0,0,0,.2)",
        //         maxSpotColor: false,
        //         minSpotColor: false,
        //         spotColor: false,
        //         lineWidth: 1,
        //     });
        // };
        // var resizeChart;

        // $(window).resize(function(e) {
        //     clearTimeout(resizeChart);
        //     resizeChart = setTimeout(function() {
        //         DrawSparkline();
        //     }, 300);
        // });
        $(document).ready(function() {
            // DrawSparkline()
            $("input[name=from]").on('change', function() {
                let to = $("input[name=to]").val();
                let from = $("input[name=from]").val();
                $.ajax({
                    url: '{{ route('cart') }}',
                    type: 'get',
                    data: {
                        from: $("input[name=from]").val(),
                        to: $("input[name=to]").val()
                    },
                    success: function(res) {
                        let datas = res.map((el) => {
                            return {
                                y: el.month,
                                a: el.amount,
                                b: el.total
                            }
                        })

                        G.setData(datas)
                        let html = `From date of ${from} to ${to}`
                        $("#sub-title-cart").html(html)
                    }
                })
            })

            $.ajax({
                url: '{{ route('cart') }}',
                type: 'get',
                data: {
                    from: $("input[name=from]").val(),
                    to: $("input[name=to]").val()
                },
                success: function(res) {
                    let datas = res.map((el) => {
                        return {
                            y: el.month,
                            a: el.amount,
                            b: el.total
                        }
                    })
                    G.setData(datas)
                    let html =
                        `From date of ${$("input[name=from]").val()} to ${$("input[name=to]").val()}`
                    $("#sub-title-cart").html(html)
                }
            })
        })
    </script>
@endpush
