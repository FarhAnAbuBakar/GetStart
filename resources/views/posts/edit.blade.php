@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->string, ['class' => 'form-control', 'placeholder' => 'Please Input Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('Body', 'Body')}}
            {{Form::textarea('Body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Please Input Body'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
  
@endsection