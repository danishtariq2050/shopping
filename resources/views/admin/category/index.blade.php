@extends('admin.category.master')

@section('content')
    <body>
    <div class="container">
            <h1 class="text-center mt-3 mb-5">Categories</h1>

            <div class='d-flex mb-5 justify-content-between'>
            <div>Categories Count: <span class="badge badge-danger">{{$allCategoriesCount}}</span></div>


            <div>
                <a href="{{route('categories.create')}}" target='_blank' class='btn btn-info'> + Add New</a>
            </div>
        </div>


            @include('partial.notifications')

            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Products</th>
                        <th>Created Date</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->name}}</td>
                            <td>{{$c->description}}</td>
                            <td>
                                <span class="badge badge-danger">{{$c->products->count()}}</span>
                                <ul>
                                    @foreach ($c->products as $p)
                                        <li>{{$p->name}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{$c->created_at}}</td>
                            <td>
                                <a href="{{ route('categories.show', ['category' => $c->id]) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', ['category' => $c->id]) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('categories.destroy', ['category' => $c->id]) }}" method='POST'>
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

