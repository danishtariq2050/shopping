@extends('master')

@section('content')
    <form class='container' action="{{ route('categories.update', ['category' => $category->id]) }}" method='POST'>
        @method('PATCH')
        @include('admin.category.form', ['btnName' => 'Update'])
    </form>
@endsection
