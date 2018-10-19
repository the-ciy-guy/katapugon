@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($posts) > 0)
                        <a href="/albums" class="btn btn-primary">To Albums</a>
                        <h3>Your Comics</h3>
                        <table>
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                <th>{{$post->title}}</th>
                                <th><a href="/posts/{{$post->id}}/edit">Edit Comic</a></th>
                                <th>
                                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'delete-button'])}}                 
                                    {!!Form::close()!!}
                                </th>
                            </tr>
                            @endforeach
                        </table>
                    @else 
                        <p>You have no comics</p>    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
