@extends('master')

@section('content')
    <form class='container' action="{{ route('products.store') }}" method='POST' enctype="multipart/form-data">
        @include('admin.product.form', ['btnName' => 'Add'])
    </form>
@endsection
