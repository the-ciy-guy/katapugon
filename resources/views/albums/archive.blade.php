@extends('layouts.app')

@section('content')
    <div id="main">
        <div class="comicwidth">
            <h1>Browse Comics</h1>
            @if(!Auth::guest())
                <a href="/albums/create" class="button btn-back">Create Album</a>
            @endif    
            @foreach($albums as $album)
            <h2><a href="/albums/{{$album->id}}">{{$album->name}}</a></h2>
            @endforeach
        </div>    
    </div>    
@endsection