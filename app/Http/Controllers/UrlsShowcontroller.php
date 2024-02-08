<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrls;

class UrlsShowcontroller extends Controller
{
    public function index(){
        $userId=auth()->user()->id;
        $data=ShortUrls::where('user_id',$userId)->get();
        return view('showurls')->with('links',$data);
    }
}
