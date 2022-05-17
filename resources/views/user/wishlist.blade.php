@extends('user.layout.layout')
@section('header_categories', 'hero-normal')
@section('shop_active', 'active')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Wishlist</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('user.index')}}">Home</a>
                            <span>Wishlist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Wishlist Section Begin -->
    <section>
        <div class="container">
            <table class="table table-bordered table-hover table-striped my-5">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wishlists as $w)
                        <tr>
                            <td width="110">
                                <img width="100" src="{{ $w->product->image ? asset('storage/'.$w->product->image) : asset('img/na.jpg')}}" alt="{{$w->product->name}}">
                            </td>
                            <td>{{$w->product->name}}</td>
                            <td>PKR. {{ number_format($w->product->discountprice ? $w->product->discountprice : $w->product->price)}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <!-- Wishlist Section End -->
@endsection
