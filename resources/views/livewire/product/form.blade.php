<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ isset($id) ? route('product.update', $id) : route('product.store') }}" method="post"
                    enctype="multipart/form-data" id="form-add">
                    @csrf
                    @if (isset($id))
                        @method('put')
                    @endif
                    <div class="form-group">
                        <label for="product">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product">Price</label>
                        <input type="text" name="harga" value="{{ old('harga') }}"
                            class="form-control @error('harga') is-invalid @enderror">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product">Promo Price</label>
                        <input type="text" name="harga_promo" value="{{ old('harga_promo') }}"
                            class="form-control @error('harga_promo') is-invalid @enderror">
                        @error('harga_promo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product">Stok</label>
                        <input type="text" name="stok" value="{{ old('stok') }}"
                            class="form-control @error('stok') is-invalid @enderror">
                        @error('stok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product">Category</label>
                        <select class="form-control category_id" id="category_id" name="category_id">
                            @foreach ($category as $ktg)
                                <option value="{{ $ktg['id'] }}"
                                    {{ old('category_id') == $ktg->id ? 'selected' : '' }}>{{ $ktg['name'] }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product">Description</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="" cols="30"
                            rows="10">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product">Image</label>
                        <input type="file" name="foto" id="foto"
                            value="{{ isset($id) ? $product->foto : '' }}" class="dropify">
                        @error('foto')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-warning btn-block" type="button" id="btn-add">Add another
                                    image</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-danger btn-block" type="button" id="btn-remove">Remove another
                                    image</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @for ($i = 0; $i < $count; $i++)
                            <div class="col-6 mb-3">
                                <input type="file" name="additionalImageFile[]" id="foto"
                                    data-id="{{ $i }}" class="dropify additionalImage">
                            </div>
                        @endfor
                    </div>
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="row-12">
                                @if ($errors->has('additionalImageFile.*'))
                                    <ul>
                                        @foreach ($errors->get('additionalImageFile.*') as $errors)
                                            @foreach ($errors as $error)
                                                <li class="text-danger text-small">{{ $error }}</li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="count" value="{{ request('count') }}">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ isset($id) ? 'Update' : 'Create' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('customjs')
    <script>
        $(document).ready(function() {
            $("#btn-add").on('click', function() {
                let urlParams = new URLSearchParams(window.location.search);
                let myParam = urlParams.get('count');
                myParam = parseInt(myParam) + 1
                window.location.href = "{{ route('product.create') }}?count=" + myParam
            })

            $("#btn-remove").on('click', function() {
                let urlParams = new URLSearchParams(window.location.search);
                let myParam = urlParams.get('count');
                myParam = parseInt(myParam) === 0 ? 0 : parseInt(myParam) - 1
                window.location.href = "{{ route('product.create') }}?count=" + myParam
            })

            $("#form-add").on('submit', function() {
                $("button[type='submit']").prop('disabled', true);
            })
        })
    </script>
@endpush
