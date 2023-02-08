<div>
    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="showing-product-number text-right">
                                    <span>Showing 9 of 20 results</span>
                                </div>
                            </li>
                            <li>
                                <div class="short-by text-center">
                                    <select class="nice-select">
                                        <option>Default sorting</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by new arrivals</option>
                                        <option>Sort by price: low to high</option>
                                        <option>Sort by price: high to low</option>
                                    </select>
                                </div>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i
                                                class="icon-grid"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="icon-menu"></i></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    @foreach ($query as $item)
                                        <!-- ltn__product-item -->
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <div class="ltn__product-item text-center">
                                                <div class="product-img">
                                                    <a href="product-details.html"><img src="{{ $item->foto }}"
                                                            alt="#"></a>
                                                    <div class="product-badge">
                                                        <ul>
                                                            <li class="badge-1">Hot</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-hover-action product-hover-action-2">
                                                        <ul>
                                                            <li class="add-to-cart">
                                                                <a href="#" title="Add to Cart"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#add_to_cart_modal"
                                                                    data-id="{{ $item->id }}"
                                                                    data-image="{{ $item->foto }}"
                                                                    data-name="{{ $item->name }}"
                                                                    data-price="{{ $item->harga }}">
                                                                    <span class="cart-text d-none d-xl-block">Add to
                                                                        Cart</span>
                                                                    <span class="d-block d-xl-none"><i
                                                                            class="icon-handbag"></i></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h2 class="product-title"><a
                                                            href="product-details.html">{{ $item->name }}</a>
                                                    </h2>
                                                    <div class="product-price">
                                                        <span>{{ $item->harga }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item">
                                            <div class="product-img">
                                                <a href="product-details.html"><img
                                                        src="{{ asset('assets/landing_page/img') }}/product/2.png"
                                                        alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-1">Hot</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Red Rose
                                                        Bouquet</a></h2>
                                                <div class="product-price">
                                                    <span>$16</span>
                                                </div>
                                                <div class="product-ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-brief">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Recusandae
                                                        asperiores sit odit nesciunt, aliquid, deleniti non et ut
                                                        dolorem!
                                                    </p>
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
                                                                <span class="cart-text d-none d-xl-block">Add to
                                                                    Cart</span>
                                                                <span class="d-block d-xl-none"><i
                                                                        class="icon-handbag"></i></span>
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
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item">
                                            <div class="product-img">
                                                <a href="product-details.html"><img
                                                        src="{{ asset('assets/landing_page/img') }}/product/1.png"
                                                        alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-2">12%</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Red Rose
                                                        Bouquet</a></h2>
                                                <div class="product-price">
                                                    <span>$16</span>
                                                    <del>$19</del>
                                                </div>
                                                <div class="product-ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-brief">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Recusandae
                                                        asperiores sit odit nesciunt, aliquid, deleniti non et ut
                                                        dolorem!
                                                    </p>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" title="Add to Cart"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to
                                                                    Cart</span>
                                                                <span class="d-block d-xl-none"><i
                                                                        class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick_view_modal">
                                                                <i class="icon-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ltn__product-item -->
                                    <div class="col-lg-12">
                                        <div class="ltn__product-item">
                                            <div class="product-img">
                                                <a href="product-details.html"><img
                                                        src="{{ asset('assets/landing_page/img') }}/product/4.png"
                                                        alt="#"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="badge-1">Hot</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="product-details.html">Red Rose
                                                        Bouquet</a></h2>
                                                <div class="product-price">
                                                    <span>$16</span>
                                                </div>
                                                <div class="product-ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-brief">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Recusandae
                                                        asperiores sit odit nesciunt, aliquid, deleniti non et ut
                                                        dolorem!
                                                    </p>
                                                </div>
                                                <div class="product-hover-action product-hover-action-2">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick_view_modal">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </li>
                                                        <li class="add-to-cart">
                                                            <a href="#" title="Add to Cart"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#add_to_cart_modal">
                                                                <span class="cart-text d-none d-xl-block">Add to
                                                                    Cart</span>
                                                                <span class="d-block d-xl-none"><i
                                                                        class="icon-handbag"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Quick View"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick_view_modal">
                                                                <i class="icon-shuffle"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination ltn__pagination-2">
                            <ul>
                                <li><a href="#"><i class="icon-arrow-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#"><i class="icon-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div> --}}
                    {{ $query->links('vendor.livewire.bootstrap') }}
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->
</div>
