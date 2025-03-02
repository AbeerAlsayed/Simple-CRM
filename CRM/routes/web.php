<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',function (){
    $posts = \App\Models\Project::with('tasks')->get();
    foreach ($posts as $post) {
        echo $post->tasks->count() .'<br>';
    }
});
