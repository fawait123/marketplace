@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <h4><b>ADMIN</b></h4>
                        </div>
                        <div class="float-right">
                            <h4 class="m-0 d-print-none">Invoice</h4>
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-6">
                            <h6 class="font-weight-bold">TO:</h6>

                            <address class="line-h-24">
                                <b>{{ $transaction->name }}</b><br>
                                {{ $transaction->email }}<br>
                                {{ $transaction->address }}<br>
                                <abbr title="Phone"></abbr> {{ $transaction->phone }}
                            </address>
                        </div><!-- end col -->
                        <div class="col-6">
                            <div class="mt-3 float-right">
                                <p class="mb-2"><strong>Order Date: </strong>
                                    {{ date($transaction->date, strtotime('d M Y H:i:s')) }}</p>
                                <p class="mb-2"><strong>Order Status: </strong> <span
                                        class="badge badge-soft-success">{{ $transaction->status }}</span></p>
                                <p class="m-b-10"><strong>Order ID: </strong> #123456</p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table mt-4">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaction->detail as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <b>{{ $item->product->name ?? '' }}</b>
                                                    <br />
                                                    {{ $item->product->category->name ?? '' }}
                                                </td>
                                                <td>{{ $item->amount }}</td>
                                                <td>RP. {{ number_format($item->price, 2, ',', '.') }}</td>
                                                <td class="text-right">Rp.
                                                    {{ number_format($item->sub_total, 2, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="clearfix pt-5">
                                <h6 class="text-muted">Notes:</h6>

                                <small>
                                    All accounts are to be paid within 7 days from receipt of
                                    invoice. To be paid by cheque or credit card or direct payment
                                    online. If account is not paid within 7 days the credits details
                                    supplied as confirmation of work undertaken will be charged the
                                    agreed quoted fee noted above.
                                </small>
                            </div>

                        </div>
                        @php
                            $additional = json_decode($transaction->additional);
                            $total = $transaction->total + $additional->price;
                        @endphp
                        <div class="col-6">
                            <div class="float-right">
                                <p><b>Sub-total:</b> {{ number_format($transaction->total, 2, ',', ',') }}</p>
                                <p><b>{{ $additional->payment_method == 'take_away' ? 'Take Away' : 'Cash On Delivery' }}:</b>
                                    Rp. {{ number_format($additional->price, 2, ',', '.') }}</p>
                                <h3>Rp. {{ number_format($total, 2, ',', '.') }}</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="d-print-none my-4">
                        <div class="text-right">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i
                                    class="fa fa-print m-r-5"></i> Print</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
