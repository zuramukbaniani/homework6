<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class PostsController extends Controller
{
	public function __construct(){
		$this->middleware("CheckUser");
	}
    public function index()
    {
    	return Posts::get();	
    }
    public function create()
    {
    	return view("post.create");
    }
    public function store(Request $request)
    {
    	Posts::create([
    		"title"=>$request->input("title"),
    		"text"=>$request->input("text"),
    	]);
    }
}
