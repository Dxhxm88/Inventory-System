@extends('layouts.app')

@section('content')

@include('inc.alert')
<div class="container">
    <h1 class="text-decoration-underline">List of Items</h1>
    <a href="{{ route('item.showAdd') }}" class="btn btn-primary mt-3">Add new item</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Serial Number</th>
                <th scope="col">Category</th>
                <th scope="col">Supplier</th>
                <th scope="col">Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->serial_number }}</td>
                <td>{{ $item->category->name ?? 'N/A' }}</td>
                <td>{{ $item->supplier->name }}</td>
                @if ($item->status == '1')
                <td>
                    <span class="btn bg-success text-white">Available</span>
                </td>
                @else
                <td>Unavailable</td>
                @endif
                <td>
                    <a href="{{ route('item.destroy', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                    <a href="{{ route('item.showEdit' , ['id' => $item->id]) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
