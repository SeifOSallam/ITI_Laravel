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
@endsection