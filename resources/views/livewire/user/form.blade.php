@dd($id)
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
                        <label for="category">Nama</label>
                        <input type="text" name="name" value="{{ isset($id) ? $member->name : '' }}"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{ isset($id) ? $member->email : '' }}"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="role">Role</label>
                        <select name="role" value="{{ isset($id) ? $member->role : '' }}"
                            class="form-control @error('role') is-invalid @enderror">
                            <option value="admin">Admin</option>
                            <option value="member">Member</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="password">Password</label>
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
                        <input type="file" name="foto" value="{{ isset($id) ? $member->gender : '' }}"
                            class="form-control @error('gender') is-invalid @enderror">
                        @error('photo')
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
