<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ShortUrls;
use Str;
class ShortenerController extends Controller
{
    public function index(){
        return view('Urlshortner');
    }

    public function store(Request $request) {
        $request->validate([
            'original_url'=>'required'
        ]);
        $appUrl=env('APP_URL');
        $data=$request->only(['original_url']);
        $data['user_id']=auth()->user()->id;
        $data['shortened_url']=$this->generateUniqueKey();
        ShortUrls::create($data);
        return response()->json([
            'shortened_url' => $appUrl.'/brouse/'.$data['shortened_url'],
            'original_url'=>$data['original_url']
        ]);
    }
    private function generateUniqueKey() {
        do {
            $key = Str::random(6);
        } while ($this->existsInDatabase($key));
    
        return $key;
    }
    private function existsInDatabase($key){
        return ShortUrls::where('shortened_url', $key)->exists();
    }

    public function browseShortlink($code){
        $originalUrl=ShortUrls::where('shortened_url', $code)->first();
        $hit=$originalUrl->hits;
        $originalUrl->update([
            'hits'=>$hit+1
        ]);
        return redirect($originalUrl->original_url);
    }
}
