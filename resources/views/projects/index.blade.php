@extends('layout.app')

@section('title', 'Home')

@section('content')
<a href="{{ route('projects.create') }}" class="btn btn-primary">Add Projects</a>
<h2>Teammates List</h2>

@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

<form class="mb-3" method="GET" action="{{ route('projects.index') }}">
  <div class="input-group">
    <label for="name" class="input-group-text">Project Name</label>
    <input id="name" name="name" type="text" class="form-control" value="{{ request('name') }}">
    <button type="submit" class="btn btn-primary input-group-append">Filter</button>
  </div>
</form>

<table class="table table-striped">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Project Name</th>
      <th scope="col">Code</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($projects as $project)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $project->name }}</td>
        <td>{{ $project->project_code }}</td>
        <td>
          <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>
          <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection