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
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="10%">NO</th>
                                    <th>Name</th>
                                    <th>Foto</th>
                                    <th>QR Code</th>
                                    <th>deskripsi</th>
                                    <th>Harga</th>
                                    <th>Harga Promo</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    use SimpleSoftwareIO\QrCode\Facades\QrCode;
                                @endphp
                                @if (count($query) > 0)
                                    @foreach ($query as $key => $item)
                                        <tr>
                                            <td>{{ $query->firstItem() + $key }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><img style="width: 500px" src="{{ $item->foto }}"
                                                    class="img-thumbnail" alt="">
                                            </td>
                                            <td>{{ QrCode::size(100)->generate($item->qrcode) }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>{{ $item->harga }}</td>
                                            <td>{{ $item->harga_promo }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->stok }}</td>
                                            <td>
                                                <a href="{{ route('product.edit', $item->id) }}?id={{ $item->id }}"
                                                    class="text-primary"><i class="mdi mdi-lead-pencil"></i></a>
                                                <a href="#" data-toggle="modal"
                                                    data-target="#exampleModal{{ $loop->iteration }}"
                                                    class="text-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('product.destroy', $item->id) }}"
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
                                        <td colspan="10" align="center">Not found</td>
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
