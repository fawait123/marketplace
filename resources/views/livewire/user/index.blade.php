<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" style="scrollbar-width: none;">
                        <table class="table-bordered table-striped table" id="table-users">
                            <thead>
                                <tr>
                                    <th width="10%">NO</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Role</th>
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
            $('#table-users').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('user.json') }}",
                    dataType: "json",
                    type: "GET",
                },
                columns: [{
                        data: "no"
                    },
                    {
                        data: "name"
                    },
                    {
                        data: "email"
                    },
                    {
                        data: "foto"
                    },
                    {
                        data: "role"
                    },
                    {
                        data: 'options'
                    }
                ],
            })
        })
    </script>
@endpush
