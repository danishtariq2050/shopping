@extends('master')

@section('content')
  <form class='container mt-5' action="{{ url('/admin/category') }}" method='POST'>
    @csrf

  <div class="form-group">
    <label for="exampleFormControlInput1">Category Name</label>
    <input type="text" name='name' class="form-control" id="exampleFormControlInput1" placeholder="Category Name">
  </div>
  <div class="form-group mt-5">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name='description' id="exampleFormControlTextarea2" rows="10" placeholder="Description"></textarea>
  </div>

<div>
<button type="submit" class=" mt-5 btn btn-primary btn-lg btn-block">Add Category</button>
</div>
</form>

@endsection