@extends('user.layout.layout')
@section('header_categories', 'hero-normal')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('user.index')}}">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $i)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="{{ $i['item']['image'] ? asset('storage/'.$i['item']['image']) : asset('img/na.jpg') }}" alt="{{$i['item']['name']}}" width="100">
                                            <h5>{{$i['item']['name']}}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            PKR. {{number_format($i['item']['discountprice'] ? $i['item']['discountprice'] : $i['item']['price'])}}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="d-flex flex-row">
                                                    <a href="{{route('product.removeCart', ['id' => $i['item']['id']])}}" class="btn btn-light">-</a>
                                                    <input type="text" value="{{$i['qty']}}" class="form-control">
                                                    <a href="{{route('product.addToCart', ['id' => $i['item']['id']])}}" class="btn btn-light">+</a>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            PKR. {{number_format($i['price'])}}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="{{route('product.deleteCart', ['id' => $i['item']['id']])}}">
                                                <span class="icon_close"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{route('product.clearCart')}}" class="primary-btn cart-btn">CLEAR</a>
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Quantity <span>{{number_format($quantity)}}</span></li>
                            <li>Total <span>PKR. {{number_format($price)}}</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
