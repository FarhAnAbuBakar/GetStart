@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
      <div class="form-group">
          {{Form::label('title', 'Title')}}
          {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Please Input Title'])}}
      </div>
      <div class="form-group">
        {{Form::label('Body', 'Body')}}
        {{Form::textarea('Body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Please Input Body'])}}
    </div>
    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
  
@endsection