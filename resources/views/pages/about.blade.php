@extends('layouts.app')
@section('content')
    <div id="main">
    <div class="section1 section">
        <h1>About the Comic</h1>
        <p>This is a comic about adjusting to life in a new country and in a new culture. We get to follow the main character on his adventures trying to fit in in his newish home country.</p>
    </div>
    <div class="section2 section">
        <h1 class="abouttitle">About the character</h1>
        <img src="/storage/comic_strips/noimage.jpg" alt="katapugon" class="characterpic">
        <div class="charactertext">
            <p>Our nameless "hero" has a good heart, well most of the time, has a hard time to say no to a party and has a tendency to end up in social situations he can't really handle.</p>
        </div>
    </div>
    <div class="section2 section">
        <h1 class="abouttitle">About the Creator</h1>
        <img src="/storage/comic_strips/noimage.jpg" alt="katapugon" class="characterpic">
        <div class="charactertext">
            <p>The creator who shall remain anonymous are not very good at drawing. Just as the main character the creator likes to go out for a beer with friends and if there are no friends available he doesn't shy away from drinking alone on a bench in a park somewhere. A real class act.</p>
        </div>    
    </div>
</div>
@endsection