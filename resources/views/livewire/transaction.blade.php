<div>
    {{-- Stop trying to control. --}}
</div>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Payment Method</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($query) > 0)
                                    @foreach ($query as $item)
                                        @php
                                            $additional = json_decode($item->additional);
                                            $total = $item->total + $additional->price;
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->payment_method == 'take_away' ? 'Take Away' : 'Cash On Delivery' }}
                                            </td>
                                            <td><b class="text-primary">Rp. {{ number_format($total, 2, ',', '.') }}</b>
                                            </td>
                                            <td>
                                                <select name="status" id="status" class="status"
                                                    data-id="{{ $item->id }}">
                                                    <option value="created"
                                                        {{ $item->status == 'created' ? 'selected' : '' }}>Created
                                                    </option>
                                                    <option value="process"
                                                        {{ $item->status == 'process' ? 'selected' : '' }}>Process
                                                    </option>
                                                    <option value="completed"
                                                        {{ $item->status == 'completed' ? 'selected' : '' }}>Completed
                                                    </option>
                                                </select>
                                            </td>
                                            <td align="center">
                                                <a href="{{ route('transaction.show', $item->id) }}"
                                                    class="text-primary"><i class="mdi mdi-eye-circle"></i></a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('category.destroy', $item->id) }}"
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
                                        <td colspan="3" align="center">Not found</td>
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
            $(".status").on('change', function() {
                let value = $(this).val();
                let id = $(this).data('id')
                $.ajax({
                    url: '{{ route('transaction.change.status') }}',
                    type: 'get',
                    data: {
                        status: value,
                        id: id
                    },
                    beforeSend: function() {
                        let html = '<span>Loading...</span>';
                        $(this).parent().html(html)
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
