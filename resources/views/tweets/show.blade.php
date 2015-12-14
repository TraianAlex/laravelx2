@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Tweets / Show </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="title">TITLE</label>
                    <p class="form-control-static">{{$tweet->title}}</p>
                </div>
                @if($tweet->image_name)
                    <img src="/img/tweet/{{ $tweet->image_name }}" alt="{{ $tweet->image_name }}" class="img-responsive">
                @else
                    <img src="http://placehold.it/140x100" alt="" class="img-responsive">
                @endif
                <div class="form-group">
                    <label for="body">BODY</label>
                    <p class="form-control-static">{{$tweet->body}}</p>
                </div>
                    <div class="form-group">
                    <label for="user_id">USER_ID</label>
                    <p class="form-control-static">{{$tweet->user_id}}</p>
                </div>
            </form>

            <div>User: {{ $tweet->user->name }}</div>

            <div>Tags:</div>
            <ul>
                @foreach($tweet->tags as $tag)
                    <li><a href="{{ route('tweets.index', ['tags' => $tag->id]) }}">{{ $tag->name }}</a></li>
                @endforeach
            </uL>

            <a class="btn btn-default" href="{{ route('tweets.index') }}">Back</a>
            <a class="btn btn-warning" href="{{ route('tweets.edit', $tweet->id) }}">Edit</a>
            <form action="#/$tweet->id" method="DELETE" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><button class="btn btn-danger" type="submit">Delete</button></form>
        </div>
    </div>
@endsection