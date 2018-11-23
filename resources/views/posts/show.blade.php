@extends('layouts.app')
@section('content')
    <a href="/posts" class="btn btn-outline-dark">Back</a>
    @if ($post)
        <h3>{{$post->title}}</h3>

        <div>
            {!!$post->body!!}
        </div>
        <hr>
        <small > written on {{$post->created_at}} By <span style="font-weight:600; ">{{$post->user->name}}</span></></small>

        <hr>
        <a href="{{$post->id}}/edit"  class="btn btn-outline-dark"> Edit </a>

        {!!Form::open(['action' => ['PostsController@destroy' ,$post->id] , 'method'=>'POST' , 'class'=>'float-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete' , ['class'=> 'btn btn-outline-danger'])}}
        {!!Form::close()!!}
    @else
        <div class="alert alert-danger" role="alert">
            Post Dosn't Exist
        </div>
    @endif
@endsection
