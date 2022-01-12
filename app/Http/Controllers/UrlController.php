<?php

namespace App\Http\Controllers;
use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index(){
        $urls=Url::all();
        // $activatedUrl=Url::where('status',1)->pluck('id');
        return view('pages.urlsList')->with([
            'urls'=>$urls,
            
        ]);
    }
    
    public function save(Request $request){
        // return $request->status;
        $request->validate([
            'url' => 'required|url',            
        ]);
        $urls=Url::all();
        foreach ($urls as $url){
            $url->status=0;
            $url->save();
        }
        
        
        
        $url=Url::findOrFail($request->id);
        $url->url=$request->url;
        if($request->status){
            $url->status=$request->status;
        }
        $url->save();
        
        // return view('pages.urlsList')->with([
        //     'urls'=>$urls,
            
        // ]);
        return redirect(route('url-list'));
    }
}
