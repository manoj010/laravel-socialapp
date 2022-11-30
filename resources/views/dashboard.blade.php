@extends('layout.app')

@section('content')
    <div class="container px-4 py-4">
        <span style="color: red; font-size: 16px;">What's on your mind?</span>
        <form action="{{route('addPost')}}" method="post">
            <div class="d-flex">
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <input type="text" name="title" class="form-control m-1 @error('title') is-invalid @enderror" placeholder="Post your thought">
                <button type="submit" class="btn btn-primary m-1">Post</button>
            </div>
        </form>
    </div>

    <div class="container py-2">
        <table class="table table-striped table-dark border-success table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col" class="px-3">SN</th>
                    <th scope="col">Posts</th>
                    <th scope="col">Posted By</th>
                    <th scope="col" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $sn = 1;
                @endphp
                @foreach($posts as $post)
                    <tr>
                        <th scope="row" class="px-3">{{$sn++}}</th>
                        <td scope="row">{{$post->title}}</td>
                        <td scope="row">{{$post->user->name}}</td>
                        <td scope="row">
                        @if(auth()->user()->id == $post->user->id)
                            <button type="button" class="btn btn-danger btn-sm"><a class="text-white text-decoration-none" href="{{url('/edit/'.$post->id)}}">Edit</a></button>
                        @endif
                        </td>
                        <td scope="row">
                        @if(auth()->user()->id == $post->user->id)
                            <button type="button" class="btn btn-danger btn-sm"><a class="text-white text-decoration-none" href="{{url('/delete/'.$post->id)}}">Delete</a></button>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection