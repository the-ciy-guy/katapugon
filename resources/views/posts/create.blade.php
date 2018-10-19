@extends('layouts.app')

@section('content')
<div id="main">
    <div class="comicwidth">
        <h1>Upload Strip</h1>
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Description')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
            </div>
            <div class="form-group">
                {{Form::hidden('album_id', $album_id)}}
                {{Form::file('comic_strip')}}
            </div>
            
            {{Form::submit('Submit', ['class' => 'button btn-create'])}}
        {!! Form::close() !!}
        
        <a href="/albums/{{$album_id}}" class="btn-back">Cancel</a>
    </div>    
</div>
    
    
@endsection