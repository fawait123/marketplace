@extends('layouts.landing_pages.layouts.app')

@section('content')
    @include('layouts.landing_pages.layouts.breadcrumb')
    @if (!env('APP_DEBUG'))
        <!-- LOGIN AREA START -->
        <div class="provider">
            <div class="loader">
                Getting <br>
                Location...
            </div>
        </div>
        <div class="ltn__login-area mb-100">
            <div class="container">
                <h1 id="showError" class="text-center"></h1>
                <div class="row" id="showForm">
                    <div class="col-lg-8 offset-lg-2">
                        @if ($order)
                            <h1 class="text-center">Detail Order</h1>
                            <div class="row">
                                <div class="col-6">
                                    <ul class="list-group">
                                        <li class="list-group-item">ORDER ID</li>
                                        <li class="list-group-item">NAME</li>
                                        <li class="list-group-item">EMAIL</li>
                                        <li class="list-group-item">PHONE</li>
                                        <li class="list-group-item">MECHANIC</li>
                                        <li class="list-group-item">STATUS</li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="list-group">
                                        <li class="list-group-item">{{ $order->order_id }}</li>
                                        <li class="list-group-item">{{ $order->name }}</li>
                                        <li class="list-group-item">{{ $order->email }}</li>
                                        <li class="list-group-item">{{ $order->phone }}</li>
                                        <li class="list-group-item">{{ $order->montir->name ?? '' }}</li>
                                        <li class="list-group-item">{{ $order->status }}</li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="account-login-inner section-bg-1--">
                                <form action="{{ route('order.storeFe') }}" method="POST"
                                    class="ltn__form-box contact-form-box">
                                    @csrf
                                    <p class="text-center"> To track your order please enter your Order ID in the box below
                                        and
                                        press
                                        the "Track Order" button. This was given to you on your receipt and in the
                                        confirmation
                                        email you should have received. </p>
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ auth()->user()->member->name ?? '' }}"
                                        placeholder="Found in your order confirmation email.">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{ auth()->user()->member->email ?? '' }}"
                                        placeholder="Email you used during checkout.">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ auth()->user()->member->telp ?? '' }}"
                                        placeholder="Email you used during checkout.">
                                    <label>Select Montir</label><br>
                                    <select name="montir_id" id="montir_id">
                                        @foreach ($mechanic as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="latitude" placeholder="Email you used during checkout.">
                                    <input type="hidden" name="longitude" placeholder="Email you used during checkout.">
                                    <br>
                                    <br>
                                    <div class="btn-wrapper mt-0 text-center">
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">
                                            Order</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- LOGIN AREA END -->
    @else
        <h1 class="text-center">Comming Soon {{ env('APP_DEBUG') ? 'TRUE' : 'FALSE' }}</h1>
    @endif
@endsection

@if ($order)
    @push('customjs')
        <script>
            // Initialize and add the map
            $(document).ready(function() {
                $('.provider').addClass('d-none');
            })
        </script>
    @endpush
@endif

@if (!$order)
    @push('customjs')
        <script>
            let x = document.getElementById('showError')

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else {
                    toastr.info('Geolocation is not supported by this browser.')
                }
            }

            function showPosition(position) {
                console.log(position)
                let latitude = position.coords.latitude
                $("input[name=latitude]").val(latitude)
                let longitude = position.coords.longitude
                $("input[name=longitude]").val(longitude)
                if (position) {
                    $('.provider').addClass('d-none');
                }
            }

            function showError(error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        x.innerHTML = "User denied the request for Geolocation."
                        $('#showForm').addClass('d-none');
                        $('.provider').addClass('d-none');
                        break;
                    case error.POSITION_UNAVAILABLE:
                        x.innerHTML = "Location information is unavailable."
                        $('#showForm').addClass('d-none');
                        $('.provider').addClass('d-none');
                        break;
                    case error.TIMEOUT:
                        x.innerHTML = "The request to get user location timed out."
                        $('#showForm').addClass('d-none');
                        $('.provider').addClass('d-none');
                        break;
                    case error.UNKNOWN_ERROR:
                        x.innerHTML = "An unknown error occurred."
                        $('#showForm').addClass('d-none');
                        $('.provider').addClass('d-none');
                        break;
                }
            }

            $(document).ready(function() {
                getLocation()
            })
        </script>
    @endpush
@endif
