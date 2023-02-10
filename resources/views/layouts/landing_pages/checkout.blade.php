@extends('layouts.landing_pages.layouts.app')

@section('content')
    @include('layouts.landing_pages.layouts.breadcrumb')
    <!-- CONTACT ADDRESS AREA START -->
    <!-- WISHLIST AREA START -->
    @php
        use App\Helpers\Utils;
    @endphp
    <div class="ltn__checkout-area mb-100">
        <form action="{{ route('checkout.order') }}" method="POST">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__checkout-inner">
                            <div class="ltn__checkout-single-content mt-50">
                                <h4 class="title-2">Billing Details</h4>
                                <div class="ltn__checkout-single-content-info">
                                    <h6>Personal Information</h6>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="name" placeholder="Full name"
                                                    value="{{ auth()->user()->member->name ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" name="email" placeholder="email address"
                                                    value="{{ auth()->user()->member->email ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" name="phone" placeholder="phone number"
                                                    value="{{ auth()->user()->member->telp ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <textarea name="address" placeholder="Address...">{{ auth()->user()->member->address ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <h6>Order Notes (optional)</h6>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ltn__checkout-payment-method mt-50">
                            <h4 class="title-2">Payment Method</h4>
                            <div id="checkout_accordion_1">
                                <!-- card -->
                                <div class="card">
                                    <h5 class="collapsed ltn__card-title payment-method" data-bs-toggle="collapse"
                                        data-bs-target="#faq-item-2-1" aria-expanded="false" data-value="cash_on_delivery">
                                        Cash on delivery
                                    </h5>
                                    <div id="faq-item-2-1" class="collapse" data-bs-parent="#checkout_accordion_1">
                                        <div class="card-body">
                                            <p>Pay with cash on delivery, you get add cost (Rp. 10.000,-).</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- card -->
                                <div class="card">
                                    <h5 class="ltn__card-title payment-method" data-value="take_away"
                                        data-bs-toggle="collapse" data-bs-target="#faq-item-2-2" aria-expanded="true">
                                        Take away
                                    </h5>
                                    <div id="faq-item-2-2" class="collapse show" data-bs-parent="#checkout_accordion_1">
                                        <div class="card-body">
                                            <p>Pay with cash take away.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- card -->
                            </div>
                            <input type="hidden" name="payment_method" value="take_away">
                            <div class="ltn__payment-note mt-30 mb-30">
                                <p>Your personal data will be used to process your order, support your experience throughout
                                    this website, and for other purposes described in our privacy policy.</p>
                            </div>
                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Place order</button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping-cart-total mt-50">
                            <h4 class="title-2">Cart Totals</h4>
                            <table class="table">
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cart as $item)
                                        @php
                                            $total += Utils::price($item->product->harga, $item->product->harga_promo);
                                        @endphp
                                        <tr>
                                            <td>{{ $item->product->name }} <strong>× {{ $item->total }}</strong></td>
                                            <td>Rp.
                                                <del>{{ number_format($item->product->harga, 2, ',', '.') }}</del>
                                                {{ number_format(Utils::price($item->product->harga, $item->product->harga_promo), 2, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <input type="hidden" name="total" value="{{ $total }}">
                                        <td><strong>Order Total</strong></td>
                                        <td><strong>Rp. {{ number_format($total, 2, ',', '.') }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- WISHLIST AREA START -->
@endsection

@push('customjs')
    <script>
        $(document).ready(function() {
            $('.payment-method').on('click', function() {
                let value = $(this).data('value')
                // console.log(value)
                $("input[name=payment_method]").val(value)
            })
        })
    </script>
@endpush
