@extends('layouts.app')

@section('content')
    <h1>Editing Post #{{$post['id']}}</h1>
    <div class='container mt-5 w-50'>
        <form action="{{route('posts.update', $post['id'])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$post['title']}}">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input type="textbox" class="form-control" name="body" id="body" value="{{$post['body']}}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="image">Choose an Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @isset($post['image'])
                    <small>Current Image: {{ $post['image']  }}</small>
                @endisset
            </div>
            <div class="mb-3">
                <label class="form-label" for="author">Posted by</label>
                <select class='form-control' name='author' id='author'>
                    @foreach($users as $user)
                        <option value='{{$user['id']}}'
                        @if($post['author']==$user['id']) {
                            selected
                        }
                        @endif>
                            {{$user['name']}}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection