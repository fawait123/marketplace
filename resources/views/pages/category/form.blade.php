@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($id) ? route('category.update', $id) : route('category.store') }}" method="post">
                        @csrf
                        @if (isset($id))
                            @method('put')
                        @endif
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" name="name" value="{{ isset($id) ? $category->name : '' }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
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
