@extends('admin.product.master')

@section('content')
    <body>
        <div class="container">
            <h1 class="text-center mt-3 mb-5">Products</h1>
            <div>Products Count: <span class="badge badge-danger">{{$allProductsCount}}</span></div>
            <div>Non Discounted Products Count: {{$allNormalProductsCount}}</div>
            <div>Discounted Products Count: {{$allDiscountProductsCount}}</div>

            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Created Date</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->image}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->description}}</td>
                            <td>{{$p->price}}</td>
                            <td>{{$p->created_at}}</td>
                            <td>
                                <a href="{{ route('products.show', ['product' => $p->id]) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('products.edit', ['product' => $p->id]) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('products.destroy', ['product' => $p->id]) }}" method='POST'>
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>

@endsection

