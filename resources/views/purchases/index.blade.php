@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <a href="/purchases/create" class="btn btn-primary">Create</a>
    </div>
    @if (session()->has('success_message'))
        <div class="alert alert-success">{{ session('success_message') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Total</th>
                <th>Supplier</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->total }}</td>
                    <td>{{ $purchase->supplier->name }}</td>
                    <td>{{ $purchase->created_at }}</td>
                    <td>
                        <a href="" class="btn btn-link text-info">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
