@extends('layouts.landing_pages.layouts.app')


@section('content')
    <!-- SHOP DETAILS AREA START -->
    @include('layouts.landing_pages.layouts.breadcrumb')
    <div class="ltn__shop-details-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="ltn__shop-details-inner">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ltn__shop-details-img-gallery ltn__shop-details-img-gallery-2">
                                    <div class="ltn__shop-details-small-img slick-arrow-2">
                                        <div class="single-small-img">
                                            <img src="{{ asset('assets/landing_page/img') }}/product/2.png" alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img src="{{ asset('assets/landing_page/img') }}/product/2.png" alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img src="{{ asset('assets/landing_page/img') }}/product/3.png" alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img src="{{ asset('assets/landing_page/img') }}/product/4.png" alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img src="{{ asset('assets/landing_page/img') }}/product/5.png" alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img src="{{ asset('assets/landing_page/img') }}/product/6.png" alt="Image">
                                        </div>
                                        <div class="single-small-img">
                                            <img src="{{ asset('assets/landing_page/img') }}/product/7.png" alt="Image">
                                        </div>
                                    </div>
                                    <div class="ltn__shop-details-large-img">
                                        <div class="single-large-img">
                                            <a href="{{ $product->foto }}" data-rel="lightcase:myCollection">
                                                <img src="{{ $product->foto }}" alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ asset('assets/landing_page/img') }}/product/2.png"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('assets/landing_page/img') }}/product/2.png"
                                                    alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ asset('assets/landing_page/img') }}/product/3.png"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('assets/landing_page/img') }}/product/3.png"
                                                    alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ asset('assets/landing_page/img') }}/product/4.png"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('assets/landing_page/img') }}/product/4.png"
                                                    alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ asset('assets/landing_page/img') }}/product/5.png"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('assets/landing_page/img') }}/product/5.png"
                                                    alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ asset('assets/landing_page/img') }}/product/6.png"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('assets/landing_page/img') }}/product/6.png"
                                                    alt="Image">
                                            </a>
                                        </div>
                                        <div class="single-large-img">
                                            <a href="{{ asset('assets/landing_page/img') }}/product/7.png"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('assets/landing_page/img') }}/product/7.png"
                                                    alt="Image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-info shop-details-info pl-0">
                                    <h3>{{ $product->name }}</h3>
                                    <div class="product-price-ratting mb-20">
                                        <ul>
                                            <li>
                                                <div class="product-price">
                                                    <span>Rp. {{ number_format($product->harga, 2, ',', '.') }}</span>
                                                    <del>$65.00</del>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    {{-- <div class="modal-product-brief">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos repellendus
                                            repudiandae incidunt quidem pariatur expedita, quo quis modi tempore non.</p>
                                    </div> --}}
                                    <div class="ltn__product-details-menu-2 product-cart-wishlist-btn mb-30">
                                        <ul>
                                            <li>
                                                <a href="#" class="theme-btn-1 btn btn-effect-1 d-add-to-cart"
                                                    title="Add to Cart" data-bs-toggle="modal"
                                                    data-bs-target="#add_to_cart_modal" data-id="{{ $product->id }}"
                                                    data-image="{{ $product->foto }}" data-name="{{ $product->name }}"
                                                    data-price="{{ $product->harga }}">
                                                    <span>ADD TO CART</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ltn__safe-checkout d-none">
                                        <h5>Guaranteed Safe Checkout</h5>
                                        <img src="{{ asset('assets/landing_page/img') }}/icons/payment-2.png"
                                            alt="Payment Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->
@endsection
