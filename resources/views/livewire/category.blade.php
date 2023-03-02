<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" style="scrollbar-width: none;">
                        <table class="table-bordered table-striped table" id="table-categories">
                            <thead>
                                <tr>
                                    <th width="10%">NO</th>
                                    <th>Name</th>
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
            $('#table-categories').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('category.json') }}",
                    dataType: "json",
                    type: "GET",
                },
                columns: [{
                    data: "no"
                }, {
                    data: "name"
                }, {
                    data: 'options'
                }],
            })
        })
    </script>
@endpush
