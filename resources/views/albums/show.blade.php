@extends('layouts.app')

@section('content')

<div id="main">
    <div class="comicwidth">
        <h1>{{$album->name}}</h1>   
        <a href="/albums" class="btn-back">Back To Albums</a> 
        @if(!Auth::guest())
            <a href="/posts/create/{{$album->id}}" class=" button btn-create">Upload Strip to Month</a>
        @endif

        @if(count($album->post) > 0)
            
            @foreach($album->post as $post)
                <div class="episodes">
                    <h4>{{$post->title}}</h4>
                    <a href="/posts/{{$post->id}}#disqus_thread" class="comment_counter">
                    <a href="/posts/{{$post->id}}">
                    <p class="strip-description">{!!$post->body!!}</p>
                    <p class="upload-date">Uploaded on {{$post->created_at}}</p>
                    {{-- <img src="/storage/comic_strips/{{$post->album_id}}/{{$post->comic_strip}}" alt=""> --}}
                    </a>
                </div>
            @endforeach
            <a href="/albums" class="btn-back">Back To Albums</a> 
        @endif
    </div>    
</div>
<script id="dsq-count-scr" src="//katapugon.disqus.com/count.js" async></script>
@endsection