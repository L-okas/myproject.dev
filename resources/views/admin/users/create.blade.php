@extends('layouts.admin')

@section('content')
    <h1 class="admin-control-info">Create User</h1>

{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

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
                    {!! Form::select('is_active', array(1=>'Active', 0=>'Not active'), 0 , ['class'=>'form-control']) !!}
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
        {!! Form::submit('Create User', ['class'=>'btn btn-primary col-xs-12']) !!}
    </div>
    {!! Form::close() !!}
@endsection