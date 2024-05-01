@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 d-flex justify-content-center">
                <div class="card" style='width: 20rem;'>
                    <img src="{{asset('images/posts/'.$post['image'])}}" class="card-img-top" alt="Post Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post['title'] }}</h5>
                        <p class="card-text">{{ $post['body'] }}</p>
                        <a href="{{ route('index') }}" class="btn btn-primary">Back to Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3 w-75">
        <h2>Comments</h2>
        <table>
            @foreach ($post->comments as $comment)
                <tr>
                    <td>{{ $comment->user['name'] }}</td>
                    <td>{{ $comment['description'] }}</td>
                </tr>
            @endforeach
        </table>
        <form action="{{route('comments.store')}}" method="POST">
            @csrf
            <input class="form-text w-75" style="height:100px" type="text" name="description">
            <select class='form-control w-25' name='user_id' id='user_id'>
                @foreach($users as $user)
                    <option value='{{$user['id']}}'>{{$user['name']}}</option>
                @endforeach
            </select>
            <input type="hidden" name="post_id" value="{{$post['id']}}">
            <button type='submit' class='btn btn-primary'>Comment</button>
        </form>
    </div>
@endsection