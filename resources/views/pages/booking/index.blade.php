@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="row">

                        <div id='calendar' class="col-lg-12 col-md-8 mt-3 mt-lg-0"></div>

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
                events: [{
                        title: 'All Day Event',
                        start: '2023-02-14',
                        textColor: 'white',
                        backgroundColor: '#18122B'
                    },
                    {
                        title: 'Long Event',
                        start: '2023-02-11',
                        end: '2023-02-14',
                        textColor: '#ffff',
                        backgroundColor: '#18122B'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2023-02-13',
                        allDay: true,
                        textColor: '#ffff',
                        backgroundColor: '#18122B'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2023-02-10',
                        allDay: true,
                        textColor: '#ffff',
                        backgroundColor: '#18122B'
                    },
                    {
                        title: 'Meeting',
                        start: '2023-02-09',
                        allDay: true,
                        textColor: '#ffff',
                        backgroundColor: '#18122B'
                    },
                    {
                        title: 'Lunch',
                        start: '2023-02-10',
                        end: '2023-02-12',
                        allDay: true,
                        textColor: '#ffff',
                        backgroundColor: '#18122B'
                    },
                ],
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
