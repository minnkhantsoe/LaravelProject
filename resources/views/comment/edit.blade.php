@extends('layouts.app')

@section('content')

<div class="container">

    <form method="post">
        @csrf
        <div class="mb-3">
            <label>Comment</label>
            <input type="text" name="content" value="{{$comment->content}}" class="form-control">
        </div>

        <input type="submit" value="Edit Comment" class="btn btn-primary">
    </form>
</div>
@endsection