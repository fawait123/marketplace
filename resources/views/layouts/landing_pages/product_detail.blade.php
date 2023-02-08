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
                                            <img src="{{ asset('assets/landing_page/img') }}/product/1.png" alt="Image">
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
                                            <a href="{{ asset('assets/landing_page/img') }}/product/1.png"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('assets/landing_page/img') }}/product/1.png"
                                                    alt="Image">
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
                                    <h3>Pink Flower Tree Red</h3>
                                    <div class="product-price-ratting mb-20">
                                        <ul>
                                            <li>
                                                <div class="product-price">
                                                    <span>$49.00</span>
                                                    <del>$65.00</del>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-product-brief">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos repellendus
                                            repudiandae incidunt quidem pariatur expedita, quo quis modi tempore non.</p>
                                    </div>
                                    <div class="ltn__product-details-menu-2 product-cart-wishlist-btn mb-30">
                                        <ul>
                                            <li>
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="02" name="qtybutton"
                                                        class="cart-plus-minus-box">
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="theme-btn-1 btn btn-effect-1 d-add-to-cart"
                                                    title="Add to Cart" data-bs-toggle="modal"
                                                    data-bs-target="#add_to_cart_modal">
                                                    <span>ADD TO CART</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-effect-1 d-add-to-wishlist"
                                                    title="Add to Cart" data-bs-toggle="modal"
                                                    data-bs-target="#add_to_cart_modal">
                                                    <i class="icon-heart"></i>
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

    <!-- SHOP DETAILS TAB AREA START -->
    <div class="ltn__shop-details-tab-area pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__shop-details-tab-inner">
                        <div class="ltn__shop-details-tab-menu">
                            <div class="nav">
                                <a class="active show" data-bs-toggle="tab" href="#liton_tab_details_1_1">Description</a>
                                <a data-bs-toggle="tab" href="#liton_tab_details_1_2" class="">Reviews</a>
                                <!-- <a data-bs-toggle="tab" href="#liton_tab_details_1_3" class="">Comments</a> -->
                                <a data-bs-toggle="tab" href="#liton_tab_details_1_4" class="">Shipping</a>
                                <!-- <a data-bs-toggle="tab" href="#liton_tab_details_1_5" class="">Size Chart</a> -->
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                                <div class="ltn__shop-details-tab-content-inner text-center">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nost
                                        exercit ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                        pariatur Excepte sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error
                                        sit volu accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                                        illo inventore veritatis et quasi architecto beatae vitae dicta sunt explica Nemllo
                                        enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_details_1_2">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <div class="customer-reviews-head text-center">
                                        <h4 class="title-2">Customer Reviews</h4>
                                        <div class="product-ratting">
                                            <ul>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <!-- comment-area -->
                                            <div class="ltn__comment-area mb-30">
                                                <div class="ltn__comment-inner">
                                                    <ul>
                                                        <li>
                                                            <div class="ltn__comment-item clearfix">
                                                                <div class="ltn__commenter-img">
                                                                    <img src="{{ asset('assets/landing_page/img') }}/testimonial/1.jpg"
                                                                        alt="Image">
                                                                </div>
                                                                <div class="ltn__commenter-comment">
                                                                    <h6><a href="#">Adam Smit</a></h6>
                                                                    <div class="product-ratting">
                                                                        <ul>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star-half-alt"></i></a>
                                                                            </li>
                                                                            <li><a href="#"><i
                                                                                        class="far fa-star"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                        elit. Doloribus, omnis fugit corporis iste magnam
                                                                        ratione.</p>
                                                                    <span class="ltn__comment-reply-btn">September 3,
                                                                        2020</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="ltn__comment-item clearfix">
                                                                <div class="ltn__commenter-img">
                                                                    <img src="{{ asset('assets/landing_page/img') }}/testimonial/3.jpg"
                                                                        alt="Image">
                                                                </div>
                                                                <div class="ltn__commenter-comment">
                                                                    <h6><a href="#">Adam Smit</a></h6>
                                                                    <div class="product-ratting">
                                                                        <ul>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star-half-alt"></i></a>
                                                                            </li>
                                                                            <li><a href="#"><i
                                                                                        class="far fa-star"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                        elit. Doloribus, omnis fugit corporis iste magnam
                                                                        ratione.</p>
                                                                    <span class="ltn__comment-reply-btn">September 2,
                                                                        2020</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="ltn__comment-item clearfix">
                                                                <div class="ltn__commenter-img">
                                                                    <img src="{{ asset('assets/landing_page/img') }}/testimonial/2.jpg"
                                                                        alt="Image">
                                                                </div>
                                                                <div class="ltn__commenter-comment">
                                                                    <h6><a href="#">Adam Smit</a></h6>
                                                                    <div class="product-ratting">
                                                                        <ul>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i
                                                                                        class="fas fa-star-half-alt"></i></a>
                                                                            </li>
                                                                            <li><a href="#"><i
                                                                                        class="far fa-star"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                        elit. Doloribus, omnis fugit corporis iste magnam
                                                                        ratione.</p>
                                                                    <span class="ltn__comment-reply-btn">September 2,
                                                                        2020</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <!-- comment-reply -->
                                            <div class="ltn__comment-reply-area ltn__form-box mb-60">
                                                <form action="#">
                                                    <h4 class="title-2">Add a Review</h4>
                                                    <div class="mb-30">
                                                        <div class="add-a-review">
                                                            <h6>Your Ratings:</h6>
                                                            <div class="product-ratting">
                                                                <ul>
                                                                    <li><a href="#"><i class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i class="fas fa-star"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fas fa-star-half-alt"></i></a></li>
                                                                    <li><a href="#"><i class="far fa-star"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                                        <textarea placeholder="Type your comments...."></textarea>
                                                    </div>
                                                    <div class="input-item input-item-name ltn__custom-icon">
                                                        <input type="text" placeholder="Type your name....">
                                                    </div>
                                                    <div class="input-item input-item-email ltn__custom-icon">
                                                        <input type="email" placeholder="Type your email....">
                                                    </div>
                                                    <div class="input-item input-item-website ltn__custom-icon">
                                                        <input type="text" name="website"
                                                            placeholder="Type your website....">
                                                    </div>
                                                    <label class="mb-0"><input type="checkbox" name="agree"> Save my
                                                        name, email, and website in this browser for the next time I
                                                        comment.</label>
                                                    <div class="btn-wrapper">
                                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase"
                                                            type="submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_details_1_3">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <!-- comment-area -->
                                    <div class="ltn__comment-area mb-30">
                                        <h4 class="title-2">Comments (5)</h4>
                                        <div class="ltn__comment-inner">
                                            <ul>
                                                <li>
                                                    <div class="ltn__comment-item clearfix">
                                                        <div class="ltn__commenter-img">
                                                            <img src="{{ asset('assets/landing_page/img') }}/testimonial/1.jpg"
                                                                alt="Image">
                                                        </div>
                                                        <div class="ltn__commenter-comment">
                                                            <h6><a href="#">Adam Smit</a></h6>
                                                            <span class="comment-date">20th May 2020</span>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                            <a href="#" class="ltn__comment-reply-btn"><i
                                                                    class="fas fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="ltn__comment-item clearfix">
                                                        <div class="ltn__commenter-img">
                                                            <img src="{{ asset('assets/landing_page/img') }}/testimonial/3.jpg"
                                                                alt="Image">
                                                        </div>
                                                        <div class="ltn__commenter-comment">
                                                            <h6><a href="#">Adam Smit</a></h6>
                                                            <span class="comment-date">20th May 2020</span>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                            <a href="#" class="ltn__comment-reply-btn"><i
                                                                    class="fas fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <div class="ltn__comment-item clearfix">
                                                                <div class="ltn__commenter-img">
                                                                    <img src="{{ asset('assets/landing_page/img') }}/testimonial/4.jpg"
                                                                        alt="Image">
                                                                </div>
                                                                <div class="ltn__commenter-comment">
                                                                    <h6><a href="#">Adam Smit</a></h6>
                                                                    <span class="comment-date">20th May 2020</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                        elit. Doloribus, omnis fugit corporis iste magnam
                                                                        ratione.</p>
                                                                    <a href="#" class="ltn__comment-reply-btn"><i
                                                                            class="fas fa-reply"></i>Reply</a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="ltn__comment-item clearfix">
                                                                <div class="ltn__commenter-img">
                                                                    <img src="{{ asset('assets/landing_page/img') }}/testimonial/1.jpg"
                                                                        alt="Image">
                                                                </div>
                                                                <div class="ltn__commenter-comment">
                                                                    <h6><a href="#">Adam Smit</a></h6>
                                                                    <span class="comment-date">20th May 2020</span>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                        elit. Doloribus, omnis fugit corporis iste magnam
                                                                        ratione.</p>
                                                                    <a href="#" class="ltn__comment-reply-btn"><i
                                                                            class="fas fa-reply"></i>Reply</a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="ltn__comment-item clearfix">
                                                        <div class="ltn__commenter-img">
                                                            <img src="{{ asset('assets/landing_page/img') }}/testimonial/2.jpg"
                                                                alt="Image">
                                                        </div>
                                                        <div class="ltn__commenter-comment">
                                                            <h6><a href="#">Adam Smit</a></h6>
                                                            <span class="comment-date">20th May 2020</span>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                            <a href="#" class="ltn__comment-reply-btn"><i
                                                                    class="fas fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- comment-reply -->
                                    <div class="ltn__comment-reply-area ltn__form-box mb-60">
                                        <form action="#">
                                            <h4 class="title-2">Leave a Reply</h4>
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <textarea placeholder="Type your comments...."></textarea>
                                            </div>
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" placeholder="Type your name....">
                                            </div>
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" placeholder="Type your email....">
                                            </div>
                                            <div class="input-item input-item-website ltn__custom-icon">
                                                <input type="text" name="website" placeholder="Type your website....">
                                            </div>
                                            <label class="mb-0"><input type="checkbox" name="agree"> Save my name,
                                                email, and website in this browser for the next time I comment.</label>
                                            <div class="btn-wrapper">
                                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase"
                                                    type="submit"><i class="far fa-comments"></i> Post Comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_details_1_4">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <h4 class="title-2">Shipping policy for our store</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam voluptates rerum neque
                                        ea libero numquam officiis ipsum, consectetur ducimus dicta in earum repellat sunt
                                        ab odit laboriosam cupiditate ipsam, doloremque.</p>
                                    <ul>
                                        <li>1-2 business days (Typically by end of day)</li>
                                        <li><a href="#">30 days money back guaranty</a></li>
                                        <li>24/7 live support</li>
                                        <li>odio dignissim qui blandit praesent</li>
                                        <li>luptatum zzril delenit augue duis dolore</li>
                                        <li>te feugait nulla facilisi.</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, quia vel eligendi
                                        ipsam. Ea, quasi quam ducimus recusandae unde ipsa nam rem a minus tenetur quae sint
                                        voluptatem voluptate inventore.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_details_1_5">
                                <div class="ltn__shop-details-tab-content-inner">

                                    <div class="table-1 mb-20">
                                        <table class="">
                                            <tbody>
                                                <tr>
                                                    <th>SIZE</th>
                                                    <th>XS</th>
                                                    <th>S</th>
                                                    <th>S/M</th>
                                                    <th>M</th>
                                                    <th>M/L</th>
                                                    <th>L</th>
                                                    <th>XL</th>
                                                </tr>
                                                <tr data-bs-region="uk">
                                                    <th>UK</th>
                                                    <td>4</td>
                                                    <td>6 - 8</td>
                                                    <td>6 - 10</td>
                                                    <td>10 - 12</td>
                                                    <td>12 - 16</td>
                                                    <td>14 - 16</td>
                                                    <td>18</td>
                                                </tr>
                                                <tr data-bs-region="eur">
                                                    <th>
                                                        <span class="mobile-show">EUR</span><span
                                                            class="mobile-none">EUROPE</span>
                                                    </th>
                                                    <td>32</td>
                                                    <td>34 - 36</td>
                                                    <td>34 - 38</td>
                                                    <td>38 - 40</td>
                                                    <td>40 - 44</td>
                                                    <td>42 - 44</td>
                                                    <td>46</td>
                                                </tr>
                                                <tr data-bs-region="usa">
                                                    <th>
                                                        <span>USA/</span><span class="mobile-none">CANADA</span><span
                                                            class="mobile-show"> CA</span>
                                                    </th>
                                                    <td>0</td>
                                                    <td>2 - 4</td>
                                                    <td>2 - 6</td>
                                                    <td>6 - 8</td>
                                                    <td>8 - 12</td>
                                                    <td>10 - 12</td>
                                                    <td>14</td>
                                                </tr>
                                                <tr data-bs-region="aus">
                                                    <th>AUS / NZ</th>
                                                    <td>4</td>
                                                    <td>6 - 8</td>
                                                    <td>6 - 10</td>
                                                    <td>10 - 12</td>
                                                    <td>12 - 16</td>
                                                    <td>14 - 16</td>
                                                    <td>18</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS TAB AREA END -->
@endsection
