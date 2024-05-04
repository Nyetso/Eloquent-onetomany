<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){
    $post = new Post;
    $post->id = '1';
    $post->user_id='12';
    $post->title = "test";
    $post->body = "test1";
    $post->save();

    // $user = new User;
    // $user->id='12';
    // $user->name = "Hahaha";
    // $user->email = "test5@example.com";
    // $user->password = bcrypt("123");
    // $user->save();
});

Route::get('/update', function(){
    $user = User::findOrFail(12);
    $user->name = "Hahahaha";
    // $user->email = "test4@example.com";
    // $user->password = bcrypt("123");
    $user->save();

    foreach($user->posts as $post)
    {
        $post->title = "update using onetomany relation";
        $post->save();
        return $post;
    }
});

Route::get('/read', function(){
    $user = User::findOrFail(12);
    foreach($user->posts as $post)
    {
        echo $post;
    }

});

Route::get('/delete', function(){
    $user = User::findOrFail(12);
    foreach($user->posts as $post)
    {
        $post->whereID(1)->delete();
    }
});