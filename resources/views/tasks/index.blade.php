@extends('layout.app')

@section('title', 'Home')

@section('content')
<a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Tasks</a>
<h2>Tasks List</h2>

@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

<form class="row mb-3" method="GET" action="{{ route('tasks.index') }}">
  <div class="col-md-3">
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
  <div class="col-md-3">
      <label for="teammate_id" class="form-label">Filter by Teammate</label>
      <select id="teammate_id" name="teammate_id" class="form-select">
          <option value="">All Teammates</option>
          @foreach($teammates as $teammate)
              <option value="{{ $teammate->id }}" {{ request('teammate_id') == $teammate->id ? 'selected' : '' }}>
                  {{ $teammate->name }}
              </option>
          @endforeach
      </select>
  </div>
  <div class="col-md-3">
      <label for="status" class="form-label">Filter by Status</label>
      <select id="status" name="status" class="form-select">
          <option value="">All Statuses</option>
          <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
          <option value="Working" {{ request('status') == 'Working' ? 'selected' : '' }}>Working</option>
          <option value="Done" {{ request('status') == 'Done' ? 'selected' : '' }}>Done</option>
      </select>
  </div>
  <div class="col-md-3 d-flex align-items-center mt-2">
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
        <td>{{ $task->project->project_code }}</td>
        <td>{{ $task->description ?? '-' }}</td>
        <td>{{ $task->teammate ? $task->teammate->name : '-' }}</td>
        <td>{{ $task->status }}</td>
        {{-- <td>
          <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">Edit</a>
          <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
          </form>
        </td> --}}
      </tr>
    @endforeach
  </tbody>
</table>
@endsection