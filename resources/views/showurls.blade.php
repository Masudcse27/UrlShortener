@extends('layout.main')

@section('css_content')
  
@stop

@section('main_content')
    <div class="container mt-5">
        <h2>Make Url Shortener</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" style="width: 45%;">Your link</th>
                    <th scope="col" style="width: 45%;">Short link</th>
                    <th scope="col" style="width: 10%;">Short link</th>
                </tr>
            </thead>
            <tbody>
            @foreach($links as $link)
                <tr>
                    <td style="width: 45%;"><a href="{{ $link->original_url }}">{{ $link->original_url }}</a></td>
                    <td style="width: 45%;"><a href="{{env('APP_URL').'/brouse/'.$link->shortened_url}}">{{ env('APP_URL').'/brouse/'.$link->shortened_url }}</a></td>
                    <td style="width: 10%;">{{ $link->hits }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop