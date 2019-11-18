@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-secondary">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img style="width:100%" src="{{ asset('/storage/cover_images/'.$post->cover_image)}}">
    <br><br>
    <small>Written on {{$post->created_at}}</small>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>

            {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection
