@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <a href="/products/create" class="btn btn-primary">Create</a>
    </div>
    @if (session()->has('success_message'))
        <div class="alert alert-success">{{ session('success_message') }}</div>
    @endif
    @if (session()->has('error_message'))
        <div class="alert alert-danger">{{ session('error_message') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>P. Price</th>
                <th>S. Price</th>
                <th>Stock</th>
                <th>Category</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->purchase_price }}</td>
                    <td>{{ $product->sale_price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="" class="btn btn-link text-info">Edit</a>
                        @if ($product->deletable)
                            <form class="d-inline-block" action="/products/{{ $product->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link text-danger">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
