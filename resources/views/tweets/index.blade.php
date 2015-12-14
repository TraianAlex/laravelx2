@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Tweets</h1>
    </div>


    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('tweets.index')}}" method="GET"> 
                <div class="form-group"> 
                    <input type="text" name="search" placeholder="Search" class="form-control" value="@if($search) {{ $search }} @endif"> 
                </div> 
                <button class="btn btn-success">Search</button> 
             </form> 

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>BODY</th>
                        <th>USER_ID</th>
                        <th>Image</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($tweets as $tweet)
                <tr>
                    <td>{{$tweet->id}}</td>
                    <td>{{$tweet->title}}</td>
                    <td>{{$tweet->body}}</td>
                    <td>{{$tweet->user_id}}</td>
                    @if($tweet->image_name)
                        <td><img src="/img/tweet/{{ $tweet->image_name }}" alt="{{ $tweet->image_name }}" class="img-responsive"></td>
                    @else
                        <td><img src="http://placehold.it/140x100" alt="" class="img-responsive"></td>
                    @endif
                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ route('tweets.show', $tweet->id) }}">View</a>
                        <a class="btn btn-warning " href="{{ route('tweets.edit', $tweet->id) }}">Edit</a>
                        <form action="{{ route('tweets.destroy', $tweet->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>
            <hr> 
            {!! $tweets->render() !!} 
            <hr>
            <a class="btn btn-success" href="{{ route('tweets.create') }}">Create</a>
        </div>
    </div>


@endsection