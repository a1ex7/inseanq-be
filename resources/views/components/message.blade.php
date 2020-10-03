@if(session()->has('message'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                <i class="fa fa-info-circle"></i>{{ session('message') }}
            </div>
        </div>
    </div>
@endif
