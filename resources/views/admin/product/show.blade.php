@extends('master')

@section('content')
    <div class="container">
        <h1 class="text-center">Product Details</h1>
        <hr>
        <div class="row mt-5">
            <div class="col-8">
                <div class="row">
                    <div class="col-4 font-weight-bold mb-2">Product Name:</div>
                    <div class="col-8">{{$product->name}}</div>


                    <div class="col-4 font-weight-bold mb-2">Category:</div>
                    <div class="col-8">{{$product->category->name}}</div>

                    <div class="col-4 font-weight-bold mb-2">Description:</div>
                    <div class="col-8">{{$product->description}}</div>

                    <div class="col-4 font-weight-bold mb-2">Price:</div>
                    <div class="col-8">{{$product->price}}</div>

                    <div class="col-4 font-weight-bold mb-2">Discount Price</div>
                    <div class="col-8">{{$product->discountprice}}</div>
                </div>
            </div>
            <div class="col-4">
                <img src="" alt="Product Image" />
            </div>
        </div>
    </div>
@endsection
