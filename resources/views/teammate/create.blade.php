@extends('layout.app')

@section('title', 'Home')

@section('content')
<h1>Create Teammate</h1>
<form method="POST" action="{{ route('teammates.store') }}" class="mb-4">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" name="name" type="text" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="employee_id" class="form-label">Employee ID</label>
        <input id="employee_id" name="employee_id" type="text" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="position" class="form-label">Position</label>
        <input id="position" name="position" type="text" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input id="password" name="password" type="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Teammate</button>
</form>
@endsection