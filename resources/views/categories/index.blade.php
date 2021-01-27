@extends('layouts.app')

@section('heading')
Categories
@endsection

@section('content')
    @if (session('success_message'))
        <div class="alert alert-success">{{ session('success_message') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="" class="btn btn-link text-info">Edit</a>
                        <form class="d-inline-block" action="/categories/{{ $category->id }}" method="POST">
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
