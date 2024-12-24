@extends('layout.app')

@section('title', 'Home')

@section('content')
<a href="{{ route('teammates.create') }}" class="btn btn-primary">Add Teammate</a>
<h2>Teammates List</h2>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Employee ID</th>
            <th scope="col">Position</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($teammates as $teammate)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $teammate->name }}</td>
                <td>{{ $teammate->email }}</td>
                <td>{{ $teammate->employee_id }}</td>
                <td>{{ $teammate->position }}</td>
                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('teammates.edit', $teammate->id) }}">Edit</a>
                    <form action="{{ route('teammates.destroy', $teammate->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

