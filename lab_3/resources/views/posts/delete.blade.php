@extends('layouts.app')


@section('content')
    <div class="container mt-5 mx-auto">
        <h1>Deleting post #{{$post['id']}}</h1>
        <div class='container text-center w-25' style='margin-top:8rem;'>
            <div class='row'>
                <div class='col-12'>
                    <h3>Are you sure?</h3>
                </div>
                <div class='col-6'>
                    <form action="{{route('posts.delete', $post['id'])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class='btn btn-success' type='submit'>YES</button>
                    </form>
                </div>
                <div class='col-6'>
                    <a class='btn btn-danger' href="{{route('index')}}">NO</a>
                </div>
            </div>
        </div>
    </div>
@endsection