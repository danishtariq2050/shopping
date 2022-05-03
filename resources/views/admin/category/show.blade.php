@extends('master')

@section('content')
<div class="container">
    <h1 class="text-center">Category Details</h1>
    <hr>
    <div class="row mt-5">
        <div class="col-8">
            <div class="row">
                <div class="col-4 font-weight-bold mb-2">Category Name:</div>
                <div class="col-8">{{$category->name}}</div>

                <div class="col-4 font-weight-bold mb-2">Description:</div>
                <div class="col-8">{{$category->description}}</div>
            </div>
        </div>
    </div>
</div>
@endsection