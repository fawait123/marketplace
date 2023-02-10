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
                                        @foreach ($product->detail as $item)
                                            <div class="single-small-img">
                                                <img src="{{ $item->image }}" alt="Image">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="ltn__shop-details-large-img">
                                        <div class="single-large-img">
                                            <a href="{{ $product->foto }}" data-rel="lightcase:myCollection">
                                                <img src="{{ $product->foto }}" alt="Image">
                                            </a>
                                        </div>
                                        @foreach ($product->detail as $item)
                                            <div class="single-large-img">
                                                <a href="{{ $item->image }}" data-rel="lightcase:myCollection">
                                                    <img src="{{ $item->image }}" alt="Image">
                                                </a>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-info shop-details-info pl-0">
                                    <h3>{{ $product->name }}</h3>
                                    <span class="text-secondary text-small">{{ ucfirst($product->category->name) }}</span>
                                    <div class="product-price-ratting mb-20">
                                        <ul>
                                            <li>
                                                <div class="product-price">
                                                    <span>Rp.
                                                        {{ $product->harga_promo ? number_format($product->harga_promo, 2, ',', '.') : number_format($product->harga, 2, ',', '.') }}</span>
                                                    <del>{{ $product->harga_promo ? number_format($product->harga, 2, ',', '.') : number_format($product->harga_promo, 2, ',', '.') }}</del>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-product-brief">
                                        <div class="row">
                                            <div class="col-6">
                                                {{ QrCode::size(200)->generate($product->qrcode) }}
                                            </div>
                                            <div class="col-6">
                                                <p>{{ $product->deskripsi }}</p>
                                            </div>
                                        </div>
                                    </div>
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
