@extends('layouts.app')

@section('heading')
Categories
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>Judul kategori</td>
                    <td>
                        <a href="" class="btn btn-link text-info">Edit</a>
                        <a href="" class="btn btn-link text-danger">Delete</a>
                    </td>
                </tr>
        </tbody>
    </table>
@endsection
