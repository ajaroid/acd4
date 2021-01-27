@extends('layouts.app')

@section('heading')
Edit Category
@endsection

@section('content')
<form method="POST" action="/categories/{{ $category->id }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input name="name" value="{{ $category->name }}" />
    </div>
    <div class="mb-3">
        <button class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection
