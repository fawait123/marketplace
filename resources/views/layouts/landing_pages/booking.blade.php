@extends('layouts.landing_pages.layouts.app')

@section('content')
    @include('layouts.landing_pages.layouts.breadcrumb')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 mb-3">
                @if (auth()->user()->member && auth()->user()->member->is_active == 1)
                    <div id="calendar" style="height: 600px;"></div>
                @else
                    <h1>This page can only be accessed with member status</h1>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('customjs')
    <script>
        $(document).ready(function() {
            let calendarEl = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                timeZone: 'UTC',
                events: {
                    url: '{{ route('booking.get') }}',
                    type: 'GET',
                    data: {
                        custom_param1: 'something',
                        custom_param2: 'somethingelse'
                    },
                    error: function() {
                        alert('there was an error while fetching events!');
                    },
                    // color: 'yellow', // a non-ajax option
                    // textColor: 'black' // a non-ajax option
                }
            });
            calendar.on('dateClick', function(info) {
                let date = info.dateStr
                $("#booking_date").val(date)
                $('#modal_booking').modal('show')
            });
            calendar.render();


            $("#btn_booking").on('click', function() {
                let formData = $("#form_booking").serialize();
                $.ajax({
                    url: '{{ route('booking.store.fe') }}',
                    type: 'get',
                    data: formData,
                    beforeSend: function() {
                        $("#btn_booking").attr('disabled', true);
                        $("#btn_booking").html('Checking...');
                    },
                    success: function(res) {
                        $("#btn_booking").attr('disabled', false);
                        $("#btn_booking").html('Booking');
                        // setTimeout(() => {
                        //     $('#modal_booking').modal('hide')
                        // }, 1000);
                        $("input[name=description]").val('')
                        if (res === 'success') {
                            toastr.info('Booking added successfully')
                        }

                        if (res === 'warning') {
                            toastr.info('you have made a reservation on the date ' + $(
                                "#booking_date").val())
                        }
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    },
                    complete: function(data) {
                        $("#btn_booking").attr('disabled', false);
                        $("#btn_booking").html('Booking');
                    }
                })
            })
        })
    </script>
@endpush
