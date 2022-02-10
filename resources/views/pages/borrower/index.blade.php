@extends('layouts.app')

@section('content')

@include('inc.alert')
<div class="container">
    <h1 class="text-decoration-underline">List of Borrowers</h1>
    <a href="{{ route('borrower.showAdd') }}" class="btn btn-primary mt-3">Add New Borrower</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Borrower Name</th>
                <th scope="col">Status</th>
                <th scope="col">Borrow Date</th>
                <th scope="col">Staff Id</th>
                <th scope="col">Item</th>
                <th scope="col">Department</th>
                <th scope="col">Authorized By</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrowers as $borrower)
            <tr>
                <th scope="row">{{ $borrower->id }}</th>
                <td>{{ $borrower->name }}</td>
                <td>
                    @if ($borrower->status == 1)
                    <span class="bg-success btn text-white">Active</span>
                    @else

                    <span class="bg-warning btn">Returned</span>
                    @endif
                </td>
                <td>{{ $borrower->created_at->format('d-M-Y') }}</td>
                <td>{{ $borrower->staff_id }}</td>
                <td>{{ $borrower->item->name }}</td>
                <td>{{ $borrower->department->name }}</td>
                <td>{{ $borrower->user->name }}</td>
                <td>
                    <a href="{{ route('borrower.destroy', ['id' => $borrower->id]) }}" class="btn btn-danger">Delete</a>
                    <a href="{{ route('borrower.showEdit', ['id' => $borrower->id]) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
