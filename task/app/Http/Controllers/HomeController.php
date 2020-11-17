<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CreatePost;
use Auth;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = CreatePost::get();
        return view('home', ["posts"=>$posts]);
    }
    public function create(){
        return view('post.create');
    }
    public function SaveToDatabase(Request $request){
        CreatePost::create([
            "title"=>$request->input("title"),
            "user_id"=>$request->input("user_id"),
            "description"=>$request->input("description"),
        ]);
        return redirect()->route("home");
    }
    public function edit(Request $request, $id){
        $user_id = $request->input("user_id");
        $post = CreatePost::where("id", $id)->firstOrFail();
        if (Auth::user()->id == $request->input("user_id")){
            return view("post.update", ["posts"=>$post]);
        }
        else if (Auth::user()->id != $request->input("user_id")){
            // return "you can not update";
            return view("post.danger");
        }
    }
    public function UpdateAndSave(Request $request){
        CreatePost::where("id", $request->input("id"))->update([
            "title"=>$request->input("title"),
            "user_id"=>$request->input("user_id"),
            "description"=>$request->input("description")
        ]);
        return redirect()->route("home");
    }
}
