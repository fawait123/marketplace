@php
    use App\Models\Cart;
    use App\Models\Product;
    use App\Helpers\Utils;
@endphp
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mutiara Variasi</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="{{ asset('assets/landing_page/css') }}/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="{{ asset('assets/landing_page/css') }}/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/landing_page/css') }}/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('assets/landing_page/css') }}/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- maps --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <style>
        .provider {
            position: fixed;
            background: rgba(198, 195, 195, 0.6);
            z-index: 9999;
            width: 100%;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader {
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

    <!-- Body main wrapper start -->
    <div class="body-wrapper">

        <!-- HEADER AREA START (header-3) -->
        <header class="ltn__header-area ltn__header-3 section-bg-6">
            <!-- ltn__header-middle-area start -->
            <div class="ltn__header-middle-area">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="site-logo">
                                <a href="{{ route('welcome') }}"><img src="{{ asset('assets/logo2.png') }}"
                                        width="90" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col header-contact-serarch-column d-none d-xl-block">
                            <div class="header-contact-search">
                                <!-- header-feature-item -->
                                <div class="header-feature-item">
                                    <div class="header-feature-icon">
                                        <i class="icon-phone"></i>
                                    </div>
                                    <div class="header-feature-info">
                                        <h6>Phone</h6>
                                        <p><a href="tel:0123456789">+62 82-336-160-182</a></p>
                                    </div>
                                </div>
                                <!-- header-search-2 -->
                                <div class="header-search-2">
                                    <form id="#123" method="get" action="{{ route('product') }}"
                                        id="form1-search">
                                        <input type="text" name="search" id="input1-search"
                                            value="{{ request('search') }}" placeholder="Search here..." />
                                        <button type="button" id="btn1-search">
                                            <span><i class="icon-magnifier"></i></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <!-- header-options -->
                            <div class="ltn__header-options">
                                <ul>
                                    <li class="d-none">
                                        <!-- ltn__currency-menu -->
                                        <div class="ltn__drop-menu ltn__currency-menu">
                                            <ul>
                                                <li><a href="#" class="dropdown-toggle"><span
                                                            class="active-currency">USD</span></a>
                                                    <ul>
                                                        <li><a href="login.html">USD - US Dollar</a></li>
                                                        <li><a href="wishlist.html">CAD - Canada Dollar</a></li>
                                                        <li><a href="register.html">EUR - Euro</a></li>
                                                        <li><a href="account.html">GBP - British Pound</a></li>
                                                        <li><a href="wishlist.html">INR - Indian Rupee</a></li>
                                                        <li><a href="wishlist.html">BDT - Bangladesh Taka</a></li>
                                                        <li><a href="wishlist.html">JPY - Japan Yen</a></li>
                                                        <li><a href="wishlist.html">AUD - Australian Dollar</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="d-none">
                                        <!-- header-search-1 -->
                                        <div class="header-search-wrap">
                                            <div class="header-search-1">
                                                <div class="search-icon">
                                                    <i class="icon-magnifier  for-search-show"></i>
                                                    <i class="icon-magnifier-remove  for-search-close"></i>
                                                </div>
                                            </div>
                                            <div class="header-search-1-form">
                                                <form id="#" method="get" action="#">
                                                    <input type="text" name="search" value=""
                                                        placeholder="Search here..." />
                                                    <button type="submit">
                                                        <span><i class="icon-magnifier"></i></span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-none">
                                        <!-- user-menu -->
                                        <div class="ltn__drop-menu user-menu">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="icon-user"></i></a>
                                                    <ul>
                                                        <li><a href="login.html">Sign in</a></li>
                                                        <li><a href="register.html">Register</a></li>
                                                        <li><a href="account.html">My Account</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    @if (auth()->user() && auth()->user()->role == 'user')
                                        <li>
                                            @php
                                                $count = Cart::with('product')
                                                    ->where('user_id', auth()->user()->id)
                                                    ->get();
                                                $totals = 0;
                                                foreach ($count as $item) {
                                                    if ($item->product->stok != null || $item->product->stok > 0):
                                                        $totals += $item->total * Utils::price($item->product->harga, $item->product->harga_promo);
                                                    endif;
                                                }
                                            @endphp
                                            <!-- mini-cart 2 -->
                                            <div class="mini-cart-icon mini-cart-icon-2">
                                                <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                                    <span class="mini-cart-icon">
                                                        <i class="icon-handbag"></i>
                                                        <sup>{{ count($count) }}</sup>
                                                    </span>
                                                    <h6><span>Your Cart</span> <span
                                                            class="ltn__secondary-color">{{ number_format($totals, 2, ',', '.') }}</span>
                                                    </h6>
                                                </a>
                                            </div>
                                        </li>
                                    @endif
                                    <li>
                                        <!-- Mobile Menu Button -->
                                        <div class="mobile-menu-toggle d-lg-none">
                                            <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                                <svg viewBox="0 0 800 600">
                                                    <path
                                                        d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                                        id="top"></path>
                                                    <path d="M300,320 L540,320" id="middle"></path>
                                                    <path
                                                        d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                                        id="bottom"
                                                        transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__header-middle-area end -->

            <!-- header-bottom-area start -->
            <div
                class="header-bottom-area ltn__border-top ltn__header-sticky  ltn__sticky-bg-white ltn__primary-bg---- menu-color-white---- d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col header-menu-column justify-content-center">
                            <div class="sticky-logo">
                                <div class="site-logo">
                                    <a href="index.html"><img src="{{ asset('assets/logo2.png') }}" alt="Logo"
                                            width="70"></a>
                                </div>
                            </div>
                            <div class="header-menu header-menu-2">
                                <nav>
                                    <div class="ltn__main-menu">
                                        @include('layouts.landing_pages.layouts.menus')
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-bottom-area end -->
        </header>
        <!-- HEADER AREA END -->

        @if (auth()->user())
            @php
                $data = Cart::with('product')
                    ->where('user_id', auth()->user()->id)
                    ->latest()
                    ->get();
                $total = 0;
            @endphp
            <!-- Utilize Cart Menu Start -->
            <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
                <div class="ltn__utilize-menu-inner ltn__scrollbar">
                    <div class="ltn__utilize-menu-head">
                        <span class="ltn__utilize-menu-title">Cart</span>
                        <button class="ltn__utilize-close">×</button>
                    </div>
                    <div class="mini-cart-product-area ltn__scrollbar">
                        @if (count($data) > 0)
                            @foreach ($data as $item)
                                @php
                                    if ($item->product->stok != null || $item->product->stok > 0):
                                        $total += (Utils::price($item->product->harga, $item->product->harga_promo) ?? 0) * $item->total;
                                    endif;
                                @endphp
                                <div class="mini-cart-item clearfix" style="position: relative;overflow: hidden;">
                                    <div class="mini-cart-img">
                                        <a href="{{ route('product.detail', $item->id) }}"><img
                                                src="{{ Utils::url($item->product->foto) ?? '' }}"
                                                alt="Image"></a>
                                        <a href="{{ route('cart.remove', $item->id) }}"><span
                                                class="mini-cart-item-delete"><i class="icon-trash"></i></span></a>
                                    </div>
                                    <div class="mini-cart-info">
                                        <h6><a href="#">{{ $item->product->name ?? '' }}</a></h6>
                                        <span class="mini-cart-quantity">{{ $item->total }} x
                                            {{ number_format(Utils::price($item->product->harga, $item->product->harga_promo) ?? '', 2, ',', '.') }}</span>
                                        <li>
                                            <input type="number" value="{{ $item->total }}"
                                                data-id="{{ $item->id }}" name="total"
                                                class="input-cart-total">
                                        </li>
                                    </div>
                                    @if ($item->product->stok == null || $item->product->stok == 0)
                                        <div
                                            style="background: rgba(0, 0, 0, 0.486);position: absolute;top:0;left:0;right:0;bottom:0;display: flex; justify-content: center; align-items: center;">
                                            <span style="color: white;font-weight: bold;">Stok Kosong</span>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <p>No data in your cart</p>
                        @endif
                    </div>
                    <div class="mini-cart-footer">
                        @if (count($data) > 0)
                            <div class="mini-cart-sub-total">
                                <h5>Subtotal: <span>{{ number_format($total, 2, ',', '.') }}</span></h5>
                            </div>
                            <div class="btn-wrapper modal-footer">
                                <a href="{{ route('checkout.index') }}"
                                    class="theme-btn-2 btn btn-effect-2 btn-block">Checkout</a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
            <!-- Utilize Cart Menu End -->
        @endif

        <!-- Utilize Mobile Menu Start -->
        <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
            <div class="ltn__utilize-menu-inner ltn__scrollbar">
                <div class="ltn__utilize-menu-head">
                    <div class="site-logo">
                        <a href="index.html"><img src="{{ asset('assets/logo2.png') }}" width="70"
                                alt="Logo"></a>
                    </div>
                    <button class="ltn__utilize-close">×</button>
                </div>
                <div class="ltn__utilize-menu-search-form">
                    <form action="{{ route('product') }}" method="GET">
                        <input type="text" name="search" id="input2-search" value="{{ request('search') }}"
                            placeholder="Search...">
                        <button type="button" id="btn2-search"><i class="icon-magnifier"></i></button>
                    </form>
                </div>
                <div class="ltn__utilize-menu">
                    @include('layouts.landing_pages.layouts.menus')
                </div>
            </div>
        </div>
        <!-- Utilize Mobile Menu End -->

        <div class="ltn__utilize-overlay"></div>

        @yield('content')

        <!-- BRAND LOGO AREA START -->
        {{-- <div class="ltn__brand-logo-area  ltn__brand-logo-1 section-bg-1 pt-35 pb-35 plr--5">
            <div class="container-fluid">
                <div class="row ltn__brand-logo-active">
                    <div class="col-lg-12">
                        <div class="ltn__brand-logo-item">
                            <img src="{{ asset('assets/landing_page/img') }}/brand-logo/1.png" alt="Brand Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__brand-logo-item">
                            <img src="{{ asset('assets/landing_page/img') }}/brand-logo/2.png" alt="Brand Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__brand-logo-item">
                            <img src="{{ asset('assets/landing_page/img') }}/brand-logo/3.png" alt="Brand Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__brand-logo-item">
                            <img src="{{ asset('assets/landing_page/img') }}/brand-logo/4.png" alt="Brand Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__brand-logo-item">
                            <img src="{{ asset('assets/landing_page/img') }}/brand-logo/5.png" alt="Brand Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__brand-logo-item">
                            <img src="{{ asset('assets/landing_page/img') }}/brand-logo/1.png" alt="Brand Logo">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__brand-logo-item">
                            <img src="{{ asset('assets/landing_page/img') }}/brand-logo/2.png" alt="Brand Logo">
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- BRAND LOGO AREA END -->

        <!-- FOOTER AREA START -->
        <footer class="ltn__footer-area ">
            <div class="ltn__copyright-area ltn__copyright-2 section-bg-5">
                <div class="container ltn__border-top-2">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="footer-copyright-left">
                                <div class="ltn__copyright-design clearfix">
                                    <p>&copy; <span class="current-year"></span> - Just For You</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 align-self-center">
                            <div class="footer-copyright-right text-right">
                                <div class="ltn__copyright-menu d-none">
                                    <ul>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">Claim</a></li>
                                        <li><a href="#">Privacy & Policy</a></li>
                                    </ul>
                                </div>
                                <div class="ltn__social-media ">
                                    <ul>
                                        <li><a href="#" title="Facebook"><i
                                                    class="icon-social-facebook"></i></a></li>
                                        <li><a href="#" title="Twitter"><i class="icon-social-twitter"></i></a>
                                        </li>
                                        <li><a href="#" title="Pinterest"><i
                                                    class="icon-social-pinterest"></i></a></li>
                                        <li><a href="#" title="Instagram"><i
                                                    class="icon-social-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER AREA END -->

        <!-- MODAL AREA START (Quick View Modal) -->
        <div class="ltn__modal-area ltn__quick-view-modal-area">
            <div class="modal fade" id="quick_view_modal" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <!-- <i class="fas fa-times"></i> -->
                            </button>
                        </div>
                        <div class="modal-body">
                            <h6>Detail Transaction</h6>
                            <div class="row" id="transaction-detail">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL AREA END -->

        @if (auth()->user())
            <!-- MODAL AREA START (Quick View Modal) -->
            <div class="ltn__modal-area ltn__quick-view-modal-area">
                <div class="modal fade" id="modal_booking" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <!-- <i class="fas fa-times"></i> -->
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6>Booking</h6>
                                <div class="row align-items-center">
                                    <form action="" id="form_booking">
                                        <input type="hidden" class="form-control" name="user_id"
                                            value="{{ auth()->user()->id }}">
                                        <input type="text" name="date" id="booking_date" placeholder="Date"
                                            readonly>
                                        <input type="text" name="merk" placeholder="Merk">
                                        <input type="text" name="description" placeholder="Service Description">
                                        <button type="button" class="btn theme-btn-1 btn-effect-1 text-uppercase"
                                            id="btn_booking">Booking</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL AREA END -->

            <!-- MODAL AREA START (Quick View Modal) -->
            <div class="ltn__modal-area ltn__quick-view-modal-area">
                <div class="modal fade" id="modal_booking_info" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <!-- <i class="fas fa-times"></i> -->
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6>Booking Info <span id="modal_date"></span> </h6>
                                <ol class="list-group list-group-numbered" id="body_modal_detail">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Subheading</div>
                                            Content for list item
                                        </div>
                                        <span class="badge bg-primary rounded-pill">14</span>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL AREA END -->
        @endif

        <!-- MODAL AREA START (Add To Cart Modal) -->
        <div class="ltn__modal-area ltn__add-to-cart-modal-area">
            <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="ltn__quick-view-modal-inner">
                                <div class="modal-product-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="modal-add-to-cart-content clearfix">
                                                <div class="modal-product-img">
                                                    <img id="modal-image"
                                                        src="{{ asset('assets/landing_page/img') }}/product/1.png"
                                                        alt="#">
                                                </div>
                                                <div class="modal-product-info">
                                                    <h5><a href="{{ route('product.detail', '__row') }}"
                                                            id="modal-title">Heart's
                                                            Desire</a></h5>
                                                    <p><span class="text-secondary" id="modal-price">Rp. 00</span></p>
                                                    <div class="btn-wrapper">
                                                        <a href="cart.html" class="theme-btn-1 btn btn-effect-1"
                                                            id="add-to-cart">Add To
                                                            Cart</a>
                                                        {{-- <a href="checkout.html"
                                                            class="theme-btn-2 btn btn-effect-2">Checkout</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- additional-info -->
                                            <div class="additional-info d-none--">
                                                <p>We want to give you <b>10% discount</b> for your first order, <br>
                                                    Use (fiama10) discount code at checkout</p>
                                                <div class="payment-method">
                                                    <img src="{{ asset('assets/landing_page/img') }}/icons/payment.png"
                                                        alt="#">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL AREA END -->

        <!-- MODAL AREA START (Wishlist Modal) -->
        <div class="ltn__modal-area ltn__add-to-cart-modal-area">
            <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="ltn__quick-view-modal-inner">
                                <div class="modal-product-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="modal-product-img">
                                                <img src="{{ asset('assets/landing_page/img') }}/product/7.png"
                                                    alt="#">
                                            </div>
                                            <div class="modal-product-info">
                                                <h5><a href="product-details.html">Brake Conversion Kit</a></h5>
                                                <p class="added-cart"><i class="fa fa-check-circle"></i>
                                                    Successfully added to your Wishlist</p>
                                                <div class="btn-wrapper">
                                                    <a href="wishlist.html" class="theme-btn-1 btn btn-effect-1">View
                                                        Wishlist</a>
                                                </div>
                                            </div>
                                            <!-- additional-info -->
                                            <div class="additional-info d-none">
                                                <p>We want to give you <b>10% discount</b> for your first order, <br>
                                                    Use discount code at checkout</p>
                                                <div class="payment-method">
                                                    <img src="{{ asset('assets/landing_page/img') }}/icons/payment.png"
                                                        alt="#">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL AREA END -->

    </div>
    <!-- Body main wrapper end -->

    <!-- preloader area start -->
    <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- All JS Plugins -->
    <script src="{{ asset('assets/landing_page/js/plugins.js') }}"></script>
    <!-- Main JS
        -->
    <script src="{{ asset('assets/landing_page/js') }}/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="{{ asset('assets/fullcalendar/dist/index.global.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        function customUrl(search, val) {
            let currentURL = document.URL
            currentURL = currentURL.split('?').join(',').split('&').join(',').split(',')
            let arr = [
                ...currentURL
            ]
            let findIndex = arr.findIndex((el) => el.toLowerCase().includes(search))
            console.log(findIndex)
            if (findIndex > 0) {
                arr[findIndex] = search + '=' + val
            } else {
                arr.push(search + '=' + val)
            }
            let url = ''
            arr.map((el, index) => {
                url += index === 0 ? el : index === 1 ? '?' + el : '&' + el;
            })

            return url;
        }
    </script>
    @stack('customjs')
    <script>
        $(document).ready(function() {
            $(document).keypress(
                function(event) {
                    if (event.which == '13') {
                        event.preventDefault();
                    }
                });
            $('#add_to_cart_modal').on('show.bs.modal', function(e) {
                let target = e.relatedTarget
                let id = $(target).data('id')
                let image = $(target).data('image')
                let name = $(target).data('name')
                let price = $(target).data('price')
                console.log(price)
                let url = "{{ route('cart.create', '::id') }}";
                let redirect = "{{ route('product.detail', '__row') }}"
                url = url.replace('::id', id)
                redirect = redirect.replace('__row', id)
                $('#add-to-cart').prop('href', url)
                $("#modal-image").prop('src', image)
                $("#modal-title").html(name)
                $("#modal-title").prop('href', redirect)
                $("#modal-price").html('Rp. ' + parseInt(price).toLocaleString('ID', 'id'))
            })

            $("#quick_view_modal").on('show.bs.modal', function(e) {
                let target = e.relatedTarget;
                let name = $(target).data('name')
                let email = $(target).data('email')
                let phone = $(target).data('phone')
                let address = $(target).data('address')
                let note = $(target).data('note')
                let additional = $(target).data('additional')
                let total = $(target).data('total')
                let payment_method = $(target).data('payment_method')
                let status = $(target).data('status')
                let date = $(target).data('date')
                let detail = $(target).data('detail')
                var options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                }
                let html = ''
                html += `
                                <div class="col-6">
                                    Date
                                </div>
                                <div class="col-6">
                                    : ${moment(date).format('DD MMMM YYYY hh:mm:ss')}
                                </div>
                                <div class="col-6">
                                    Name
                                </div>
                                <div class="col-6">
                                    : ${name}
                                </div>
                                <div class="col-6">
                                    Email
                                </div>
                                <div class="col-6">
                                    : ${email}
                                </div>
                                <div class="col-6">
                                    Phone
                                </div>
                                <div class="col-6">
                                    : ${phone}
                                </div>
                                <div class="col-6">
                                    Address
                                </div>
                                <div class="col-6">
                                    : ${address}
                                </div>
                                <div class="col-6">
                                    Payment Method
                                </div>
                                <div class="col-6">
                                    : ${payment_method == 'take_away' ? 'Take Away' : 'Cash On Delivery'}
                                </div>
                                <div class="col-6">
                                    Status
                                </div>
                                <div class="col-6">
                                    : <span class="text-bold text-primary" style="font-weight:bold;">${status}</span>
                                </div>
                                <hr>
                `
                detail.map((el, index) => {
                    html += `
                                <div class="col-4">
                                    <li style="list-style:none"><b>${++index}.</b>&nbsp; ${el.product.name}</li>
                                </div>
                                <div class="col-4">
                                    <li style="list-style:none">${el.amount} x Rp. ${parseInt(el.price).toLocaleString('id','ID')}</li>
                                </div>
                                <div class="col-4">
                                    <li style="list-style:none">Rp. ${parseInt(el.sub_total).toLocaleString('id','ID')}</li>
                                </div>
                                <div class="col-4">
                                    &nbsp;
                                </div>
                                <div class="col-4">
                                    &nbsp;
                                </div>
                                <div class="col-4">
                                    &nbsp;
                                </div>            `
                })

                html += `
                <div class="col-4">
                                    &nbsp;
                                </div>
                                <div class="col-4">
                                    <b>Sub Total</b>
                                </div>
                                <div class="col-4">
                                    <b>Rp. ${parseInt(total).toLocaleString('id','ID')}</b>
                                </div>
                                <div class="col-4">
                                    &nbsp;
                                </div>
                                <div class="col-4">
                                    <b>${additional.payment_method === 'take_away' ? 'Take Away' : 'Cash On Delivery'}</b>
                                </div>
                                <div class="col-4">
                                    <b>Rp. ${parseInt(additional.price).toLocaleString('id','ID')}</b>
                                </div>
                                <div class="col-4">
                                    &nbsp;
                                </div>
                                <div class="col-4">
                                    <b>Total</b>
                                </div>
                                <div class="col-4">
                                    <b><span class="text-primary">Rp. ${parseInt(total + additional.price).toLocaleString('id','ID')}</span></b>
                                </div>
                `
                $("#transaction-detail").html(html)
            })
            $("#btn1-search").click(function() {
                let val = $("#input1-search").val();
                let url = customUrl('search', val)
                // console.log(url);
                window.location.href = url;
            })
            $("#btn2-search").click(function() {
                let val = $("#input2-search").val();
                let url = customUrl('search', val)
                // console.log(url);
                window.location.href = url;
            })

            $(".input-cart-total").on('input', function() {
                let value = $(this).val()
                let id = $(this).data('id')
                console.log(value)

                $.ajax({
                    url: '{{ route('cart.updateTotal') }}',
                    type: 'get',
                    data: {
                        id: id,
                        value: value,
                    },
                    success: function(res) {
                        console.log(res)
                        toastr.success('Cart updated successfully')
                    }
                })
            })
        })
    </script>
</body>

</html>
