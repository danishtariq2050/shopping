@extends('master')

@section('content')
    <form class='container' action="{{ route('products.update', ['product' => $product->id]) }}" method='POST'>
        @method('PATCH')
        @include('admin.product.form', ['btnName' => 'Update'])
    </form>
@endsection
