@extends('layouts.app')

@section("content")
    <h1 style="background-color: white;"> All posts </h1>
    <a href='{{route('posts.create')}}' class='btn btn-info rounded-circle' style='font-size:1.5rem'>+</a>
    <table class='table'>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Body</td>
            <td>Image</td>
            <td>Show</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post['id']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post['body']}}</td>
                <td>{{$post['image']}}</td>
                <td><a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">Show</a></td>
                <td><a href="{{route('posts.edit', $post['id'])}}" class="btn btn-warning">Edit</a></td>
                <td><a href="{{route('posts.delete', $post['id'])}}" class="btn btn-danger">Delete</a></td>
            </tr>
        @endforeach
    </table>
    <div class='container w-25 mx-auto d-flex justify-content-between'>
        <a href="{{$posts->previousPageUrl()}}"></a>
        @for($i=1;$i<=$posts->lastPage();$i++)
            <a href="{{$posts->url($i)}}">{{$i}}</a>
        @endfor
        <a href="{{$posts->nextPageUrl()}}"></a>
    </div>
@endsection

