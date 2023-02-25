@extends('layouts.landing_pages.layouts.app')

@section('content')
    @php
        use App\Models\Product;
        function random_color_part()
        {
            return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
        }
        
        function random_color()
        {
            return random_color_part() . random_color_part() . random_color_part();
        }
    @endphp
    <!-- SLIDER AREA START (slider-6) -->
    <div class="ltn__slider-area ltn__slider-3 ltn__slider-6 section-bg-1">
        <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1 arrow-white---">
            <!-- ltn__slide-item  -->
            <div class="ltn__slide-item ltn__slide-item-8 text-color-white---- bg-image bg-overlay-theme-black-80---"
                data-bs-bg="{{ asset('assets/banner/banner_new_1.jpg') }}">
                <div class="ltn__slide-item-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="slide-item-info">
                                    <div class="slide-item-info-inner ltn__slide-animation">
                                        <div class="slide-item-info">
                                            <div class="slide-item-info-inner ltn__slide-animation">
                                                <h1 class="slide-title animated" style="color: white">Mutiara Variasi
                                                    Bondowoso </h1>
                                                <h6 class="slide-sub-title ltn__body-color slide-title-line animated"
                                                    style="color: white !important">
                                                    Toko Variasi Termurah & Terlengkap Di Bondowoso</h6>
                                                <div class="slide-brief animated">
                                                    <p style="color: white;text-align: justify">Mutiara Variasi Bondowoso
                                                        menjual dan melayani
                                                        pemasangan variasi dan aksesoris kendaraan.
                                                        Mutiara Variasi Bondowoso menawarkan jasa dan produk variasi dengan
                                                        harga terjangkau.</p>
                                                </div>
                                                {{-- <div class="btn-wrapper animated">
                                                    <a href="service.html" class="theme-btn-1 btn btn-round">Shop
                                                        Now</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="slide-item-img">                                                                                                                                                                                                                                                              </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__slide-item  -->
            <div class="ltn__slide-item ltn__slide-item-8 text-color-white---- bg-image bg-overlay-theme-black-80---"
                data-bs-bg="{{ asset('assets/banner/banner_2.jpg') }}">
                <div class="ltn__slide-item-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="slide-item-info">
                                    <div class="slide-item-info-inner ltn__slide-animation">
                                        <div class="slide-item-info">
                                            <div class="slide-item-info-inner ltn__slide-animation">
                                                <h1 class="slide-title animated" style="color: white">Mutiara Variasi
                                                    Bondowoso </h1>
                                                <h6 class="slide-sub-title ltn__body-color slide-title-line animated"
                                                    style="color: white !important">
                                                    Toko Variasi Termurah & Terlengkap Di Bondowoso</h6>
                                                <div class="slide-brief animated">
                                                    <p style="color: white;text-align: justify">Mutiara Variasi Bondowoso
                                                        menjual dan melayani
                                                        pemasangan variasi dan aksesoris kendaraan.
                                                        Mutiara Variasi Bondowoso menawarkan jasa dan produk variasi dengan
                                                        harga terjangkau.</p>
                                                </div>
                                                {{-- <div class="btn-wrapper animated">
                                                    <a href="service.html" class="theme-btn-1 btn btn-round">Shop
                                                        Now</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="slide-item-img">                                                                                                                                                                                                                                                              </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__slide-item  -->
            <div class="ltn__slide-item ltn__slide-item-8 text-color-white---- bg-image bg-overlay-theme-black-80---"
                data-bs-bg="{{ asset('assets/banner/banner_3.jpg') }}">
                <div class="ltn__slide-item-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="slide-item-info">
                                    <div class="slide-item-info-inner ltn__slide-animation">
                                        <div class="slide-item-info">
                                            <div class="slide-item-info-inner ltn__slide-animation">
                                                <h1 class="slide-title animated" style="color: white">Mutiara Variasi
                                                    Bondowoso </h1>
                                                <h6 class="slide-sub-title ltn__body-color slide-title-line animated"
                                                    style="color: white !important">
                                                    Toko Variasi Termurah & Terlengkap Di Bondowoso</h6>
                                                <div class="slide-brief animated">
                                                    <p style="color: white;text-align: justify">Mutiara Variasi Bondowoso
                                                        menjual dan melayani
                                                        pemasangan variasi dan aksesoris kendaraan.
                                                        Mutiara Variasi Bondowoso menawarkan jasa dan produk variasi dengan
                                                        harga terjangkau.</p>
                                                </div>
                                                {{-- <div class="btn-wrapper animated">
                                                    <a href="service.html" class="theme-btn-1 btn btn-round">Shop
                                                        Now</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="slide-item-img">                                                                                                                                                                                                                                                              </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SLIDER AREA END -->

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__feature-area mt-100 mt--65">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div
                        class="ltn__feature-item-box-wrap ltn__feature-item-box-wrap-2 ltn__border section-bg-6 position-relative">
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('assets/landing_page/img') }}/icons/svg/8-trolley.svg" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Free shipping</h4>
                                <p>On all orders over $49.00</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('assets/landing_page/img') }}/icons/svg/9-money.svg" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>15 days returns</h4>
                                <p>Moneyback guarantee</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('assets/landing_page/img') }}/icons/svg/10-credit-card.svg"
                                    alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Secure checkout</h4>
                                <p>Protected by Paypal</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('assets/landing_page/img') }}/icons/svg/11-gift-card.svg" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Offer & gift here</h4>
                                <p>On all orders over</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURE AREA END -->

    <!-- BANNER AREA START -->
    <div class="ltn__banner-area  mt-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="#"><img src="{{ asset('assets/banner/top_1.png') }}" alt="Banner Image"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="#"><img src="{{ asset('assets/banner/top_2.png') }}" alt="Banner Image"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="#"><img src="{{ asset('assets/banner/top_3.png') }}" alt="Banner Image"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER AREA END -->

    @foreach ($categories as $item)
        @php
            $products = Product::where('category_id', $item->id)
                ->latest()
                ->take(8)
                ->get();
        @endphp
        <!-- PRODUCT AREA START -->
        <div class="ltn__product-area ltn__product-gutter  pt-65 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center">
                            <h1 class="section-title section-title-border">{{ $item->name }}</h1>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($products as $row)
                        @php
                            $persen = ((int) $row->harga_promo / (int) $row->harga) * 100;
                            $persen = ceil($persen);
                        @endphp
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item text-center">
                                <div class="product-img">
                                    <a href="{{ route('product.detail', $row->id) }}"><img src="{{ $row->foto }}"
                                            alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="badge-2" style="background: #{{ random_color() }}">
                                                {{ $persen }}%</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action product-hover-action-2">
                                        <ul>
                                            <li class="add-to-cart">
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal"
                                                    data-id="{{ $row->id }}" data-image="{{ $row->foto }}"
                                                    data-name="{{ $row->name }}" data-price="{{ $row->harga }}"
                                                    data-bs-target="#add_to_cart_modal">
                                                    <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                    <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h2 class="product-title"><a
                                            href="{{ route('product.detail', $row->id) }}">{{ $row->name }}</a></h2>
                                    <div class="product-price">
                                        <span>Rp.
                                            {{ $row->harga_promo ? number_format($row->harga_promo, 2, ',', '.') : number_format($row->harga, 2, ',', '.') }}</span>
                                        <del>{{ $row->harga_promo ? number_format($row->harga, 2, ',', '.') : number_format($row->harga_promo, 2, ',', '.') }}</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- PRODUCT SLIDER AREA END -->
    @endforeach
@endsection
