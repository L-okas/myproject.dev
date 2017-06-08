@extends('layouts.admin')

@section('content')
    <h1 class="admin-control-info">Dashboard</h1>
    <div class="row user-monitoring" style="text-align: center; border: 1px solid grey;
border-radius: 5px; padding: 50px; font-size: 150%">
        <div class="col-sm-12">
            You have {{$total}} users registered
        </div>
    </div>
    <div class="row user-monitoring" style="text-align: center; border: 1px solid grey;
border-radius: 5px; padding: 50px; font-size: 150%; margin-top:10px;">
        <div class="col-sm-12">
            You have {{$totalposts}} posts
        </div>
    </div>
    <div class="row user-monitoring" style="text-align: center; border: 1px solid grey;
border-radius: 5px; padding: 50px; font-size: 150%; margin-top:10px;">
        <div class="col-sm-12">
            You have {{$totalcategories}} categories
        </div>
    </div>
@endsection