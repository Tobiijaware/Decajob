@if(session()->has('success'))
    <div class="alert">
        <p><i class="fa fa-check-circle-o" aria-hidden="true"></i> {{session()->get('success')}}</p>
    </div>
@endif
@if(session()->has('error'))
    <div class="alert-error">
        <p><i class="fa fa-ban" aria-hidden="true"></i> {{session()->get('error')}}</p>
    </div>
@endif
