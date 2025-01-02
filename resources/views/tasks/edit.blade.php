@extends('layout.app')

@section('title', 'Edit Task')

@section('content')
<h1>Edit Task</h1>
<form method="POST" action="{{ route('tasks.update', $task->id) }}" class="mb-4">
    @csrf
    @method('PUT') <!-- Method spoofing for PUT request -->
    
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ $task->name }}" required>
    </div>
    
    <div class="mb-3">
        <label class="form-label" for="project_id">Project</label>
        <select id="project_id" name="project_id" class="form-control" required>
            @foreach($projects as $project)
                <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label class="form-label" for="teammate_id">Assign to Teammate</label>
        <select class="form-control" id="teammate_id" name="teammate_id">
            <option value="">Unassigned</option>
            @foreach($teammates as $teammate)
                <option value="{{ $teammate->id }}" {{ $task->teammate_id == $teammate->id ? 'selected' : '' }}>
                    {{ $teammate->name }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label class="form-label" for="description">Description</label>
        <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
    </div>
    
    <div class="mb-3">
        <label class="form-label" for="status">Status</label>
        <select class="form-control" id="status" name="status" required>
            <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Working" {{ $task->status == 'Working' ? 'selected' : '' }}>Working</option>
            <option value="Done" {{ $task->status == 'Done' ? 'selected' : '' }}>Done</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Update Task</button>
</form>
@endsection
