@extends('layouts.app')


@section('content')
    <x-post-card :post=$post/>
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