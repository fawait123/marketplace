@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($id) ? route('member.update', $id) : route('member.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($id))
                            @method('put')
                        @endif
                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select name="user_id" id="user_id"
                                class="form-control @error('user_id') is-invalid @enderror">
                                <option value="">pilih</option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}" data-email="{{ $item->email }}"
                                        {{ isset($id) ? ($member->user_id == $item->id ? 'selected' : '') : '' }}
                                        data-name="{{ $item->name }}">{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="category">NIK</label>
                            <input type="text" name="nik" value="{{ isset($id) ? $member->nik : old('nik') }}"
                                class="form-control @error('nik') is-invalid @enderror">
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="category">Nama</label>
                            <input type="text" name="name" value="{{ isset($id) ? $member->name : old('name') }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">pilih</option>
                                <option value="laki-laki"
                                    {{ isset($id) ? ($member->gender == 'laki-laki' ? 'selected' : '') : '' }}>Laki-Laki
                                </option>
                                <option value="Perempuan"
                                    {{ isset($id) ? ($member->gender == 'perempuan' ? 'selected' : '') : '' }}>Perempuan
                                </option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="telp">telp</label>
                            <input type="text" name="telp" value="{{ isset($id) ? $member->telp : old('telp') }}"
                                class="form-control @error('telp') is-invalid @enderror">
                            @error('telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="email">Email</label>
                            <input type="text" name="email" value="{{ isset($id) ? $member->email : old('email') }}"
                                class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="address">address</label>
                            <textarea name="address" id="address" class="form-control" cols="30" rows="10">{{ isset($id) ? $member->address : old('address') }}</textarea>
                            <label for="foto">Photo</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                            @error('foto')
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

@push('customjs')
    <script>
        $(document).ready(function() {
            $("#user_id").on('change', function() {
                let value = $(this).val();
                let email = $(this).find(':selected').data('email')
                let name = $(this).find(':selected').data('name')
                $("input[name=email]").val(email)
                $("input[name=name]").val(name)
                console.log(email);
            })
        })
    </script>
@endpush
