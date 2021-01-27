@extends('layouts.app')

@section('content')
    <form method="POST" action="/categories">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input name="name" />
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
