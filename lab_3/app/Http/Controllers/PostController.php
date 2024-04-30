<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;

class PostController extends Controller
{

    function home (){
        $posts = Posts::paginate(1);

        return view("index", ["posts"=>$posts]);
    }

    function show($id){
        $post = Posts::findOrFail($id);
        return view('posts.show', ["post"=>$post]);

    }

    private function file_operations($request){
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filepath = $image->store("/","posts" );
            return $filepath;

        }
        return null;
    }

    function create(){
        $users = User::all();
        return view('posts.create', ["users"=>$users]);
    }

    function store() {
        $request_params = request();
        $file_path = $this->file_operations($request_params);
        $request_params = request()->all();
        $post = new Posts();
        $post->title = $request_params['title'];
        $post->body = $request_params['body'];
        $post->author = $request_params['author'];
        $post->image = $file_path;
        $post->save();
        return to_route("posts.show", $post);
    }

    function edit($id){
        $post = Posts::findOrFail($id);
        $users = User::all();
        return view('posts.edit', ["post"=>$post, "users"=>$users]);
    }

    function update($id) {
        $post = Posts::findOrFail($id);
    
        $request_params = request()->all();
        $file_path = $this->file_operations(request());
    
        if ($file_path) {
            $post->image = $file_path;
        }
    
        // Remove image from request params to avoid overwriting with null
        unset($request_params['image']);
    
        
    
        // Update post
        $post->update($request_params);
    
        return to_route("posts.show", $post);
    }
    

    function delete($id) {
        $post = Posts::findOrFail($id);
        return view('posts.delete', ["post"=>$post]);
    }

    function destroy($id) {
        $post = Posts::findOrFail($id);
        $post->delete();
        return to_route('index');
    }
}
