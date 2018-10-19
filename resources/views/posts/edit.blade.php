@extends('layouts.app')

@section('content')
<div id="main">
    <div class="comicwidth">
        <h1>Edit Strip</h1>
        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
            </div>
            <div class="form-group">
                {{Form::file('comic_strip')}}
                {{Form::hidden('_method', 'PUT')}}
            </div>
                    
            {{Form::submit('Submit', ['class' => 'button btn-create'])}}
        {!! Form::close() !!}
        <a href="/posts/{{$post->id}}" class="btn-back">Cancel</a>
    </div>    
</div>
    
    
@endsection