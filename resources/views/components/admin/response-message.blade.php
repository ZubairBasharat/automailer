@if(session()->has("message"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session("message")}}
        <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session()->has("error"))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session("error")}}
        <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert-danger alert alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
    </div>
@endif