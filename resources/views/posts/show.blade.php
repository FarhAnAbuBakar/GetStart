@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-success">Go Back</a> 
    <h1>{{$post->string}}</h1>
    <small>written on {{$post->created_at}}</small>

    <div>
        <h3>{!!$post->body!!}</h3>
    </div>

    @if(!auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default"> Edit</a>

            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close()!!}
        @endif
    @endif
@endsection