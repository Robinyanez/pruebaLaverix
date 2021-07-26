@if(Session::has('success'))
    <div class="alert alert-success alert-outline alert-dismissible" role="alert">
        <div class="row">
            <div class="alert-icon">
                <i class="far fa-fw fa-bell"></i>
            </div>
            <div class="alert-message">
                {{Session::get('success')}}
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger alert-outline alert-dismissible" role="alert">
        <div class="row">
            <div class="alert-icon">
                <i class="far fa-fw fa-bell"></i>
            </div>
            <div class="alert-message">
                {{Session::get('error')}}
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
@endif
