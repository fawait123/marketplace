@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="row">

                        <div id='calendar' class="col-lg-12 col-md-12 mt-3 mt-lg-0"></div>

                    </div>
                    <!-- end row -->

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection


@push('customjs')
    <script>
        $(document).ready(function() {
            let width = window.innerWidth;
            let options = {
                dayMaxEvents: true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                initialView: 'dayGridMonth',
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
                dateClick: function() {
                    alert('a day has been clicked!');
                }
            };

            if (width > 700) {
                options.headerToolbar = {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                };
                options.initialView = 'dayGridMonth';
            } else if (width <= 700 && width >= 500) {
                options.headerToolbar = {
                    left: 'prev,next',
                    center: 'title',
                    right: ''
                };
                options.initialView = 'listWeek';
            } else {
                options.headerToolbar = {
                    left: '',
                    center: 'title',
                    right: 'timeGridDay,listWeek'
                };
                options.initialView = 'timeGridDay';
            }

            let calendarEl = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarEl, options);
            calendar.render();
        })
    </script>
@endpush
