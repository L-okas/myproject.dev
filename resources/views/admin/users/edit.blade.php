@extends('layouts.admin')

@section('content')
    <h1 class="admin-control-info">Edit User</h1>

    <div class="col-sm-3">
            @if($user->photo)
                <img src="{{$user->photo->path}}" alt="user" class="img-responsive img-rounded">
            @else
                    <img src="/images/useralias.jpg" alt="no-alias" class="img-responsive img-rounded">
            @endif
    </div>
    <div class="col-sm-9">
    {!! Form::model/*bind user model*/($user/*inserting a model*/, ['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $user->id], 'files'=>true]) !!}

    <div class="form-group row">
        <div class="col-xs-12 create-admin-form">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
            @if($errors->has('name'))
                <div class="col-xs-12 alert alert-danger">
                    {{$errors->first('name')}}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-xs-12 create-admin-form">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email',  null , ['class'=>'form-control']) !!}
            @if($errors->has('email'))
                <div class="col-xs-12 alert alert-danger">
                    {{$errors->first('email')}}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-xs-12 create-admin-form">
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id', [''=>'Select user role'] + $roles, null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-xs-12 create-admin-form">
            {!! Form::label('is_active', 'Status') !!}
            {!! Form::select('is_active', array(1=>'Active', 0=>'Not active'), null /*in edit form 0 not set to default*/ , ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-xs-12 create-admin-form">
            {!! Form::label('photo_id', 'Image') !!}
            {!! Form::file('photo_id', ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-xs-12 create-admin-form">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
            @if($errors->has('password'))
                <div class="col-xs-12 alert alert-danger">
                    {{$errors->first('password')}}
                </div>
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Update User', ['class'=>'btn btn-primary col-xs-12']) !!}
    </div>
    {!! Form::close() !!}
    </div>
@endsection
