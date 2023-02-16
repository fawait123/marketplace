@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($id) ? route('category.update', $id) : route('booking.store') }}" method="post">
                        @csrf
                        @if (isset($id))
                            @method('put')
                        @endif
                        <div class="form-group">
                            <label for="user_id">Member</label>
                            <select name="user_id" id="user_id" class="form-control">
                                <option value="">pilih</option>
                                @foreach ($member as $item)
                                    <option value="{{ $item->user_id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" value="{{ isset($id) ? $booking->date : '' }}"
                                class="form-control @error('date') is-invalid @enderror">
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" value="{{ isset($id) ? $booking->description : '' }}"
                                class="form-control @error('description') is-invalid @enderror">
                            @error('description')
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
