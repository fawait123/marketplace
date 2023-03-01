@extends('layouts.landing_pages.layouts.app')

@section('content')
    @include('layouts.landing_pages.layouts.breadcrumb')
    <div class="provider d-none">
        <div class="loader">
            Loading...
        </div>
    </div>
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
                },
                eventDoubleClick: function(calEvent, jsEvent, view) {
                    alert('Event: ' + calEvent.title);
                }
            });
            calendar.on('dateClick', function(info) {
                $('.provider').removeClass('d-none')
                let date = info.dateStr
                $.ajax({
                    url: '{{ route('booking.check') }}',
                    type: "get",
                    data: {
                        date: date
                    },
                    success: function(res) {
                        $('.provider').addClass('d-none')
                        if (res.data1) {
                            let data1 = res.data1
                            let html = `<li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">${data1.title}</div>
                                            <u>${data1.user.name}</u>, ${data1.merk}
                                        </div>
                                        <span class="badge bg-primary rounded-pill">${data1.status}</span>
                                    </li>`;
                            res.data2.map((el) => {
                                html += `<li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">${el.title}</div>
                                            ${el.user.name}, ${el.merk}
                                        </div>
                                        <span class="badge bg-primary rounded-pill">${el.status}</span>
                                    </li>`;
                            })
                            $("#modal_date").html(date)
                            $("#body_modal_detail").html(html)
                            $('#modal_booking_info').modal('show')
                        } else {
                            $("#booking_date").val(date)
                            $('#modal_booking').modal('show')
                        }
                    }
                })
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
                        if (res === 'full') {
                            toastr.info('Booking full')
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
