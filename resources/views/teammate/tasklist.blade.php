@extends('layouts.app')

@section('title', 'Home')

@section('content')
<h2>Tasks List</h2>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form class="row mb-3" method="GET" action="{{ route('teammate.tasklist') }}">
    <div class="col-md-4">
      <label for="project_id" class="form-label">Filter by Project</label>
      <select id="project_id" name="project_id" class="form-select">
        <option value="">All Projects</option>
        @foreach($projects as $project)
          <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>
            {{ $project->name }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="col-md-4">
      <label for="status" class="form-label">Filter by Status</label>
      <select id="status" name="status" class="form-select">
        <option value="">All Statuses</option>
        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
        <option value="Working" {{ request('status') == 'Working' ? 'selected' : '' }}>Working</option>
        <option value="Done" {{ request('status') == 'Done' ? 'selected' : '' }}>Done</option>
      </select>
    </div>
    <div class="col-md-4 d-flex align-items-center">
      <button type="submit" class="btn btn-primary ms-auto">Filter</button>
    </div>
  </form>
<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Task Name</th>
            <th scope="col">Project Code</th>
            <th scope="col">Description</th>
            <th scope="col">Assign To</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <th scope="row">{{ $task->id }}</th>
                <td>{{ $task->name }}</td>
                <td>{{ $task->project->project_code }}</td> {{-- Access project code --}}
                <td>{{ $task->description ?? '-' }}</td> {{-- Handle nullable description --}}
                <td>{{ $task->teammate ? $task->teammate->name : '-' }}</td> {{-- Handle nullable teammate --}}
                <td>
                    <form method="POST" action="{{ route('tasks.updateStatus', $task->id) }}">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="Pending" {{ $task->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Working" {{ $task->status === 'Working' ? 'selected' : '' }}>Working</option>
                            <option value="Done" {{ $task->status === 'Done' ? 'selected' : '' }}>Done</option>
                        </select>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection