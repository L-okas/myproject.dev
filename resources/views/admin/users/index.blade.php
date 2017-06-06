@extends('layouts.admin')

@section('content')
    @if(Session::has('user_delete'))
    <div class="alert alert-success" style="margin-top: 10px;">
    <strong>{{session('user_delete')}}</strong>
    </div>
    @endif
    <h1 class="admin-control-info">Users</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>User photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>User role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Console</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        @if($user->photo)
                        <img src="{{$user->photo->path}}" alt="user-img" class="img-circle user-img">
                        @else
                            <img src="/images/useralias.jpg" alt="user-img" class="img-circle user-img">
                        @endif
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>@if($user->is_active == 1)
                        <span class="status-active">{{"active"}}</span>
                        @else
                         <span class="status-not-active">{{"not active"}}</span>
                        @endif
                    </td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>
                        <a href="users/{{$user->id}}/edit" class="btn btn-primary btn-xs" role="button"><i class="fa fa-pencil-square-o"></i></a>
                        <form method="post" action="users/{{$user->id}}" class="delete-form">
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
@endsection