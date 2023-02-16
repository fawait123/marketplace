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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Booking Event</h5>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="booking-content">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-light"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
                dateClick: function(info) {
                    // alert('a day has been clicked!');
                    $.ajax({
                        url: '{{ route('booking.search') }}',
                        type: 'get',
                        data: {
                            date: info.dateStr
                        },
                        success: function(res) {
                            console.log(res)
                            let html = ''
                            if (res.length > 0) {
                                html += `<ol class="list-group list-group-numbered">`
                                res.map((el) => {
                                    let routeEdit =
                                        "{{ route('booking.edit', '__row') }}"
                                    routeEdit = routeEdit.replace('__row', el.id)

                                    let routeDestroy =
                                        "{{ route('booking.destroy', '__row') }}"
                                    routeDestroy = routeDestroy.replace('__row', el.id)
                                    html += `<li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">${el.title} ${el.date}</div>
                                                    ${el.status} <br>
                                                    <select name="status" id="status" class="status">
                                                        <option value="created"  data-id="${el.id}" ${el.status==='created' ? 'selected':''}>Created</option>
                                                        <option value="process"  data-id="${el.id}"  ${el.status==='process' ? 'selected':''}>Process</option>
                                                        <option value="completed"  data-id="${el.id}"  ${el.status==='completed' ? 'selected':''}>Completed</option>
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a href="${routeEdit}"><span class="badge bg-primary rounded-pill text-white"><i
                                                                    class="mdi mdi-pencil-outline"></i></span></a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="${routeDestroy}"><span class="badge bg-danger rounded-pill text-white"><i
                                                                    class="mdi mdi-trash-can-outline"></i></span></a>
                                                    </div>
                                                </div>
                                            </li>`
                                })

                                html += `</ol>`
                            } else {
                                html += '<h6>No data to display</h6>'
                            }
                            $("#booking-content").html(html)

                            $("#exampleModal").modal('show')
                        }
                    })
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


            $(document).on('change', '.status', function() {
                let value = $(this).find(':selected').val();
                let id = $(this).find(':selected').data('id');
                $.ajax({
                    url: '{{ route('booking.status') }}',
                    type: 'get',
                    data: {
                        id: id,
                        status: value
                    },
                    success: function(res) {
                        console.log(res)
                        if (res === 'success') {
                            console.log('reload')
                            window.location.reload();
                        }
                    }
                })
            })
        })
    </script>
@endpush
