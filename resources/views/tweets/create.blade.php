@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Tweets / Create </h1>
    </div>

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('tweets.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                     <label for="title">TITLE</label>
                     <input type="text" name="title" class="form-control" value="{{old('title')}}"/>
                </div>
                    <div class="form-group">
                     <label for="body">BODY</label>
                     <textarea class="form-control" rows="3" name="body"/>{{old('body')}}</textarea>
                </div>
                    <div class="form-group">
                     <label for="image">Image</label>
                     <input type="file" name="image" class="form-control"/>
                </div>

            <a class="btn btn-default" href="{{ route('tweets.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Create</button>
            </form>
        </div>
    </div>
@endsection