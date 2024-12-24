@extends('layout.app')

@section('title', 'Home')

@section('content')
<h1>Create project</h1>
<form method="POST" action="{{ route('projects.store') }}" class="mb-4">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" name="name" type="text" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="project_code" class="form-label">Project Code</label>
        <input id="project_code" name="project_code" type="text" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Project</button>
</form>
@endsection