@extends('layouts.app')

@section('content')
    <form method="POST" action="/categories">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input value="{{ old('name') }}" name="name" />
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
