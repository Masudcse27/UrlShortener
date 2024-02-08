@extends('layout.primary')
@section('primary_css')
    @yield('css_content')
@stop
@section('primary_content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route ('home')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route ('urls')}}">Short urls</a>
            </li>
            </ul>
            @if(Auth::check())
                <form class="form-inline my-2 my-lg-0">
                    <a class="btn btn-success" href="{{ route ('logout') }} ">logout</a>
                </form>
            @else
                <form class="form-inline my-2 my-lg-0">
                    <a class="btn btn-success" href="{{route ('login')}}">Login</a>
                    <a class="btn btn-success ml-2" href="{{route ('signup')}}">Signup</a>
                </form>
            @endif
        </div>
    </nav>

    @yield('main_content')

    
@stop
