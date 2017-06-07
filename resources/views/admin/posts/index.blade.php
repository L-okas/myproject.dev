@extends('layouts.admin')

@section('content')
    <h1 class="admin-control-info">Posts</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Post owner</th>
            <th>Category Id</th>
            <th>Photo Id</th>
            <th>title</th>
            <th>Content</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Console</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>
                        @if($post->category)
                        {{$post->category->name}}
                        @endif
                    </td>
                    <td>
                        @if($post->photo_id)
                        <img src="{{$post->photo->path}}" alt="post image" class="img-circle user-img">
                        @else
                        {{"no photo"}}
                        @endif
                    </td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->content}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection