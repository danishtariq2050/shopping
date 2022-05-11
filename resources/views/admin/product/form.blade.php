@include('partial.notifications')

@csrf
<div class="form-group">
    <label>Product Name</label>
    <input type="text" name='name' class="form-control" placeholder="Product Name" value="{{$product->name}}">
</div>

<div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
        @foreach($categories as $c)
            <option value="{{$c->id}}" {{ $product->category_id == $c->id ? 'selected' : ''}}>{{$c->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group mt-5">
    <label>Description</label>
    <textarea class="form-control" name='description' rows="5" placeholder="Description">{{ $product->description }}</textarea>
</div>

<div class="form-group mt-5">
    <label>Product Price</label>
    <input type="number" name='price' class="form-control" placeholder="Product Price" value="{{$product->price}}">
</div>


<div class="form-group mt-5">
    <label>Discount Price</label>
    <input type="number" name='discountprice' class="form-control" placeholder="Discount Price" value="{{$product->discountprice}}">
</div>

<div class="form-group mt-5">
    <label>Discount Percentage</label>
    <input type="text" name='discountpercentage' class="form-control" placeholder="Discount Percentage" value="{{$product->discountpercentage}}">
</div>

<div class="form-group mt-5">
    <label>Upload Image</label>
    <input type="file" name='image' class="form-control-file">
</div>

<button type="submit" class="mt-5 btn {{$btnName == 'Add' ? 'btn-primary' : 'btn-dark'}} btn-lg btn-block">{{$btnName}} Product</button>

<!-- @if($btnName == 'Update')
    <button type="submit" class="mt-5 btn btn-dark btn-lg btn-block">{{$btnName}} Product</button>
@else
    <button type="submit" class="mt-5 btn btn-primary btn-lg btn-block">{{$btnName}} Product</button>
@endif -->
