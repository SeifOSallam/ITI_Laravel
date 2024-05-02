@extends('layouts.app')

@section('content')
    <h1>Creating Post</h1>
    <div class='container mt-5 w-50'>
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
                @if ($errors->title)
                    <small class='text-danger'>{{$errors->first('title')}}</small>
                @endif
            </div>
            
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input type="textbox" class="form-control" id="body" name="body">
                @if ($errors->body)
                    <small class='text-danger'>{{$errors->first('body')}}</small>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label" for="image">Choose an Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($errors->image)
                    <small class='text-danger'>{{$errors->first('image')}}</small>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label" for="author">Posted by</label>
                <select class='form-control' name='author' id='author'>
                    @foreach($users as $user)
                        <option value='{{$user['id']}}'>{{$user['name']}}</option>
                    @endforeach
                </select>
                @if ($errors->author)
                    <small class='text-danger'>{{$errors->first('author')}}</small>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection