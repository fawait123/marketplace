@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($id) ? route('user.update', $id) : route('user.store') }}" method="post"
                        enctype="multipart/form-data" id="form-add">
                        @csrf
                        @if (isset($id))
                            @method('put')
                        @endif
                        <div class="form-group">
                            <label for="category">Nama</label>
                            <input type="text" name="name" value="{{ isset($id) ? $user->name : old('name') }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="email">Email</label>
                            <input type="text" name="email" value="{{ isset($id) ? $user->email : old('email') }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="role">Role</label>
                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                <option value="admin" {{ isset($id) ? ($user->role == 'admin' ? 'selected' : '') : '' }}>
                                    Admin
                                </option>
                                <option value="user" {{ isset($id) ? ($user->role == 'user' ? 'selected' : '') : '' }}>
                                    user</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <label for="password">Password</label>
                            @isset($id)
                                <p class="text-warning"><b>Perhatian!! </b>Kosongkan Jika <b> password</b> Tidak akan dirubah
                                </p>
                            @endisset
                            <input type="text" name="password" value=""
                                class="form-control @error('password') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="text" name="password_confirmation" value=""
                                class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <label for="foto">Photo</label>
                            <input type="file" name="foto" id="foto"
                                class="form-control @error('foto') is-invalid @enderror">
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
            $("#form-add").on('submit', function() {
                $("button[type='submit']").prop('disabled', true)
            });
            $("input[type='file']").dropify()
        })
    </script>

    @if (isset($id))
        <script>
            $(document).ready(function() {
                resetPreview2("foto", URL_GOOGLE_DRIVE + "{{ $user->foto }}", 'Image.jpg')
            })
        </script>
    @endif
@endpush
