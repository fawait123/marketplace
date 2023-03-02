<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <select wire:model="limit" name="" id="">
                        <option value="10" selected>10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <br>
                    <br>
                    <div class="table-responsive" style="scrollbar-width: none;">
                        <table class="table-bordered table-striped table" id="table-montir">
                            <thead>
                                <tr>
                                    <th width="10%">NO</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Spesialis</th>
                                    <th>Phone</th>
                                    <th>Email</th>
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
        // datatable
        $(document).ready(function() {
            $('#table-montir').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('montir.json') }}",
                    dataType: "json",
                    type: "GET",
                },
                columns: [{
                        data: "no"
                    }, {
                        data: "name"
                    },
                    {
                        data: "gender"
                    },
                    {
                        data: "focus"
                    },
                    {
                        data: "phone"
                    },
                    {
                        data: "email"
                    },
                    {
                        data: 'options'
                    }
                ],
            })
        })
    </script>
@endpush
