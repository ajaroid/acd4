@extends('layouts.app')

@section('content')
    @if (session('success_message'))
        <div class="alert alert-success">{{ session('success_message') }}</div>
    @endif

    <div>
        <a href="/suppliers/create" class="btn btn-primary">Create</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td>
                        <a href="" class="btn btn-link text-info">Edit</a>
                        <form class="d-inline-block" action="/suppliers/{{ $supplier->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link text-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
