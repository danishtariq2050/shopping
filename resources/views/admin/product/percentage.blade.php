@extends('master')

@section('content')
<form class='container' action="{{ route('products.addpercentage', ['product' => $product->id]) }}" method='POST'>
    @method('PATCH')
    @include('partial.notifications')

    @csrf
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" name='name' class="form-control" placeholder="Product Name" value="{{$product->name}}">
    </div>
    <div class="form-group mt-5">
        <label>Product Price: </label>
        <label>{{$product->price}}</label>
        <!-- <input type="number" name='price' class="form-control" placeholder="Product Price" value="{{$product->price}}"> -->
    </div>
    <div class="form-group mt-5">
        <label>Discount Percentage</label>
        <input type="text" name='discountpercentage' class="form-control" placeholder="Discount Percentage"
            value="{{$product->discountpercentage}}">
    </div>
    <button type="submit" class="mt-5 btn btn-lg btn-block">Add Discount</button>
</form>
@endsection