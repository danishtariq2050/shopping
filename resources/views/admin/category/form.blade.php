@include('partial.notifications')

@csrf

<div class="form-group">
    <label>Category Name</label>
    <input type="text" name='name' class="form-control" placeholder="Category Name" value="{{$category->name}}">
</div>
<div class="form-group mt-5">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name='description' rows="10" placeholder="Description">{{ $category->description }}</textarea>
</div>

<button type="submit" class="mt-5 btn {{$btnName == 'Add' ? 'btn-primary' : 'btn-dark'}} btn-lg btn-block">{{$btnName}} Category</button>