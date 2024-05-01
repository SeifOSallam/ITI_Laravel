@extends('layouts.app')
@php
    use Carbon\Carbon;
@endphp
@section("content")
    <h1 style="background-color: white;"> All posts </h1>
    <a href='{{route('posts.create')}}' class='btn btn-info rounded-circle' style='font-size:1.5rem'>
        <x-heroicon-o-plus />
    </a>
    <a href="{{route('posts.restore')}}" class='btn btn-success'>
      Restore
    </a>
    <table class='table'>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Body</td>
            <td>Image</td>
            <td>Created At</td>
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
                <td>{{new Carbon($post['createdAt'])}}</td>
                <td><a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">Show</a></td>
                <td><a href="{{route('posts.edit', $post['id'])}}" class="btn btn-warning">Edit</a></td>
                <td><a href="{{route('posts.delete', $post['id'])}}" class="btn btn-danger">Delete</a></td>
            </tr>
        @endforeach
    </table>
    <div class="container d-flex justify-content-center align-items-center">
        @if ($posts->previousPageUrl())
          <a href="{{ $posts->previousPageUrl() }}" class="btn btn-sm btn-light">Previous</a>
        @endif
      
        <ul class="pagination m-0">
          @php
            $startPage = max($posts->currentPage() - 2, 1);
            $endPage = min($posts->currentPage() + 2, $posts->lastPage());
          @endphp
      
          @if ($startPage > 1)
            <li class="page-item">
              <a href="{{ $posts->url(1) }}" class="page-link">1</a>
            </li>
            @if ($startPage > 2)
              <li class="page-item disabled">
                <span class="page-link">...</span>
              </li>
            @endif
          @endif
      
          @for ($i = $startPage; $i <= $endPage; $i++)
            <li class="page-item @if ($i == $posts->currentPage()) active @endif">
              <a href="{{ $posts->url($i) }}" class="page-link">{{ $i }}</a>
            </li>
          @endfor
      
          @if ($endPage < $posts->lastPage())
            @if ($endPage < $posts->lastPage() - 1)
              <li class="page-item disabled">
                <span class="page-link">...</span>
              </li>
            @endif
            <li class="page-item">
              <a href="{{ $posts->url($posts->lastPage()) }}" class="page-link">{{ $posts->lastPage() }}</a>
            </li>
          @endif
        </ul>
      
        @if ($posts->nextPageUrl())
          <a href="{{ $posts->nextPageUrl() }}" class="btn btn-sm btn-light">Next</a>
        @endif
    </div>
    
    
@endsection

