@extends('layout.main')

@section('css_content')
  
@stop

@section('main_content')
    <div class="container mt-5">
        <h2>Make Url Shortener</h2>
        <div class="cad">
            <div class="card-header">
                <form id="urlShortenerForm">
                    @csrf
                    <div class="input-group mb-3">
                        <input class="form-control " type="text" name="original_url" placeholder="Enter URL">
                        <div class="input-group-addon">
                            <button type="button" id="shortenUrlBtn" class="btn btn-success">Get short url</button>
                        </div>
                    </div>
                    <div style="display: none;" id="originalUrlError" class="text-danger"></div>
                    
                </form>
            </div>
            <div id="shortenedUrlDiv" style="display: none;" class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 50%;">Your link</th>
                            <th scope="col" style="width: 50%;">Short link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td style="width: 50%;"><a id="originalurl" href=""></a></td>
                        <td style="width: 50%;"><a id="shortenedUrl" href=""></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop