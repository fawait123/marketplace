@extends('layouts.landing_pages.layouts.app')

@section('content')
    @include('layouts.landing_pages.layouts.breadcrumb')
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
                    <div class="account-login-inner section-bg-1--">
                        <form action="{{ route('order.storeFe') }}" method="POST" class="ltn__form-box contact-form-box">
                            @csrf
                            <p class="text-center"> To track your order please enter your Order ID in the box below and
                                press
                                the "Track Order" button. This was given to you on your receipt and in the confirmation
                                email you should have received. </p>
                            <label>Name</label>
                            <input type="text" name="name" value="{{ auth()->user()->member->name ?? '' }}"
                                placeholder="Found in your order confirmation email.">
                            <label>Phone</label>
                            <input type="text" name="phone" value="{{ auth()->user()->member->telp ?? '' }}"
                                placeholder="Email you used during checkout.">
                            <input type="text" name="latitude" placeholder="Email you used during checkout.">
                            <input type="text" name="longitude" placeholder="Email you used during checkout.">
                            <div class="btn-wrapper mt-0 text-center">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">
                                    Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN AREA END -->
@endsection

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
