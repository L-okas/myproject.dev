@extends('layouts.admin')


@section('content')
<h1 class="admin-control-info">Categories</h1>

    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Category Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
            @if($errors->has('name'))
                <div class="col-xs-12 alert alert-danger">
                    {{$errors->first('name')}}
                </div>
            @endif
            </div>

            <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

    </div>

    <div class="col-sm-6">
        @if($categories)
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created date</th>
                    <th>Console</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at}}</td>
                        <td> <a href="categories/{{$category->id}}/edit" class="btn btn-primary btn-xs" role="button"><i class="fa fa-pencil-square-o"></i></a>
                            <form method="post" action="categories/{{$category->id}}" class="delete-form">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash " aria-hidden="true"></i>
                                </button>
                            </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
<div class="row" style="margin-top: 200px">
    <div class="col-sm-6 col-sm-offset-5">
        {{$categories->render()}}
    </div>
</div>
@endsection