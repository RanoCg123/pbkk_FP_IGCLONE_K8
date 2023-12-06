<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
class postcont extends Controller
{
    public function create(){
        
        return view('cpost');
    }
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'image' => 'required|image|mimes:jpeg,jpg,png|', 
        'title' => 'required|string',
        'caption' => 'required|string',
    ]);
    if ($validator->fails()) {
        return redirect()->route('cpost')->withErrors([Auth::user()->id => 'Invalid Data']);
    }

    $title = $request->title;
    $image = $request->file('image') -> getClientOriginalName();
    $caption = $request->caption;
    $request->file('image')->storeAs('public/postimage/', $image);
    $data = new post();
    $data -> user_id = Auth::user()->id;
    $data -> title = $title;
    $data -> image = $image;
    $data -> caption = $caption;
    $data ->save();
    return redirect('/cpost')->with(['success' => 'Post Berhasil Disimpan!']);
}
public function show(){
        $data=post::all()->where('user_id', '=', Auth::user()->id);
        return view('postshow', compact('data'));
}
public function index(){
    $data = Cache::get('random_posts', function () {
        // If cache is not available, provide a default value (empty array)
        return [];
    });

    return view('dashboard', compact('data'));
}
public function editor(){
    return view('editor');
}
}
