@extends('layouts.app')

@section('content')

<div class="container">

    <form method="post">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{$article->title}}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Body</label>
            <textarea name="body" class="form-control">{{$article->body}}</textarea>
        </div>

        <input type="submit" value="Edit Article" class="btn btn-primary">
    </form>
</div>
@endsection