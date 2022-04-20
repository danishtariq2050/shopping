<!doctype html>
<html lang="en">
  <head>
    <title>Categories</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <form class='container mt-5' action="{{ url('/admin/product/create') }}" method='GET' enctype='mutipart/form-data'>
    @csrf

  <div class="form-group">
    <label for="exampleFormControlInput1">Product Name</label>
    <input type="text" name='name' class="form-control" id="exampleFormControlInput1" placeholder="Category Name">
  </div>
  <div class="form-group mt-5">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name='description' id="exampleFormControlTextarea2" rows="5" placeholder="Description"></textarea>
  </div>
  <div class="form-group mt-5">
    <label for="exampleFormControlTextarea1">Product Price</label>
    <input type="number" name='price' class="form-control" id="exampleFormControlInput1" placeholder="Product Price">
  </div>
  <div class="form-group mt-5">
    <label for="exampleFormControlTextarea1">Discount Price</label>
    <input type="number" name='discountprice' class="form-control" id="exampleFormControlInput1" placeholder="Discount Price">
  </div>
  <div class="form-group mt-5">
    <label for="exampleFormControlTextarea1">Discount Percentage</label>
    <input type="text" name='discountpercentage' class="form-control" id="exampleFormControlInput1" placeholder="Discount Percentage">
  </div>

  <div class="form-group mt-5">
    <label for="exampleFormControlFile1">Upload Image</label>
    <input type="file" name='image' class="form-control-file" id="exampleFormControlFile1">
  </div>

<div>
<button type="submit" class=" mt-5 btn btn-primary btn-lg btn-block">Add Product</button>
</div>
</form>