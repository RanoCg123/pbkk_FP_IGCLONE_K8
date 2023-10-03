<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
class postcont extends Controller
{
    public function create(){
        return view('cpost');
    }
public function store(Request $request)
{
    $user = $request->user;
    $title = $request->title;
    $image = $request->file('image') -> getClientOriginalName();
    $caption = $request->caption;
    $request->file('image')->storeAs('public/postimage/', $image);
    $data = new post();
    $data -> user = $user;
    $data -> title = $title;
    $data -> image = $image;
    $data -> caption = $caption;
    $data ->save();
    return redirect('/cpost');
}
    public function show(){
        $data=post::all();
        return view('postshow', compact('data'));
    }
}
