@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Tweets / Edit </h1>
    </div>

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('tweets.update', $tweet->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$tweet->id}}</p>
                </div>
                <div class="form-group">
                     <label for="title">TITLE</label>
                     <input type="text" name="title" class="form-control" value="{{$tweet->title}}"/>
                </div>
                    <div class="form-group">
                     <label for="body">BODY</label>
                     <textarea class="form-control" rows="3" name="body"/>{{$tweet->body}}</textarea>
                </div>
                    <div class="form-group">
                     <label for="image">Image</label>
                     <input type="file" name="image" class="form-control"/>
                </div>
                </div>
                    <div class="form-group">
                     <label for="tags">Tags</label>
                     <input type="text" name="tags" class="form-control" placeholder="foo, bar"/>
                </div>
            <a class="btn btn-default" href="{{ route('tweets.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</button>
            </form>
        </div>
    </div>
@endsection