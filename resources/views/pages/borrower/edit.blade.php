@extends('layouts.app')

@section('content')

@include('inc.alert')
<div class="container">
    <h1 class="text-decoration-underline">Edit Borrower</h1>
    <a href="{{ route('borrower') }}" class="btn btn-secondary mt-3">Back</a>

    <div class="border border-dark mt-3 p-3">
        <form action="{{ route('borrower.update', ['id'=>request()->route('id')]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Borrower Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $borrower->name }}" required>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="staff_id" class="form-label">Staff Id</label>
                <input type="text" name="staff_id" class="form-control" id="staff_id" value="{{ $borrower->staff_id }}"
                    required>

                @error('staff_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="item_id" class="form-label">Item</label>
                <select class="form-select" name="item_id" required>
                    @if ($items->isEmpty())
                    <option value="{{ $borrower->item_id }}" selected>{{
                        $borrower->item->name }}</option>
                    @else
                    @foreach ($items as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $borrower->item_id ? 'selected' : ''}} >{{
                        $item->name }}</option>
                    @endforeach
                    <option value="{{ $borrower->item_id }}" selected>{{
                        $borrower->item->name }}</option>
                    @endif
                </select>
                @error('item_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="department_id" class="form-label">Department</label>
                <select class="form-select" name="department_id" required>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ $department->id == $borrower->department_id ? 'selected' :
                        ''}}>{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" required>
                    <option value="1" {{ '1'==$borrower->status ? 'selected' : ''}}>
                        Active
                    </option>
                    <option value="0" {{ '0'==$borrower->status ? 'selected' : ''}}>
                        Returned
                    </option>
                </select>
                @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">Authorized By</label>
                <input type="text" class="form-control" value="{{ $borrower->user->name }}" disabled>
                <input type="hidden" name="user_id" value="{{ $borrower->user_id }}">

                @error('user_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
