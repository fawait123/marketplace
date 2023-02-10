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
                        <input type="text" name="name" value="{{ isset($id) ? $product->name : '' }}"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product">Price</label>
                        <input type="text" name="harga" value="{{ isset($id) ? $product->harga : '' }}"
                            class="form-control @error('harga') is-invalid @enderror">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product">Promo Price</label>
                        <input type="text" name="harga_promo" value="{{ isset($id) ? $product->harga_promo : '' }}"
                            class="form-control @error('harga_promo') is-invalid @enderror">
                        @error('harga_promo')
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
                                    {{ $product->category_id == $ktg->id ? 'selected' : '' }}>{{ $ktg['name'] }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="product">Stok</label>
                        <input type="text" name="stok" value="{{ isset($id) ? $product->stok : '' }}"
                            class="form-control @error('stok') is-invalid @enderror">
                        @error('stok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="product">Description</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="" cols="30"
                            rows="10">{{ $product->deskripsi }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product">Image</label>
                        <input type="file" name="foto" id="foto"
                            value="{{ isset($id) ? $product->foto : '' }}"
                            class="dropify @error('foto') is-invalid @enderror">
                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        @error('image')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="hidden" value="{{ $product->foto }}" name="image" id="image">
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
                    <div class="row mb-5">
                        @php
                            $no = 19872394;
                        @endphp
                        @foreach ($product->detail as $item)
                            <div class="col-6 mb-3">
                                <input type="file" data-id="{{ $no + $loop->iteration }}"
                                    class="dropify additionalImage"
                                    id="additionalImagePrev{{ $no + $loop->iteration }}">
                                <input type="hidden" name="additionalImage[]" value="{{ $item->image }}"
                                    id="additionalImage{{ $no + $loop->iteration }}">
                            </div>
                            @push('customjs')
                                <script>
                                    resetPreview("{{ $no + $loop->iteration }}", "{{ $item->image }}", 'Image.jpg')
                                </script>
                            @endpush
                        @endforeach
                        @for ($i = 0; $i < $count; $i++)
                            <div class="col-6 mb-3">
                                <input type="file" id="foto" data-id="{{ $i }}"
                                    class="dropify additionalImage">
                                <input type="hidden" name="additionalImage[]" value=""
                                    id="additionalImage{{ $i }}">
                            </div>
                        @endfor
                    </div>
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
                let url = "{{ route('product.edit', $id) }}?id={{ $id }}&count=" + myParam
                // console.log(url)
                window.location.href = url
            })

            $("#btn-remove").on('click', function() {
                let urlParams = new URLSearchParams(window.location.search);
                let myParam = urlParams.get('count');
                myParam = parseInt(myParam) === 0 ? 0 : parseInt(myParam) - 1
                let url = "{{ route('product.edit', $id) }}?id={{ $id }}&count=" + myParam
                // console.log(url)
                window.location.href = url
            })


            // $("#form-add").validate({
            //     ignore: ".ignore",
            //     // rules: {
            //     //     name: {
            //     //         required: true,
            //     //     },
            //     //     harga: {
            //     //         required: true,
            //     //     },
            //     //     harga_promo: {
            //     //         required: true,
            //     //     },
            //     //     category_id: {
            //     //         required: true,
            //     //     },
            //     //     deskripsi: {
            //     //         required: true,
            //     //     },
            //     //     foto: {
            //     //         required: true,
            //     //     }
            //     // },
            //     highlight: function(element) {
            //         $(element).closest('.form-group').addClass('has-error');
            //     },
            //     unhighlight: function(element) {
            //         $(element).closest('.form-group').removeClass('has-error');
            //     },
            //     errorElement: 'span',
            //     errorClass: 'help-block',
            //     errorPlacement: function(error, element) {
            //         if (element.parent('.input-group').length) {
            //             error.insertAfter(element.parent());
            //         } else {
            //             error.insertAfter(element);
            //         }
            //     },
            //     // submitHandler: function(form) {
            //     //     $(form).submit();
            //     //     // let route =
            //     //     //     "{{ request('id') ? route('product.update', 'id') : route('product.store') }}";
            //     //     // let id = "{{ request('id') }}"
            //     //     // id = Number(id)
            //     //     // if (id != 0) {
            //     //     //     route = route.replace('id', id)
            //     //     // }
            //     //     // let formData = new FormData($(form)[0]);
            //     //     // // console.log(formData)
            //     //     // $.ajax({
            //     //     //     url: route,
            //     //     //     type: "{{ isset($id) ? 'get' : 'POST' }}",
            //     //     //     processData: false,
            //     //     //     contentType: false,
            //     //     //     data: formData,
            //     //     //     success: function(res) {
            //     //     //         console.log(res)
            //     //     //         // if (res === 'success') {
            //     //     //         //     window.location.href = "{{ route('product.index') }}"
            //     //     //         // }
            //     //     //     }
            //     //     // })
            //     // }
            // })

            $("input[name=foto]").on('change', function() {
                let value = $(this)[0].files[0]
                getBase64(value, $("input[name=image]"))
            })

            $(".additionalImage").on('change', function() {
                let id = $(this).data('id')
                let value = $(this)[0].files[0]
                getBase64(value, $("#additionalImage" + id))
            })

            resetPreview2("foto", "{{ $product->foto }}", 'Image.jpg')

            let drEvent = $('.dropify').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                let target = element.element
                let id = $(target).data('id')
                console.log(id)
                if (typeof id === 'undefined') {
                    // console.log('undefined id')
                    $("input[name=image]").val('')
                } else {
                    // console.log('ada')
                    $("#additionalImage" + id).val('')
                }
            });
        })
    </script>
@endpush
