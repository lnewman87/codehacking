@extends('layouts.blog-post')

@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : null}}" alt="">

    <hr>

    <!-- Post Content -->

    <p>{!!$post->body!!}</p>

    <hr>

    @if(Session::has('comment_message'))

        {{session('comment_message')}}


    @endif

    <!-- Blog Comments -->


    @if(Auth::check())

        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>


            {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store']) !!}


            <input type="hidden" name="post_id" value="{{$post->id}}">


            <div class="form-group">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}


        </div>


    @endif

    <hr>


@endsection
