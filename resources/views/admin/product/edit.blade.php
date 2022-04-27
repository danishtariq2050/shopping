@extends('master')

@section('content')
  <form class='container' action="{{ route('products.update', ['product' => $product->id]) }}" method='POST'>
    @method('PATCH')
    @csrf

  <div class="form-group">
    <label for="exampleFormControlInput1">Product Name</label>
    <input type="text" name='name' class="form-control" id="exampleFormControlInput1" placeholder="Product Name" value="{{$product->name}}">
  </div>
  <div class="form-group mt-5">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name='description' id="exampleFormControlTextarea1" rows="5" placeholder="Description">{{ $product->description }}</textarea>
  </div>
  <div class="form-group mt-5">
    <label for="exampleFormControlTextarea1">Product Price</label>
    <input type="number" name='price' class="form-control" id="exampleFormControlInput2" placeholder="Product Price" value="{{$product->price}}">
  </div>
  <div class="form-group mt-5">
    <label for="exampleFormControlTextarea1">Discount Price</label>
    <input type="number" name='discountprice' class="form-control" id="exampleFormControlInput3" placeholder="Discount Price" value="{{$product->discountprice}}">
  </div>
  <div class="form-group mt-5">
    <label for="exampleFormControlTextarea1">Discount Percentage</label>
    <input type="text" name='discountpercentage' class="form-control" id="exampleFormControlInput5" placeholder="Discount Percentage" value="{{$product->discountpercentage}}">
  </div>

  <div class="form-group mt-5">
    <label for="exampleFormControlFile1">Upload Image</label>
    <input type="file" name='image' class="form-control-file" id="exampleFormControlFile1">
  </div>

<div>
<button type="submit" class=" mt-5 btn btn-dark btn-lg btn-block">Update Product</button>
</div>
</form>

@endsection
