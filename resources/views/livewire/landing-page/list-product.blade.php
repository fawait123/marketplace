<!-- PRODUCT SLIDER AREA START -->

@foreach ($data as $item_category)
    <!-- PRODUCT AREA START -->
    <div class="ltn__product-area ltn__product-gutter pt-90 pb-40---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title section-title-border">{{ $item_category->name }}</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($item_category->products as $item)
                    <!-- ltn__product-item -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="ltn__product-item text-center">
                            <div class="product-img">
                                <a href="product-details.html"><img
                                        src="{{ Storage::url('public/foto/') . $item->foto }}" alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="badge-2">10%</li>
                                    </ul>
                                </div>
                                <div class="product-hover-action product-hover-action-2">
                                    <ul>
                                        <li>
                                            <a href="#" title="Quick View" data-bs-toggle="modal"
                                                data-bs-target="#quick_view_modal">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </li>
                                        <li class="add-to-cart">
                                            <a href="#" title="Add to Cart" data-bs-toggle="modal"
                                                data-bs-target="#add_to_cart_modal">
                                                <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                                <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Quick View" data-bs-toggle="modal"
                                                data-bs-target="#quick_view_modal">
                                                <i class="icon-shuffle"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <h2 class="product-title"><a href="product-details.html">{{ $item->name }}</a></h2>
                                <div class="product-price">
                                    <span>@currency($item->harga)</span>
                                    <del>$21.00</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                @endforeach
            </div>
        </div>
    </div>
@endforeach
{{--
<!-- PRODUCT SLIDER AREA END -->
<div class="ltn__product-slider-area ltn__product-gutter pt-90 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title section-title-border">{{ $item_category->name }}</h1>
                </div>
            </div>
        </div>
        <div class="row ltn__product-slider-item-four-active slick-arrow-1">
            <!-- ltn__product-item -->
            @foreach ($item_category->products as $item_product)
                <div class="col-12">
                    <div class="ltn__product-item text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="img/product/1.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="badge-2">10%</li>
                                </ul>
                            </div>
                            <div class="product-hover-action product-hover-action-2">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick_view_modal">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </li>
                                    <li class="add-to-cart">
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal"
                                            data-bs-target="#add_to_cart_modal">
                                            <span class="cart-text d-none d-xl-block">Add to Cart</span>
                                            <span class="d-block d-xl-none"><i class="icon-handbag"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick_view_modal">
                                            <i class="icon-shuffle"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <h2 class="product-title"><a href="product-details.html">Pink Flower Tree</a></h2>
                            <div class="product-price">
                                <span>$18.00</span>
                                <del>$21.00</del>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- PRODUCT SLIDER AREA END --> --}}
