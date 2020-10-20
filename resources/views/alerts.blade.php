<br/>

@if ($errors->any())
    <div class="col-sm-12 col-md-12">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(session('flash_message'))
    <div class="col-sm-12 col-md-12">
        <div class="alert alert-{{ session('type') ? session('type') : 'success'}}">
            {{ session('flash_message' )}}
        </div>
    </div>
@endif

