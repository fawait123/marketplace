<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" style="scrollbar-width: none;">
                        <table class="table-bordered table-striped table" id="table-member">
                            <thead>
                                <tr>
                                    <th width="10%">NO</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Email</th>
                                    <th>Telp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('customjs')
    <script>
        $(document).ready(function() {

            // datatable
            $('#table-member').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('member.json') }}",
                    dataType: "json",
                    type: "GET",
                },
                columns: [{
                        data: "no"
                    }, {
                        data: "name"
                    },
                    {
                        data: "foto"
                    },
                    {
                        data: "email"
                    },
                    {
                        data: "telp"
                    },
                    {
                        data: "gender"
                    },
                    {
                        data: "status"
                    },
                    {
                        data: "options"
                    }
                ],
            })
            // update status member
            $(document).on('change', 'input[type=checkbox]', function() {
                let id = $(this).data('id')
                let status = $(this).data('status')
                // console.log(id, status)
                status = status == 0 ? 1 : 0;
                $.ajax({
                    url: '{{ route('member.status') }}',
                    type: 'get',
                    data: {
                        status: status,
                        id: id
                    },
                    success: function(res) {
                        // console.log(res)
                        if (res === 'success') {
                            // window.location.reload();
                            toastr.info('Update status member success')
                        }
                    }
                })
            })

            //
            $('input[type="checkbox"]').each(function(idx, obj) {
                new Switchery($(this)[0], $(this).data());
                console.log(idx)
            })
        })
    </script>
@endpush
