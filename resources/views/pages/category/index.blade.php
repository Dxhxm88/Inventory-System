@extends('layouts.app')

@section('content')

@include('inc.alert')
<div class="container">
    <h1 class="text-decoration-underline">List of Categories</h1>
    <a href="{{ route('category.showAdd') }}" class="btn btn-primary mt-3">Add new Category</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('category.destroy', ['id'=>$category->id]) }}" class="btn btn-danger">Delete</a>
                    <a href="{{ route('category.showEdit', ['id'=> $category->id]) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
