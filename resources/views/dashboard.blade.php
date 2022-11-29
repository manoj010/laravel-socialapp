@extends('layout.app')

@section('content')
    <div class="container py-4">
        <table class="table table-striped table-dark border-success table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col" class="px-3">SN</th>
                    <th scope="col">Posts</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Delete</th>
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
                            Delete
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection