@extends('layouts.app')

@section('content')
    <h1>Editing Post #{{$post['id']}}</h1>
    <div class='container mt-5 w-50'>
        <form>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" value="{{$post['title']}}">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input type="textbox" class="form-control" id="body" value="{{$post['body']}}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="img">Choose an Image</label>
                <input type="file" class="form-control" id="img">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection