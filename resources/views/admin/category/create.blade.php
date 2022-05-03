@extends('master')

@section('content')
    <form class='container' action="{{ route('categories.store') }}" method='POST'>
        @include('admin.category.form', ['btnName' => 'Add'])
    </form>
@endsection