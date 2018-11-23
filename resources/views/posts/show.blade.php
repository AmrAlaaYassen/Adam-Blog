
@extends('layouts.app')
@section('content')
    <a href="/posts" class="btn btn-outline-dark">Back</a>
    @if ($post)

        <div class="jumbotron">
                <h1 class="display-4">{{$post->title}}</h1>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    @if ($post->cover_image!='noImage.jpg')
                        <img style="height:200px ; width: 200px;" src="/storage/cover_images/{{$post->cover_image}}">
                    @endif
                </div>
                <div class="col-md-8 col-sm-8">
                    {!!$post->body!!}
                </div>
            </div>
            <hr class="my-4">
            <p> written on {{$post->created_at}} By <span style="font-weight:600; ">{{$post->user->name}}</span></p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
        @if (!Auth::guest())
            @if (Auth::user()->id == $post->user_id)
                <a href="{{$post->id}}/edit"  class="btn btn-outline-dark"> Edit </a>

                {!!Form::open(['action' => ['PostsController@destroy' ,$post->id] , 'method'=>'POST' , 'class'=>'float-right'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete' , ['class'=> 'btn btn-outline-danger'])}}
                {!!Form::close()!!}
            @endif

        @endif

    @else
        <div class="alert alert-danger" role="alert">
            Post Dosn't Exist
        </div>
    @endif
@endsection


