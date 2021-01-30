@extends('layouts.app')

@section('content')
    <form method="POST" action="/suppliers">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input value="{{ old('name') }}" name="name" />
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input value="{{ old('email') }}" name="email" />
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Address</label>
            <textarea name="address">{{ old('address') }}</textarea>
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
