<div class="row">
    <div class="col-md-5 col-md-offset-2">

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Users Name</label>

            <div class="col-md-12">
                <input id="name" type="text" class="form-control" name="name"
                       value="{{ old('name', $user->name) }}">
                @include('partials.help-block' , ['field' => 'name'])
            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Users Email</label>

            <div class="col-md-12">
                <input id="email" type="text" class="form-control" name="email"
                       value="{{ old('email', $user->email) }}">
                @include('partials.help-block' , ['field' => 'email'])
            </div>
        </div>
        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
            <label for="contact" class="col-md-4 control-label">Users Contact</label>

            <div class="col-md-12">
                <input id="contact" type="text" class="form-control" name="contact"
                       value="{{ old('contact', $user->contact) }}">
                @include('partials.help-block' , ['field' => 'contact'])
            </div>
        </div>
        <div class="form-group{{ $errors->has('id_number') ? ' has-error' : '' }}">
            <label for="id_number" class="col-md-4 control-label">Users ID Number</label>

            <div class="col-md-12">
                <input id="id_number" type="text" class="form-control" name="id_number"
                       value="{{ old('id_number', $user->id_number) }}">
                @include('partials.help-block' , ['field' => 'id_number'])
            </div>
        </div>

        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
            <label for="contact" class="col-md-4 control-label">Users Age</label>

            <div class="col-md-12">
                <input id="age" type="text" class="form-control" name="age"
                       value="{{ old('age', $user->age) }}">
                @include('partials.help-block' , ['field' => 'age'])
            </div>
        </div>

        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="address" class="col-md-4 control-label">Users Address</label>

            <div class="col-md-12">
                {{Form::textArea('address' , old('address', $user->address), ['class' => 'form-control'])}}
                @include('partials.help-block' , ['field' => 'address'])
            </div>
        </div>
        <div class="form-group{{ $errors->has('image_url') ? ' has-error' : '' }}">
            <label for="image_url" class="col-md-4 control-label">Users Profile Image</label>

            <div class="col-md-12">
                <img class="profile-image" src="{{$user->image_url}}" alt="">
            </div>
            <div class="col-md-12">
                {{Form::file('image_url',['class' => 'form-control'])}}
                @include('partials.help-block' , ['field' => 'image_url'])
            </div>
        </div>

        <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
            <label for="is_active" class="col-md-4 control-label">Users Active</label>

            <div class="col-md-12">
                {{Form::checkbox('is_active' , true, old('is_active', $user->is_active), ['class' => 'form-control'])}}
                @include('partials.help-block' , ['field' => 'is_active'])
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </div>

    <div class="col-md-5 ">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>Linked</td>
                <td>Company name</td>
            </tr>
            </thead>
            <tbody>

            @foreach($linkedCompany as $item)
                <tr>
                    <td class="text-center">
                        {{Form::checkbox('company_list[]' ,  $item['company_id'] ,  $item['linked'] )}}
                    </td>
                    <td>{{ $item['company_name'] }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>