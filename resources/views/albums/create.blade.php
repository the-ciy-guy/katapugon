@extends('layouts.app')

@section('content')
    <div id="main">
        <div class="comicwidth">
            <h1>New Month</h1>
            {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Month'])}}
                </div>
                {{Form::submit('Submit', ['class' => 'button btn-create'])}}
            {!! Form::close() !!}
            <a href="/albums" class="button btn-back">Back</a>
        </div>    
    </div>
@endsection
