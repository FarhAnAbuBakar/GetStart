@extends('layouts.app')

@section('content')
    <h1>Posts</h1>

    @if(count($post) > 0)
        @foreach($post as $Posts)
            <div class='well'>
            <h3><a href="/posts/{{$Posts->id}}">{{$Posts->string}}</a></h3>
            <small>Written on {{$Posts->created_at}} by {{$Posts->user->name}}</small>
            </div>
        @endforeach

        {{$post->links()}}
    @else  
        <p>No Posts Found</p>
    @endif
@endsection