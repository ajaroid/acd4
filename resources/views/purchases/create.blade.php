@extends('layouts.app')

@section('content')
    <h1>Create Purchase</h1>

    <form method="POST" action="/purchases">
        @csrf
        <div class="mb-3">
            <label>Supplier</label>
            <select name="supplier_id">
                <option>-- Pilih supplier --</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
            @error('supplier_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        @if (session('error_message'))
            <div class="alert alert-danger">{{ session('error_message') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Purchase Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            <input name="items[{{ $loop->index }}][product_id]" value="{{ $product->id }}" type="checkbox" />
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->purchase_price }}</td>
                        <td>
                            <input name="items[{{ $loop->index }}][quantity]" class="form-control" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mb-3">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
