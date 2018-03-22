@if( Session::get('success') || Session::get('error') || Session::get('info') || Session::get('warning') )
    <div class="row">
        <div class="col-sm-12 top-alert">
            @if(Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Well done!</strong> {!! Session::get('success') !!}
                </div>
            @endif
            @if(Session::get('error'))
                <div class="alert alert-error" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Oh snap!</strong> {{Session::get('error')}}
                </div>
            @endif
            @if(Session::get('info'))
                <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Just wait a moment!</strong> {{Session::get('info')}}
                </div>
            @endif
            @if(Session::get('warning'))
                <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong> {{Session::get('warning')}}
                </div>
            @endif
        </div>
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif