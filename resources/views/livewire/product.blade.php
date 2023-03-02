@php
    use App\Helpers\Utils;
    function random_color_part()
    {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }
    
    function random_color()
    {
        return random_color_part() . random_color_part() . random_color_part();
    }
@endphp
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
                                    <select class="nice-select" wire:model="category" id="select-category">
                                        <option value="">select</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <form action="{{ route('product') }}" method="GET" id="form-category">
                                        <input type="hidden" name="category" id="input-category">
                                    </form>
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
                                    @if (count($query) > 0)
                                        @foreach ($query as $item)
                                            @php
                                                $persen = ($item->harga_promo / $item->harga) * 100;
                                                $persen = ceil($persen);
                                            @endphp
                                            <!-- ltn__product-item -->
                                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                <div class="ltn__product-item text-center">
                                                    <div class="product-img">
                                                        <a href="{{ route('product.detail', $item->id) }}"><img
                                                                src="{{ Utils::url($item->foto) }}" alt="No Image"></a>
                                                        <div class="product-badge">
                                                            <ul>
                                                                <li class="badge-1"
                                                                    style="background: #{{ random_color() }}">
                                                                    {{ $persen }}%</li>
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
                                                            <span>Rp.
                                                                {{ $item->harga_promo ? number_format($item->harga_promo, 2, ',', '.') : number_format($item->harga, 2, ',', '.') }}</span>
                                                            <del>{{ $item->harga_promo ? number_format($item->harga, 2, ',', '.') : number_format($item->harga_promo, 2, ',', '.') }}</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h1 class="text-center">Data not found</h1>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    @if (count($query) > 0)
                                        @foreach ($query as $item)
                                            @php
                                                $persen = ($item->harga_promo / $item->harga) * 100;
                                                $persen = ceil($persen);
                                            @endphp
                                            <!-- ltn__product-item -->
                                            <div class="col-lg-12">
                                                <div class="ltn__product-item">
                                                    <div class="product-img">
                                                        <a href="{{ route('product.detail', $item->id) }}"><img
                                                                src="{{ Utils::url($item->foto) }}" alt="No Image"></a>
                                                        <div class="product-badge">
                                                            <ul>
                                                                <li class="badge-1"
                                                                    style="background: #{{ random_color() }}">
                                                                    {{ $persen }}%</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <h2 class="product-title"><a
                                                                href="product-details.html">{{ $item->name }}</a>
                                                        </h2>
                                                        <div class="product-price">
                                                            <span>Rp.
                                                                {{ $item->harga_promo ? number_format($item->harga_promo, 2, ',', '.') : number_format($item->harga, 2, ',', '.') }}</span>
                                                            <del>{{ $item->harga_promo ? number_format($item->harga, 2, ',', '.') : number_format($item->harga_promo, 2, ',', '.') }}</del>
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
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h1 class="text-center">Data not found</h1>
                                    @endif
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

@push('customjs')
    <script>
        $(document).ready(function() {
            $('#select-category').on('change', function() {
                let val = $(this).find(':selected').val();
                $('#input-category').val(val);
                let url = customUrl('category', val)
                console.log(url)
                window.location.href = url
            })
        })
    </script>
@endpush
