<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Users Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name"
                       value="{{ old('name', $user->name) }}">
                @include('partials.help-block' , ['field' => 'name'])
            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Users Email</label>

            <div class="col-md-6">
                <input id="email" type="text" class="form-control" name="email"
                       value="{{ old('email', $user->email) }}">
                @include('partials.help-block' , ['field' => 'email'])
            </div>
        </div>
        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
            <label for="contact" class="col-md-4 control-label">Users Contact</label>

            <div class="col-md-6">
                <input id="contact" type="text" class="form-control" name="contact"
                       value="{{ old('contact', $user->contact) }}">
                @include('partials.help-block' , ['field' => 'contact'])
            </div>
        </div>

        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="address" class="col-md-4 control-label">Users Address</label>

            <div class="col-md-6">
                {{form::textArea('address' , old('address', $user->address), ['class' => 'form-control'])}}
                @include('partials.help-block' , ['field' => 'address'])
            </div>
        </div>

        {{--<div class="form-group{{ $errors->has('study_status') ? ' has-error' : '' }}">--}}
            {{--<label for="study_status" class="col-md-4 control-label">Study Status</label>--}}

            {{--<div class="col-md-6">--}}
                {{--{{ Form::select('study_status', [0 => 'Not Started', 1 => 'In Progress', 2 => 'On Hold', 3 => 'Closed', 4 => 'Cancelled'], old('study_status',  $studies->study_status), [ 'class' => 'form-control' ]) }}--}}
                {{--@include('admin.partials.help-block' , ['field' => 'study_status'])--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>