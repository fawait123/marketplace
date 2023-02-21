@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($id) ? route('montir.update', $id) : route('montir.store') }}" method="post">
                        @csrf
                        @if (isset($id))
                            @method('put')
                        @endif
                        <div class="form-group">
                            <label for="montir">Name</label>
                            <input type="text" name="name" value="{{ isset($id) ? $montir->name : '' }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="montir">Gender</label>
                            <select name="gender" id="gender"
                                class="form-control @error('gender') is-invalid @enderror">
                                <option value="">select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="montir">Phone</label>
                            <input type="text" name="phone" value="{{ isset($id) ? $montir->phone : '' }}"
                                class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="montir">Focus</label>
                            <input type="text" name="focus" value="{{ isset($id) ? $montir->focus : '' }}"
                                class="form-control @error('focus') is-invalid @enderror">
                            @error('focus')
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
