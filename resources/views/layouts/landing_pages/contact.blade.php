@extends('layouts.landing_pages.layouts.app')

@section('content')
    @include('layouts.landing_pages.layouts.breadcrumb')
    <!-- CONTACT ADDRESS AREA START -->
    <div class="ltn__contact-address-area mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <i class="icon-location-pin"></i>
                        </div>
                        <h3>Email Address</h3>
                        <p>info@webmail.com <br>
                            jobs@webexample.com</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <i class="icon-phone"></i>
                        </div>
                        <h3>Phone Number</h3>
                        <p>+1234-567 890 <br>
                            +09876-543 210</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <i class="icon-envelope"></i>
                        </div>
                        <h3>Email & Web</h3>
                        <p>info@webmail.com <br>
                            jobs@webexample.com</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <i class="icon-speedometer"></i>
                        </div>
                        <h3>Opening Hours</h3>
                        <p>Fri to Wed: 6:00 Am to 8:00 Pm <br>
                            Thursday - Off</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT ADDRESS AREA END -->

    <!-- GOOGLE MAP AREA START -->
    <div class="ltn_google-map-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="google-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9334.271551495209!2d-73.97198251485975!3d40.668170674982946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25b0456b5a2e7%3A0x68bdf865dda0b669!2sBrooklyn%20Botanic%20Garden%20Shop!5e0!3m2!1sen!2sbd!4v1590597267201!5m2!1sen!2sbd"
                            width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- GOOGLE MAP AREA END -->
@endsection
