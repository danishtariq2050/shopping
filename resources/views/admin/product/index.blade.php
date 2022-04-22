<!doctype html>
<html lang="en">
    <head>
        <title>Categories</title>

        <!-- Bootstrap CSS -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <h1 class="text-center mt-3 mb-5">Products</h1>

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
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-remove"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>

