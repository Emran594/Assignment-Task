@extends('layout.app')

@section('title', 'Home')

@section('content')
<h1>Project Update</h1>
<form method="POST" action="{{ route('projects.update', $project->id) }}" class="mb-4">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ $project->name }}" required>
    </div>
    <div class="mb-3">
        <label for="project_code" class="form-label">Project Code</label>
        <input id="project_code" name="project_code" type="text" class="form-control" value="{{ $project->project_code }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Project</button>
</form>
@endsection