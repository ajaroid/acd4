@extends('layouts.app')

@section('content')
<form method="POST" action="/suppliers/{{ $supplier->id }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input name="name" value="{{ old('name', $supplier->name) }}" />
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input name="email" value="{{ old('email', $supplier->email) }}" />
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label>Address</label>
        <textarea name="address">{{ old('address', $supplier->address) }}</textarea>
        @error('address')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <button class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection
