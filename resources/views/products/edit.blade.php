@extends('layouts.app')

@section('content')
    <form action="/products/{{ $product->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{ old('name', $product->name) }}" name="name" id="name" />
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="purchase_price" class="form-label">Purchase Price</label>
            <input class="form-control @error('purchase_price') is-invalid @enderror" type="text" value="{{ old('purchase_price', $product->purchase_price) }}" name="purchase_price" id="purchase_price" />
            @error('purchase_price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sale_price" class="form-label">Sale Price</label>
            <input class="form-control @error('sale_price') is-invalid @enderror" type="text" value="{{ old('sale_price', $product->sale_price) }}" name="sale_price" id="sale_price" />
            @error('sale_price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                <option value="">-- Choose Category --</option>
                @foreach ($categories as $category)
                    @if (old('category_id', $product->category_id) == $category->id)
                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
