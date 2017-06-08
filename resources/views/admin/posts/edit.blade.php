@extends('layouts.admin')

@section('content')
    <h1 class="admin-control-info">Edit Post</h1>

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true, 'class'=>'admin-forms']) !!}

    <div class="form-group">
        <div class="col-xs-12 create-admin-form">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
            @if($errors->has('title'))
                <div class="col-xs-12 alert alert-danger">
                    {{$errors->first('title')}}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12 create-admin-form">
            {!! Form::label('category_id', 'Category') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
            @if($errors->has('category_id'))
                <div class="col-xs-12 alert alert-danger">
                    {{$errors->first('category_id')}}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12 create-admin-form">
            {!! Form::label('photo_id', 'Photo') !!}
            {!! Form::file('photo_id', ['class'=>'form-control']) !!}
            @if($errors->has('photo_id'))
                <div class="col-xs-12 alert alert-danger">
                    {{$errors->first('photo_id')}}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12 create-admin-form">
            {!! Form::label('content', 'Description') !!}
            {!! Form::textarea('content', null, ['class'=>'form-control', 'rows'=>5]) !!}
            @if($errors->has('content'))
                <div class="col-xs-12 alert alert-danger">
                    {{$errors->first('content')}}
                </div>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12 create-admin-form submit-buttons-blue">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-xs-12']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@endsection