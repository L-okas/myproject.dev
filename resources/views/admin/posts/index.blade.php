@extends('layouts.admin')

@section('content')
    {{--@if(Session::has('user_delete'))--}}
        {{--<div class="alert alert-success" style="margin-top: 10px;">--}}
            {{--<strong>{{session('user_delete')}}</strong>--}}
        {{--</div>--}}
    {{--@endif--}}
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
                    <td>{{str_limit($post->content, 15)}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td>
                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-xs" role="button"><i class="fa fa-pencil-square-o"></i></a>
                            <form method="post" action="posts/{{$post->id}}" class="delete-form">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash " aria-hidden="true"></i>
                                </button>
                            </form>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row" style="margin-top: 200px">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}

        </div>
    </div>
@endsection