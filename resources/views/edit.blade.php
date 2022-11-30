@extends('layout.app')

@section('content')
    <div class="container px-4 py-4">
        <span style="color: red; font-size: 16px;">What's on your mind?</span>
        <form action="{{route('editPost')}}" method="post">
            <div class="d-flex">
                @csrf
                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="text" name="title" value="{{$post->title}}" class="form-control m-1 @error('title') is-invalid @enderror" placeholder="Update your Post">
                <button type="submit" class="btn btn-primary m-1">Update</button>
            </div>
        </form>
    </div>
@endsection