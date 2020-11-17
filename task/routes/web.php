<?php

use App\CreatePost;

Route::get('/', function () {
    $posts = CreatePost::get();
    return view('welcome', ["posts"=>$posts]);
});

Route::get("/create/post", "HomeController@create")->name("create_post");

Route::post("/save/post", "HomeController@SaveToDatabase")->name("SavaToDatabase");

Route::post("post/edit{id}", "HomeController@edit")->name("UpdateBlade");

Route::post("/update/post", "HomeController@UpdateAndSave")->name("UpdatePost");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
