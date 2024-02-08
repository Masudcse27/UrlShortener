@extends('layout.primary')

@section('primary_css')
  <link rel="stylesheet" href="assets/css/registration.css">
@stop

@section('primary_content')
    <div class="container">
      <h2>Sign Up</h2>
      <form action="{{ route ('signup.store')}}" method="POST">
      @csrf
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter your fast name" name="name" />
          @error('name')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" />
          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter password" name="password" />
          @error('password')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Sign Up</button>
      </form>
    </div>
@stop
