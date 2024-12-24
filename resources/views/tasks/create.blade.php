@extends('layout.app')

@section('title', 'Home')

@section('content')
<h1>Create Tasks</h1>
<form method="POST" action="{{ route('tasks.store') }}" class="mb-4">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" name="name" type="text" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="project_id">Project</label>
        <select id="project_id" name="project_id" class="form-control" required>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label" for="teammate_id">Assign to Teammate</label>
        <select class="form-control" id="teammate_id" name="teammate_id">
            <option value="">Unassigned</option>
            @foreach($teammates as $teammate)
                <option value="{{ $teammate->id }}">{{ $teammate->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label" for="description">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label" for="status">Status</label>
        <select class="form-control" id="status" name="status" required>
            <option value="Pending">Pending</option>
            <option value="Working">Working</option>
            <option value="Done">Done</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Assign Tasks</button>
</form>
@endsection