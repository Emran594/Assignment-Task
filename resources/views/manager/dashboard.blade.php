@extends('layout.app')

@section('title', 'Home')

@section('content')
  <h1>Welcome to this Dashboard</h1>
  <p>This is page only accessible for manager</p>

  <div class="row">
    <div class="col-md-4 mb-3">
      <div class="card text-white bg-primary mb-3">
        <div class="card-body">
          <h5 class="card-title">Total Employee</h5>
          <p class="card-text">{{$employee}}</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card text-white bg-warning mb-3">
        <div class="card-body">
          <h5 class="card-title">Total Projects</h5>
          <p class="card-text">{{$projects}}</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card text-white bg-success mb-3">
        <div class="card-body">
          <h5 class="card-title">Total Tasks</h5>
          <p class="card-text">{{$tasks}}</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="card text-white bg-info mb-3">
        <div class="card-body">
          <h5 class="card-title">Pending Tasks</h5>
          <p class="card-text">{{$pendingTask}}</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="card text-white bg-success mb-3">
        <div class="card-body">
          <h5 class="count">Done Tasks</h5>
          <p class="card-text">{{$doneTask}}</p>
        </div>
      </div>
    </div>
  </div>
@endsection
