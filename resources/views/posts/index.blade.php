@extends('layouts.app')
@section('content')
    <h1>Posts</h1>
    @if (count($posts) > 0 )
        <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-6" style="height:300px ;">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
              <div class="card-body d-flex flex-column align-items-start">

                <h3 class="mb-0">
                <a class="text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a>
                </h3>
                <div class="mb-1 text-muted">written on {{$post->created_at}} By <span style="font-weight:600; ">{{$post->user->name}}</span></div>
                <p class="card-text mb-auto" style="height: 50px;">
                @if (strlen($post->body)>110)
                    {!! substr($post->body , -90).' .... '  !!}
                @else
                    {!!$post->body!!}
                @endif</p>
                <a href="/posts/{{$post->id}}">Continue reading</a>
              </div>
              @if ($post->cover_image!='noImage.jpg')
                <img class="card-img-right flex-auto d-none d-lg-block img-fluid" style="height: 220px;" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">

              @endif
            </div>
          </div>


        @endforeach
    </div>
        {{$posts->links()}}
    @else
        <p>No posts found </p>
    @endif


@endsection
