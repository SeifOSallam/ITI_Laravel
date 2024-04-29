<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts= [
        ['id'=>1, 'title'=>'P1', 'body'=>'Post one', 'image'=>'6aUEiFm6k4bD.jpg'],
        ['id'=>2, 'title'=>'P2', 'body'=>'Post two','image'=>'6aUEiFm6k4bD.jpg'],
        ['id'=>3, 'title'=>'P3', 'body'=>'Post three','image'=>'6aUEiFm6k4bD.jpg'],
        ['id'=>4, 'title'=>'P4', 'body'=>'Post four', 'image'=>'6aUEiFm6k4bD.jpg']
    ];


    function home (){
        return view("index", ["posts"=>$this->posts]);
    }

    function show($id){
        if ($id <=count($this->posts)){
            $post =$this->posts[$id-1];
            return view('posts.show', ["post"=>$post]);
        }
        return abort(404);

    }

    function create(){
        return view('posts.create');
    }

    function edit($id){
        if ($id <=count($this->posts)){
            $post =$this->posts[$id-1];
            return view('posts.edit', ["post"=>$post]);
        }
        return abort(404);

    }

    function delete($id) {
        if ($id <=count($this->posts)){
            $post =$this->posts[$id-1];
            return view('posts.delete', ["post"=>$post]);
        }
        return abort(404);
    }
}
