@extends('layouts.app')
@section('content')
    <h1>Posts</h1>
    @if (count($posts) > 0 )
        @foreach ($posts as $post)
            <div class="card card-body bg-light" style="margin: 5px;">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%"src = "/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3>
                            <a href="/posts/{{$post->id}}">  {{$post->title}}  </a>
                        </h3>
                        
                        <small > written on {{$post->created_at}} By <span style="font-weight:600; ">{{$post->user->name}}</span></></small>
                    </div>
                </div>

            </div>
        @endforeach

        {{$posts->links()}}
    @else
        <p>No posts found </p>
    @endif
@endsection
