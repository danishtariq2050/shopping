@if(session()->has('save'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {{session()->get('save')}}
    </div>
@endif

@if(session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Alert!</strong> {{session()->get('delete')}}
    </div>
@endif

@if(session()->has('update'))
    <div class="alert alert-warning alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {{session()->get('update')}}
    </div>
@endif
