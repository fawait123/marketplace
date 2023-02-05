@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($id) ? route('product.update', $id) : route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($id))
                            @method('put')
                        @endif
                        <div class="form-group">
                            <label for="product">Product</label>
                            <input type="text" name="name"  value="{{ isset($id) ? $product->name : '' }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product">Foto</label>
                            <input type="file" name="foto" id="foto" value="{{ isset($id) ? $product->foto : '' }}"
                                class="form-control @error('foto') is-invalid @enderror">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product">QR Kode</label>
                            <input type="text" name="qrcode" value="{{ isset($id) ? $product->qrcode : '' }}"
                                class="form-control @error('qrcode') is-invalid @enderror">
                            @error('qrcode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product">Deskripsi</label>
                            <input type="text" name="deskripsi" value="{{ isset($id) ? $product->deskripsi : '' }}"
                                class="form-control @error('deskripsi') is-invalid @enderror">
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product">Harga</label>
                            <input type="text" name="harga" value="{{ isset($id) ? $product->harga : '' }}"
                                class="form-control @error('harga') is-invalid @enderror">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product">Harga promo</label>
                            <input type="text" name="harga_promo" value="{{ isset($id) ? $product->harga_promo : '' }}"
                                class="form-control @error('harga_promo') is-invalid @enderror">
                            @error('harga_promo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product">Kategori:</label>
                            <select class="form-control category_id" id="category_id" name="category_id">
                                @foreach ($category as $ktg)
                                    <option value="{{ $ktg['id'] }}">{{ $ktg['name'] }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product">Stok</label>
                            <input type="text" name="stok" value="{{ isset($id) ? $product->stok : '' }}"
                                class="form-control @error('stok') is-invalid @enderror">
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ isset($id) ? 'Update' : 'Create' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

