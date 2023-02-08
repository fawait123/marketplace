@extends('layouts.landing_pages.layouts.app')

@section('content')
    <!-- PRODUCT DETAILS AREA START -->
    @include('layouts.landing_pages.layouts.breadcrumb')
    <livewire:product />
@endsection
