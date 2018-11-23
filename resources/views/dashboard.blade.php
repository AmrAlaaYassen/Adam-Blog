@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary"> Create Post </a>


                    @if (count($posts)>0)
                    <h3 style="margin: 10px;">Your Blog Posts</h3>
                    <table class="table table-hover ">
                            <thead>
                              <tr>
                                <th scope="col">TITLE</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark">Edit </a></td>
                                        <td>
                                             {!!Form::open(['action' => ['PostsController@destroy' ,$post->id] , 'method'=>'POST' , 'class'=>'float-right'])!!}
                                                {{Form::hidden('_method','DELETE')}}
                                                {{Form::submit('Delete' , ['class'=> 'btn btn-outline-danger'])}}
                                            {!!Form::close()!!}
                                        </td>

                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h4 style="margin: 10px;"   >You have No posts</h4>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
