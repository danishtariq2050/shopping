@extends('master')

@section('content')
    <form class='container' action="{{ route('products.update', ['product' => $product->id]) }}" method='POST' enctype="multipart/form-data">
        @method('PATCH')
        @include('admin.product.form', ['btnName' => 'Update'])
    </form>
@endsection
