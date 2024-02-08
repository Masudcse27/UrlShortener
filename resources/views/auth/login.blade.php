@extends('layout.primary')

@section('primary_css')
  <link rel="stylesheet" href="assets/css/login.css">
@stop

@section('primary_content')
    <div class="container">
      <h2>Login</h2>
        @if(session('signupsuccess'))
            <div class="alert alert-success">
                {{ session('signupsuccess') }}
            </div>
        @endif
      <form action="{{ route ('login') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" />
          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Enter password" name="password"/>
          @error('password')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Login</button>
        <p>Don't have acount? <a href="{{ route ('signup') }}">Signup</a></p>
      </form>
    </div>
@stop
