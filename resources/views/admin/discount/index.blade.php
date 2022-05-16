@extends('admin.product.master')

@section('content')

<body>
    <div class="container">
        <h1 class="text-center mt-3 mb-5">Discounted Products</h1>

        <div class='d-flex justify-content-between'>

            <div>
                <div>Products Count: <span class="badge badge-danger">{{$allProductsCount}}</span></div>
                <div>Non Discounted Products Count: {{$allNormalProductsCount}}</div>
                <div>Discounted Products Count: {{$allDiscountProductsCount}}</div>
            </div>
            <div>
                <a href="{{route('products.create')}}" target='_blank' class='btn btn-info'> + Add New</a>
            </div>
        </div>
        @include('partial.notifications')



        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Actual Price</th>
                    <th>Discounted Price</th>
                    <!-- <th>Created Date</th> -->
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
                    <td>{{$p->discountprice}}</td>
                    <!-- <td>{{$p->created_at}}</td> -->
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
                    <td>
                        <a href="{{ route('products.percentage', ['product' => $p->id]) }}" class="btn btn-light btn-sm">
                            <i class="fa fa-tags"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

@endsection