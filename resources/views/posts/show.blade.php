@extends('layouts.app')

@section('content')
    <div id="main">
        <div class="comicwidth">
            <h1>{{$post->title}}</h1>
            <a href="/albums/{{$post->album_id}}" class="button btn-back">Back to Strips</a>
            <a href="/posts" class="button btn-back">See Latest Strip</a>
            <div class="episodes">
                <img src="/storage/comic_strips/{{$post->album_id}}/{{$post->comic_strip}}" alt="">
                <p class="strip-description">{!!$post->body!!}</p>
                <p class="upload-date">Uploaded on {{$post->created_at}}</p>
            </div>
            
            <div id="disqus_thread"></div>
    <script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

    var disqus_config = function () {
    this.page.url = '{{Request::url()}}';  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = {{$post->id}}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };

    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://katapugon.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

            <a href="/albums/{{$post->album_id}}" class="button btn-back">Back to Strips</a>
            @if(!Auth::guest()) <!-- Only logged in user can see -->
                @if(Auth::user()->id == $post->user_id) <!-- Only correct user can see -->
                    <a href="/posts/{{$post->id}}/edit" class="button btn-back">Edit</a>
                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete')}}
                    {!!Form::close()!!}
                @endif
            @endif
        </div>    
    </div> 
@endsection