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
                    <div class="table-responsive">
                        <table class="table-bordered table-striped table">
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
                            <tbody>
                                @if (count($query) > 0)
                                    @foreach ($query as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><img class="img-fluid" style="widows: 120px" src="{{ $item->foto }}"
                                                    alt=""></td>
                                            <td>{{ $item->user->email }}</td>
                                            <td>{{ $item->telp }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>
                                                <input type="checkbox" data-id="{{ $item->id }}"
                                                    data-status={{ $item->is_active }}
                                                    {{ $item->is_active == 0 ? '' : 'checked' }} data-toggle="switchery"
                                                    data-color="#df3554" data-size="small" />
                                            </td>
                                            <td>
                                                <a href="{{ route('member.edit', $item->id) }}" class="text-primary"><i
                                                        class="mdi mdi-lead-pencil"></i></a>
                                                <a href="#" data-toggle="modal"
                                                    data-target="#exampleModal{{ $loop->iteration }}"
                                                    class="text-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('member.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                Confirmation</h5>
                                                            <button type="button"
                                                                class="close waves-effect waves-light"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure want to delete data {{ $item->name }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-secondary waves-effect waves-light"
                                                                data-dismiss="modal">No</button>
                                                            <button type="submit"
                                                                class="btn btn-primary waves-effect waves-light">Yes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" align="center">Not found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{ $query->links('vendor.livewire.simple-bootstrap') }}
                </div>
            </div>
        </div>
    </div>
</div>

@push('customjs')
    <script>
        $(document).ready(function() {
            $("input[type=checkbox]").on('change', function() {
                let id = $(this).data('id')
                let status = $(this).data('status')
                status = status == 0 ? 1 : 0;
                $.ajax({
                    url: '{{ route('member.status') }}',
                    type: 'get',
                    data: {
                        status: status,
                        id: id
                    },
                    success: function(res) {
                        console.log(res)
                        if (res === 'success') {
                            window.location.reload();
                        }
                    }
                })
            })
        })
    </script>
@endpush
