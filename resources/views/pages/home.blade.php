@extends('layouts.app')

@section('content')
    <header id="showcase">
        <h1>Welcome to Katapugon!</h1>
        <p>The poorly drawn comic strip about a Korean adoptee trying to live in Korea.</p>
        <p class="bold">News here</p>
        <p>Choose your next move carefully...</p>
        <div class="home_buttons">
            <a href="/albums" class="button">New Reader?</a>
            <a href="/posts" class="button">Latest strip</a>
            <a href="/albums/archive" class="button">Archive</a>
            @if(!Auth::guest())
                <a href="/albums/create" class="button">Create Album</a>
            @endif 
        </div>   
    </header>    
@endsection